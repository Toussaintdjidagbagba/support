<?php

/**
 * 
 */

namespace App\Http\Controllers;

use App\Exports\IncidentDeclarRech;
use App\Exports\IncidentDeclarRechPdf;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Trace;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class IncidentController extends Controller
{

    public static function getincident()
    {
        return view('viewadmindste.saveincident.dashincident');
    }

    // nouvelle methode lier au js
    public static function getincidentData(Request $request)
    {
        $query = DB::table('incidents as i')
        ->leftJoin('hierarchies as h', 'i.hierarchie', '=', 'h.id')
        ->leftJoin('categories as c', 'i.cat', '=', 'c.id')
        ->leftJoin('settings as s', 'i.etat', '=', 's.id')
        ->select(
            'i.id',
            'i.Module',
            'i.DateEmission',
            'i.description',
            'h.libelle as hierarchie',
            DB::raw('COALESCE(c.libelle, "Aucune catégorie") as cat'),
            DB::raw('COALESCE(s.libelle, "En attente") as etat'),
            'i.created_at',
            'c.tmpCat'
        )
            ->where("i.Emetteur", session("utilisateur")->idUser)
            ->orderBy('i.created_at', 'desc');

        if ($request->filled('date_emission')) {
            $query->whereDate('i.DateEmission', $request->date_emission);
        }

        if ($request->filled('hierarchie')) {
            $query->where('h.libelle', 'like', '%' . htmlspecialchars(trim($request->hierarchie)) . '%');
        }

        if ($request->filled('desc')) {
            $query->where('i.description', 'like', '%' . htmlspecialchars(trim($request->desc)) . '%');
        }

        if ($request->filled('modules')) {
            $query->where('i.Module', 'like', '%' . htmlspecialchars(trim($request->modules)) . '%');
        }

        if ($request->filled('categorie')) {
            $query->where(DB::raw('COALESCE(c.libelle, "")'), 'like', '%' . htmlspecialchars(trim($request->categorie)) . '%');
        }

        $list = $query->get();

        // Calcul du temps restant pour chaque incident
        $list->transform(function ($incident) {
            // Récupération du délai
            $valeurDelai = (int)$incident->tmpCat;

            $secondesDelai = $valeurDelai * 3600;

            $timestampEmission = strtotime($incident->created_at);
            $timestampLimite = $timestampEmission + $secondesDelai;

            $timestampNow = time();

            $tempsRestant = $timestampLimite - $timestampNow;
            $etat = Incident::where('id', $incident->id)->first(); // Vérification de l'état actuel de l'incident

            // Formatage du temps restant
            $tempsRestantFormate = "Non défini";
            if ($etat) {
                if (($etat->etat != 0 || $etat->etat != null) || ($etat->affecter != 0 || $etat->affecter != null)) {
                    $tempsRestantFormate = "Prise en compte";
                } else {
                    if ($tempsRestant > 0) {
                        $heuresRestantes = floor($tempsRestant / 3600);
                        $minutesRestantes = floor(($tempsRestant % 3600) / 60);
                        $secondesRestantes = $tempsRestant % 60;
                        $tempsRestantFormate = sprintf('%02d h %02d m %02d s', $heuresRestantes, $minutesRestantes, $secondesRestantes);
                    } else {
                        $tempsRestantFormate = "Temps écoulé";
                    }
                }
            }

            $incident->tempsRestant = $tempsRestantFormate;
            return $incident;
        });

        return json_encode(["list" => $list]);
    }

    public function valideavis(Request $request)
    {
        try {
            Incident::where('id', $request->anormalieid)->update(
                [
                    "avis" => $request->avis,
                    "sugg" => $request->libsub,
                ]
            );

            $data = json_encode(["success" => true, "data" => "Merci!"]);
            return $data;
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function setincident(Request $request)
    {
        try {
            if (!in_array("add_incident", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $messages = [
                    'module.required' => 'Veuillez saisire le module.',
                    'cat.required' => 'La catégorie est requis.',
                    'hiera.required' => 'L\'hiérachie est requis.',
                ];
                $validator = Validator::make($request->all(), [
                    'module' => 'required',
                    'cat' => 'required',
                    'hiera' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                    $errorString = implode(' ', $errors);
                    flash($errorString)->error();
                    return Back();
                } else {
                    date_default_timezone_set('Africa/Porto-Novo');
                    $add = new Incident();
                    $add->Service = session("utilisateur")->Service;
                    $add->Emetteur =  session("utilisateur")->idUser;
                    $add->DateEmission = date("d-m-Y H:i:s");
                    $add->Module = $request->module;
                    $add->description = $request->desc;
                    $add->cat = $request->cat;
                    $add->hierarchie = $request->hiera;
                    if ($request->hasFile('piece')) {
                        $namefile = "incident" . date('i') . "." . $request->file('piece')->getClientOriginalExtension();
                        $upload = "documents/incident/";
                        $request->file('piece')->move($upload, $namefile);
                        $add->piece = $upload . $namefile;
                    } else {
                        $add->piece = "";
                    }

                    $add->save();

                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez déclaré un incident." . $add->id, session("utilisateur")->idUser);

                    $libservice = InterfaceServiceProvider::LibService(session("utilisateur")->Service);

                    $message = "M/Mme " . session("utilisateur")->nom . " " . session("utilisateur")->prenom . " du " . $libservice . " à déclarer un incident. Veuillez vous connecté SUPPORT IT pour procéder au traitement.";

                    $data = ["mes" => $message];

                    $destinataire = InterfaceServiceProvider::destinataire();

                    //SendMail::senddeclaration($destinataire, "Déclaration d'incident", $data);

                    flash("Vous avez déclaré un incident avec succès. ")->success();
                    return Back();
                }
            }
        } catch (QueryException $qe) {
            flash("Erreur serveur.")->error();
            return Back();
        } catch (\Exception $e) {
            flash("Erreur serveur.")->error();
            return Back();
        }
    }

    public function deleteincident(Request $request)
    {
        try {
            if (!in_array("delete_incident", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $incident = Incident::find(request('id'));
                if ($incident) {
                    $occurence = json_encode(Incident::where('id', request('id'))->first());
                    $addt = new Trace();
                    $addt->libelle = "Incident supprimé : " . $occurence;
                    $addt->action = session("utilisateur")->idUser;
                    $addt->save();
                    Incident::where('id', request('id'))->delete();
                    $info = "Incident est supprimé avec succès.";
                    flash($info)->success();
                } else {
                    $info = "Incident introuvable.";
                    flash($info)->error();
                }
                return Back();
            }
        } catch (\Exception $e) {
            $info = "Une erreur ses produites :" . $e->getMessage();
            flash($info)->error();
            return Back();
        }
    }

    public function getmodifyincident(Request $request)
    {
        try {
            if (!in_array("update_incident", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $info = Incident::where('id', request('id'))->first();
                return view('viewadmindste.saveincident.modifincident', compact('info'));
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function modifyincident(Request $request)
    {
        try {
            if (!in_array("update_incident", session("auto_action"))) {
                return view("vendor.error.649");
            } else {


                if ($request->hasFile('piece')) {
                    // Récupérer l'extension du fichier uploadé
                    $extension = $request->file('piece')->getClientOriginalExtension();
                    // Générer un nom de fichier unique avec l'extension correcte
                    $namefile = "incident_" . date('i') . "." . $extension;
                    $upload = "documents/incident/";

                    // Enregistrer le fichier dans le répertoire spécifié
                    $request->file('piece')->move(public_path($upload), $namefile);
                    $piece = $upload . $namefile;

                    // Mettre à jour la base de données avec le chemin de la pièce jointe
                    Incident::where('id', request('id'))->update([
                        "piece" => $piece
                    ]);
                }

                $updat =  Incident::where('id', request('id'))->update(
                    [
                        "Module" => $request->module,
                        "description" => $request->desc,
                        "cat" => $request->cat,
                        "hierarchie" => $request->hiera,
                    ]
                );

                flash("Incident est modifiée avec succès. ")->success();
                TraceController::setTrace(
                    "Vous avez modifié l'incident " . $request->desc . " .",
                    session("utilisateur")->idUser
                );
                return Back();
            }
        } catch (\Exception $e) {
            dd($e);
            flash("Erreur serveur.")->error();
            return Back();
        }
    }


    //export recherche incidents déclarés
    public function exportincidentrech(Request $request)
    {
        try {

            $list = json_decode($request->input('Gliste'), true); 

            //dd($list);
            
            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');    

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new IncidentDeclarRechPdf($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="Incident_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new IncidentDeclarRech($list), 'Incident_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

}