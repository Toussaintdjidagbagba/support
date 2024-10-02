<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service as Services;
use App\Models\Trace;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    // 
    public function listserv()
    {
        $list = Services::all();
        return view('viewadmindste.service.listservice', compact('list'));
    }

    public function addserv(Request $request)
    {
        try {
            if (!in_array("add_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('services')->where('libelle', $request->lib)->first()->id)) {
                    flash("Services que vous voulez ajouter existe déjà!! ")->error();
                    return Back();
                } else {
                    $add = new Services();
                    $add->libelle =  htmlspecialchars(trim($request->lib));
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    flash("Service est enregistrée avec succès. ")->success();
                    TraceController::setTrace("Vous avez enregistrée le service " . $request->lib . " .", session("utilisateur")->idUser);
                    return Back();
                }
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public function deleteserv(Request $request)
    {
        try {
            if (!in_array("delete_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $existe = Services::find($request->id);
                if ($existe) {
                    $occurence = json_encode(Services::where('id', request('id'))->first());
                    $name = Services::where('id', request('id'))->first()->libelle;
                    $addt = new Trace();
                    $addt->libelle = "Service supprimé : " . $occurence;
                    $addt->action = session("utilisateur")->idUser;
                    $addt->save();
                    Services::where('id', request('id'))->delete();
                    $info = $name . " est supprimé avec succès.";
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "Service introuvable.";
                    flash($info)->error();
                    return $info;
                }
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public function getmodifserv(Request $request)
    {
        try {
            if (!in_array("update_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $info = Services::where('id', request('id'))->first();
                return view('viewadmindste.service.modifservice', compact('info'));
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public function modifserv(Request $request)
    {
        try {
            if (!in_array("update_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $request->validate([
                    'libelle' => 'required|string',
                ]);
                $name = Services::where('id', request('id'))->first()->libelle;
                Services::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->libelle)),
                        'action' => session("utilisateur")->idUser,
                    ]
                );
                flash($name . " est modifiée avec succès. ")->success();
                TraceController::setTrace("Vous avez modifié le services " . $request->libelle . " .", session("utilisateur")->idUser);
                return redirect('/listservices');
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }
}