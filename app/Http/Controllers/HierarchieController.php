<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hierarchie;
use App\Models\Trace;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HierarchieController extends Controller
{
    public function listhie()
    {
        $list = Hierarchie::all();
        return view('viewadmindste.hierarchie.listhie', compact('list'));
    }

    public function addhie(Request $request)
    {
        try {
            if (!in_array("add_hie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('hierarchies')->where('libelle', $request->lib)->first()->id)) {
                    flash("Hierarchie que vous voulez ajouter existe déjà!! ")->error();
                    return Back();
                } else {
                    $add = new Hierarchie();
                    $add->libelle =  htmlspecialchars(trim($request->lib));
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    flash("Hierarchie est enregistrée avec succès. ")->success();
                    TraceController::setTrace("Vous avez enregistrée l'hierarchie " . $request->lib . " .", session("utilisateur")->idUser);
                    return Back();
                }
            }
        } catch (QueryException $qe) {
            flash("Une erreur ses produites :" . $qe->getMessage())->error();
            return Back();
        } catch (\Exception $e) {
            flash("Une erreur ses produites :" . $e->getMessage())->error();
            return Back();
        }
    }

    public function deletehie(Request $request)
    {
        try {
            if (!in_array("delete_hie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $existe = Hierarchie::find($request->id);
                if ($existe) {
                    $occurence = json_encode(Hierarchie::where('id', request('id'))->first());
                    $addt = new Trace();
                    $addt->libelle = "Hierarchie supprimé : " . $occurence;
                    $addt->action = session("utilisateur")->idUser;
                    $addt->save();
                    Hierarchie::where('id', request('id'))->delete();
                    $info = "Hierarchie est supprimé avec succès.";
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "Hierarchie introuvable.";
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

    public function getmodifhie(Request $request)
    {
        try {
            if (!in_array("update_hie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $info = Hierarchie::where('id', request('id'))->first();
                return view('viewadmindste.hierarchie.modifhie', compact('info'));
            }
        } catch (\Exception $e) {
            flash("Une erreur ses produites :" . $e->getMessage())->error();
            return Back();
        }
    }

    public function modifhie(Request $request)
    {
        try {
            if (!in_array("update_hie", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $request->validate([
                    'libelle' => 'required|string',
                ]);

                Hierarchie::where('id', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->libelle)),
                        'action' => session("utilisateur")->idUser,
                    ]
                );
                flash("Hierarchie est modifiée avec succès. ")->success();
                TraceController::setTrace(
                    "Vous avez modifié l'hierarchie " . $request->libelle . " .",
                    session("utilisateur")->idUser
                );
                return redirect('/listhierarchies');
            }
        } catch (\Exception $e) {
            flash("Une erreur ses produites :" . $e->getMessage())->error();
            return Back();
        }
    }
}