<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\InterfaceServiceProvider;
use DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use App\Exports\Export;
use Illuminate\Support\Facades\Storage;
use App\Http\Import\ImportExcel;
use App\Models\Incident;

class GestionnaireController extends Controller
{
    // A enlever 

    public function traitement()
    {
        $directory = 'C:\Users\emmanuel.djidagbagba\Downloads\comaout\commission'; // Remplacez par le chemin de votre répertoire
        
        // Ouvrir le répertoire
        if ($handle = opendir($directory)) {
            while (false !== ($file = readdir($handle))) {
                // Ignorer les entrées spéciales . et ..
                if ($file != '.' && $file != '..') {
                    // Vérifier si le fichier contient le mot à remplacer
                        // Nouveau nom de fichier
                        $newName = substr($file, 0, -16)."Aout 2024.pdf";
                        // Renommer le fichier
                        rename($directory . '/' . $file, $directory . '/' . $newName);
                        echo "Renommé: $file en $newName\n";
                    
                }
            }
            closedir($handle);
        } else {
            echo "Impossible d'ouvrir le répertoire.";
        }
    }

    // A enlever 
    public function traitementr(Request $request)
    {
        
            $path = "document/upload/emp.xlsx";

            $tab = Excel::toArray( new ImportExcel, $path);
            $commissions = $tab[0];

            //dd($tab[1]);

            $tabl[0]["login"] = " Login ";
            $tabl[0]["nom"] = " Nom  ";
            $tabl[0]["prenom"] = " Prénoms ";
            $tabl[0]["tel"] = "Téléphone";
            $tabl[0]["email"] = " Email ";
            $tabl[0]["role"] = " Rôle ";
            $tabl[0]["coeagence"] = " Agence ";
            $tabl[0]["agence"] = " Lib Agence ";
            
            for ($i=1; $i < count($commissions); $i++) { 
                $commission = $commissions[$i];
                $agence = $commission[7];
                $codeagence = 0;
                for ($j=1; $j < count($tab[1]); $j++) {
                    
                    if(strcasecmp(trim($tab[1][$j][1]), trim($agence)) == 0 )
                        $codeagence = $tab[1][$j][0];
                }

                $nom = "";
                $prenom = "";

                if($commission[2] == "" || $commission[2] == null)
                {
                    $table_nom = explode(" ", $commission[1]);
                    $nom = $table_nom[0];
                    $prenoms = str_replace($table_nom[0], "", $commission[1]);
                    $prenom= $prenoms;
                }else{
                    $nom = $commission[1];
                    $prenom = $commission[2];
                }

                $tabl[$i]["login"] = strtolower(substr( trim($prenom), 0, 1).substr( trim($nom), 1));
                
                $tabl[$i]["nom"] = $nom;
                $tabl[$i]["prenom"] = $prenom;
                
                $tabl[$i]["tel"] = $commission[3];
                $tabl[$i]["email"] = $commission[4];
                $tabl[$i]["role"] = $commission[5];
                $tabl[$i]["coeagence"] = $codeagence;
                $tabl[$i]["agence"] = $commission[7];

            }

            // Exporter tous les commissions 
            $autre = new Collection($tabl);
            Session()->put('traite', $autre);
            
            return Excel::download(new Export, "Emppp.xlsx");
        
    }

