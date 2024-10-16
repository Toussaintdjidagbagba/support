<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Entete;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Trace;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    // 
    public function list()
    {
        $list = Setting::all();
        return view('viewadmindste.setting.list', compact('list'));
    }

    public function listentete()
    {
        $list = Entete::all();
        return view('viewadmindste.setting.listentete', compact('list'));
    }

    public function addentetef(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255', // Nouveau champ pour le contenu de l'entête
            'lib' => 'required|string|max:255',
            'contenu_footer_col' => 'nullable|string',
            'contenu_footer_col2' => 'nullable|string',
            'alignment_entete' => 'required|in:left,center,right,justify',
            'alignment_footer' => 'required|in:left,center,right,justify',
            'piece' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Création ou mise à jour des données dans la table
        $entete = new Entete();
        $entete->titre = $request->input('titre');
        $entete->contenu_entete = $request->input('lib'); // Correction pour le contenu de l'entête
        $entete->contenu_footer_col = $request->input('contenu_footer_col');
        $entete->contenu_footer_col2 = $request->input('contenu_footer_col2');
        $entete->alignement_entete = $request->input('alignment_entete');
        $entete->alignement_footer = $request->input('alignment_footer');

        // Gestion du logo
        if ($request->hasFile('piece')) {
            $namefile = "entete" . date('i') . "." . $request->file('piece')->getClientOriginalExtension();
            $upload = "documents/entete/";
            $request->file('piece')->move($upload, $namefile);
            $entete->logo = $upload . $namefile; // Correction pour stocker le logo
        } else {
            $entete->logo = ""; // Si aucune image n'est uploadée
        }

        // Sauvegarde des informations
        $entete->save();

        // Redirection après l'ajout avec message de succès
        return redirect()->back()->with('success', 'Entête et footer ajoutés avec succès.');
    }

    public function destroy(Request $request)
    {
        try {
            // Récupérer l'ID de l'entête à partir de la requête
            $id = $request->id; 

            // Recherche de l'entête à supprimer
            $entete = Entete::findOrFail($id);

            // Supprimer le logo si existe
            if ($entete->logo && file_exists(public_path($entete->logo))) {
                unlink(public_path($entete->logo));
            }

            // Suppression de l'enregistrement
            $entete->delete();

            // Retourner un message de succès
            return response()->json('Entête supprimée avec succès.', 200);
        } catch (\Exception $e) {
            // En cas d'erreur, retourner une réponse d'erreur
            return response()->json('Erreur lors de la suppression : ' . $e->getMessage(), 500);
        }
    }

    public function editent(Request $request)
    {
        try {
            if (!in_array("update_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $ent = Entete::where('id', request('id'))->first();
                return view('viewadmindste.setting.modifent', compact('ent'));
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function updateent(Request $request)
    {
        try {
            // Validation des entrées
            $request->validate([
                'titre' => 'required|string',
                'lib' => 'required|string',
                'alignement_entete' => 'required|string', 
                'contenu_footer_col' => 'nullable|string',
                'contenu_footer_col2' => 'nullable|string',
                'alignement_footer' => 'required|string', 
                'piece' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // Limite de taille à 2 Mo
            ]);

            // Traitement du fichier logo (s'il y a un nouveau fichier)
            if ($request->hasFile('piece')) {
                $fileName = time() . '_' . $request->file('piece')->getClientOriginalName();
                $request->file('piece')->move(public_path('documents/entete'), $fileName);
            } else {
                // Garder l'ancien logo si aucun fichier n'est uploadé
                $fileName = Entete::where('id', $request->id)->first()->logo;
            }

            // Récupération de l'ancien titre pour les notifications
            $oldTitle = Entete::where('id', $request->id)->first()->titre;

            // Mise à jour des données dans la table
            Entete::where('id', $request->id)->update([
                'titre' => htmlspecialchars(trim($request->titre)),
                'contenu_entete' => htmlspecialchars(trim($request->lib)),
                'alignement_entete' => $request->alignement_entete, // alignement correct
                'logo' => $fileName,
                'contenu_footer_col' => htmlspecialchars(trim($request->contenu_footer_col)),
                'contenu_footer_col2' => htmlspecialchars(trim($request->contenu_footer_col2)),
                'alignement_footer' => $request->alignement_footer // correspond à la vue
            ]);

            // Message de succès
            flash($oldTitle . " a été modifié avec succès.")->success();

            // Tracer l'action
            TraceController::setTrace("Vous avez modifié l'en-tête et le footer avec le titre " . $request->titre . " .", session("utilisateur")->idUser);

            // Redirection vers la liste des enregistrements
            return redirect('/settings-listentete');
        } catch (\Exception $e) {
            // Gestion des erreurs
            $errorString = "Erreur serveur : " . $e->getMessage();
            flash($errorString)->error();
            return back();
        }
    }

    public function add(Request $request)
    {
        try {
            if (!in_array("add_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('settings')->where("type", $request->type)->where('libelle', $request->lib)->first()->id)) {
                    flash($request->type . " que vous voulez ajouter existe déjà!! ")->error();
                    return Back();
                } else {
                    $add = new Setting();
                    $add->libelle =  htmlspecialchars(trim($request->lib));
                    $add->type =  htmlspecialchars(trim($request->type));
                    $add->save();

                    flash($request->type . " est enregistrée avec succès. ")->success();
                    TraceController::setTrace("Vous avez enregistrée le " . $request->lib . " dans la base de " . $request->type . " .", session("utilisateur")->idUser);
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

    public function deleteetatavis(Request $request)
    {
        try {
            if (!in_array("delete_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $etatavis = Setting::find(request('id'));
                if ($etatavis) {
                    $occurence = json_encode(Setting::where('id', request('id'))->first());
                    $name = Setting::where('id', request('id'))->first()->libelle;
                    $addt = new Trace();
                    $addt->libelle = $name . "supprimé : " . $occurence;
                    $addt->action = session("utilisateur")->idUser;
                    $addt->save();
                    Setting::where('id', request('id'))->delete();
                    $info = $name . " est supprimé avec succès.";
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "L'état ou l'avis introuvable.";
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

    public function modif(Request $request)
    {
        try {
            if (!in_array("update_service", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $request->validate([
                    'ulib' => 'required|string',
                    'utype' => 'required|string',
                ]);
                $name = Setting::where('id', request('uid'))->first()->libelle;
                if ($name) {
                    Setting::where('id', request('uid'))->update(
                        [
                            'libelle' =>  htmlspecialchars(trim($request->ulib)),
                            'type' =>  htmlspecialchars(trim($request->utype)),
                            'user_action' => session("utilisateur")->idUser,
                        ]
                    );
                    flash($name . " est modifiée avec succès. en " . $request->ulib)->success();
                    TraceController::setTrace("Vous avez modifié le services " . $request->ulib . " .", session("utilisateur")->idUser);
                    return redirect('/settings-etat');
                } else {
                    $info = "l'" . $request->utype . "du nom de " . $request->ulib . " est introuvable.";
                    flash($info)->error();
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
}