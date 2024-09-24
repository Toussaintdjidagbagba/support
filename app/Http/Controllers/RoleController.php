<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Trace;
use App\Models\Menu;
use DB;
use App\Models\ActionMenu;
use App\Models\ActionMenuAcces;
use App\Http\FonctionControllers\AllTable;

class RoleController extends Controller
{
    // 
    public function getmenurole(Request $request)
    {
        if (!in_array("menu_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{   
            $role = Role::where('idRole', request('id'))->first();
            $allmenu = Menu::get();
            $allmenu_autoriser = DB::table('action_menu_acces')->select('Menu')->where('Role', request('id'))->where('statut', 0)->get();
                    $array = array();
                    foreach($allmenu_autoriser as $all){
                        array_push($array, $all->Menu);
                    }
                    $allaction_autoriser = DB::table('action_menu_acces')->select('ActionMenu', 'Menu')->where('Role', request('id'))->where('statut', 0)->get();
                $auto_menu = $array;
             $auto_action = $allaction_autoriser;

            return view('viewadmindste.role.menu', compact('role', 'allmenu', 'auto_menu', 'auto_action'));
        }
    }

    public function setmenurole(Request $request) 
    {
        if (!in_array("menu_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            // role en question 
            $role = $request->role; // id du rôle 

            // tableau des menus attribuer
            $menu = $request->menu;

            $checkM = DB::table('action_menu_acces')->select('Menu')->where('Role', $role)->get();

            for ($i=0; $i < count($menu); $i++) { // Parcourir les menus sélectionnés 
                // Si le menu en cours exites alors passe sinon enreistré
                if(!isset(DB::table('action_menu_acces')->where('Role', $role)->where('Menu', $menu[$i])->where('ActionMenu', 0)->first()->id)){
                   $addMenAcces = new ActionMenuAcces();
                   $addMenAcces->Menu = $menu[$i];
                   $addMenAcces->Role = $role;
                   $addMenAcces->ActionMenu = 0;
                   $addMenAcces->statut = 0;
                   $addMenAcces->save();
                }else{
                    DB::table('action_menu_acces')->where('Role', $role)->where('Menu', $menu[$i])->where('ActionMenu', 0)->update(["statut" => 0]);
                }
            }

            // Parcourir tous les menus et éliminer ceux qui ne sont pas sélectionner
            $allmenu = Menu::get();
            $array_men = array();
            foreach($allmenu as $all){
                array_push($array_men, $all->idMenu);
            }
            for ($i=0; $i < count($array_men); $i++) { 
                if (!in_array($array_men[$i], $menu) && isset(DB::table('action_menu_acces')->where('Menu', $array_men[$i] )->first()->id)) {
                    DB::table('action_menu_acces')->where('Menu', $array_men[$i])->where('Role', $role)->update(["statut" => 1]);
                }
            }

            // action add
            $addAction = $request->action;

            for ($i=0; $i < count($addAction); $i++) { // Parcourir les actions sélectionnés 
                // Si l'action en cours exites alors passe sinon enreistré

                if(!isset(DB::table('action_menu_acces')->where('Role', $role)->where('Menu', DB::table('action_menus')->where('id', $addAction[$i])->first()->Menu)->where('ActionMenu', $addAction[$i])->first()->id)){
                   $addMenAcces = new ActionMenuAcces();
                   $addMenAcces->Menu = DB::table('action_menus')->where('id', $addAction[$i])->first()->Menu;
                   $addMenAcces->Role = $role;
                   $addMenAcces->ActionMenu = $addAction[$i];
                   $addMenAcces->statut = 0;
                   $addMenAcces->save();
                }else{
                    DB::table('action_menu_acces')->where('Role', $role)->where('Menu', DB::table('action_menus')->where('id', $addAction[$i])->first()->Menu)->where('ActionMenu', $addAction[$i])->update(["statut" => 0]);
                }
            }

            // Parcourir tous les actions et éliminer ceux qui ne sont pas sélectionner
            $allaction = ActionMenu::get();
            $array_act = array();
            foreach($allaction as $all){
                array_push($array_act, $all->id);
            }
            for ($i=0; $i < count($array_act); $i++) { 
                if (!in_array($array_act[$i], $addAction) && isset(DB::table('action_menu_acces')->where('Role', $role)->where('Menu', DB::table('action_menus')->where('id', $array_act[$i])->first()->Menu)->where('ActionMenu', $array_act[$i] )->first()->id)) {

                    DB::table('action_menu_acces')->where('ActionMenu', $array_act[$i])->where('Role', $role)->update(["statut" => 1]);
                }
            }

            flash('Les menus sont bien attribués au rôle');
            return Back();
        }
    }

    public function listrole()
    {
        $list = DB::table('roles');
        if(request('rec') == 1){
            if(request('check') != "" && request('check') != null){
                $list = $list->where('libelle', 'like', '%'.request('check').'%')
                ->orwhere('code', 'like', '%'.request('check').'%')->paginate(20);
                return view("viewadmindste.role.listrole", compact('list'));
            }else{
                $list = $list->paginate(20);
                return view("viewadmindste.role.listrole", compact('list'));
            }
        }

        $list = $list->paginate(20);
        
        return view('viewadmindste.role.listrole', compact('list'));
    }

    public function addrole(Request $request)
    {
        if (!in_array("add_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if (RoleController::ExisteRole(htmlspecialchars(trim($request->code)))) {
                flash("Le Rôle que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
                $add = new Role();
                $add->code = htmlspecialchars(trim($request->code));
                $add->libelle =  htmlspecialchars(trim($request->lib));
                $add->user_action = session("utilisateur")->idUser;
                $add->save();

                flash("Le Rôle est enregistré avec succès. ")->success();
                TraceController::setTrace(
                "Vous avez enregistré le rôle ".$request->lib." .",
                session("utilisateur")->idUser);
                return Back();
            }
        }
    }

    public function deleterole(Request $request)
    {
        if (!in_array("delete_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            //Role::where('idRole', request('id'))->update(['statut' =>  "sup"]);
            $occurence = json_encode(Role::where('idRole', request('id'))->first());
            $addt = new Trace();
            $addt->libelle = "Rôle supprimé : ".$occurence;
            $addt->action = session("utilisateur")->idUser;
            $addt->save();
            Role::where('idRole', request('id'))->delete();
            $info = "Le Rôle est supprimé avec succès."; flash($info); 

            return Back();
        }
    }

    public function getmodifrole(Request $request)
    {
        if (!in_array("update_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $info = Role::where('idRole', request('id'))->first();
            return view('viewadmindste.role.modifrole', compact('info'));
        }
    }

    public function modifrole(Request $request)
    {
        if (!in_array("update_role", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $request->validate([
                    'code' => 'required|string',
                    'libelle' => 'required|string', 
                ]);

            Role::where('idRole', request('id'))->update(
                    [
                        'libelle' =>  htmlspecialchars(trim($request->libelle)),
                        'code' =>  htmlspecialchars(trim($request->code)),
                        'user_action' => session("utilisateur")->idUser,
                    ]);
            flash("Le Rôle est modifié avec succès. ")->success();
            TraceController::setTrace(
                "Vous avez modifié le rôle ".$request->libelle." .",
                session("utilisateur")->idUser);
            return redirect('/listroles');
        }
    }

    public static function ExisteRole($libelle){
        $role = Role::where('code', $libelle)->first();
        if (isset($role) && $role->idRole!= 0) return true; else return false;
    }

    public function in_value($value, $table)
    {
        if ($table == null) {
            return false;
        }
        foreach ($table as $tab) {
            if($tab == $value) return true;
        }
        return false;
    }

    public function existance($role, $menu, $roleacces)
    {
        $check = RoleAcessMenu::where('Menu', $menu)->where('Role', $role)->where('roleacces', $roleacces)->first();
        if(isset($check)) return false; return true;
    }
}
