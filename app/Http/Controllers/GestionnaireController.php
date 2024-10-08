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
    public function dash(Request $request)
    {
        // if (session("utilisateur")->Role == 1 || session("utilisateur")->Role == 8 || session("utilisateur")->activereceiveincident == 0) { // super admin
        //     $lists = Incident::query()->orderBy('incidents.created_at', 'desc');
        //     if ($request->has('q') != "" && $request->has('q') != null) {
        //         $recherche = htmlspecialchars(trim($request->q));
        //         $list = $lists->where('Module', 'like', '%' . $recherche . '%')
        //             ->orWhere('DateEmission', 'like', '%' . $recherche . '%')
        //             ->orWhere('etat', 'like', '%' . $recherche . '%')
        //             // ->orWhere('hierarchie', 'like', '%' . $recherche . '%')
        //             ->paginate(100);
        //     }
        //     $list = $lists->paginate(100);
        // } else {
        //     // Afficher les incidents reçu
        //     $lists = Incident::query()->where("affecter", session("utilisateur")->affecter)->orderBy('incidents.created_at', 'desc');
        //     if ($request->has('q') != "" && $request->has('q') != null) {
        //         $recherche = htmlspecialchars(trim($request->q));
        //         $list = $lists->where('Module', 'like', '%' . $recherche . '%')
        //             ->orWhere('DateEmission', 'like', '%' . $recherche . '%')
        //             ->orWhere('etat', 'like', '%' . $recherche . '%')
        //             // ->orWhere('hierarchie', 'like', '%' . $recherche . '%')
        //             ->paginate(100);
        //     }
        //     $list = $lists->paginate(100);
        // }

        setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR', 'fr', 'fr', 'fra', 'fr_FR@euro');
        date_default_timezone_set('Africa/Porto-Novo');

        $nombreheuretravail = 8; // 8h 

        $start_date = strtotime(date('Y') . '-01-01');
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

        return view('viewadmindste.dash', compact(
            "ex_tri1",
            "ex_tri2",
            "ex_tri3",
            "ex_tri4",
            "entente1",
            "entente2",
            "entente3",
            "entente4",
            "resolu1",
            "resolu2",
            "resolu3",
            "resolu4",
            "indisp1",
            "indisp2",
            "indisp3",
            "indisp4",
        ));
    }

    public function getaide()
    {
        return view('viewadmindste.aide');
    }

    public static function statis(Request $request)
    {

        $datedebut = $request->periodedebut;
        $datefin = $request->periodefin;

        $allmois = InterfaceServiceProvider::getallmoisinan(2024);

        $chart_data = array();

        foreach ($allmois as $key => $value) {
            $tpb = InterfaceServiceProvider::statis(($key + 1), 2024, 3);
            $tpg = InterfaceServiceProvider::statis(($key + 1), 2024, 2);
            $tpc = InterfaceServiceProvider::statis(($key + 1), 2024, 4);

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