<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Hierarchie;
use App\Models\Trace;

class HierarchieController extends Controller
{
    public function listhie()
    {
    	$list = Hierarchie::all();
    	return view('viewadmindste.hierarchie.listhie', compact('list'));
    }

    public function addhie(Request $request) 
    {
    	if (!in_array("add_hie", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('hierarchies')->where('libelle', $request->lib)->first()->id) ) {
                flash("Hierarchie que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
                $add = new Hierarchie();
                $add->libelle =  htmlspecialchars(trim($request->lib));
                $add->action = session("utilisateur")->idUser;
                $add->save();

                flash("Hierarchie est enregistrée avec succès. ")->success();
                TraceController::setTrace("Vous avez enregistrée l'hierarchie ".$request->lib." .",session("utilisateur")->idUser);
                return Back();
            }
        }
    }

    public function deletehie(Request $request)
    {
        if (!in_array("delete_hie", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $occurence = json_encode(Hierarchie::where('id', request('id'))->first());
            $addt = new Trace();
            $addt->libelle = "Hierarchie supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            Hierarchie::where('id', request('id'))->delete();
            $info = "Hierarchie est supprimé avec succès.";
            flash($info);
            return Back();
        }
    }

    public function getmodifhie(Request $request)
    {
        if (!in_array("update_hie", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $info = Hierarchie::where('id', request('id'))->first();
            return view('viewadmindste.hierarchie.modifhie', compact('info'));
        }
    }

    public function modifhie(Request $request)
    {

        if (!in_array("update_hie", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $request->validate([
                    'libelle' => 'required|string', 
                ]);

            Hierarchie::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->libelle)),
                        'action' => session("utilisateur")->idUser,
                    ]);
            flash("Hierarchie est modifiée avec succès. ")->success();
            TraceController::setTrace(
                "Vous avez modifié l'hierarchie ".$request->libelle." .",
                session("utilisateur")->idUser);
            return redirect('/listhiérarchies');
        }
    }
}