    public function dash()
    {
    	setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
        date_default_timezone_set('Africa/Porto-Novo');

        $nombreheuretravail = 8; // 8h 

    	$start_date = strtotime(date('Y').'-01-01');
		$end_date = strtotime(date('Y-m-d'));
		
		$annee = date('Y');
		
		//$annee = "2022";


		//dd(($end_date - $start_date)/60/60/24);

		// Temps en mn de disponibilité des applications
    	$ex_tri1 = InterfaceServiceProvider::nombrejourstrimestre(1, $annee) * $nombreheuretravail * 60;
    	$ex_tri2 = InterfaceServiceProvider::nombrejourstrimestre(2, $annee) * $nombreheuretravail * 60;
    	$ex_tri3 = InterfaceServiceProvider::nombrejourstrimestre(3, $annee) * $nombreheuretravail * 60;
    	$ex_tri4 = InterfaceServiceProvider::nombrejourstrimestre(4, $annee) * $nombreheuretravail * 60;

    	$entente1 = InterfaceServiceProvider::enAttente(1, $annee);
    	$entente2 = InterfaceServiceProvider::enAttente(2, $annee);
    	$entente3 = InterfaceServiceProvider::enAttente(3, $annee);
    	$entente4 = InterfaceServiceProvider::enAttente(4, $annee);

    	$resolu1 = InterfaceServiceProvider::resolue(1, $annee);
    	$resolu2 = InterfaceServiceProvider::resolue(2, $annee);
    	$resolu3 = InterfaceServiceProvider::resolue(3, $annee);
    	$resolu4 = InterfaceServiceProvider::resolue(4, $annee);

    	$indisp1 = InterfaceServiceProvider::indisponibiliteapplication(1, $annee);
    	$indisp2 = InterfaceServiceProvider::indisponibiliteapplication(2, $annee);
    	$indisp3 = InterfaceServiceProvider::indisponibiliteapplication(3, $annee);
    	$indisp4 = InterfaceServiceProvider::indisponibiliteapplication(4, $annee);
    	
    	//dd($diff);

        return view('viewadmindste.dash', compact("ex_tri1", "ex_tri2", "ex_tri3", "ex_tri4", "entente1", "entente2", "entente3", "entente4", 
    									  "resolu1", "resolu2", "resolu3", "resolu4", "indisp1", "indisp2", "indisp3", "indisp4"));
    }
    
    public function getaide(){
        return view('viewadmindste.aide');
    }

    public static function statis(Request $request)
    {

        $datedebut = $request->periodedebut;
        $datefin = $request->periodefin;

        $allmois = InterfaceServiceProvider::getallmoisinan(2024);

        $chart_data = array();
        
        foreach ($allmois as $key => $value) {
            $tpb = InterfaceServiceProvider::statis(($key+1), 2024 , 3);
            $tpg = InterfaceServiceProvider::statis(($key+1), 2024 , 2);
            $tpc = InterfaceServiceProvider::statis(($key+1), 2024 , 4);

            $array = ["MOIS" => $value, "genant" => $tpb, "moyen" => $tpg, "faible" => $tpc];
            array_push($chart_data, $array);
        }

        return $chart_data;
        /*
        $tpb = InterfaceServiceProvider::statis(1, 3);
        $tpg = InterfaceServiceProvider::statis(1, 2);
        $tpc = InterfaceServiceProvider::statis(1, 4);

        $tdb = InterfaceServiceProvider::statis(2, 3);
        $tdg = InterfaceServiceProvider::statis(2, 2);
        $tdc = InterfaceServiceProvider::statis(2, 4);

        $ttb = InterfaceServiceProvider::statis(3, 3);
        $ttg = InterfaceServiceProvider::statis(3, 2);
        $ttc = InterfaceServiceProvider::statis(3, 4);

        $tqb = InterfaceServiceProvider::statis(4, 3);
        $tqg = InterfaceServiceProvider::statis(4, 2);
        $tqc = InterfaceServiceProvider::statis(4, 4);

        $chart_data = "{ MOIS:'Janvier', genant:$tpb, moyen:$tpg, faible:$tpc},
        { MOIS:'Février', genant:$tdb, moyen:$tdg, faible:$tdc}, 
        { MOIS:'Mars', genant:$ttb, moyen:$ttg, faible:$ttc}, 
        { MOIS:'Avril', genant:$tqb, moyen:$tqg, faible:$tqc}, 
        { MOIS:'Mai', genant:5, moyen:2, faible:9},
        { MOIS:'Juin', genant:2, moyen:8, faible:0},
        { MOIS:'Juillet', genant:5, moyen:8, faible:7},
        { MOIS:'Août', genant:5, moyen:5, faible:12},
        { MOIS:'Septembre', genant:3, moyen:2, faible:1},
        { MOIS:'Octobre', genant:$tqb, moyen:$tqg, faible:$tqc},
        { MOIS:'Novembre', genant:$tqb, moyen:$tqg, faible:$tqc},
        { MOIS:'Décembre', genant:$tqb, moyen:$tqg, faible:$tqc}
        "; */
    }
}
