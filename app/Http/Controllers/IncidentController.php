<?php

/**
 * 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Incident;
use App\Models\Trace;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class IncidentController extends Controller
{

    public static function getincident(Request $request)
    {
        $lists = Incident::query()->where("Emetteur", session("utilisateur")->idUser)->orderBy('created_at', 'desc');

        if ($request->has('q') != "" && $request->has('q') != null) {
            $recherche = htmlspecialchars(trim($request->q));
            $list = $lists->where('Module', 'like', '%' . $recherche . '%')
                ->orWhere('DateEmission', 'like', '%' . $recherche . '%')
                ->orWhere('description', 'like', '%' . $recherche . '%')
                // ->orWhere('etat', 'like', '%' . $recherche . '%')
                // ->orWhere('hierarchie', 'like', '%' . $recherche . '%')
                ->paginate(100);
        } else {
            $list = $lists->paginate(100);
        }

        return view('viewadmindste.saveincident.dashincident', compact('list'));
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
                    flash("Erreur : " . $errorString)->error();
                    return Back();
                } else {
                    date_default_timezone_set('Africa/Porto-Novo');
                    $add = new Incident();
                    $add->Service = session("utilisateur")->Service;
                    $add->Emetteur =  session("utilisateur")->idUser;
                    $add->DateEmission = date("d-m-Y H:i:s");
                    $add->Module = htmlspecialchars(trim($request->module));
                    $add->description = htmlspecialchars(trim($request->desc));
                    $add->cat = htmlspecialchars(trim($request->cat));
                    $add->hierarchie = htmlspecialchars(trim($request->hiera));
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
            flash("Une erreur ses produites : " . $qe->getMessage())->error();
            return Back();
        } catch (\Exception $e) {
            flash("Une erreur ses produites : " . $e->getMessage())->error();
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
                    flash($info);
                } else {
                    $info = "Incident introuvable.";
                    flash($info);
                }
                return Back();
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
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
                        "hierarchie" => htmlspecialchars(trim($request->hiera))
                    ]
                );

                flash("Incident est modifiée avec succès. ")->success();
                TraceController::setTrace(
                    "Vous avez modifié l'incident " . $request->desc . " .",
                    session("utilisateur")->idUser
                );
                return redirect('/incident');
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }
}