<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Incident;
use Illuminate\Support\Facades\DB;

class InterfaceServiceProvider extends ServiceProvider
{

    public static function allcategorie()
    {
        return DB::table('categorieoutils')->get();
    }

    public static function alladminandsuperadmin()
    {
        return DB::table('utilisateurs')
        ->join("roles", "roles.idRole", "=", "utilisateurs.Role")
        ->where("roles.idRole", 8) // Super admin
        ->orwhere("roles.idRole", 9) // Technicien
        ->get();
    }

    public static function alletats()
    {
        return DB::table('settings')->where("type", "Etat")->get();
    }

    public static function libetat($id)
    {
        $lib = DB::table('settings')->where("id", $id)->first();
        if ($lib)
            return $lib->libelle;
        else
            return 'En attente';
        //return DB::table('settings')->where("id", $id)->get();
    }

    public static function allutilisateurs()
    {
        return DB::table('utilisateurs')->get();
    }

    public static function allutilisateursadmin()
    {
        return DB::table('utilisateurs')->where('Role', 2)->orwhere('Role', 1)->get();
    }

    public static function getallperiode()
    {
        return DB::table('maintenances')->get();
    }

    public static function getallmaintenacecurative()
    {
        return DB::table('maintenance_curatives')->get();
    }

    public static function getordinateur()
    {
        return DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')
        ->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")
        ->get();
    }

    public static function getUserOutil($id)
    {
        // $ordinateur = DB::table('outils')
        // ->select('outils.user as user', 'outils.id as id')
        // ->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")
        // ->where('categorieoutils.libelle', "Ordinateurs")
        // ->where('outils.id', $id)
        //     ->first();

        //Nouvelle requette; 
        $ordinateur = DB::table('outils')
            ->select('outils.user as user', 'outils.id as id')
            ->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")
            ->where('outils.id', $id)
            ->first();

        if (isset($ordinateur->id)) {
            return InterfaceServiceProvider::LibelleUser($ordinateur->user);
        } else {
            return "";
        }
    }

    public static function periodeMaintenance($id)
    {
        $maintenance = DB::table('maintenances')->where('id', $id)->first();

        if (isset($maintenance->id)) {
            return $maintenance->periodedebut . ' au ' . $maintenance->periodefin;
        } else {
            return '';
        }
    }

    public static function periodeMaintenancecurative($id)
    {
        $maintenance = DB::table('maintenance_curatives')->where('id', $id)->first();

        if (isset($maintenance->id)) {
            return $maintenance->periodedebut . ' au ' . $maintenance->periodefin;
        } else {
            return '';
        }
    }

    public static function getLibOutil($id)
    {
        // $ordinateur = DB::table('outils')->select('outils.nameoutils as nameoutils', 'outils.id as id')->join("categorieoutils", "categorieoutils.id", "=", "outils.categorie")->where('categorieoutils.libelle', "Ordinateurs")->where('outils.id', $id)->first();
        $ordinateur = DB::table('outils')
            ->select('outils.nameoutils as nameoutils', 'outils.id as id', 'categorieoutils.libelle as libelle')
            ->join('categorieoutils', 'categorieoutils.id', '=', 'outils.categorie')
            ->where('outils.id', $id)
            ->first();

        if (isset($ordinateur->id)) {
            return $ordinateur->nameoutils;
        } else {
            return "";
        }
    }

    public static function LibService($id)
    {
        $lib = DB::table('services')->where('id', $id)->first();
        return ($lib) ? $lib->libelle : '';
    }

    public static function recupactionsoutils($id)
    {
        $actions = DB::table('action_outils')
        ->where('Outils', $id)
        ->get();
        return $actions;
    }

    public static function destinataire()
    {
        $alluser = DB::table('utilisateurs')->select('mail as mailR')->where('activereceiveincident', 0)->get();
        $mails = array();
        foreach ($alluser as $value) {
            array_push($mails, $value->mailR);
        }
        return $mails;
    }

    public static function nombredejoursinmois($mois, $annee)
    {
        $mois = mktime(0, 0, 0, $mois, 1, $annee);
        return intval(date("t", $mois));
    }

