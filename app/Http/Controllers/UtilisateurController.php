<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Utilisateur as Users;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class UtilisateurController extends Controller
{
    //
    public static function getuser()
    {
        try {
            $list = DB::table('utilisateurs');
            $allRole =  Role::all();

            if (request('rec') == 1) {
                if (request('check') != "" && request('check') != null) {
                    $list = $list->where('nom', 'like', '%' . request('check') . '%')
                    ->orwhere('prenom', 'like', '%' . request('check') . '%')
                    ->orwhere('login', 'like', '%' . request('check') . '%')->paginate(20);
                    return view("viewadmindste.dash_utilisateur", compact('list', 'allRole'));
                } else {
                    $list = $list->paginate(20);
                    return view("viewadmindste.dash_utilisateur", compact('list', 'allRole'));
                }
            }

            $list = $list->paginate(100);
            return view('viewadmindste.dash_utilisateur', compact('list', 'allRole'));
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function deleteuser(Request $request)
    {
        try {
            if (!in_array("delete_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $users = Users::where('idUser', request('id'))->first();
                if ($users) {
                    $occurence = json_encode($users);
                    Users::where('idUser', request('id'))->delete();
                    $info = "L'utilisateur est supprimé avec succès.";
                    TraceController::setTrace(
                        "Vous avez supprimé le compte dont les informations sont les suivants : " . $occurence . ".",
                        session("utilisateur")->id
                    );
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "L'utilisateur est introuvable.";
                    flash($info)->error();
                    return $info;
                }
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites " .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites " .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public static function reinitialiseruser(Request $request)
    {
        try {
            if (!in_array("reset_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                Users::where('idUser', request('id'))->update(['password' =>  "com" . sha1('123') . "dste"]);
                $info = "Mot de passe de l'utilisateur est réintialisé avec succès.";
                // Sauvegarde de la trace
                TraceController::setTrace(
                    "Vous avez réintialisé le mot de passe du compte de l'utilisateur " . Users::where('idUser', request('id'))->first()->nom . " et dont l'identifiant est " . Users::where('idUser', request('id'))->first()->login . ".",
                    session("utilisateur")->idUser
                );

                flash($info)->success();
                return Back();
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function activeuser(Request $request)
    {
        try {
            if (!in_array("status_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                Users::where('idUser', request('id'))->update(['statut' =>  "0"]);
                $info = "Le compte de l'utilisateur est activé avec succès.";
                // Sauvegarde de la trace
                TraceController::setTrace(
                    "Vous avez activé le compte de l'utilisateur " . Users::where('idUser', request('id'))->first()->nom . " et dont l'identifiant est " . Users::where('idUser', request('id'))->first()->login . ".",
                    session("utilisateur")->idUser
                );

                flash($info)->success();
                return Back();
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function desactiveuser(Request $request)
    {
        try {
            if (!in_array("status_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                Users::where('idUser', request('id'))->update(['statut' =>  "1"]);
                $info = "Le compte de l'utilisateur est désactivé avec succès.";
                // Sauvegarde de la trace
                TraceController::setTrace(
                    "Vous avez désactivé le compte de l'utilisateur " . Users::where('idUser', request('id'))->first()->nom . " et dont l'identifiant est " . Users::where('idUser', request('id'))->first()->login . ".",
                    session("utilisateur")->idUser
                );

                flash($info)->success();
                return Back();
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function activeusermail(Request $request)
    {
        try {
            if (!in_array("status_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                Users::where('idUser', request('id'))->update(['activereceiveincident' =>  0]);
                $info = "Le compte de l'utilisateur " . Users::where('idUser', request('id'))->first()->nom . " est activé avec succès pour recevoir les incidents déclarer.";
                // Sauvegarde de la trace
                TraceController::setTrace($info, session("utilisateur")->idUser);

                flash($info)->success();
                return Back();
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function desactiveusermail(Request $request)
    {
        try {
            if (!in_array("status_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                Users::where('idUser', request('id'))->update(['activereceiveincident' =>  1]);
                $info = "Le compte de l'utilisateur " . Users::where('idUser', request('id'))->first()->nom . " est désactivé avec succès de la liste des destinaires à recevoir les incidents déclarer.";
                // Sauvegarde de la trace
                TraceController::setTrace($info, session("utilisateur")->idUser);

                flash($info)->success();
                return Back();
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function adduser(Request $request)
    {
        try {
            if (!in_array("add_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (UtilisateurController::ExisteUser(htmlspecialchars(trim($request->mail)), htmlspecialchars(trim($request->login)))) {

                    return Back()->with('error', "L'utilisateur que vous voulez ajouté existe déjà!!");;
                } else {

                    if ($request->hasFile('image')) {
                        $imagename = time() . '.' . $request->file('image')->extension();
                        //$request->file('image')->storePubliclyAs('images', $imagename, 'public');
                        if ($request->file('image')->move("images", $imagename)) {
                            // Le fichier a été téléchargé et stocké avec succès
                        } else {
                            // Erreur lors du stockage de l'image
                            return back()->with('error', 'Erreur lors du stockage de l\'image.');
                        }

                        //Storage::putFileAs('public/imags',$request->file('image'),$imagename);
                    } else {
                        // Gérer le cas où aucun fichier n'est téléchargé
                        return back()->with('error', 'Aucune image téléchargée.');
                    }

                    $add = new Users();
                    $add->nom = htmlspecialchars(trim($request->nom));
                    $add->prenom =  htmlspecialchars(trim($request->prenom));
                    $add->sexe = htmlspecialchars(trim($request->sexe));
                    $add->tel = htmlspecialchars(trim($request->tel));
                    $add->mail = htmlspecialchars(trim($request->mail));
                    $add->adresse = htmlspecialchars(trim($request->adress));
                    $add->login = htmlspecialchars(trim($request->login));
                    $add->password = "com" . sha1("123") . "dste";
                    $add->Role = $request->role;
                    $add->Societe = 1;
                    $add->Service = $request->serv;
                    $add->other = htmlspecialchars(trim($request->autres));
                    $add->user_action = session("utilisateur")->idUser;
                    $add->action_save = 's';
                    $add->image = $imagename;
                    $add->statut = 1;
                    $add->auth = htmlspecialchars(trim($request->auth));
                    $add->save();

                    // Sauvegarde de la trace
                    TraceController::setTrace(
                        "Vous avez enregistré l'utilisateur dont le nom est " . $request->prenom . " " . $request->nom . ".",
                        session("utilisateur")->idUser
                    );

                    flash("L'utilisateur est enregistré avec succès. ")->success();
                    return Back();
                }
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public function getmodifyuser(Request $request)
    {
        try {
            if (!in_array("update_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $allRole =  Role::all();
                $info = Users::where('idUser', request('id'))->first();
                return view('viewadmindste.modifusers', compact('allRole', 'info'));
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function modifyuser(Request $request)
    {
        try {
            if (!in_array("update_user", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $request->validate([
                    'login' => 'required|string',
                ]);

                if ($request->hasFile('image')) {
                    $imagename = time() . '.' . $request->file('image')->extension();
                    //$request->file('image')->storePubliclyAs('images', $imagename, 'public');
                    if ($request->file('image')->move("images", $imagename)) {
                        // Le fichier a été téléchargé et stocké avec succès
                    } else {
                        // Erreur lors du stockage de l'image
                        flash('Erreur lors du stockage de l\'image.')->error();
                        return Back();
                    }
                    
                    //Storage::putFileAs('public/imags',$request->file('image'),$imagename);
                } else {
                    // Gérer le cas où aucun fichier n'est téléchargé
                    $errorString = "Erreur : Aucune image téléchargée.";
                    flash($errorString)->error();
                    return Back();
                }
                Users::where('idUser', request('id'))->update(
                    [
                        'nom' =>  htmlspecialchars(trim($request->nom)),
                        'prenom' =>  htmlspecialchars(trim($request->prenom)),
                        'sexe' =>  htmlspecialchars(trim($request->sexe)),
                        'tel' =>  htmlspecialchars(trim($request->tel)),
                        'mail' =>  htmlspecialchars(trim($request->mail)),
                        'adresse' =>  htmlspecialchars(trim($request->adress)),
                        'login' =>  htmlspecialchars(trim($request->login)),
                        'Role' =>  $request->role,
                        'image' =>  $imagename,
                        'other' => htmlspecialchars(trim($request->autres)),
                        'user_action' => session("utilisateur")->idUser,
                        'action_save' => 's',
                    ]
                );
                TraceController::setTrace(
                    "Vous avez modifié le compte du personnel " . $request->nom . " " . $request->prenom . " .",
                    session("utilisateur")->idUser
                );

                flash("L'utilisateur est modifié avec succès. ")->success();
                return redirect('/utilisateur');
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites " .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public static function ExisteUser($libelleemail, $log)
    {
        $user = Users::where('mail', $libelleemail)->where('login', $log)->first();
        if (isset($user) && $user->idUser != 0) return true;
        else return false;
    }
}