<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\ActionMenu;
use App\Providers\InterfaceServiceProvider;
use App\Models\Trace;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function getmenu()
    {
        try {
            $list = DB::table('menus');
            $search = "";
            if (request('rec') == 1) {
                if (request('check') != "" && request('check') != null) {
                    $search = request('check');
                    $list = $list->where('libelleMenu', 'like', '%' . request('check') . '%')
                        ->orwhere('titre_page', 'like', '%' . request('check') . '%')->paginate(20);
                    return view('viewadmindste.menu.listmenu', compact('list', 'search'));
                } else {
                    $list = $list->paginate(20);
                    return view("viewadmindste.menu.listmenu", compact('list', 'search'));
                }
            }

            $list = $list->orderby("created_at", "desc")->get();
            return view('viewadmindste.menu.menu', compact('list', 'search'));
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

    public function getactionmenu(Request $request)
    {
        try {
            if (!in_array("action_menu", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $actions = InterfaceServiceProvider::recupactions($request->id);
                $idMenu = $request->id;
                return view('viewadmindste.menu.action', compact('actions', 'idMenu'));
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function setactionmenu(Request $request)
    {
        try {
            if (!in_array("action_menu", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $addaM = new ActionMenu();
                $addaM->Menu = request('menu');
                $addaM->action = request('actio');
                $addaM->code_dev = request('actiondev');
                $addaM->save();

                flash('Action "' . request('actio') . '" ajouté à ' . InterfaceServiceProvider::libmenu(request('menu')) . ' effectuée avec succès.')->success();
                TraceController::setTrace(
                    'Action "' . request('actio') . '" ajouté à ' . InterfaceServiceProvider::libmenu(request('menu')) . ' effectuée avec succès.',
                    session("utilisateur")->idUser
                );
                return Back();
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

    public function setmenu(Request $request)
    {
        try {
            if (!in_array("add_menu", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $validator = Validator::make($request->all(), [
                    'lib' => 'required|string',
                    'titre' => 'required|string',
                    'parent' => 'required|integer',
                    'rout' => 'required|string',
                    'pos' => 'required|integer',
                ]);

                if ($validator->fails()) {
                    $err = '<ul>';
                    $i = 0;
                    foreach ($validator->errors()->all() as $e) {
                        if ($i == 0) {
                            $err .= "<li>Le libellé Menu est important</li>";
                        }
                        if ($i == 1) {
                            $err .= "<li>Le titre est important</li>";
                        }
                        $i++;
                    }
                    $err .= '<ul>';
                    flash($err)->error();
                    return Back();
                }

                $addMenu = new Menu();
                $addMenu->libelleMenu = $request->lib;
                $addMenu->titre_page = $request->titre;
                $addMenu->Topmenu_id = $request->parent;
                $addMenu->element_menu = $request->element;
                $addMenu->num_ordre = $request->pos;
                $addMenu->route = $request->rout;
                $addMenu->iconee = $request->icon;
                $addMenu->user_action = session("utilisateur")->idUser;
                $addMenu->save();

                TraceController::setTrace(
                    'Vous avez enregistré le menu ' . $request->lib . '.',
                    session("utilisateur")->idUser
                );

                flash('Menu enregistré avec succès.')->success();
                return Back();
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

    public function delmenu(Request $request)
    {
        try {
            if (!in_array("delete_menu", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $menus = Menu::where('idMenu', request('id'))->first();
                if ($menus) {
                    $occurence = json_encode($menus);
                    $addt = new Trace();
                    $addt->libelle = "Menu supprimé : " . $occurence;
                    $addt->action = session("utilisateur")->idUser;
                    $addt->save();
                    $info = "Libelle menu " . $menus->libelleMenu . " est supprimé avec succès.";
                    Menu::where('idMenu', request("id"))->delete();
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "Le menus est introuvable.";
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

    public function getmodifmenu(Request $request)
    {
        try {
            if (!in_array("update_menu", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $info = DB::table("menus")->where('idMenu', $request->id)->first();
                $list = Menu::get();
                return view('viewadmindste.menu.modifmenu', compact('info', 'list'));
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function setmodifmenu(Request $request)
    {
        try {
            if (!in_array("update_menu", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $validator = Validator::make($request->all(), [
                    'lib' => 'required|string',
                    'titre' => 'required|string',
                    'parent' => 'required|integer',
                    'rout' => 'required|string',
                    'pos' => 'required|integer',
                ]);

                if ($validator->fails()) {
                    $err = '<ul>';
                    //dd($validator->errors()->all());
                    $i = 0;
                    foreach ($validator->errors()->all() as $e) {
                        if ($i == 0) {
                            $err .= "<li>Le libellé Menu est important</li>";
                        }
                        if ($i == 1) {
                            $err .= "<li>Le titre est important</li>";
                        }
                        //$err .="<li>$e</li>";
                        $i++;
                    }
                    $err .= '<ul>';
                    flash($err)->error();
                    return Back();
                }

                Menu::where('idMenu', $request->id)->update([
                    'libelleMenu' => $request->lib,
                    'titre_page' => $request->titre,
                    'Topmenu_id' => $request->parent,
                    'element_menu' => $request->element,
                    'num_ordre' => $request->pos,
                    'route' => $request->rout,
                    'iconee' => $request->icon,
                ]);

                TraceController::setTrace(
                    'Vous avez modifié le menu ' . $request->lib . '.',
                    session("utilisateur")->idUser
                );

                flash('Menu mise à jour avec succès')->success();
                return redirect('/listmenus');
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
    //
}