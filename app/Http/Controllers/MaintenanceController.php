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
use App\Exports\GcurRech;
use App\Exports\GcurRechpdf;
use App\Exports\GestCurXExport;
use App\Exports\GestMaintCurExport;
use App\Exports\GestMaintPrevExport;
use App\Exports\GestPrevXExport;
use App\Exports\GprevRech;
use App\Exports\GprevRechpdf;
use App\Exports\MaintCurrativaExport;
use App\Exports\MaintCurrativeExport;
use App\Exports\MaintPreventiveExport;
use App\Exports\MaintPrevExecExport;
use App\Exports\McurRech;
use App\Exports\McurRechpdf;
use App\Exports\MprevRech;
use App\Exports\MprevRechpdf;
use App\Models\ActionOutil;
use App\Models\ChampsCategorieOutil;
use App\Models\Entete;
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
        $service = Service::all();
        return view('viewadmindste.maintenance.list', compact('service'));
    }

    public function listdata(Request $request)
    {
        $query = DB::table('maintenances as m')
        ->leftJoin('utilisateurs as u', 'm.user', '=', 'u.idUser')
        ->leftJoin('services as s', 'm.service', '=', 's.id')
        ->select(
            'm.id',
            'm.periodedebut',
            'm.periodefin',
            'm.user',
            'm.service',
            DB::raw('COALESCE(m.commentaire, "") as commentaire'),
            DB::raw('COALESCE(m.etat, "") as etat'),
            DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
        );

        $query->where(function ($q) use ($request) {

            if ($request->filled('periodedebut')) {
                $q->orWhere('m.periodedebut', 'like', '%' . htmlspecialchars(trim($request->periodedebut)) . '%');
            }

            if ($request->filled('periodefin')) {
                $q->orWhere('m.periodefin', 'like', '%' . htmlspecialchars(trim($request->periodefin)) . '%');
            }

            if ($request->filled('technicien')) {
                $q->orWhere(DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "")'), 'like', '%' . htmlspecialchars(trim($request->technicien)) . '%');
            }

            if ($request->filled('service')) {
                $q->orWhere(DB::raw('COALESCE(s.libelle, "")'), 'like', '%' . htmlspecialchars(trim($request->service)) . '%');
            }

            if ($request->filled('etat')) {
                $q->orWhere('m.etat', 'like', '%' . htmlspecialchars(trim($request->etat)) . '%');
            }
        });

        $list = $query->get();

        return json_encode(["list" => $list]);
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
                        flash($errorString)->error();
                        return $errorString;
                    }
                    $add = new Maintenance();
                    $add->periodedebut =  $request->pdm; // Période fin
                    $add->periodefin = $request->pfm; // Période Début
                    $add->service = $request->sdcm; // Service
                    $add->user = $request->techm;  // Technicien
                    $add->commentaire = $request->cm;  // commentaire
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    $message = "Vous avez programmer une maintenance pour la période du " . $request->pdm . " au " . $request->pfm . " .";

                    TraceController::setTrace($message, session("utilisateur")->idUser);
                    flash("Succès : " . $message)->success();
                    // Envoie de message au utilisateur
                    return $message;
                }
            } catch (QueryException $qe) {
                $errorString = "Une erreur ses produites" .  $qe->getMessage();
                flash($errorString)->error();
                return $errorString;
            } catch (\Exception $e) {
                $errorString = "Erreur serveur.";
                flash($errorString)->error();
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
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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
                    "service" => $request->sdcm,
                    "commentaire" => $request->cm,
                    "action" => session("utilisateur")->idUser
                ]);

                if ($request->techm != 0) {
                    Maintenance::where("id", $request->id)->update(["user" => $request->techm
                    ]);
                }

                $message = "Vous avez modifiée les informations de la période de " . $maintencancesexistant->periodedebut . " au " . $maintencancesexistant->periodefin . "  en " . $request->pdm . " au " . $request->pfm;
                TraceController::setTrace($message, session("utilisateur")->idUser);

                return $message;
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash($errorString)->error();
            return $errorString;
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return $errorString;
        }
    }

    public function listesordinateurs(Request $request)
    {
        try {
            $list = Gestionmaintenance::where("maintenance", $request->id)
                ->select('gestionmaintenances.id as gestid', 'gestionmaintenances.*')
                ->get();
            $etat = Maintenance::where("id", $request->id)->first()->etat;
            $periode = $request->id;
            return view('viewadmindste.maintenance.listordinateur', compact('list', 'periode', 'etat'));
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    //export execution maintenance preventive
    public function expmaintpreexec(Request $request)
    {
        try {

            $list = DB::table('gestionmaintenances as gm')
            ->leftJoin('outils as o', 'o.id', '=', 'gm.outil')
            ->leftJoin('maintenances as m', 'm.id', '=', 'gm.maintenance')
            ->leftJoin('utilisateurs as t', 't.idUser', '=', 'm.user')
            ->leftJoin('categorieoutils as co', 'co.id', '=', 'o.categorie')
            ->leftJoin('utilisateurs as u', 'gm.action', '=', 'u.idUser')
            ->leftJoin('services as s', 'm.service', '=', 's.id')
            ->select(
                'gm.id as gestion_id',
                'm.periodedebut as Deb',
                'm.periodefin as Fin',
                'm.user',
                'o.id as id_outil',
                'o.otherjson as json',
                'o.categorie as cat',
                'co.libelle as co_libelle',
                'gm.detailjson',
                'gm.outil as gm_outil',
                DB::raw('COALESCE(CONCAT(m.periodedebut, " au ", m.periodefin), "Aucune période") as periode'),
                DB::raw('COALESCE(gm.commentaireuser, "Aucune Obs") as commentaireuser'),
                DB::raw('COALESCE(gm.commentaireinf, "Aucune Obs") as commentaireinf'),
                DB::raw('COALESCE(gm.avisuser, "Pas d\'avis") as avisuser'),
                DB::raw('COALESCE(gm.avisinf, "Pas d\'avis") as avisinf'),
                DB::raw('COALESCE(gm.etat, "") as etat'),
                DB::raw('COALESCE(o.nameoutils, "") as nameoutils'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
                DB::raw('COALESCE(CONCAT(t.nom, " ", t.prenom), "En attente") as usersT'),
            )
            ->where("o.user", session("utilisateur")->idUser)
            ->where("gm.id", $request->ideprev)
            ->get();

            // Récupérer le premier élément de la collection(outils)
            $item = $list->first();
            if ($item) {
                $carct = json_decode($item->json, true); // On décode en tableau associatif
                $details = ChampsCategorieOutil::where("categoutil", $item->cat)->get();
                //dd($details);
            } else {
                dd('Aucun élément trouvé');
            }  
            
            $entete = Entete::first(); 
            
            //dd($list);       

            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new MaintPrevExecExport($list,$entete,$carct,$details);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenanceExecutionPreventive_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new MaintPrevExecExport($list,$entete,$carct,$details), 'MaintenanceExecutionPreventive_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }

    public function listordinateurmaintenance(Request $request)
    {
        try {
            return view('viewadmindste.maintenance.listmaintenance');
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function listordinateurmaintenancedata(Request $request)
    {
        try {
            $query = DB::table('gestionmaintenances as gm')
            ->leftJoin('outils as o', 'o.id', '=', 'gm.outil')
            ->leftJoin('maintenances as m', 'm.id', '=', 'gm.maintenance')
            ->leftJoin('utilisateurs as t', 't.idUser', '=', 'm.user')
            ->leftJoin('categorieoutils as co', 'co.id', '=', 'o.categorie')
            ->leftJoin('utilisateurs as u', 'gm.action', '=', 'u.idUser')
            ->leftJoin('services as s', 'm.service', '=', 's.id')
            ->select(
                'gm.id as gestion_id',
                'm.periodedebut as Deb',
                'm.periodefin as Fin',
                'm.user',
                'o.id as id_outil',
                'co.libelle as co_libelle',
                'gm.detailjson',
                'gm.outil as gm_outil',
                DB::raw('COALESCE(CONCAT(m.periodedebut, " au ", m.periodefin), "Aucune période") as periode'),
                DB::raw('COALESCE(gm.commentaireuser, "Aucune Obs") as commentaireuser'),
                DB::raw('COALESCE(gm.commentaireinf, "Aucune Obs") as commentaireinf'),
                DB::raw('COALESCE(gm.avisuser, "Pas d\'avis") as avisuser'),
                DB::raw('COALESCE(gm.etat, "") as etat'),
                DB::raw('COALESCE(o.nameoutils, "") as nameoutils'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
                DB::raw('COALESCE(CONCAT(t.nom, " ", t.prenom), "En attente") as usersT'),
            )->where("o.user", session("utilisateur")->idUser);

            $query->where(function ($q) use ($request) {

                if ($request->filled('periodedebut')) {
                    $q->orWhere('m.periodedebut', 'like', '%' . htmlspecialchars(trim($request->periodedebut)) . '%');
                }

                if ($request->filled('periodefin')) {
                    $q->orWhere('m.periodefin', 'like', '%' . htmlspecialchars(trim($request->periodefin)) . '%');
                }

                if ($request->filled('technicien')) {
                    $q->orWhere(DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "")'), 'like', '%' . htmlspecialchars(trim($request->technicien)) . '%');
                }

                if ($request->filled('outil')) {
                    $q->orWhere(DB::raw('COALESCE(o.nameoutils, "")'), 'like', '%' . htmlspecialchars(trim($request->outil)) . '%');
                }

                if ($request->filled('avis')) {
                    $q->orWhere(DB::raw('COALESCE(gm.avisuser, "")'), 'like', '%' . htmlspecialchars(trim($request->avis)) . '%');
                }

                if ($request->filled('etat')) {
                    $q->orWhere('m.etat', 'like', '%' . htmlspecialchars(trim($request->etat)) . '%');
                }
            });

            $list = $query->get();
            return json_encode(["list" => $list]);
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            $list = "";
            return json_encode(["list" => $list]);
        }
    }

    public function traitementmaintenance(Request $request)
    {
        try {
            if (!in_array("add_maint_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                if (isset(DB::table('gestionmaintenances')->where('outil', $request->ordinateur)->where('maintenance', $request->periode)->first()->id)) {
                    return "Une maintenance a été déjà faite sur cet outils!";
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

                    $message = "Vous avez enregistrée une maintenance de la période du " . $periode->periodedebut . " au " . $periode->periodefin . " sur l'outil " . $ordinateur->nameoutils . ".";

                    TraceController::setTrace($message, session("utilisateur")->idUser);

                    // Envoie de message au utilisateur
                    flash($message)->success();
                    return $message;
                }
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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

                $message = "Vous avez modifiée les informations de la période du " . $periode->periodedebut . " au " . $periode->periodefin . " sur l'outil " . $ordinateur->nameoutils . ".";
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

            $list = DB::table('gestionmaintenances as gm')
            ->leftJoin('outils as o', 'o.id', '=', 'gm.outil')
            ->leftJoin('maintenances as m', 'm.id', '=', 'gm.maintenance')
            ->leftJoin('utilisateurs as t', 't.idUser', '=', 'm.user')
            ->leftJoin('categorieoutils as co', 'co.id', '=', 'o.categorie')
            ->leftJoin('utilisateurs as u', 'gm.action', '=', 'u.idUser')
            ->leftJoin('services as s', 'm.service', '=', 's.id')
            ->select(
                'gm.id as gestion_id',
                'm.periodedebut as Deb',
                'm.periodefin as Fin',
                'm.commentaire',
                'm.user',
                'o.id as id_outil',
                'o.otherjson as json',
                'o.categorie as cat',
                'co.libelle as co_libelle',
                'gm.detailjson',
                'gm.outil as gm_outil',
                DB::raw('COALESCE(CONCAT(m.periodedebut, " au ", m.periodefin), "Aucune période") as periode'),
                DB::raw('COALESCE(gm.commentaireuser, "Aucune Obs") as commentaireuser'),
                DB::raw('COALESCE(gm.commentaireinf, "Aucune Obs") as commentaireinf'),
                DB::raw('COALESCE(gm.avisuser, "Pas d\'avis") as avisuser'),
                DB::raw('COALESCE(gm.avisinf, "Pas d\'avis") as avisinf'),
                DB::raw('COALESCE(gm.etat, "") as etat'),
                DB::raw('COALESCE(o.nameoutils, "") as nameoutils'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
                DB::raw('COALESCE(CONCAT(t.nom, " ", t.prenom), "En attente") as usersT'),
            )
            ->where("o.user", session("utilisateur")->idUser)
            ->where("gm.id", $request->idmprev)
            ->get();

            // Récupérer le premier élément de la collection(outils)
            $item = $list->first();
            if ($item) {
                $carct = json_decode($item->json, true); // On décode en tableau associatif
                $details = ChampsCategorieOutil::where("categoutil", $item->cat)->get();
                //dd($details);
            } else {
                //dd('Aucun élément trouvé');
            }  
            
            $entete = Entete::first(); 

            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new MaintPreventiveExport($list,$entete,$carct,$details);
                    $pdfContent = $pdfExporter->generatePdf();
                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenancePreventive_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new MaintPreventiveExport($list,$entete,$carct,$details), 'MaintenancePreventive_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }

    //maintenance preventive export recherche
    public function mprevrech(Request $request)
    {
        try {

            $list = json_decode($request->input('Gliste'), true); 

            $entete = Entete::first(); 

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new MprevRechpdf($list,$entete);
                    //dd($list);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenancePreventiveExport_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new MprevRech($list,$entete), 'MaintenancePreventiveExport_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

    //gestion preventive export recherche
    public function gprevrech(Request $request)
    {
        try {

            $list = json_decode($request->input('Gliste'), true); 

            $entete = Entete::first(); 

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new GprevRechpdf($list,$entete);
                    //dd($list);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="GestionPreventiveExport_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new GprevRech($list,$entete), 'GestionPreventiveExport_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }


    // Tout sur la maintenace curative ***********************
    public function listgestionmaintenancecurative()
    {
        return view('viewadmindste.maintenance.curative.list');
    }

    public function listgestionmaintenancecurativedata(Request $request)
    {
        $query = DB::table('maintenance_curatives as mc')
        ->leftJoin('outils as o', 'o.id', '=', 'mc.outil')
        ->leftJoin('utilisateurs as u', 'mc.user', '=', 'u.idUser')
        ->leftJoin('categorieoutils as co', 'co.id', '=', 'o.categorie')
        ->select(
            'mc.id as id',
            'mc.periodedebut as date_debut',
            'mc.periodefin as heures',
            'mc.resultat',
            'mc.outil',
            'mc.diagnostique',
            'mc.cause',
            'mc.user as user_id',
            DB::raw('COALESCE(mc.etat, "") as etat'),
            DB::raw('COALESCE(mc.commentaire, "") as commentaire'),
            DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
            DB::raw('COALESCE(CONCAT(mc.periodedebut, " à ", mc.periodefin), "Aucune période") as periode'),
            DB::raw('COALESCE(o.nameoutils, "") as nameoutils'),
        );

        $query->where(function ($q) use ($request) {

            if ($request->filled('periodedebut')) {
                $q->orWhere('mc.periodedebut', 'like', '%' . htmlspecialchars(trim($request->periodedebut)) . '%');
            }

            if ($request->filled('periodefin')) {
                $q->orWhere('mc.periodefin', 'like', '%' . htmlspecialchars(trim($request->periodefin)) . '%');
            }

            if ($request->filled('technicien')) {
                $q->orWhere(DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "")'), 'like', '%' . htmlspecialchars(trim($request->technicien)) . '%');
            }

            if ($request->filled('outil')) {
                $q->orWhere(DB::raw('COALESCE(o.nameoutils, "")'), 'like', '%' . htmlspecialchars(trim($request->outil)) . '%');
            }

            if ($request->filled('cause')) {
                $q->orWhere(DB::raw('COALESCE(mc.cause, "")'), 'like', '%' . htmlspecialchars(trim($request->cause)) . '%');
            }

            if ($request->filled('etat')) {
                $q->orWhere('mc.etat', 'like', '%' . htmlspecialchars(trim($request->etat)) . '%');
            }

            if ($request->filled('resultat')) {
                $q->orWhere('mc.resultat', 'like', '%' . htmlspecialchars(trim($request->resultat)) . '%');
            }

            if ($request->filled('diagnostique')) {
                $q->orWhere('mc.diagnostique', 'like', '%' . htmlspecialchars(trim($request->diagnostique)) . '%');
            }
        });
        $list = $query->get();

        return json_encode(["list" => $list]);
    }

    public function listmaintenancecurative(Request $request)
    {
        try {
            return view('viewadmindste.maintenance.curative.listmaintenance');
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function listmaintenancecurativedata(Request $request)
    {
        try {

            $query = DB::table('gestionmaintenance_curatives as gmc')
            ->leftJoin('outils as o', 'o.id', '=', 'gmc.outil')
            ->leftJoin('maintenance_curatives as mc', 'mc.id', '=', 'gmc.maintenance')
            ->leftJoin('categorieoutils as co', 'co.id', '=', 'o.categorie')
            ->leftJoin('utilisateurs as u', 'gmc.action', '=', 'u.idUser')
            ->select(
                'gmc.id as gestion_id',
                'gmc.outil as gmc_outil',
                DB::raw('COALESCE(CONCAT(mc.periodedebut, " à ", mc.periodefin), "Aucune période") as periode'),
                DB::raw('COALESCE(o.nameoutils, "") as nameoutils'),
                DB::raw('COALESCE(gmc.commentaireuser, "Aucune Obs") as commentaireuser'),
                DB::raw('COALESCE(gmc.commentaireinf, "Aucune Obs") as commentaireinf'),
                DB::raw('COALESCE(gmc.action_effectuer, "") as action_effectuer'),
                DB::raw('COALESCE(gmc.avisuser, "Aucun avis") as avisuser'),
                DB::raw('COALESCE(gmc.avisinf, "Aucun avis") as avisinf'),
                DB::raw('COALESCE(gmc.etat, "") as etat'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
            )->where("o.user", session("utilisateur")->idUser);

            $query->where(function ($q) use ($request) {

                if ($request->filled('periodedebut')) {
                    $q->orWhere('gmc.periodedebut', 'like', '%' . htmlspecialchars(trim($request->periodedebut)) . '%');
                }

                if ($request->filled('periodefin')) {
                    $q->orWhere('gmc.periodefin', 'like', '%' . htmlspecialchars(trim($request->periodefin)) . '%');
                }

                if ($request->filled('technicien')) {
                    $q->orWhere(DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "")'), 'like', '%' . htmlspecialchars(trim($request->technicien)) . '%');
                }

                if ($request->filled('outil')) {
                    $q->orWhere(DB::raw('COALESCE(o.nameoutils, "")'), 'like', '%' . htmlspecialchars(trim($request->outil)) . '%');
                }

                if ($request->filled('etat')) {
                    $q->orWhere('gmc.etat', 'like', '%' . htmlspecialchars(trim($request->etat)) . '%');
                }

                if ($request->filled('avis')) {
                    $q->orWhere(DB::raw('COALESCE(gmc.avisuser, "")'), 'like', '%' . htmlspecialchars(trim($request->avis)) . '%');
                }
                if ($request->filled('avisinf')) {
                    $q->orWhere(DB::raw('COALESCE(gmc.avisinf, "")'), 'like', '%' . htmlspecialchars(trim($request->avisinf)) . '%');
                }
                if ($request->filled('cause')) {
                    $q->orWhere(DB::raw('COALESCE(mc.cause, "")'), 'like', '%' . htmlspecialchars(trim($request->cause)) . '%');
                }
            });

            $list = $query->get();
            return json_encode(["list" => $list]);
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            $list = "";
            return json_encode(["list" => $list]);
        }
    }

    //export maintenance currative
    public function expmaintcur(Request $request)
    {
        try {
            $list = DB::table('gestionmaintenance_curatives as gmc')
            ->leftJoin('outils as o', 'o.id', '=', 'gmc.outil')
            ->leftJoin('maintenance_curatives as mc', 'mc.id', '=', 'gmc.maintenance')
            ->leftJoin('utilisateurs as t', 't.idUser', '=', 'mc.user')
            ->leftJoin('categorieoutils as co', 'co.id', '=', 'o.categorie')
            ->leftJoin('utilisateurs as u', 'gmc.action', '=', 'u.idUser')
            ->select(
                'gmc.id as gestion_id',
                'mc.periodedebut as Deb',
                'mc.periodefin as Fin',
                'mc.diagnostique',
                'mc.cause',
                'mc.resultat',
                'mc.commentaire',
                'mc.user',
                'o.id as id_outil',
                'o.otherjson as json',
                'o.categorie as cat',
                'co.libelle as co_libelle',
                'gmc.outil as gmc_outil',
                DB::raw('COALESCE(CONCAT(mc.periodedebut, " au ", mc.periodefin), "Aucune période") as periode'),
                DB::raw('COALESCE(gmc.commentaireuser, "Aucune Obs") as commentaireuser'),
                DB::raw('COALESCE(gmc.commentaireinf, "Aucune Obs") as commentaireinf'),
                DB::raw('COALESCE(gmc.avisuser, "Pas d\'avis") as avisuser'),
                DB::raw('COALESCE(gmc.avisinf, "Pas d\'avis") as avisinf'),
                DB::raw('COALESCE(gmc.etat, "") as etat'),
                DB::raw('COALESCE(o.nameoutils, "") as nameoutils'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
                DB::raw('COALESCE(CONCAT(t.nom, " ", t.prenom), "En attente") as usersT'),
            )
            ->where("o.user", session("utilisateur")->idUser)
            ->where("gmc.id", $request->idmcur)
            ->get();

            // Récupérer le premier élément de la collection(outils)
            $item = $list->first();
            if ($item) {
                $carct = json_decode($item->json, true); // On décode en tableau associatif
                $details = ChampsCategorieOutil::where("categoutil", $item->cat)->get();
                //dd($details);
            } else {
                dd('Aucun élément trouvé');
            }  

            $entete = Entete::first(); 

            //dd($list);       

            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new MaintCurrativeExport($list,$entete,$carct,$details);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenanceCurrative_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new MaintCurrativeExport($list,$entete,$carct,$details), 'MaintenanceCurrative_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
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
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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
                        'dam.required' => 'La période d\'arrêt est requise.',
                        'techm.required' => 'Le technicien est requis.',
                        'outils.required' => 'L\outils est requis.',
                        'dgnt.required' => 'Le diagnostique est requis.',
                        'cse.required' => 'La cause est requis.',
                        'rslt.required' => 'Le resultat est requis.',
                    ];
                    $validator = Validator::make($request->all(), [
                        'pdm' => 'required',
                        'dam' => 'required',
                        'techm' => 'required',
                        'outils' => 'required',
                        'dgnt' => 'required',
                        'cse' => 'required',
                        'rslt' => 'required',
                    ], $messages);

                    if ($validator->fails()) {
                        $errors = $validator->errors()->all();
                        $errorString = implode(' ', $errors);
                        flash($errorString)->error();
                        return $errorString;
                    }
                    $add = new MaintenanceCurative();
                    $add->periodedebut =  $request->pdm; // Période fin
                    $add->periodefin = $request->dam; // Période Début
                    $add->user = $request->techm;  // Technicien
                    $add->outil = $request->outils;  // Outils
                    $add->diagnostique = $request->dgnt;  // Diagnostique
                    $add->cause = $request->cse;  // Cause
                    $add->resultat = $request->rslt;  // Resultat
                    $add->commentaire = $request->cm;  // Resultat
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    $message = "Vous avez enregistrer une maintenance curative réçu le " . $request->pdm . " dont la durée d'arrêt est " . $request->dam . " .";

                    TraceController::setTrace($message, session("utilisateur")->idUser);
                    flash("Succès : " . $message)->success();
                    // Envoie de message au utilisateur
                    return $message;
                }
            } catch (QueryException $qe) {
                $errorString = "Une erreur ses produites" .  $qe->getMessage();
                flash($errorString)->error();
                return $errorString;
            } catch (\Exception $e) {
                $errorString = "Erreur serveur.";
                flash($errorString)->error();
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

                    $message = "Vous avez enregistrée l'exécution de la maintenance curative de la période du " . $periode->periodedebut . " au " . $periode->periodefin . " sur l'outil " . $ordinateur->nameoutils ?? "" . ".";

                    TraceController::setTrace($message, session("utilisateur")->idUser);

                    // Envoie de message au utilisateur
                    flash($message)->success();
                    return $message;
                }
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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
                    "periodefin" => $request->dam,
                    "outil" => $request->outilsu,
                    "diagnostique" => $request->udgnt,
                    "user" => $request->techmu,
                    "commentaire" => $request->cmu,
                    "cause" => $request->ucse,
                    "resultat" => $request->urslt,
                    "action" => session("utilisateur")->idUser
                ]);

                if ($request->ucm != 0) {
                    MaintenanceCurative::where("id", $request->id)->update([
                        "user" => $request->ucm
                    ]);
                }

                $message = "Vous avez modifiée les informations de la maintenace curative du " . $maintencancesexistant->periodedebut . " en " . $request->pdm . " " . $request->damu;
                TraceController::setTrace($message, session("utilisateur")->idUser);
                flash($message)->success();
                return $message;
            }
        } catch (QueryException $qe) {
            $errorString = "Une erreur ses produites" .  $qe->getMessage();
            flash($errorString)->error();
            return $errorString;
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
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
                    $lib = $libs->periodedebut . " au " . $libs->periodefin;
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

                $message = "Vous avez modifiée les informations de la période du " . $periode->periodedebut . " au " . $periode->periodefin . " sur l'outils " . $ordinateur->nameoutils . ".";
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
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return $errorString;
        }
    }

    //exportation gestion maintenance curative
    public function expgestcurat(Request $request)
    {
        try {
            
            $list = MaintenanceCurative::where('id', $request->idgestcur)->get();

            $entete = Entete::first(); 
            
            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new GestMaintCurExport($list,$entete);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="GestionMaintenanceCurative_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new GestCurXExport($list,$entete), 'GestionMaintenanceCurative_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }

    //export gestion maintenance curative
    public function expgestprev(Request $request)
    {
        try {

            $list = DB::table('maintenances as m')
            ->leftJoin('utilisateurs as t', 't.idUser', '=', 'm.user')
            ->leftJoin('utilisateurs as u', 'm.action', '=', 'u.idUser')
            ->leftJoin('services as s', 'm.service', '=', 's.id')
            ->select(
                'm.periodedebut as Deb',
                'm.periodefin as Fin',
                'm.*',
                DB::raw('COALESCE(CONCAT(m.periodedebut, " au ", m.periodefin), "Aucune période") as periode'),
                DB::raw('COALESCE(CONCAT(u.nom, " ", u.prenom), "En attente") as usersL'),
                DB::raw('COALESCE(CONCAT(t.nom, " ", t.prenom), "En attente") as usersT'),
            )
            ->where("m.id", $request->idgestprev)
            ->get();
            dd($list);
           
            //$list = Maintenance::where('id', $request->idgestprev)->get();

            $entete = Entete::first(); 

            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new GestMaintPrevExport($list,$entete);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="GestionMaintenancePreventive_' . $dateExp . '.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new GestPrevXExport($list,$entete), 'GestionMaintenancePreventive_' . $dateExp . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }


    //maintenance preventive export recherche
    public function mcurrech(Request $request)
    {
        try {

            $list = json_decode($request->input('Gliste'), true); 

            $entete = Entete::first(); 

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new McurRechpdf($list,$entete);
                    //dd($list);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="MaintenanceCurrativeExport_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new McurRech($list,$entete), 'MaintenanceCurrativeExport_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

    //gestion preventive export recherche
    public function gcurrech(Request $request)
    {
        try {

            $list = json_decode($request->input('Gliste'), true); 

            $entete = Entete::first(); 

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new GcurRechpdf($list,$entete);
                    //dd($list);
                    $pdfContent = $pdfExporter->generatePdf();

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="GestionCurrativeExport_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new GcurRech($list,$entete), 'GestionCurrativeExport_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }


}