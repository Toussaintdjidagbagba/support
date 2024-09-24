<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Categorie;
use App\Models\Trace;

class CategorieController extends Controller
{
    public function listcat()
    {
    	$list = Categorie::all();
    	return view('viewadmindste.categorie.listcat', compact('list'));
    }

    public function addcat(Request $request)
    {
    	if (!in_array("add_cat", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('categories')->where('libelle', $request->lib)->first()->id) ) {
                flash("La Catégorie que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
                $add = new Categorie();
                $add->libelle =  htmlspecialchars(trim($request->lib)); 
                $add->tmpCat = $request->tempmin;
                $add->action = session("utilisateur")->idUser;
                $add->save();

                flash("La Catégorie est enregistrée avec succès. ")->success();
                TraceController::setTrace("Vous avez enregistrée la Catégorie ".$request->lib." .",session("utilisateur")->idUser);
                return Back();
            }
        }
    }

    public function deletecat(Request $request)
    {
        if (!in_array("delete_cat", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $occurence = json_encode(Categorie::where('id', request('id'))->first());
            $addt = new Trace();
            $addt->libelle = "Catégorie supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            Categorie::where('id', request('id'))->delete();
            $info = "Le Catégorie est supprimé avec succès.";
            flash($info);
            return Back();
        }
    }

    public function getmodifcat(Request $request)
    {
        if (!in_array("update_cat", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $info = Categorie::where('id', request('id'))->first();
            return view('viewadmindste.categorie.modifcat', compact('info'));
        }
    }

    public function modifcat(Request $request)
    {

        if (!in_array("update_cat", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $request->validate([
                    'libelle' => 'required|string', 
                ]);

            Categorie::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->libelle)),
                        'tmpCat' => $request->tempmin,
                        'action' => session("utilisateur")->idUser,
                    ]);
            flash("La Catégorie est modifiée avec succès. ")->success();
            TraceController::setTrace(
                "Vous avez modifié la catégorie ".$request->libelle." .",
                session("utilisateur")->idUser);
            return redirect('/listcatégories');
        }
    }
}
