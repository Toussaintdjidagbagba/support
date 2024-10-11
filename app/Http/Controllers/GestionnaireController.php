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
use App\Models\Hierarchie;

class GestionnaireController extends Controller
{
    public function dash(Request $request)
    {
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

        /*$entente1 = InterfaceServiceProvider::enAttente(1, $annee);
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
        $indisp4 = InterfaceServiceProvider::indisponibiliteapplication(4, $annee); */

        //dd($diff);

        return view('viewadmindste.dash', compact(
            "ex_tri1",
            "ex_tri2",
            "ex_tri3",
            "ex_tri4",
            /*"entente1",
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
            "indisp4", */
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

        if($datedebut == "")
        {
            $datedebut = date("Y")."-01";
        }

        if($datefin == "")
        {
            $datefin = date("Y")."-12";
        }



        list($yeardebut, $monthdebut) = explode('-', $datedebut);

        list($yearfin, $monthfin) = explode('-', $datefin);

        $yeardebut = (int)$yeardebut;
        $monthdebut = (int)$monthdebut;
        $yearfin = (int)$yearfin;
        $monthfin = (int)$monthfin;

        $datesplage = [];

        // Récupération de tous les mois dans l'interval

        while ($yeardebut < $yearfin || ($yeardebut == $yearfin && $monthdebut <= $monthfin)) {
            $datesplage[] = sprintf("%04d-%02d", $yeardebut, $monthdebut);
            $monthdebut++;
            if ($monthdebut > 12) {
                $monthdebut = 1;
                $yeardebut++;
            }
        }

        $chart_data = array();

        $allhie = Hierarchie::get();

        foreach ($datesplage as $key => $value) {
            list($year, $month) = explode('-', $value);
            $arraymois = ["MOIS" => self::getMonthName((int)$month)];
            foreach ($allhie as $key => $valuehie) {
                $tp = InterfaceServiceProvider::statis((int)$month, (int)$year, $valuehie->id);

                $arraymois[self::stringtovariablename($valuehie->libelle)] = $tp;
            }

            array_push($chart_data, $arraymois);
        }

        return $chart_data;
    }

    public static function stringtovariablename($str) {
        // Supprimer les accents
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        // Supprimer les espaces et les symboles spéciaux
        $str = preg_replace('/[^a-zA-Z0-9]/', '', $str);

        return $str;
    }

    public static function getMonthName($monthNumber) {
        $months = [
            1 => 'Janvier', 2 => 'Fevrier', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Aout',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Decembre'
        ];
        
        return $months[$monthNumber] ?? 'Mois invalide';
    }
}