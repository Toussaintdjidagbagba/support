<?php

namespace App\Http\Controllers;

use App\Models\ActionOutil;
use Illuminate\Http\Request;
use App\Models\CategorieOutil;
use App\Models\ChampsCategorieOutil;
use App\Models\Outil;
use App\Models\Trace;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategorieOutilsController extends Controller
{
    public function listcat()
    {
        $list = CategorieOutil::all();
        return view('viewadmindste.categorie.listcatoutil', compact('list'));
    }

    public function addcat(Request $request)
    {
        try {
            if (!in_array("add_cat_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('categorieoutils')->where('libelle', $request->lib)->first()->id)) {
                    flash("La Catégorie d'outil que vous voulez ajouter existe déjà!! ")->error();
                    return Back();
                } else {
                    $add = new CategorieOutil();
                    $add->libelle =  htmlspecialchars(trim($request->lib));
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    flash("La Catégorie d'outil est enregistrée avec succès. ")->success();
                    TraceController::setTrace("Vous avez enregistrée la Catégorie d'outil " . $request->lib . " .", session("utilisateur")->idUser);
                    return Back();
                }
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites " .  $qe->getMessage();
            flash($errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function listactionsoutils(Request $request)
    {
        // dd($request->id);
        $idCatOutils = Outil::where('id', $request->id)->first()->categorie;
        $lists = InterfaceServiceProvider::recupactionsoutils($idCatOutils);
        return $lists;
    }
    public function listcatactionsoutils(Request $request)
    {
        // dd($request->id);
        $lists = InterfaceServiceProvider::recupactionsoutils($request->id);
        return $lists;
    }

    public function addactionsoutils(Request $request)
    {
        if (!in_array("add_outil", session("auto_action"))) {
            return view("vendor.error.649");
        } else {
            try {
                if (isset(DB::table('action_outils')->where('code', $request->codeaction)->where('Outils', $request->idCatOutils)->first()->id)) {
                    $errorString = "L'action que vous voulez ajouter existe déjà pour cet outil!! ";
                    flash($errorString)->error();
                    return $errorString;
                } else {
                    $messages = [
                        '_token.required' => 'Les jeton du formulaire sont requis.',
                        'libelleaction.required' => 'Le Libellé est requis.',
                        'codeaction.required' => 'La code de l\'action est requis.',
                    ];
                    $validator = Validator::make($request->all(), [
                        '_token' => 'required',
                        'libelleaction' => 'required',
                        'codeaction' => 'required',
                    ], $messages);

                    if ($validator->fails()) {
                        $errors = $validator->errors()->all();
                        $errorString = implode(' ', $errors);
                        flash($errorString)->error();
                        return $errorString;
                    }

                    $idCatOutils = $request->idCatOutils;
                    $add = new ActionOutil();
                    $add->Outils =  $idCatOutils;
                    $add->libelle = $request->libelleaction;
                    $add->code =  $request->codeaction;
                    $add->action_users = session("utilisateur")->idUser;
                    $add->save();
                    $outilsname =  DB::table('categorieoutils')->where('id',  $idCatOutils)->first()->libelle;
                    TraceController::setTrace("Vous avez enregistrée l'action " . $request->libelleaction . " pour l'outil :" . $outilsname . ".", session("utilisateur")->idUser);
                    $message = "Vous avez enregistrée l'action " . $request->libelleaction . " pour l'outils : " . $outilsname . ".";
                    flash("Succès : " . $message)->success();
                    return $message;
                }
            } catch (QueryException $qe) {
                $errorString = "Une erreur ses produites " .  $qe->getMessage();
                flash($errorString)->error();
                return $errorString;
            } catch (\Exception $e) {
                $errorString = "Une erreur ses produites " .  $e->getMessage();
                flash($errorString)->error();
                return $errorString;
            }
        }
    }

    public function deletecat(Request $request)
    {
        try {
            if (!in_array("delete_cat_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $outils = CategorieOutil::find(request('id'));
                // dd($outils);
                if ($outils) {
                    $occurence = json_encode(CategorieOutil::where('id', request('id'))->first());
                    $addt = new Trace();
                    $addt->libelle = "Catégorie d'outil supprimé : " . $occurence;
                    $addt->action = session("utilisateur")->idUser;
                    $addt->save();
                    CategorieOutil::where('id', request('id'))->delete();
                    $message = "La Catégorie est modifiée avec succès. ";
                    flash($message)->success();
                    return $message;
                } else {
                    $info = "Catégorie introuvable.";
                    flash($info)->error();
                    return $info;
                }
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites " .  $qe->getMessage();
            flash($errorString)->error();
            return $errorString;
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites " .  $e->getMessage();
            flash($errorString)->error();
            return $errorString;
        }
    }

    public function modifcat(Request $request)
    {

        try {
            if (!in_array("update_cat_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $request->validate([
                    'lib' => 'required|string',
                ]);

                CategorieOutil::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->lib)),
                        'action' => session("utilisateur")->idUser,
                    ]
                );
                TraceController::setTrace("Vous avez modifié la catégorie " . $request->libelle . " .", session("utilisateur")->idUser);
                return "La Catégorie est modifiée avec succès.";

                flash("La Catégorie est modifiée avec succès. ")->success();

                return redirect('/listcategoriesoutils');
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites " .  $qe->getMessage();
            flash($errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function setchampcaracteristiqueoutil(Request $request)
    {
        try {
            if (!in_array("define_champ_cat_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('champscategorieoutils')->where('categoutil', $request->id)->where('libelle', $request->lib)->first()->id)) {
                    flash("Le champ existe déjà dans cette catégorie. ")->success();
                    return "Le champs existe déjà dans cette catégorie ";
                } else {
                    $add = new ChampsCategorieOutil();
                    $add->libelle =  htmlspecialchars(trim($request->lib));
                    $add->type = $request->type;
                    $add->code = CategorieOutilsController::generercodelib(CategorieOutilsController::retirerAccents($request->lib));
                    $add->categoutil = $request->id;
                    $add->action = session("utilisateur")->idUser;
                    $add->save();
                    TraceController::setTrace("Vous avez enregistrée le champ suivant " . $request->lib . " dans la catégorie " . $request->lib . " .", session("utilisateur")->idUser);
                    flash("Le champ est ajouter avec succès. ")->success();
                    return "Le champ est ajouter avec succès. ";
                }
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites " .  $qe->getMessage();
            flash($errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public static function generercodelib($lib)
    {
        return str_replace(" ", "", trim(strtolower(substr(trim($lib), 2, 3) . substr(trim($lib), 6, 3))));
    }

    public function getchampcategorie(Request $request)
    {
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
