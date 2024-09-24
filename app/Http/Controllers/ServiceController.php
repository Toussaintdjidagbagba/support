<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Service as Services;
use App\Models\Trace;

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
    	if (!in_array("add_service", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('services')->where('libelle', $request->lib)->first()->id) ) {
                flash("Services que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
                $add = new Services();
                $add->libelle =  htmlspecialchars(trim($request->lib));
                $add->action = session("utilisateur")->idUser;
                $add->save();

                flash("Service est enregistrée avec succès. ")->success();
                TraceController::setTrace("Vous avez enregistrée le service ".$request->lib." .",session("utilisateur")->idUser);
                return Back();
            }
        }
    }

    public function deleteserv(Request $request)
    {
        if (!in_array("delete_service", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $occurence = json_encode(Services::where('id', request('id'))->first());
            $name = Services::where('id', request('id'))->first()->libelle;
            $addt = new Trace();
            $addt->libelle = "Service supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            Services::where('id', request('id'))->delete();
            $info = $name." est supprimé avec succès.";
            flash($info);
            return Back();
        }
    }

    public function getmodifserv(Request $request)
    {
        if (!in_array("update_service", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $info = Services::where('id', request('id'))->first();
            return view('viewadmindste.service.modifservice', compact('info'));
        }
    }

    public function modifserv(Request $request)
    {

        if (!in_array("update_service", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $request->validate([
                    'libelle' => 'required|string', 
                ]);
            $name = Services::where('id', request('id'))->first()->libelle;
            Services::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->libelle)),
                        'action' => session("utilisateur")->idUser,
                    ]);
            flash($name." est modifiée avec succès. ")->success();
            TraceController::setTrace("Vous avez modifié le services ".$request->libelle." .", session("utilisateur")->idUser);
            return redirect('/listservices');
        }
    }
}