    public static function statis($mois, $an, $heri)
    {
        $result = Incident::where("hierarchie", $heri);
        //if(session('utilisateur')->Role != 1 || session('utilisateur')->Role != 2)
        //  $result = $result->where("Emetteur", session("utilisateur")->idUser);

        $result = $result->whereMonth('created_at', $mois)
        ->whereYear('created_at', $an)
        ->get()->count();

        return $result;
    }

    public static function getallmoisinan($an)
    {
        date_default_timezone_set('Africa/Porto-Novo');

        $datedebut = $an . "-01-01";

        $datefin = $an . "-12-31";

        $delai =  Carbon::parse($datedebut)->diffInMonths(Carbon::parse($datefin));

        $moisSuivants = [];

        $moisActuel = new Carbon($datedebut);

        for ($i = 0; $i <= $delai; $i++) {
            $moisSuivants[] = InterfaceServiceProvider::convertirMoisAnglaisEnFrancais($moisActuel->copy()->addMonthsNoOverflow($i)->format('F'));
        }

        return $moisSuivants;
    }

    public static function convertirMoisAnglaisEnFrancais($moisEnAnglais)
    {
        $moisEnAnglaisToFrancais = [
            'January' => 'Janvier',
            'February' => 'Février',
            'March' => 'Mars',
            'April' => 'Avril',
            'May' => 'Mai',
            'June' => 'Juin',
            'July' => 'Juillet',
            'August' => 'Août',
            'September' => 'Septembre',
            'October' => 'Octobre',
            'November' => 'Novembre',
            'December' => 'Décembre'
        ];

        return $moisEnAnglaisToFrancais[$moisEnAnglais] ?? null;
    }

    public static function nombrejourstrimestre($trim, $annee)
    {
        $resul = 0;
        switch ($trim) {
            case 1:
                $resul = InterfaceServiceProvider::nombredejoursinmois(1, $annee) + InterfaceServiceProvider::nombredejoursinmois(2, $annee) + InterfaceServiceProvider::nombredejoursinmois(3, $annee);
                break;
            case 2:
                $resul = InterfaceServiceProvider::nombredejoursinmois(4, $annee) + InterfaceServiceProvider::nombredejoursinmois(5, $annee) + InterfaceServiceProvider::nombredejoursinmois(6, $annee);
                break;
            case 3:
                $resul = InterfaceServiceProvider::nombredejoursinmois(7, $annee) + InterfaceServiceProvider::nombredejoursinmois(8, $annee) + InterfaceServiceProvider::nombredejoursinmois(9, $annee);
                break;
            case 4:
                $resul = InterfaceServiceProvider::nombredejoursinmois(10, $annee) + InterfaceServiceProvider::nombredejoursinmois(11, $annee) + InterfaceServiceProvider::nombredejoursinmois(12, $annee);
                break;
            default:
                $resul = 0;
                break;
        }
        return $resul;
    }

