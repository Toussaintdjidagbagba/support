<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Exports\GestCurXExport;
use App\Exports\GestMaintCurExport;
use App\Exports\GestMaintPrevExport;
use App\Exports\GestPrevXExport;
use App\Exports\MaintCurrativaExport;
use App\Exports\MaintCurrativeExport;
use App\Exports\MaintPreventiveExport;
use App\Models\ActionOutil;
use App\Models\GestionmaintenanceCurative;
use App\Models\MaintenanceCurative;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
{
    public function list()
    {
        $list = Maintenance::all();
        $service = Service::all();
        return view('viewadmindste.maintenance.list', compact('list', 'service'));
    }

    public function addmaintenance(Request $request)
    {
        if (!in_array("prog_maint", session("auto_action"))) {
            return view("vendor.error.649");
        } else {
            try {
                if (isset(DB::table('maintenances')->where('periodedebut', $request->pdm)->where('periodefin', $request->pfm)->first()->id)) {
                    return "Cette période de maintenance existe déjà!! ";
                } else {
                    $messages = [
                        'pdm.required' => 'La période de début est requis.',
                        'pfm.required' => 'La période de fin est requise.',
                        'techm.required' => 'Le technicien est requis.',
                    ];
                    $validator = Validator::make($request->all(), [
                        'pdm' => 'required',
                        'pfm' => 'required',
                        'techm' => 'required',
                    ], $messages);

                    if ($validator->fails()) {
                        $errors = $validator->errors()->all();
                        $errorString = implode(' ', $errors);
                        flash("Erreur : " . $errorString)->error();
                        return $errorString;
                    }
                    $add = new Maintenance();
                    $add->periodedebut =  $request->pdm; // Période fin
                    $add->periodefin = $request->pfm; // Période Début
                    $add->user = $request->techm;  // Technicien
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    $message = "Vous avez programmer une maintenance pour la période du " . InterfaceServiceProvider::Dateformat($request->pdm) . " au " . InterfaceServiceProvider::Dateformat($request->pfm) . " .";

                    TraceController::setTrace($message, session("utilisateur")->idUser);
                    flash("Succès : " . $message)->success();
                    // Envoie de message au utilisateur
                    return $message;
                }
            } catch (QueryException $qe) {
                $errorString = "Une erreur ses produites" .  $qe->getMessage();
                flash("Erreur : " . $errorString)->error();
                return $errorString;
            } catch (\Exception $e) {
                $errorString = "Une erreur ses produites" .  $e->getMessage();
                flash("Erreur : " . $errorString)->error();
                return $errorString;
            }
        }
    }

    public function setdefinitionetatmaintenance(Request $request)
    {
        try {
            if (!in_array("define_etat_maint", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $maintenanceexitant = Maintenance::where('id', request('id'))->first();
                $lib = $maintenanceexitant->periodedebut . " au " . $maintenanceexitant->periodefin;
                $occurence = json_encode(Maintenance::where('id', request('id'))->first());

                TraceController::setTrace("Data existant : " . $occurence, session("utilisateur")->idUser);

                $message = "Vous avez défini l'état de la maintenance de la période du `" . $lib . "` à " . $request->etat . "``. <br> " . $request->commentaire;

                TraceController::setTrace($message, session("utilisateur")->idUser);

                Maintenance::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "commentaire" => $request->commentaire,
                    "action" => session("utilisateur")->idUser
                ]);

                $info = "Changement d'état effectif sur la maintenance de la période de " . $lib . " avec succès.";
                flash("Succès : " . $message)->success();
                return $info;
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    // setdeletemaintenance
    public function setdeletemaintenance(Request $request)
    {
        try {
            if (!in_array("delete_maint_prog", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $maintenance = Maintenance::find($request->id);
                if ($maintenance) {
                    $lib = Maintenance::where('id', $request->id)->first()->periodedebut . " au " . Maintenance::where('id', $request->id)->first()->periodefin;
                    $occurence = json_encode(Maintenance::where('id', $request->id)->first());

                    TraceController::setTrace("Data delete M : " . $occurence, session("utilisateur")->idUser);

                    Maintenance::where('id', $request->id)->delete();
                    $info = "Vous avez supprimé la mainteance de la période du " . $lib . " avec succès.";
                    flash($info)->success();
                    return  $info;
                } else {
                    $info = "Maintenance introuvable.";
                    flash($info)->error();
                    return $info;
                }
            }
        } catch (\Exception $e) {
            $info = "Une erreur ses produites :" . $e->getMessage();
            flash($info)->error();
            return $info;
        }
    }

    public function setupdatemaintenance(Request $request)
    {
        try {
            if (!in_array("update_maint_prog", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $maintencancesexistant = Maintenance::where('id', $request->id)->first();

                TraceController::setTrace("Data ancien : " . json_encode($maintencancesexistant), session("utilisateur")->idUser);

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

                $message = "Vous avez modifiée les informations de la période de " . $maintencancesexistant->periodedebut . " au " . $maintencancesexistant->periodefin . "  en " . $request->pdm . " au " . $request->pfm;
                TraceController::setTrace($message, session("utilisateur")->idUser);

                return $message;
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public function listesordinateurs(Request $request)
    {
        try {
            $list = Gestionmaintenance::where("maintenance", $request->id)->get();
            $etat = Maintenance::where("id", $request->id)->first()->etat;
            $periode = $request->id;
            return view('viewadmindste.maintenance.listordinateur', compact('list', 'periode', 'etat'));
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public function listordinateurmaintenance(Request $request)
    {
        try {
            $list = Gestionmaintenance::join("outils", "outils.id", "=", "gestionmaintenances.outil")
                ->select('gestionmaintenances.*', 'outils.*', 'gestionmaintenances.id as gestion_id')
                ->where("outils.user", session("utilisateur")->idUser)
                ->get();

            return view('viewadmindste.maintenance.listmaintenance', compact('list'));
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public function traitementmaintenance(Request $request)
    {
        try {
            if (!in_array("add_maint_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('gestionmaintenances')->where('outil', $request->ordinateur)->where('maintenance', $request->periode)->first()->id)) {
                    return "Une maintenance a été déjà faite sur cette ordinateur!";
                } else {

                    $periode = DB::table('maintenances')->where('id', $request->periode)->first();

                    // $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $request->ordinateur)->first();

                    // Nouvelle requette;
                    $ordinateur = DB::table('outils')
                    ->select('outils.nameoutils as nameoutils', 'outils.id as id', 'categorieoutils.libelle as libelle')
                    ->join('categorieoutils', 'categorieoutils.id', '=', 'outils.categorie')
                    ->where('outils.id', $request->ordinateur)
                    ->first();

                    $add = new Gestionmaintenance();
                    $add->outil =  $request->ordinateur;
                    $add->maintenance = $request->periode;
                    $add->etat = $request->etat;
                    $add->commentaireinf = $request->obs;
                    $add->detailjson = $request->maint;
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    $message = "Vous avez enregistrée une maintenance de la période du " . $periode->periodedebut . " au " . $periode->periodefin . " sur l'ordinateur " . $ordinateur->nameoutils . ".";

                    TraceController::setTrace($message, session("utilisateur")->idUser);

                    // Envoie de message au utilisateur
                    flash($message)->success();
                    return $message;
                }
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public function setdeletegmaintenance(Request $request)
    {
        try {
            if (!in_array("delete_maint_admin", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $existe = Gestionmaintenance::find($request->id);
                if ($existe) {
                    $occurence = json_encode(Gestionmaintenance::where('id', $request->id)->first());

                    TraceController::setTrace("Data delete GM : " . $occurence, session("utilisateur")->idUser);

                    Gestionmaintenance::where('id', $request->id)->delete();
                    $info = "Suppression effectué avec succès.";
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "Maintenance introuvable.";
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

    public function setupdatedefinitionmaintenances(Request $request)
    {
        try {
            if (!in_array("update_maint_admin", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $existant = Gestionmaintenance::where('id', $request->id)->first();

                TraceController::setTrace("Data ancien : " . json_encode($existant), session("utilisateur")->idUser);

                $periode = DB::table('maintenances')->where('id', $existant->maintenance)->first();

                // $ordinateur = DB::table('outils')
                // ->select('outils.nameoutils as nameoutils', 'outils.id as id')
                // ->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")
                // ->where('categorieoutils.libelle', "Ordinateurs")
                // ->where('outils.id', $existant->outil)
                // ->first();

                //Nouvelle requette; 
                $ordinateur = DB::table('outils')
                    ->select('outils.nameoutils as nameoutils', 'outils.id as id', 'categorieoutils.libelle as libelle')
                    ->join('categorieoutils', 'categorieoutils.id', '=', 'outils.categorie')
                    ->where('outils.id', $existant->outil)
                    ->first();

                Gestionmaintenance::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "commentaireinf" => $request->obs,
                    "detailjson" => $request->maint
                ]);

                $message = "Vous avez modifiée les informations de la période du " . InterfaceServiceProvider::Dateformat($periode->periodedebut) . " au " . InterfaceServiceProvider::Dateformat($periode->periodefin) . " sur l'outil " . $ordinateur->nameoutils . ".";
                TraceController::setTrace($message, session("utilisateur")->idUser);
                flash($message)->success();
                return $message;
            }
        } catch (\Exception $e) {
            $info = "Une erreur ses produites :" . $e->getMessage();
            flash($info)->error();
        }
    }

    public function validecommentaire(Request $request)
    {

        try {
            Gestionmaintenance::where('id', $request->anormalieid)->update(
                [
                    "avisuser" => $request->avis,
                    "commentaireuser" => $request->libsub,
                ]
            );

            $data = json_encode(["success" => true, "data" => "Merci!"]);
            return $data;
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function exportexcel(Request $request)
    {
        try {
            $list = Gestionmaintenance::where("maintenance", $request->id)->get();
            $periode = $request->id;
            $i = 0;
            Session()->put('maintenances', "");
            // préparation du fichier excel
            foreach ($list as $item) {
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
            return Excel::download(new ExportMaintenance, 'Rapport_Maintenance_' . date('Y-m-d-h-i-s') . '.xlsx');
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function getexportmaintenancepdf(Request $request)
    {
        try {
            $id = $request->id;

            $data = Gestionmaintenance::where("id", $request->id)->first();

            $periode = InterfaceServiceProvider::periodeMaintenance($data->maintenance);

            dd($periode);
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    //export maintenance preventive
    public function expmaintpre(Request $request)
    {
        try {

            $list = Gestionmaintenance::join("outils", "outils.id", "=", "gestionmaintenances.outil")
                ->select('gestionmaintenances.*', 'outils.*', 'gestionmaintenances.id as gestion_id')
                ->where("outils.user", session("utilisateur")->idUser)
                ->where("gestionmaintenances.id", $request->idmprev)
                ->get();

            //dd($list);       

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new MaintPreventiveExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenancePreventive.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new MaintPreventiveExport($list), 'MaintenancePreventive.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }

    //export gestion maintenance curative
    public function expgestprev(Request $request)
    {
        try {
            
            $list = Maintenance::where('id', $request->idgestprev)->get();
            
            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new GestMaintPrevExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="GestionMaintenancePreventive.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new GestPrevXExport($list), 'GestionMaintenancePreventive.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }

    // Tout sur la maintenace curative ***********************
    public function listgestionmaintenancecurative()
    {
        $list = MaintenanceCurative::all();
        $service = Service::all();
        $etat = "";
        return view('viewadmindste.maintenance.curative.list', compact('list', 'service', 'etat'));
    }

    public function listmaintenancecurative(Request $request)
    {
        try {
            $list = GestionmaintenanceCurative::join("outils", "outils.id", "=", "gestionmaintenance_curatives.outil")
                ->select('gestionmaintenance_curatives.*', 'outils.*', 'gestionmaintenance_curatives.id as gestion_id')
                ->where("outils.user", session("utilisateur")->idUser)
                ->get();

            return view('viewadmindste.maintenance.curative.listmaintenance', compact('list'));
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    //export maintenance currative
    public function expmaintcur(Request $request)
    {
        try {

            $list = GestionmaintenanceCurative::join("outils", "outils.id", "=", "gestionmaintenance_curatives.outil")
                ->select('gestionmaintenance_curatives.*', 'outils.*', 'gestionmaintenance_curatives.id as gestion_id')
                ->where("outils.user", session("utilisateur")->idUser)
                ->where("gestionmaintenance_curatives.id", $request->idmcur)
                ->get();
    
            //dd($list);       

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new MaintCurrativeExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenanceCurrative.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new MaintCurrativeExport($list), 'MaintenanceCurrative.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }


    public function detailsmaintenacecurative(Request $request)
    {
        try {
            $list = GestionmaintenanceCurative::where("maintenance", $request->id)->get();
            $etat = MaintenanceCurative::where("id", $request->id)->first()->etat;
            $periode = $request->id;
            return view('viewadmindste.maintenance.curative.listordinateur', compact('list', 'periode', 'etat'));
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return Back();
        }
    }

    public function addmaintenancecuartive(Request $request)
    {
        if (!in_array("prog_maint", session("auto_action"))) {
            return view("vendor.error.649");
        } else {
            try {
                if (isset(DB::table('maintenance_curatives')->where('periodedebut', $request->pdm)->where('periodefin', $request->pfm)->first()->id)) {
                    return "Cette période de maintenance existe déjà!! ";
                } else {
                    $messages = [
                        'pdm.required' => 'La période de début est requis.',
                        'pfm.required' => 'La période de fin est requise.',
                        'techm.required' => 'Le technicien est requis.',
                        'dgnt.required' => 'Le diagnostique est requis.',
                        'cse.required' => 'La cause est requis.',
                        'rslt.required' => 'Le resultat est requis.',
                    ];
                    $validator = Validator::make($request->all(), [
                        'pdm' => 'required',
                        'pfm' => 'required',
                        'techm' => 'required',
                        'dgnt' => 'required',
                        'cse' => 'required',
                        'rslt' => 'required',
                    ], $messages);

                    if ($validator->fails()) {
                        $errors = $validator->errors()->all();
                        $errorString = implode(' ', $errors);
                        flash("Erreur : " . $errorString)->error();
                        return $errorString;
                    }
                    $add = new MaintenanceCurative();
                    $add->periodedebut =  $request->pdm; // Période fin
                    $add->periodefin = $request->pfm; // Période Début
                    $add->user = $request->techm;  // Technicien
                    $add->diagnostique = $request->dgnt;  // Diagnostique
                    $add->cause = $request->cse;  // Cause
                    $add->resultat = $request->rslt;  // Resultat
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    $message = "Vous avez enregistrer une maintenance curative pour la période du " . InterfaceServiceProvider::Dateformat($request->pdm) . " au " . InterfaceServiceProvider::Dateformat($request->pfm) . " .";

                    TraceController::setTrace($message, session("utilisateur")->idUser);
                    flash("Succès : " . $message)->success();
                    // Envoie de message au utilisateur
                    return $message;
                }
            } catch (QueryException $qe) {
                $errorString = "Une erreur ses produites" .  $qe->getMessage();
                flash("Erreur : " . $errorString)->error();
                return $errorString;
            } catch (\Exception $e) {
                $errorString = "Une erreur ses produites" .  $e->getMessage();
                flash("Erreur : " . $errorString)->error();
                return $errorString;
            }
        }
    }

    public function traitementmaintenancecurative(Request $request)
    {
        try {
            if (!in_array("add_maint_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('gestionmaintenance_curatives')->where('outil', $request->ordinateur)->where('maintenance', $request->id)->first()->id)) {
                    return "Une maintenance a été déjà faite sur cet outils!";
                } else {

                    $periode = DB::table('maintenance_curatives')->where('id', $request->id)->first();

                    // $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $request->ordinateur)->first();

                    //Nouvelle requette; 
                    $ordinateur = DB::table('outils')
                        ->select('outils.nameoutils as nameoutils', 'outils.id as id', 'categorieoutils.libelle as libelle')
                        ->join('categorieoutils', 'categorieoutils.id', '=', 'outils.categorie')
                        ->where('outils.id', $request->ordinateur)
                        ->first();

                    $add = new GestionmaintenanceCurative();
                    $add->outil =  $request->ordinateur;
                    $add->maintenance = $request->id;
                    $add->etat = $request->etat;
                    $add->commentaireinf = $request->obs;
                    $add->action_effectuer = $request->maint;
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    $message = "Vous avez enregistrée l'exécution de la maintenance curative de la période du " . InterfaceServiceProvider::Dateformat($periode->periodedebut) . " au " . InterfaceServiceProvider::Dateformat($periode->periodefin) . " sur l'outil " . $ordinateur->nameoutils ?? "" . ".";

                    TraceController::setTrace($message, session("utilisateur")->idUser);

                    // Envoie de message au utilisateur
                    flash($message)->success();
                    return $message;
                }
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public function setdefinitionetatmaintenancecurative(Request $request)
    {
        try {
            if (!in_array("define_etat_maint", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $maintenanceexitant = MaintenanceCurative::where('id', request('id'))->first();
                $lib = $maintenanceexitant->periodedebut . " au " . $maintenanceexitant->periodefin;
                $occurence = json_encode(MaintenanceCurative::where('id', request('id'))->first());

                TraceController::setTrace("Data existant : " . $occurence, session("utilisateur")->idUser);

                $message = "Vous avez défini l'état de la maintenance curative de la période du `" . $lib . "` à " . $request->etat . "``. <br> " . $request->commentaire;

                TraceController::setTrace($message, session("utilisateur")->idUser);

                MaintenanceCurative::where(
                    "id",
                    $request->id
                )->update([
                    "etat" => $request->etat,
                    "commentaire" => $request->commentaire,
                    "action" => session("utilisateur")->idUser
                ]);

                $info = "Changement d'état effectif sur la maintenance curative de la période de " . $lib . " avec succès.";
                flash("Succès : " . $message)->success();
                return $info;
            }
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public function setupdatemaintenancecurative(Request $request)
    {
        try {
            if (!in_array("update_maint_prog", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $maintencancesexistant = MaintenanceCurative::where('id', $request->id)->first();

                TraceController::setTrace("Data ancien : " . json_encode($maintencancesexistant), session("utilisateur")->idUser);

                MaintenanceCurative::where("id", $request->id)->update([
                    "periodedebut" => $request->pdm,
                    "periodefin" => $request->pfm,
                    "diagnostique" => $request->udgnt,
                    "cause" => $request->ucse,
                    "resultat" => $request->urslt,
                    "action" => session("utilisateur")->idUser
                ]);

                if ($request->ucm != 0) {
                    MaintenanceCurative::where("id", $request->id)->update([
                        "user" => $request->ucm
                    ]);
                }

                $message = "Vous avez modifiée les informations de la période de " . InterfaceServiceProvider::Dateformat($maintencancesexistant->periodedebut) . " au " . InterfaceServiceProvider::Dateformat($maintencancesexistant->periodefin) . "  en " . InterfaceServiceProvider::Dateformat($request->pdm) . " au " . InterfaceServiceProvider::Dateformat($request->pfm);
                TraceController::setTrace($message, session("utilisateur")->idUser);
                flash($message)->success();
                return $message;
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        } catch (\Exception $e) {
            $errorString = "Une erreur ses produites" .  $e->getMessage();
            flash("Erreur : " . $errorString)->error();
            return $errorString;
        }
    }

    public function setdeletemaintenancecurative(Request $request)
    {
        try {
            if (!in_array("delete_maint_prog", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $maintenance = MaintenanceCurative::find($request->id);
                if ($maintenance) {
                    $libs = MaintenanceCurative::where('id', $request->id)->first();
                    $lib = InterfaceServiceProvider::Dateformat($libs->periodedebut) . " au " . InterfaceServiceProvider::Dateformat($libs->periodefin);
                    $occurence = json_encode(MaintenanceCurative::where('id', $request->id)->first());

                    TraceController::setTrace("Data delete MC : " . $occurence, session("utilisateur")->idUser);

                    MaintenanceCurative::where('id', $request->id)->delete();

                    $info = "Vous avez supprimé la mainteance de la période du " . $lib . " avec succès.";
                    flash($info)->success();
                    return  $info;
                } else {
                    $info = "Maintenance introuvable.";
                    flash($info)->error();
                    return $info;
                }
            }
        } catch (\Exception $e) {
            $info = "Une erreur ses produites :" . $e->getMessage();
            flash($info)->error();
            return $info;
        }
    }

    public function setupdatedefinitionmaintenancescurative(Request $request)
    {
        try {
            if (!in_array("update_maint_admin", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $existant = GestionmaintenanceCurative::where('id', $request->id)->first();

                TraceController::setTrace("Data ancien : " . json_encode($existant), session("utilisateur")->idUser);

                $periode = DB::table('maintenance_curatives')->where('id', $existant->maintenance)->first();

                // $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')
                // ->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")
                // ->where('categorieoutils.libelle', "Ordinateurs")
                // ->where('outils.id', $existant->outil)
                // ->first();

                //Nouvelle requette; 
                $ordinateur = DB::table('outils')
                    ->select('outils.nameoutils as nameoutils', 'outils.id as id', 'categorieoutils.libelle as libelle')
                    ->join('categorieoutils', 'categorieoutils.id', '=', 'outils.categorie')
                    ->where('outils.id', $existant->outil)
                    ->first();

                GestionmaintenanceCurative::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "commentaireinf" => $request->obs,
                    "action_effectuer" => $request->maint
                ]);

                $message = "Vous avez modifiée les informations de la période du " . InterfaceServiceProvider::Dateformat($periode->periodedebut) . " au " . InterfaceServiceProvider::Dateformat($periode->periodefin) . " sur l'outils " . $ordinateur->nameoutils . ".";
                TraceController::setTrace($message, session("utilisateur")->idUser);
                flash($message)->success();
                return $message;
            }
        } catch (\Exception $e) {
            $info = "Une erreur ses produites :" . $e->getMessage();
            flash($info)->error();
        }
    }

    public function setdeletegmaintenancecurative(Request $request)
    {
        try {
            if (!in_array("delete_maint_admin", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $existe = GestionmaintenanceCurative::find($request->id);
                if ($existe) {
                    $occurence = json_encode(GestionmaintenanceCurative::where('id', $request->id)->first());

                    TraceController::setTrace("Data delete GMC : " . $occurence, session("utilisateur")->idUser);

                    GestionmaintenanceCurative::where('id', $request->id)->delete();
                    $info = "Suppression effectué avec succès.";
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "Maintenance introuvable.";
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

    //exportation gestion maintenance curative
    public function expgestcurat(Request $request)
    {
        try {
            
            $list = MaintenanceCurative::where('id', $request->idgestcur)->get();
            
            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new GestMaintCurExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="GestionMaintenanceCurative.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new GestCurXExport($list), 'GestionMaintenanceCurative.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }
}