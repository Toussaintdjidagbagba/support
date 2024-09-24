<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Setting;
use App\Models\Trace;

class SettingController extends Controller
{
    // 
    public function list()
    {
    	$list = Setting::all();
    	return view('viewadmindste.setting.list', compact('list'));
    }

    public function add(Request $request)
    {
    	if (!in_array("add_service", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('settings')->where("type", $request->type)->where('libelle', $request->lib)->first()->id) ) {
                flash($request->type." que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
                $add = new Setting();
                $add->libelle =  htmlspecialchars(trim($request->lib));
                $add->type =  htmlspecialchars(trim($request->type));
                $add->save();

                flash($request->type." est enregistrée avec succès. ")->success();
                TraceController::setTrace("Vous avez enregistrée le ".$request->lib." dans la base de ".$request->type." .",session("utilisateur")->idUser);
                return Back();
            }
        }
    }

    public function delete(Request $request)
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

    public function getmodif(Request $request)
    {
        if (!in_array("update_service", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $info = Services::where('id', request('id'))->first();
            return view('viewadmindste.service.modifservice', compact('info'));
        }
    }

    public function modif(Request $request)
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
