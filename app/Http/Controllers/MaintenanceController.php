<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Outil;
use App\Models\Trace;
use App\Models\CategorieOutil;
use App\Models\Maintenance;
use App\Providers\InterfaceServiceProvider;
use App\Models\Gestionmaintenance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use App\Exports\ExportMaintenance;
use Illuminate\Support\Facades\Storage;

class MaintenanceController extends Controller
{
    public function list()
    {
    	$list = Maintenance::all();
    	return view('viewadmindste.maintenance.list', compact('list'));
    }

    public function addmaintenance(Request $request)
    {
        if (!in_array("prog_maint", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('maintenances')->where('periodedebut', $request->pdm)->where('periodefin', $request->pfm)->first()->id) ) {
                return "Cette période de maintenance existe déjà!! ";
            }
            else{

                $add = new Maintenance();
                $add->periodedebut =  $request->pdm; // Période fin
                $add->periodefin = $request->pfm; // Période Début
                $add->user = $request->techm;  // Technicien
                $add->action = session("utilisateur")->idUser;
                $add->save();

                $message = "Vous avez programmer une maintenance pour la période du ".$request->pdm." au ".$request->pfm." .";

                TraceController::setTrace($message, session("utilisateur")->idUser);

                // Envoie de message au utilisateur
                
                
                return $message;
            }
        }
    }

    public function setdefinitionetatmaintenance(Request $request)
    {
        if (!in_array("define_etat_maint", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $maintenanceexitant = Maintenance::where('id', request('id'))->first();
            $lib = $maintenanceexitant->periodedebut." ".$maintenanceexitant->periodefin;
            $occurence = json_encode(Maintenance::where('id', request('id'))->first());

            TraceController::setTrace("Data existant : ".$occurence, session("utilisateur")->idUser);
            
            $message = "Vous avez défini l'état de la maintenance de la période du `".$lib."` à ".$request->etat."``. <br> ".$request->commentaire;

            TraceController::setTrace($message, session("utilisateur")->idUser);

            Maintenance::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "commentaire" => $request->commentaire,
                    "action" => session("utilisateur")->idUser
                ]);

            $info = "Changement d'état effectif sur la maintenance de la période de ".$lib." avec succès.";
            return $info;
        }
    }

    public function setdeletemaintenance(Request $request)
    {
        if (!in_array("delete_maint_prog", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Maintenance::where('id', request('id'))->first()->periodedebut." ".Maintenance::where('id', request('id'))->first()->periodefin;
            $occurence = json_encode(Maintenance::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete M : ".$occurence, session("utilisateur")->idUser);

            Maintenance::where('id', request('id'))->delete();
            $info = "Vous avez supprimé la mainteance de la période du ".$lib." avec succès.";
            return $info;
        }
    }

    public function setupdatemaintenance(Request $request)
    {
        if (!in_array("update_maint_prog", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            $maintencancesexistant = Maintenance::where('id', $request->id)->first();

                TraceController::setTrace("Data ancien : ".json_encode($maintencancesexistant), session("utilisateur")->idUser);

                Maintenance::where("id", $request->id)->update([
                    "periodedebut" => $request->pdm,
                    "periodefin" => $request->pfm,
                    "action" => session("utilisateur")->idUser
                ]);

                if ($request->ucm != 0) {
                    Maintenance::where("id", $request->id)->update([
                        "user" => $request->ucm
                    ]);
                }

                $message = "Vous avez modifiée les informations de la période de ".$maintencancesexistant->periodedebut." au ".$maintencancesexistant->periodefin."  en ".$request->pdm." au ".$request->pfm;
                TraceController::setTrace($message , session("utilisateur")->idUser);
                
                return $message;
        }
    }

    public function listesordinateurs(Request $request){
        $list = Gestionmaintenance::where("maintenance", $request->id)->get();
        $periode = $request->id;
        return view('viewadmindste.maintenance.listordinateur', compact('list', 'periode'));
    }

    public function listordinateurmaintenance(Request $request){
        $list = Gestionmaintenance::join("outils", "outils.id", "=", "gestionmaintenances.outil")->where("outils.user", session("utilisateur")->idUser)->get();
        return view('viewadmindste.maintenance.listmaintenance', compact('list'));
    }

    public function traitementmaintenance(Request $request)
    {
        if (!in_array("add_maint_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('gestionmaintenances')->where('outil', $request->ordinateur)->where('maintenance', $request->periode)->first()->id) ) {
                return "Une maintenance a été déjà faite sur cette ordinateur!";
            }
            else{
                
                $periode = DB::table('maintenances')->where('id', $request->periode)->first();

                $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $request->ordinateur)->first();

                $add = new Gestionmaintenance();
                $add->outil =  $request->ordinateur; 
                $add->maintenance = $request->periode;
                $add->etat = $request->etat;
                $add->commentaireinf = $request->obs;
                $add->detailjson = $request->maint;
                $add->action = session("utilisateur")->idUser;
                $add->save();

                $message = "Vous avez enregistrée une maintenance de la période du ".$periode->periodedebut." au ".$periode->periodefin." sur l'ordinateur ".$ordinateur->nameoutils.".";

                TraceController::setTrace($message, session("utilisateur")->idUser);

                // Envoie de message au utilisateur
                
                return $message;
            }
        }
    }

    public function setdeletegmaintenance(Request $request){
        if (!in_array("delete_maint_admin", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $occurence = json_encode(Gestionmaintenance::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete GM : ".$occurence, session("utilisateur")->idUser);

            Gestionmaintenance::where('id', request('id'))->delete();
            $info = "Suppression effectué avec succès.";
            return $info;
        }
    }

    public function setupdatedefinitionmaintenances(Request $request){
        if (!in_array("update_maint_admin", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            $existant = Gestionmaintenance::where('id', $request->id)->first();

                TraceController::setTrace("Data ancien : ".json_encode($existant), session("utilisateur")->idUser);

                $periode = DB::table('maintenances')->where('id', $existant->maintenance)->first();

                $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $existant->outil)->first();

                Gestionmaintenance::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "commentaireinf" => $request->obs,
                    "detailjson" => $request->maint
                ]);

                $message = "Vous avez modifiée les informations de la période du ".$periode->periodedebut." au ".$periode->periodefin." sur l'ordinateur ".$ordinateur->nameoutils.".";
                TraceController::setTrace($message , session("utilisateur")->idUser);
                
                return $message;
        }
    }

    public function validecommentaire(Request $request){
        
        Gestionmaintenance::where('id', $request->anormalieid)->update(
        [
            "avisuser" => $request->avis,
            "commentaireuser" => $request->libsub,
        ]);
        
        $data = json_encode(["success"=> true, "data"=> "Merci!"]);
        return $data;
        
    }

    public function exportexcel(Request $request){
        $list = Gestionmaintenance::where("maintenance", $request->id)->get();
        $periode = $request->id;
        $i = 0;
        Session()->put('maintenances', "");
        // préparation du fichier excel
        foreach ($list as $item){
            $tabl[$i]["ordinateur"] = InterfaceServiceProvider::getLibOutil($item->outil);
            $tabl[$i]["utilisateur"] = InterfaceServiceProvider::getUserOutil($item->outil);
            $tabl[$i]["obsutil"] = $item->commentaireuser;
            $tabl[$i]["avisutil"] = $item->avisuser;
            $tabl[$i]["etat"] = $item->etat;
            $tabl[$i]["obs"] = $item->commentaireinf;
            $tabl[$i]["techni"] = InterfaceServiceProvider::LibelleUser($item->action);
            $tabl[$i]["periode"] = $periode;
            $i++;
        }

        $autre = new Collection($tabl);
        Session()->put('maintenances', $autre);
        // Téléchargement du fichier excel
        return Excel::download(new ExportMaintenance, 'Rapport_Maintenance_'.date('Y-m-d-h-i-s').'.xlsx');
    }

    public function getexportmaintenancepdf(Request $request){
        $id = $request->id;

        $data = Gestionmaintenance::where("id", $request->id)->first();

        $periode = InterfaceServiceProvider::periodeMaintenance($data->maintenance);

        dd($periode);
    }
}
