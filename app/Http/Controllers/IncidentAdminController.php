<?php

/**
 *  
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Trace;
use App\Models\Gestionincident;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use App\Exports\IncidentExport;
use App\Exports\IncidentpdfExport;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IncidentAdminController extends Controller
{

    public static function getincident()
    {
        if (session("utilisateur")->Role == 1 || session("utilisateur")->Role == 8 || session("utilisateur")->activereceiveincident == 0) { // super admin
            $list = Incident::orderBy('incidents.created_at', 'desc')->paginate(100);
        } else {
            // Afficher les incidents reçu
            $list = Incident::where("affecter", session("utilisateur")->affecter)->orderBy('incidents.created_at', 'desc')->paginate(100);
        }

        return view('viewadmindste.gererincident.dashincident', compact('list'));
    }

    public function setincident(Request $request)
    {
        try {
            if (!in_array("add_incie", session("auto_action"))) {
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
                    'acheteur' => 'required',
                    'desc' => 'required',
                    'cat' => 'required',
                    'hiera' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    return Back()->with('error', $validator->errors()->messages(), $request->all());
                }

                $add = new Incident();
                $add->Service = session("utilisateur")->Service;
                $add->Emetteur =  session("utilisateur")->idUser;
                $add->DateEmission = date("d-m-Y H:i:s");
                $add->Module = htmlspecialchars(trim($request->module));
                $add->description = htmlspecialchars(trim($request->desc));
                $add->cat = htmlspecialchars(trim($request->cat));
                $add->hierarchie = htmlspecialchars(trim($request->hiera));
                $add->etat = "En attente";
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

                flash("L'utilisateur est enregistré avec succès. ")->success();
                return Back()->with('success', "Vous avez enregistré un incident avec succès.");
            }
        } catch (QueryException $qe) {
            return Back()->with('error', "Une erreur ses produites :" . $qe->getMessage());
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function deleteincident(Request $request)
    {
        try {
            if (!in_array("delete_incie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $occurence = json_encode(Incident::where('id', request('id'))->first());
                $addt = new Trace();
                $addt->libelle = "Incident supprimé : " . $occurence;
                $addt->action = session("utilisateur")->idUser;
                $addt->save();
                Incident::where('id', request('id'))->delete();
                $info = "Incident est supprimé avec succès.";
                flash($info);
                return Back();
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produite :" . $e->getMessage());
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
            return Back()->with('error', "Une erreur ses produite :" . $e->getMessage());
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
                    'resolve.required' => 'L\état est requis.',
                ];
                $validator = Validator::make($request->all(), [
                    'module' => 'required',
                    'acheteur' => 'required',
                    'desc' => 'required',
                    'cat' => 'required',
                    'hiera' => 'required',
                    'resolve' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    return Back()->with('error', $validator->errors()->messages(), $request->all());
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
                        "Module" => htmlspecialchars(trim($request->module)),
                        "description" => htmlspecialchars(trim($request->desc)),
                        "cat" => htmlspecialchars(trim($request->cat)),
                        "resolue" => htmlspecialchars(trim($request->resolve)),
                        "hierarchie" => htmlspecialchars(trim($request->hiera))
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
            return Back()->with('error', "Une erreur ses produites :" . $qe->getMessage());
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function changetatincident(Request $request)
    {
        try {
            if (!in_array("update_etat", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                date_default_timezone_set('Africa/Porto-Novo');

                $request->validate([
                    'etat' => 'required',
                    'obs' => 'required',
                    'contenumail' => 'required',
                ], [
                    'etat.required' => 'Le champ état est requis.',
                    'obs.required' => 'Le champ observation est requis.',
                    'contenumail.required' => 'Le champ contenu mail est requis.',
                ]);

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
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
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
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
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
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }


    //incident export
	public function exportincident(Request $request)
	{
		try {

            if (session("utilisateur")->Role == 1 || session("utilisateur")->Role == 8 || session("utilisateur")->activereceiveincident == 0) { // super admin
                $list = Incident::orderBy('incidents.created_at', 'desc')->paginate(100);
            } else {
                // Afficher les incidents reçu
                $list = Incident::where("affecter", session("utilisateur")->affecter)->orderBy('incidents.created_at', 'desc')->paginate(100);
            }

            

			$format = $request->format;
	
			// Générer le fichier en fonction du format demandé
			switch ($format) {
				case 'pdf':
					$pdfExporter = new IncidentpdfExport($list);
					$filePath = $pdfExporter->generatePdf();
					$pdfContent = Storage::get($filePath);
	
					return response($pdfContent, 200)
							->header('Content-Type', 'application/pdf')
							->header('Content-Disposition', 'attachment; filename="IncidentExport.pdf"');
				case 'xlsx':
				default:
					return Excel::download(new IncidentExport($list), 'IncidentExport.xlsx', \Maatwebsite\Excel\Excel::XLSX);
			}
		} catch (\Exception $e) {
			return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
		}
	}
}