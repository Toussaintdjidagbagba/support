<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\CategorieOutil;
use App\Models\ChampsCategorieOutil;
use App\Models\Trace;

class CategorieOutilsController extends Controller
{
    public function listcat()
    {
    	$list = CategorieOutil::all();
    	return view('viewadmindste.categorie.listcatoutil', compact('list'));
    }

    public function addcat(Request $request)
    {
    	if (!in_array("add_cat_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('categorieoutils')->where('libelle', $request->lib)->first()->id) ) {
                flash("La Catégorie d'outil que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
                $add = new CategorieOutil();
                $add->libelle =  htmlspecialchars(trim($request->lib)); 
                $add->action = session("utilisateur")->idUser;
                $add->save();

                flash("La Catégorie d'outil est enregistrée avec succès. ")->success();
                TraceController::setTrace("Vous avez enregistrée la Catégorie d'outil ".$request->lib." .",session("utilisateur")->idUser);
                return Back();
            }
        }
    }

    public function deletecat(Request $request)
    {
        if (!in_array("delete_cat_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $occurence = json_encode(CategorieOutil::where('id', request('id'))->first());
            $addt = new Trace();
            $addt->libelle = "Catégorie d'outil supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            CategorieOutil::where('id', request('id'))->delete();
            
            return "Le Catégorie est supprimé avec succès.";
        }
    }

    public function modifcat(Request $request)
    {

        if (!in_array("update_cat_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $request->validate([
                    'lib' => 'required|string', 
                ]);

            CategorieOutil::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->lib)),
                        'action' => session("utilisateur")->idUser,
                    ]);
            TraceController::setTrace("Vous avez modifié la catégorie ".$request->libelle." .", session("utilisateur")->idUser);
            return "La Catégorie est modifiée avec succès.";

            flash("La Catégorie est modifiée avec succès. ")->success();
            
            return redirect('/listcategoriesoutils');
        }
    }

    public function setchampcaracteristiqueoutil(Request $request)
    {
        if (!in_array("define_champ_cat_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if (isset(DB::table('champscategorieoutils')->where('categoutil', $request->id)->where('libelle', $request->lib)->first()->id) ) {
                return "Le champs existe déjà dans cette catégorie ";
            }else{
                $add = new ChampsCategorieOutil();
                $add->libelle =  htmlspecialchars(trim($request->lib)); 
                $add->type = $request->type;
                $add->code = CategorieOutilsController::generercodelib(CategorieOutilsController::retirerAccents($request->lib));
                $add->categoutil = $request->id;
                $add->action = session("utilisateur")->idUser;
                $add->save();
                TraceController::setTrace("Vous avez enregistrée le champ suivant ".$request->lib." dans la catégorie ".$request->lib." .",session("utilisateur")->idUser);

                return "Le champ est ajouter avec succès. ";
            }
        }
    }

    public static function generercodelib($lib){
        return str_replace(" ", "", trim(strtolower(substr(trim($lib), 2, 3).substr(trim($lib), 6, 3))));
    }

    public function getchampcategorie(Request $request){
        return json_encode(["data" => DB::table('champscategorieoutils')->where('categoutil', $request->champ)->get()]);
    }

    public static function retirerAccents($chaine)
    {
            $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
           
            $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

            $traiter = str_replace($search, $replace, $chaine);
            return $traiter;
    }
}
