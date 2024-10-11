<?php

namespace App\Http\Controllers;

use App\Exports\DetailOutilExport;
use App\Exports\HistoExport;
use App\Exports\OutilhistopdfExport;
use App\Exports\OutilsExport;
use App\Exports\OutilspdfExport;
use App\Exports\OutilsRech;
use App\Exports\OutilsRechPdf;
use App\Models\ActionOutil;
use Illuminate\Http\Request;
use App\Models\Outil;
use App\Models\Trace;
use App\Models\CategorieOutil;
use App\Models\ChampsCategorieOutil;
use App\Providers\InterfaceServiceProvider;
use PDF;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class OutilController extends Controller
{
    public function list(Request $request)
    {
        $lists = Outil::query()->orderBy("categorie", "asc");
        if ($request->has('q') != "" && $request->has('q') != null) {
            $recherche = htmlspecialchars(trim($request->q));
            $list = $lists->where('reference', 'like', '%' . $recherche . '%')
                ->orWhere('dateacquisition', 'like', '%' . $recherche . '%')
                ->orWhere('nameoutils', 'like', '%' . $recherche . '%')
                // ->orWhere('categorie', 'like', '%' . $recherche . '%')
                ->paginate(10);
            return view('viewadmindste.outils.listoutils', compact('list'));
        }
        $list = $lists->paginate(10);
        return view('viewadmindste.outils.listoutils', compact('list'));
    }

    public function getallchamp(Request $request)
    {
        $all = ["data" => ChampsCategorieOutil::where("categoutil", $request->cat)->get()];
        return json_encode($all);
    }

    public function add(Request $request)
    {
        if (!in_array("add_outil", session("auto_action"))) {
            return view("vendor.error.649");
        } else {
            try {
                if (isset(DB::table('outils')->where('nameoutils', $request->caraclib)->where('categorie', $request->caraccat)->first()->id)) {
                    $errorString = "L'outil que vous voulez ajouter existe déjà!! ";
                    flash($errorString)->error();
                    return $errorString;
                } else {
                    $messages = [
                        '_token.required' => 'Les jeton du formulaire sont requis.',
                        'caraclib.required' => 'Le Libellé est requis.',
                        'caraccat.required' => 'La Catégorie d\'outils est requis.',
                        'caracdateoutil.required' => 'La Date d\'acquisition est requis.',
                        'caracrefoutil.required' => 'La Référence est requise.',
                    ];
                    $validator = Validator::make($request->all(), [
                        '_token' => 'required',
                        'caraclib' => 'required',
                        'caraccat' => 'required',
                        'caracdateoutil' => 'required',
                        'caracrefoutil' => 'required',
                    ], $messages);

                    if ($validator->fails()) {
                        $errors = $validator->errors()->all();
                        $errorString = implode(' ', $errors);
                        flash($errorString)->error();
                        return $errorString;
                    }
                    // recup les colonnes in catégorie d'outil

                    $cco = ChampsCategorieOutil::where('categoutil', $request->caraccat)->get();

                    $tab = array('other' => ""); // tableau des inputs

                    foreach ($cco as $value) {
                        $code = $value->code; // name des inputs
                        $tab[$code] = $request->$code; // Valeurs des inputs
                    }

                    $other = json_encode($tab);

                    $add = new Outil();
                    $add->reference = $request->caracrefoutil;
                    $add->dateacquisition = $request->caracdateoutil;
                    $add->nameoutils =  $request->caraclib;
                    $add->categorie = $request->caraccat;
                    $add->otherjson = $other;
                    $add->action = session("utilisateur")->idUser;
                    $add->save();

                    TraceController::setTrace("Vous avez enregistrée l'outil " . $request->caraclib . " .", session("utilisateur")->idUser);

                    $message = "Vous avez enregistrée l'outil " . $request->caraclib . " .";
                    flash("Succès : " . $message)->success();

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

    public function libelleactionsoutils(Request $request)
    {
        $codes = $request->query('codes');
        $outilsId = $request->query('outilsId');
        $codesArray = explode(',', $codes);
        $libelles = ActionOutil::whereIn('code', $codesArray)
            ->where('Outils', $outilsId)
            ->get(['code', 'libelle']);
        return response()->json($libelles);
    }

    public function affectUserInOutil(Request $request)
    {
        try {
            if (!in_array("affecte_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $outil = Outil::where('id', request('idaffect'))->first()->nameoutils;

                $utilisateur = InterfaceServiceProvider::LibelleUser($request->user);

                Outil::where('id', request('idaffect'))->update(
                    [
                        'user' => $request->user,
                        'action' => session("utilisateur")->idUser,
                    ]
                );
                $message = "Vous avez affecter `" . $outil . "` à l'utilisateur " . $utilisateur;
                // Envoie un mail

                TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('idaffect'));
                return $message;
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function getalluserssys(Request $request)
    {
        return json_encode(["data" => DB::table('utilisateurs')->get()]);
    }

    public function reaffecteruser(Request $request)
    {
        try {
            if (!in_array("reaffecte_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $outil = Outil::where('id', request('idaff'))->first();

                $ancienuser = $outil->user;

                if ($ancienuser == request('idreaffect')) {
                    // Pas de mise à jour
                    return "Aucun changement n'est fait sur l'outil. ";
                } else {
                    if (request('idreaffect') == 0) {
                        // Retrait de l'outil d'un utilisateur
                        $utilisateur = InterfaceServiceProvider::LibelleUser($outil->user);

                        Outil::where('id', request('idaff'))->update(
                            [
                                'user' => null,
                                'action' => session("utilisateur")->idUser,
                            ]
                        );
                        $message = "Vous avez retiré `" . $outil->nameoutils . "` à " . $utilisateur;
                        // Envoie un mail
                        TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('idaff'));
                        return $message;
                    } else {
                        // Changement
                        $ancienutilisateur = InterfaceServiceProvider::LibelleUser($outil->user);

                        $nouveauutilisateur = InterfaceServiceProvider::LibelleUser($request->idreaffect);

                        Outil::where('id', request('idaff'))->update(
                            [
                                'user' => $request->idreaffect,
                                'action' => session("utilisateur")->idUser,
                            ]
                        );
                        $message = "Vous avez retiré `" . $outil->nameoutils . "` à " . $ancienutilisateur . " et l’avez réaffecté à " . $nouveauutilisateur;
                        // Envoie un mail
                        TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('idaff'));
                        return $message;
                    }
                }
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function gethistoutilsys(Request $request)
    {
        try {
            if (!in_array("hist_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                return json_encode(["data" => DB::table('traces')
                    ->join('utilisateurs', "utilisateurs.idUser", "=", "traces.action")
                    ->select('nom', 'prenom', 'libelle', 'traces.created_at as created_at')
                    ->where('type', "outil")->where("idsec", $request->id)->get()]);
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function getdetailoutilsys(Request $request)
    {

        try {
            if (!in_array("caract_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $allChamp = ChampsCategorieOutil::where("categoutil", $request->cat)->get();
               

                $caract = $request->caract; // Caractéristique associé à l'outils. La valeur otherjson

                $contenu = "";

                foreach ($allChamp as $value) {
                    $contenu .= '<div class="col-md-6">';
                    $contenu .= '<label for="' . $value->code . '">' . $value->libelle . '</label>';
                    $contenu .= '<div class="form-group">';
                    $contenu .= '<div class="form-line">';
                    $code = $value->code;
                    if (strpos($caract, $code) !== false) {
                        $contenu .= '<input type="' . $value->type . '" disabled id="' . $value->code . '" name="' . $value->code . '" value="' . json_decode($caract)->$code . '" class="form-control outiladd" placeholder="">';
                    } else {
                        $contenu .= '<input type="' . $value->type . '" disabled id="' . $value->code . '" name="' . $value->code . '" value="" class="form-control outiladd" placeholder="">';
                    }

                    $contenu .= '</div>';
                    $contenu .= '</div>';
                    $contenu .= '</div>';
                }

                return $contenu;
            }
        } catch (\Exception $e) {
            $errorString = "Erreur serveur.";
            flash($errorString)->error();
            return Back();
        }
    }

    public function getdetailoutilforupdatesys(Request $request)
    {
        try {
            $allChamp = ChampsCategorieOutil::where("categoutil", $request->cat)->get();

            $caract = $request->caract;

            $contenu = "";

            foreach ($allChamp as $value) {
                $contenu .= '<div class="col-md-6">';
                $contenu .= '<label for="' . $value->code . '">' . $value->libelle . '</label>';
                $contenu .= '<div class="form-group">';
                $contenu .= '<div class="form-line">';
                $code = $value->code;
                if (strpos($caract, $code) !== false) {
                    $contenu .= '<input type="' . $value->type . '" id="' . $value->code . '" name="' . $value->code . '" value="' . json_decode($caract)->$code . '" class="form-control outilupdate" placeholder="">';
                } else {
                    $contenu .= '<input type="' . $value->type . '" id="' . $value->code . '" name="' . $value->code . '" value="" class="form-control outilupdate" placeholder="">';
                }
                $contenu .= '</div>';
                $contenu .= '</div>';
                $contenu .= '</div>';
            }

            return $contenu;
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function setupdateoutil(Request $request)
    {
        try {
            if (!in_array("update_caract_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {

                $outilsexistant = Outil::where('id', $request->id)->first();

                $cco = ChampsCategorieOutil::where('categoutil', $outilsexistant->categorie)->get();

                $tab = array('other' => "");

                foreach ($cco as $value) {
                    $code = $value->code;
                    $tab[$code] = $request->$code;
                }

                $other = json_encode($tab);

                TraceController::setTrace("Data ancien : " . json_encode($outilsexistant), session("utilisateur")->idUser);

                Outil::where("id", $request->id)->update([
                    "otherjson" => $other,
                    "action" => session("utilisateur")->idUser
                ]);

                TraceController::setTrace("Vous avez modifiée les informations de " . $outilsexistant->nameoutils . " .", session("utilisateur")->idUser, "outil", $request->id);

                return "Vous avez modifiée l'outil " . $request->nameoutils . " .";
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }

    public function setdeleteoutil(Request $request)
    {
        try {
            if (!in_array("delete_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $outils = Outil::find(request('id'));
                // dd($outils);
                if ($outils) {
                    $lib = Outil::where('id', request('id'))->first()->nameoutils;
                    $occurence = json_encode(Outil::where('id', request('id'))->first());

                    TraceController::setTrace("Data delete : " . $occurence, session("utilisateur")->idUser);

                    Outil::where('id', request('id'))->delete();
                    $info = "Vous avez supprimé l'outils " . $lib . " avec succès.";
                    flash($info)->success();
                    return $info;
                } else {
                    $info = "Outils introuvable.";
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

    public function setdefinitionetatoutil(Request $request)
    {
        try {
            if (!in_array("update_etat_outil", session("auto_action"))) {
                return view("vendor.error.649");
            } else {
                $lib = Outil::where('id', request('id'))->first()->nameoutils;
                $occurence = json_encode(Outil::where('id', request('id'))->first());

                TraceController::setTrace("Data existant :" . $occurence, session("utilisateur")->idUser);

                $message = "Vous avez défini l'état de l'outil " . $lib . " à `" . $request->etat . "``. <br> " . $request->commentaire;

                TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('id'));

                Outil::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "action" => session("utilisateur")->idUser
                ]);

                $info = "Changement d'état effectif sur " . $lib . " avec succès.";
                return $info;
            }
        } catch (\Exception $e) {
            return Back()->with('error', "Une erreur ses produites :" . $e->getMessage());
        }
    }


    // Export des détails d'outil
    public function exportPdfDetail(Request $request)
    {
        try {
            // Récupération de l'outil en fonction de l'ID
            $outil = Outil::where('id', $request->iddetail)->first();
            
            if (!$outil) {
                return response()->json(['message' => 'Outil introuvable'], 404);
            }

            // Récupérer les détails supplémentaires en fonction de la catégorie de l'outil
            $details = ChampsCategorieOutil::where("categoutil", $request->cat)->get();
            //dd($details);

            // Décoder les caractéristiques JSON de l'outil
            $carct = json_decode($outil->otherjson, true); // On décode en tableau associatif

            // Récupérer la date actuelle pour l'exportation
            $dateExp= now()->format('d-m-Y'); 

            if (!$carct) {
                return response()->json(['message' => 'Caractéristiques introuvables ou non valides'], 404);
            }

            // Passer les données à une vue PDF
            $pdf = PDF::loadView('viewadmindste.export.detailoutil', [
                    'outil' => $outil,
                    'details' => $details,
                    'carct' => $carct
                ]);
            
        
            return $pdf->download('Details_' . $outil->nameoutils . '_' . $dateExp . '.pdf');

        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

    //outils export
    public function exportoutils(Request $request)
    {
        try {

            $list = Outil::orderBy("categorie", "asc")->get();

            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Générer le fichier en fonction du format demandée
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new OutilspdfExport($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="OutilsExport_' . $dateExp . '.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new OutilsExport($list), 'OutilsExport_' . $dateExp . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }
    
    //export outils historique
    public function expoutilhisto(Request $request)
    {
        try {
            $data = DB::table('traces')
                ->join('utilisateurs', 'utilisateurs.idUser', '=', 'traces.action') // Correction ici
                ->join('outils', 'outils.id', '=', 'traces.idsec') // Si vous voulez inclure la table 'outils'
                ->select('nom', 'prenom', 'libelle', 'traces.created_at as created_at', 'outils.nameoutils')
                ->where('traces.type', 'outil')
                ->where('traces.idsec', $request->idhisto)
                ->get();

            $format = $request->format;

            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');

            // Récupérer le nom de l'outil à partir du premier élément de la collection
            $nameOutil = $data->first()->nameoutils;


            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new OutilhistopdfExport($data);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="Historique'. $nameOutil .'_'. $dateExp . '.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new HistoExport($data), 'Historique'. $nameOutil .'_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du telechargement : " . $e->getMessage()], 400);
        }
    }

    //export recherche outils
    public function exportoutilsrech(Request $request)
    {
        try {

            $lists = json_decode($request->input('listData'), true); 

            $list = $lists['data'];

            //dd($list);
            
            // Récupérer la date actuelle pour l'exportation
            $dateExp = now()->format('d-m-Y');    

            $format = $request->format;

            // Générer le fichier en fonction du format demandé
            switch ($format) {
                case 'pdf':
                    $pdfExporter = new OutilsRechPdf($list);
                    $filePath = $pdfExporter->generatePdf();
                    $pdfContent = Storage::get($filePath);

                    return response($pdfContent, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'attachment; filename="Outils_'. $dateExp .'.pdf"');
                case 'xlsx':
                default:
                    return Excel::download(new OutilsRech($list), 'Outils_'. $dateExp .'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            return response()->json(["status" => 1, "message" => "Erreur lors du téléchargement : " . $e->getMessage()], 400);
        }
    }

}