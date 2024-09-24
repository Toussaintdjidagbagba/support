<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Outil;
use App\Models\Trace;
use App\Models\CategorieOutil;
use App\Models\ChampsCategorieOutil; 
use App\Providers\InterfaceServiceProvider;

class OutilController extends Controller
{
    public function list()
    {
    	$list = Outil::orderBy("categorie", "asc")->get(); 
    	return view('viewadmindste.outils.listoutils', compact('list'));
    }

    public function getallchamp(Request $request){
        $all = ["data" => ChampsCategorieOutil::where("categoutil", $request->cat)->get()];
        return json_encode($all);
    }

    public function add(Request $request)
    {
    	if (!in_array("add_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            if ( isset(DB::table('outils')->where('nameoutils', $request->caraclib)->where('categorie', $request->caraccat)->first()->id) ) {
                flash("L'outil que vous voulez ajouter existe déjà!! ")->error();
                return Back();
            }
            else{
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

                TraceController::setTrace("Vous avez enregistrée l'outil ".$request->caraclib." .",session("utilisateur")->idUser);
                
                return "Vous avez enregistrée l'outil ".$request->caraclib." .";
            }
        }
    }

    public function affectUserInOutil(Request $request)
    {
        if (!in_array("affecte_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            $outil = Outil::where('id', request('idaffect'))->first()->nameoutils;

            $utilisateur = InterfaceServiceProvider::LibelleUser($request->user);

            Outil::where('id', request('idaffect'))->update(
                    [
                        'user' => $request->user,
                        'action' => session("utilisateur")->idUser,
                    ]);
            $message = "Vous avez affecter `".$outil."` à l'utilisateur ".$utilisateur;
            // Envoie un mail

            TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('idaffect'));
            return $message;
        }
    }

    public function getalluserssys(Request $request){
        return json_encode(["data" => DB::table('utilisateurs')->get()]);
    }

