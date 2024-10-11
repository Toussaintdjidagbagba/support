<?php

/**
 *  
 */

namespace App\Http\Controllers;

use App\Exports\DeclarIncidentpdfExport;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Trace;
use App\Models\Gestionincident;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use App\Exports\IncidentExport;
use App\Exports\IncidentpdfExport;
use App\Exports\IncidentRech;
use App\Exports\IncidentRechpdf;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IncidentAdminController extends Controller
{

    public static function getincident()
    {
        return view('viewadmindste.gererincident.dashincident');
    }

    public static function getincidentData(Request $request)
    {
        if (session("utilisateur")->Role == 1 || session("utilisateur")->Role == 8 || session("utilisateur")->activereceiveincident == 0) 
        { // super admin
            $query = DB::table('incidents as i')
                ->leftJoin('hierarchies as h', 'i.hierarchie', '=', 'h.id')
                ->leftJoin('categories as c', 'i.cat', '=', 'c.id')
                ->leftJoin('utilisateurs as u', 'i.affecter', '=', 'u.idUser')
                ->leftJoin('utilisateurs as uE', 'i.Emetteur', '=', 'uE.idUser')
                ->leftJoin('settings as s', 'i.etat', '=', 's.id')
                ->select(
                    'i.id',
                    'i.Module',
                    'i.affecter',
                    'i.etat',
                    'i.DateEmission',
                    'i.description',
                'i.piece',
                    'h.libelle as hierarchie',
                DB::raw('COALESCE(i.DateResolue, "Pas encore résolue") as DateResolue'),
                    DB::raw('COALESCE(c.libelle, "Aucune catégorie") as cat'),
                    DB::raw('COALESCE(s.libelle, "En attente") as etats'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersA'),
                DB::raw('COALESCE(CONCAT(uE.nom, " ", uE.prenom), "En attente") as usersE'),
                    'i.created_at',
                    'u.idUser as user_id',
                'uE.idUser as userE_id',
                )
                ->orderBy('i.created_at', 'asc');
        } 
        else 
        {
            $query = DB::table('incidents as i')
                ->leftJoin('hierarchies as h', 'i.hierarchie', '=', 'h.id')
                ->leftJoin('categories as c', 'i.cat', '=', 'c.id')
                ->leftJoin('utilisateurs as u', 'i.affecter', '=', 'u.idUser')
                ->leftJoin('utilisateurs as uE', 'i.Emetteur', '=', 'uE.idUser')
                ->leftJoin('settings as s', 'i.etat', '=', 's.id')
                ->select(
                    'i.id',
                    'i.Module',
                    'i.affecter',
                    'i.etat',
                    'i.DateEmission',
                    'i.description',
                'i.piece',
                    'h.libelle as hierarchie',
                DB::raw('COALESCE(i.DateResolue, "Pas encore résolue") as DateResolue'),
                    DB::raw('COALESCE(c.libelle, "Aucune catégorie") as cat'),
                    DB::raw('COALESCE(s.libelle, "En attente") as etats'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersA'),
                DB::raw('COALESCE(CONCAT(uE.nom, " ", uE.prenom), "En attente") as usersE'),
                    'i.created_at',
                'u.idUser as user_id',
                'uE.idUser as userE_id',
                )
                ->where("i.Emetteur", session("utilisateur")->idUser)
                ->orderBy('i.created_at', 'asc');
        }

        if ($request->filled('date_emission')) {
            $query->whereDate('i.DateEmission', $request->date_emission);
        }

        if ($request->filled('hierarchie')) {
            $query->where('h.libelle', 'like', '%' . htmlspecialchars(trim($request->hierarchie)) . '%');
        }

        if ($request->filled('etat')) {
            $query->where(DB::raw('COALESCE(s.libelle, "")'), 'like', '%' . htmlspecialchars(trim($request->etat)) . '%');
        }

        if ($request->filled('modules')) {
            $query->where('i.Module', 'like', '%' . htmlspecialchars(trim($request->modules)) . '%');
        }

        if ($request->filled('date_resolution')) {
            $query->where('i.DateResolue', 'like', '%' . htmlspecialchars(trim($request->date_resolution)) . '%');
        }

        if ($request->filled('affecter')) {
            $query->where(DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "")'), 'like', '%' . htmlspecialchars(trim($request->affecter)) . '%');
        }

        if ($request->filled('emetteur')) {
            $query->where(DB::raw('COALESCE(CONCAT(uE.nom, " ", uE.prenom), "")'), 'like', '%' . htmlspecialchars(trim($request->emetteur)) . '%');
        }

        $list = $query->get();
        $serv = InterfaceServiceProvider::alladminandsuperadmin();
        return json_encode(["list" => $list, "serv" => $serv]);
    }

    public function setincident(Request $request)
    {
        try {
            if (!in_array("add_incie", session("auto_action"))) {
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
                    $add = new Incident();
                    $add->Service = session("utilisateur")->Service;
                    $add->Emetteur =  session("utilisateur")->idUser;
                    $add->DateEmission = date("d-m-Y H:i:s");
                    $add->Module = htmlspecialchars(trim($request->module));
                    $add->description = htmlspecialchars(trim($request->desc));
                    $add->cat = htmlspecialchars(trim($request->cat));
                    $add->hierarchie = htmlspecialchars(trim($request->hiera));
                    $add->etat = 0;
                    if ($request->hasFile('piece')) {
                        $namefile = "incident" . date('is') . "." . $request->file('piece')->getClientOriginalExtension();
                        $upload = "documents/incident/";
                        $request->file('piece')->move($upload, $namefile);
                        $add->piece = $upload . $namefile;
                    } else {
                        $add->piece = "";
                    }
                    $add->save();

                    // Sauvegarde de la trace
                    TraceController::setTrace("Vous avez enregistré un incident." . $add->id, session("utilisateur")->idUser);

                    $message = "";

                    //SendMail::senddeclaration(session("utilisateur")->mail, "Moi", compact("message"));

                    flash("Vous avez enregistré un incident avec succès. ")->success();
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
            if (!in_array("delete_incie", session("auto_action"))) {
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
                    flash($info);
                } else {
                    $info = "Incident introuvable.";
                    flash($info);
                }
                return Back();
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return $errorString;
        }
    }

    public function getmodifyincident(Request $request)
    {
        try {
            if (!in_array("update_incie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $info = Incident::where('id', request('id'))->first();
                return view('viewadmindste.gererincident.modifincident', compact('info'));
            }
        } catch (\Exception $e) {
            flash("Erreur serveur.")->error();
            return Back();
        }
    }

    public function modifyincident(Request $request)
    {

        try {
            if (!in_array("update_incie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $messages = [
                    'module.required' => 'Veuillez saisire le module.',
                    'desc.required' => 'La description est requise.',
                    'cat.required' => 'La catégorie est requis.',
                    'hiera.required' => 'L\'hiérachie est requis.',
                ];
                $validator = Validator::make($request->all(), [
                    'module' => 'required',
                    'desc' => 'required',
                    'cat' => 'required',
                    'hiera' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                    $errorString = implode(' ', $errors);
                    flash($errorString)->error();
                    return Back();
                }

                if ($request->hasFile('piece')) {
                    $namefile = "incident" . date('i') . ".pdf";
                    $upload = "documents/incident/";
                    $request->file('piece')->move($upload, $namefile);
                    $piece = $upload . $namefile;

                    Incident::where('id', request('id'))->update(
                        [
                            "piece" => $piece
                        ]
                    );
                }

                Incident::where('id', request('id'))->update(
                    [
                        "Module" => $request->module,
                        "description" => $request->desc,
                        "cat" => $request->cat,
                        "resolue" => $request->resolve,
                        "hierarchie" => $request->hiera
                    ]
                );

                flash("Incident est modifiée avec succès. ")->success();
                TraceController::setTrace(
                    "Vous avez modifié l'incident " . $request->desc . " .",
                    session("utilisateur")->idUser
                );
                return redirect('/incidents');
            }
        } catch (QueryException $qe) {
            flash("Erreur serveur.")->error();
            return Back();
        } catch (\Exception $e) {
            flash("Erreur serveur.")->error();
            return Back();
        }
    }

    public function changetatincident(Request $request)
    {
        try {
            if (!in_array("update_etat", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                date_default_timezone_set('Africa/Porto-Novo');

                $messages = [
                    'etat.required' => 'Le champ état est requis.',
                    'obs.required' => 'Le champ observation est requis.',
                    'contenumail.required' => 'Le champ contenu mail est requis.',
                ];
                $validator = Validator::make($request->all(), [
                    'etat' => 'required',
                    'obs' => 'required',
                    'contenumail' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                    $errorString = implode(' ', $errors);
                    flash($errorString)->error();
                    return Back();
                }

                // Sauvegarder l'action
                $addAction = new Gestionincident();
                $addAction->incident = $request->idincidentetat;
                $addAction->observation = $request->obs;
                $addAction->etat = $request->etat;
                $addAction->contenumail = $request->contenumail;
                $addAction->actiontech = session("utilisateur")->idUser;
                $addAction->save();

                // Mettre à jour l'état sur l'incident
                Incident::where('id', request('idincidentetat'))->update(
                    [
                        "etat" => $request->etat,
                        "statut" => 1,
                        "DateResolue" => date("Y-m-d H:i:s"),
                    ]
                );

                $mod = Incident::where('id', request('idincidentetat'))->first()->Module;
                flash("L'état : " . $mod . " est modifiée avec succès. ")->success();
                TraceController::setTrace("L'état : " . $mod . " est modifiée avec succès. ", session("utilisateur")->idUser);

                $emet = Incident::where('id', request('idincidentetat'))->first()->Emetteur;
                $email = DB::table('utilisateurs')->where('idUser', $emet)->first()->mail;
                $message = $request->contenumail;
                $data = ["mes" => $message];

                //SendMail::senddeclaration($email, "Evolution de l'incident", $data);
                return Back();
            }
        } catch (\Exception $e) {
            flash("Erreur serveur.")->error();
            return Back();;
        }
    }

    public function affecterincident(Request $request)
    {
        try {
            if (!in_array("affec_incie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                Incident::where('id', request('idaffecteincident'))->update(
                    [
                        "affecter" => $request->tech
                    ]
                );
                $technicien = DB::table('utilisateurs')->where('idUser', $request->tech)->first();;
                $data = ["mes" => "Un incident vous a été affecté. Veuillez-vous connecter pour procéder à son traitement."];
                //SendMail::senddeclaration($technicien->mail, "Affectationd d'incident", $data);
                flash("L'incident est affecté à : " . $technicien->nom . ' ' . $technicien->prenom . " avec succès. ")->success();
                TraceController::setTrace("L'incident est affecté à : " . $technicien->nom . ' ' . $technicien->prenom . " avec succès. ", session("utilisateur")->idUser);
                return Back();
            }
        } catch (\Exception $e) {
            flash("Erreur serveur.")->error();
            return Back();;
        }
    }

    public function exporterexcel(Request $request)
    {
        try {
            $list = Incident::orderBy('created_at', 'desc')->get();
            $i = 0;
            // préparation du fichier excel
            foreach ($list as $item) {
                $tabl[$i]["dateemmission"] = $item->DateEmission;
                $tabl[$i]["module"] = $item->Module;
                $tabl[$i]["hierarchie"] = InterfaceServiceProvider::LibelleHier($item->hierarchie);
                $tabl[$i]["emetteur"] = InterfaceServiceProvider::LibelleUser($item->Emetteur);
                $tabl[$i]["etat"] = $item->etat;
                $tabl[$i]["dateresolue"] = $item->DateResolue;
                $tabl[$i]["avis"] = $item->avis;
                $tabl[$i]["commentaire"] = $item->sugg;
                $tabl[$i]["action"] = InterfaceServiceProvider::LibelleUser($item->action);
                $i++;
            }

            $autre = new Collection($tabl);
            Session()->put('incidents', $autre);
            // Téléchargement du fichier excel
            return Excel::download(new ExportExcel, 'Rapport_' . date('Y-m-d-h-i-s') . '.xlsx');
        } catch (\Exception $e) {
            flash("Erreur serveur.")->error();
            return Back();;
        }
    }

    //incident export
    public function exportincident(Request $request)
    {
        try {

            if (session("utilisateur")->Role == 1 || session("utilisateur")->Role == 8 || session("utilisateur")->activereceiveincident == 0) 
            {
                // super admin
                $query = DB::table('incidents as i')
                    ->leftJoin('hierarchies as h', 'i.hierarchie', '=', 'h.id')
                    ->leftJoin('categories as c', 'i.cat', '=', 'c.id')
                    ->leftJoin('utilisateurs as u', 'i.affecter', '=', 'u.idUser')
                    ->leftJoin('utilisateurs as uE', 'i.Emetteur', '=', 'uE.idUser')
                    ->leftJoin('settings as s', 'i.etat', '=', 's.id')
                    ->select(
                        'i.id',
                        'i.Module',
                        'i.affecter',
                        'i.etat',
                        'i.DateEmission',
                        'i.description',
                    'i.piece',
                        'h.libelle as hierarchie',
                    DB::raw('COALESCE(i.DateResolue, "Pas encore résolue") as DateResolue'),
                        DB::raw('COALESCE(c.libelle, "Aucune catégorie") as cat'),
                        DB::raw('COALESCE(s.libelle, "En attente") as etats'),
                    DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersA'),
                    DB::raw('COALESCE(CONCAT(uE.nom, " ", uE.prenom), "En attente") as usersE'),
                        'i.created_at',
                        'u.idUser as user_id',
                    'uE.idUser as userE_id',
                    )
                    ->orderBy('i.created_at', 'asc');
            } 
            else 
            {
                $query = DB::table('incidents as i')
                    ->leftJoin('hierarchies as h', 'i.hierarchie', '=', 'h.id')
                    ->leftJoin('categories as c', 'i.cat', '=', 'c.id')
                    ->leftJoin('utilisateurs as u', 'i.affecter', '=', 'u.idUser')
                    ->leftJoin('utilisateurs as uE', 'i.Emetteur', '=', 'uE.idUser')
                    ->leftJoin('settings as s', 'i.etat', '=', 's.id')
                    ->select(
                        'i.id',
                        'i.Module',
                        'i.affecter',
                        'i.etat',
                        'i.DateEmission',
                        'i.description',
                    'i.piece',
                        'h.libelle as hierarchie',
                    DB::raw('COALESCE(i.DateResolue, "Pas encore résolue") as DateResolue'),
                        DB::raw('COALESCE(c.libelle, "Aucune catégorie") as cat'),
                        DB::raw('COALESCE(s.libelle, "En attente") as etats'),
                    DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersA'),
                    DB::raw('COALESCE(CONCAT(uE.nom, " ", uE.prenom), "En attente") as usersE'),
                        'i.created_at',
                    'u.idUser as user_id',
                    'uE.idUser as userE_id',
                    )
                    ->where("i.Emetteur", session("utilisateur")->idUser)
                    ->orderBy('i.created_at', 'asc');
            }

            $list = $query->get();
            

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new IncidentpdfExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="IncidentExport_' . $dateExp . '.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new IncidentExport($list), 'IncidentExport_' . $dateExp . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

    //incident export recherche
    public function exportincidentrech(Request $request)
    {
        try {

            $list = json_decode($request->input('Gliste'), true); 

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new IncidentRechpdf($list);
                    //dd($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="IncidentExport_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new IncidentRech($list), 'IncidentExport_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

    //export declaration incident
    public function expdeclincident(Request $request)
    {
        try {

            if (session("utilisateur")->Role == 1 || session("utilisateur")->Role == 8 || session("utilisateur")->activereceiveincident == 0) { // super admin
                $list = Incident::where('id', $request->idlin)->orderBy('incidents.created_at', 'desc')->paginate(100);
            } else {
                // Afficher les incidents reçu
                $list = Incident::where('affecter', session("utilisateur")->affecter)
                    ->where('id', $request->idlin)
                    ->orderBy('incidents.created_at', 'desc')
                    ->paginate(100);
            }
            //dd($list);       

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');    

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new DeclarIncidentpdfExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="DeclarationsIncident_' . $dateExp . '.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new DeclarIncidentpdfExport($list), 'DeclarationIncident_' . $dateExp . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }
}