    public static function enAttente($trim, $an)
    {
        switch ($trim) {
            case 1:
                return Incident::where('statut', '!=', 1)
                    ->where('DateResolue', null)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '01')
                            ->orWhereMonth('created_at', '02')
                            ->orWhereMonth('created_at', '03');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            case 2:
                return Incident::where('statut', '!=', 1)
                    ->where('DateResolue', null)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '04')
                            ->orWhereMonth('created_at', '05')
                            ->orWhereMonth('created_at', '06');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            case 3:
                return Incident::where('statut', '!=', 1)
                    ->where('DateResolue', null)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '07')
                            ->orWhereMonth('created_at', '08')
                            ->orWhereMonth('created_at', '09');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            case 4:
                return Incident::where('statut', '!=', 1)
                    ->where('DateResolue', null)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '10')
                            ->orWhereMonth('created_at', '11')
                            ->orWhereMonth('created_at', '12');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            default:
                # code...
                break;
        }
    }

    public static function resolue($trim, $an)
    {
        switch ($trim) {
            case 1:
                return Incident::where('statut', '=', 1)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '01')
                            ->orWhereMonth('created_at', '02')
                            ->orWhereMonth('created_at', '03');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            case 2:
                return Incident::where('statut', '=', 1)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '04')
                            ->orWhereMonth('created_at', '05')
                            ->orWhereMonth('created_at', '06');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            case 3:
                return Incident::where('statut', '=', 1)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '07')
                            ->orWhereMonth('created_at', '08')
                            ->orWhereMonth('created_at', '09');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            case 4:
                return Incident::where('statut', '=', 1)
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '10')
                            ->orWhereMonth('created_at', '11')
                            ->orWhereMonth('created_at', '12');
                    })
                    ->whereYear('created_at', '=', $an)
                    ->get()->count();
                break;
            default:
                # code...
                break;
        }
    }

    public static function indisponibiliteapplication($trim, $an)
    {
        switch ($trim) {
            case 1:
                return Incident::select(DB::raw('(FLOOR(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(DateResolue, "%Y-%m-%d %H:%i:%s"), DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s"))) / 60)) as jours'))
                    ->where('statut', 1)
                    ->where(function ($querycat) {
                        $querycat->where('cat', 6)
                            ->orWhere('cat', 3);
                    })
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '01')
                        ->orWhereMonth('created_at', '02')
                        ->orWhereMonth('created_at', '03');
                    })
                    ->whereYear('created_at', $an)
                    ->first();
                break;
            case 2:
                return Incident::select(DB::raw('(FLOOR(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(DateResolue, "%Y-%m-%d %H:%i:%s"), DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s"))) / 60)) as jours'))
                    ->where('statut', 1)
                    ->where(function ($querycat) {
                        $querycat->where('cat', 6)
                            ->orWhere('cat', 3);
                    })
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '04')
                        ->orWhereMonth('created_at', '05')
                        ->orWhereMonth('created_at', '06');
                    })
                    ->whereYear('created_at',  $an)
                    ->first();
                break;
            case 3:
                return Incident::select(DB::raw('(FLOOR(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(DateResolue, "%Y-%m-%d %H:%i:%s"), DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s"))) / 60)) as jours'))
                    ->where('statut', 1)
                    ->where(function ($querycat) {
                        $querycat->where('cat', 6)
                            ->orWhere('cat', 3);
                    })
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '07')
                        ->orWhereMonth('created_at', '08')
                        ->orWhereMonth('created_at', '09');
                    })
                    ->whereYear('created_at', $an)
                    ->first();
                break;
            case 4:
                return Incident::select(DB::raw('(FLOOR(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(DateResolue, "%Y-%m-%d %H:%i:%s"), DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s"))) / 60)) as jours'))
                    ->where('statut', 1)
                    ->where(function ($querycat) {
                        $querycat->where('cat', 6)
                            ->orWhere('cat', 3);
                    })
                    ->where(function ($query) {
                        $query->whereMonth('created_at', '10')
                        ->orWhereMonth('created_at', '11')
                        ->orWhereMonth('created_at', '12');
                    })
                    ->whereYear('created_at', $an)
                    ->first();
                break;
            default:
                # code...
                break;
        }
    }


    public static function LibelleRole($id)
    {
        $role = DB::table('roles')->where('idRole', $id)->first();
        if (isset($role->libelle))
            return $role->libelle;
        return "";
    }

    public static function sexe($sigle)
    {
        if ($sigle == 'M') return "Masculin";
        if ($sigle == 'F') return "Féminin";
    }

    public static function LibelleTech($id)
    {
        $users = DB::table('maintenances')->where('id', $id)->first()->user;

        if (isset($users))
            return InterfaceServiceProvider::LibelleUser($users);
        else
            return "Aucun technicien";
    }

    // public static function LibelleTechCurative($id)
    // {
    //     $users = DB::table('maintenance_curatives')->where('id', $id)->first()->user;

    //     if (isset($users))
    //         return InterfaceServiceProvider::LibelleUser($users);
    //     else
    //         return "Aucun technicien";
    // }

    public static function LibelleTechCurative($id)
    {
        
        $maintenance = DB::table('maintenance_curatives')->where('id', $id)->first();

        if ($maintenance && isset($maintenance->user)) {
            return InterfaceServiceProvider::LibelleUser($maintenance->user);
        } else {
            return "Aucun technicien";
        }
    }

    public static function LibelleUser($id)
    {
        $user = DB::table('utilisateurs')->where('idUser', $id)->first();
        if (isset($user->nom))
            return $user->nom . ' ' . $user->prenom;
        else
            return "En attente";
    }

    public static function LibelleCategorie($id)
    {
        $libcat = DB::table('categorieoutils')->where('id', $id)->first();
        if (isset($libcat->libelle))
            return $libcat->libelle;
        else
            return "";
    }

    public static function AllRole()
    {
        return DB::table('roles')->get();
    }

    public static function AllService()
    {
        return DB::table('services')->get();
    }

    public static function LibelleService($id)
    {
        if ($id == null)
            return "";
        return DB::table('services')->where('id', $id)->first()->libelle;
    }

    public static function AllCat()
    {
        return DB::table('categories')->get();
    }

    public static function LibelleCat($id)
    {
        $lib = DB::table('categories')->where('id', $id)->first();
        return ($lib) ? $lib->libelle : '';
    }


    // a supprimer
    public static function TempsCat($id)
    {
        $lib = DB::table('categories')->where('id', $id)->first();
        return ($lib) ? $lib->tmpCat : '';
    }

    // a supprimer
    public static function TempsCats($idIncid, $idCat, $created_at)
    {
        $delai = DB::table('categories')->where('id', $idCat)->first()->tmpCat ?? ""; //recuperation du délai
        $valeurDelai = (int)$delai;
        $uniteDelai = 'h';

        $secondesDelai = $valeurDelai * 3600;

        $timestampEmission = strtotime($created_at); //je convertir la date de création en timestamp
        $timestampLimite = $timestampEmission + $secondesDelai; // je calculer la date limite

        $timestampNow = time();

        // Calculer le temps restant
        $tempsRestant = $timestampLimite - $timestampNow;
        $etat = Incident::where('id', $idIncid)->first() ?? ""; // On verifie l'état actuel ou l'utilisateur actuel affecter de l'incident
        $tempsRestantFormate = "Non definire";
        if (!isset($etat)) {
            if (($etat->etat != 0 || $etat->etat != null) || ($etat->affecter != 0 || $etat->affecter != null)) {
                $tempsRestantFormate = "Prise en compte";
            } else {
                if ($tempsRestant > 0) {
                    $heuresRestantes = floor($tempsRestant / 3600);
                    $minutesRestantes = floor(($tempsRestant % 3600) / 60);
                    $secondesRestantes = $tempsRestant % 60;
                    $tempsRestantFormate = sprintf('%02d h %02d m %02d s', $heuresRestantes, $minutesRestantes, $secondesRestantes);
                } else {
                    $tempsRestantFormate = "Temps écoulé";
                }
            }
        }
        return $tempsRestantFormate;
    }

    public static function AllHie()
    {
        return DB::table('hierarchies')->get();
    }

    public static function LibelleHier()
    {
        $id = $_COOKIE['hierarchie'] ?? "";
        $lib = DB::table('hierarchies')->where('id', $id)->first();
        return ($lib) ? $lib->libelle : 'R';
    }

    public static function libmenu($id)
    {
        if ($id == 0) {
            return '';
        } else
            return DB::table('menus')->where('idMenu', $id)->first()->libelleMenu;
    }
    public static function recupactions($value)
    {
        return DB::table('action_menus')->where('Menu', $value)->get();
    }

    public static function actionMenu($menu)
    {
        return DB::table('action_menus')->where('Menu', $menu)->get();
    }

    public static function infomenu($id)
    {
        return DB::table('menus')->where('idMenu', $id)->first();
    }

    public static function verifie_ss($ssm)
    {
        $allmenu_sous = DB::table('action_menu_acces')->join('menus', "menus.idMenu", "=", "action_menu_acces.Menu")->select('Menu', 'Topmenu_id')->where('Role', session('utilisateur')->Role)->where('Topmenu_id', '<>', 0)->where('action_menu_acces.statut', 0)->orderby('num_ordre', 'ASC')->get();

        $val = false;
        foreach ($allmenu_sous as $all) {
            if ($all->Topmenu_id == $ssm) {
                $val = true;
            }
        }
        return $val;
    }
}