    public function reaffecteruser(Request $request){
        if (!in_array("reaffecte_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

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
                            ]);
                    $message = "Vous avez retiré `".$outil->nameoutils."` à ".$utilisateur;
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
                            ]);
                    $message = "Vous avez retiré `".$outil->nameoutils."` à ".$ancienutilisateur." et l’avez réaffecté à ".$nouveauutilisateur;
                    // Envoie un mail
                    TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('idaff'));
                    return $message;
                }
            }
        }
    }

    public function gethistoutilsys(Request $request){
        if (!in_array("hist_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            return json_encode(["data" => DB::table('traces')->join('utilisateurs', "utilisateurs.idUser", "=", "traces.action")->select('nom', 'prenom', 'libelle', 'traces.created_at as created_at')->where('type', "outil")->where("idsec", $request->id)->get()]);
        }
    }

    public function getdetailoutilsys(Request $request){
        
        if (!in_array("caract_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            $allChamp = ChampsCategorieOutil::where("categoutil", $request->cat)->get();

            $caract = $request->caract; // Caractéristique associé à l'outils. La valeur otherjson

            $contenu = "";

            foreach ($allChamp as $value) {
                $contenu .= '<div class="col-md-6">';
                $contenu .= '<label for="'.$value->code.'">'.$value->libelle.'</label>';
                $contenu .= '<div class="form-group">';
                $contenu .= '<div class="form-line">';
                $code = $value->code;
                if(strpos($caract, $code) !== false){
                    $contenu .= '<input type="'.$value->type.'" disabled id="'.$value->code.'" name="'.$value->code.'" value="'.json_decode($caract)->$code.'" class="form-control outiladd" placeholder="">';
                }else{
                    $contenu .= '<input type="'.$value->type.'" disabled id="'.$value->code.'" name="'.$value->code.'" value="" class="form-control outiladd" placeholder="">';
                }
                
                $contenu .= '</div>';
                $contenu .= '</div>';
                $contenu .= '</div>';
            }

            return $contenu;
        }
    }

    public function getdetailoutilforupdatesys(Request $request){
        $allChamp = ChampsCategorieOutil::where("categoutil", $request->cat)->get();

        $caract = $request->caract;

        $contenu = "";

        foreach ($allChamp as $value) {
            $contenu .= '<div class="col-md-6">';
            $contenu .= '<label for="'.$value->code.'">'.$value->libelle.'</label>';
            $contenu .= '<div class="form-group">';
            $contenu .= '<div class="form-line">';
            $code = $value->code;
            if(strpos($caract, $code) !== false){
                $contenu .= '<input type="'.$value->type.'" id="'.$value->code.'" name="'.$value->code.'" value="'.json_decode($caract)->$code.'" class="form-control outilupdate" placeholder="">';
            }else{
                $contenu .= '<input type="'.$value->type.'" id="'.$value->code.'" name="'.$value->code.'" value="" class="form-control outilupdate" placeholder="">';
            }
            $contenu .= '</div>';
            $contenu .= '</div>';
            $contenu .= '</div>';
        }

        return $contenu;
    }

    public function setupdateoutil(Request $request)
    {
        if (!in_array("update_caract_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{

            $outilsexistant = Outil::where('id', $request->id)->first();

                $cco = ChampsCategorieOutil::where('categoutil', $outilsexistant->categorie)->get();

                $tab = array('other' => "");

                foreach ($cco as $value) {
                    $code = $value->code;
                    $tab[$code] = $request->$code;
                }
            
                $other = json_encode($tab);

                TraceController::setTrace("Data ancien : ".json_encode($outilsexistant), session("utilisateur")->idUser);

                Outil::where("id", $request->id)->update([
                    "otherjson" => $other,
                    "action" => session("utilisateur")->idUser
                ]);

                TraceController::setTrace("Vous avez modifiée les informations de ".$outilsexistant->nameoutils." .",session("utilisateur")->idUser, "outil", $request->id);
                
                return "Vous avez modifiée l'outil ".$request->nameoutils." .";
        }
    }

    public function setdeleteoutil(Request $request)
    {
        if (!in_array("delete_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Outil::where('id', request('id'))->first()->nameoutils;
            $occurence = json_encode(Outil::where('id', request('id'))->first());
            
            TraceController::setTrace("Data delete : ".$occurence, session("utilisateur")->idUser);

            Outil::where('id', request('id'))->delete();
            $info = "Vous avez supprimé ".$lib." avec succès.";
            return $info;
        }
    }

    public function setdefinitionetatoutil(Request $request)
    {
        if (!in_array("update_etat_outil", session("auto_action"))) {
            return view("vendor.error.649");
        }else{
            $lib = Outil::where('id', request('id'))->first()->nameoutils;
            $occurence = json_encode(Outil::where('id', request('id'))->first());

            TraceController::setTrace("Data existant :".$occurence, session("utilisateur")->idUser);
            
            $message = "Vous avez défini l'état de l'outil ".$lib." à `".$request->etat."``. <br> ".$request->commentaire;

            TraceController::setTrace($message, session("utilisateur")->idUser, "outil", request('id'));

            Outil::where("id", $request->id)->update([
                    "etat" => $request->etat,
                    "action" => session("utilisateur")->idUser
                ]);

            $info = "Changement d'état effectif sur ".$lib." avec succès.";
            return $info;
        }
    }

    public function exportPDFDetail(Request $request)
    {
        Log::info('exportPDFDetail called');

        $details = json_decode($request->input('detail'), true);
        Log::info('Received data: ' . json_encode($details));

        if (!$details) {
            Log::error('No data provided');
            return response()->json(['error' => 'No data provided'], 400);
        }

        // Créer une instance de TCPDF
        $pdf = new TCPDF();

        // Définir les marges (pour centrer le tableau)
        $leftMargin = 15; // marge gauche
        $rightMargin = 15; // marge droite
        $pdf->SetMargins($leftMargin, 10, $rightMargin);

        // Ajouter une page
        $pdf->AddPage();

        // Ajouter l'image de fond
        $imagePath = public_path('fond.png');
        if (file_exists($imagePath)) {
            $pdf->Image($imagePath, 0, 0, 297, 297, 'PNG');
        }

        // Définir la police Unicode
        $pdf->SetFont('dejavusans', '', 12);

        // Ajouter l'en-tête du rapport
        $pdf->Ln(10);
        $pdf->Ln(10);
        $pdf->SetFont('dejavusans', 'B', 18);
        $pdf->Cell(0, 15, "Caractéristiques de l'Outil", 0, 1, 'C');


        // Définir les largeurs des colonnes
        $colWidth = 90;
        // Définir la police pour les données du tableau
        $pdf->SetFont('dejavusans', '', 12);

        // Ajouter les détails au tableau
        foreach ($details as $detail) {
            Log::info('Detail data: ' . json_encode($detail));

            // Utiliser htmlspecialchars pour encoder les caractères spéciaux
            $label = htmlspecialchars($detail['label']);
            $value = htmlspecialchars($detail['value']);

            // Ajouter un espace de 2mm autour des cellules de Label
            $pdf->Cell($colWidth, 10, ' ' . utf8_decode($label) . ' ', 1, 0, 'L');

            // Centrer le texte dans les cellules de Value
            $pdf->Cell($colWidth, 10, utf8_decode($value), 1, 1, 'C');
        }

        // Ajouter le nom de l'application dans le pied de page
        $pdf->SetFont('dejavusans', 'I', 10);
        $pdf->Cell(0, 10, config('app.name'), 0, 0, 'R');

        // Sauvegarder le fichier PDF sur le serveur
        $filename = 'Details_' . date('Y-m-d_H-i-s') . '.pdf';
        $filePath = public_path('pdf/' . $filename);

        // Assurez-vous que le répertoire existe
        if (!file_exists(public_path('pdf'))) {
            mkdir(public_path('pdf'), 0777, true);
        }

        // Sauvegarder le fichier PDF
        $pdf->Output($filePath, 'F');

        // Télécharger directement le fichier PDF
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
