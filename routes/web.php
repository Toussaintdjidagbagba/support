<?php

use App\Exports\MaintPreventiveExport;
use App\Http\Controllers\CategorieOutilsController;
use App\Http\Controllers\IncidentAdminController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\OutilController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes 
| Dev :	MDP-DEST
*/

Route::get('/testr', 'App\Http\Controllers\GestionnaireController@traitement')->name('traite');

Route::get('/cach',function () 
{
    Artisan::call('Config:cache');
});

Route::get('/', 'App\Http\Controllers\LoginController@login')->name('hoL');
Route::get('/test', 'App\Http\Controllers\GestionnaireController@statis');
Route::get('/connexion', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/loginapi', 'App\Http\Controllers\LoginController@loginapi')->name('logapi');
Route::post('/connexion', 'App\Http\Controllers\LoginController@authenticate')->name('loginS');
Route::get('/register', 'App\Http\Controllers\LoginController@getregister')->name('register');
Route::post('/setregister', 'App\Http\Controllers\LoginController@setregister')->name('sregister');
Route::get('/mot-de-passe-oublié', 'App\Http\Controllers\LoginController@passmodif')->name('pass');

Route::fallback(function() {
   return view('vendor.error.404');
});

Route::group([
    'middleware' => 'App\Http\Middleware\Autorisation' 
  
], function(){
	
	Route::get('/deconnexion', 'App\Http\Controllers\LoginController@logout')->name('logout');
	
	Route::get('/apilogin', 'App\Http\Controllers\GestionnaireController@apilogin')->name('apiloginS');

	///////////////////////////////////** Utilisateur **///////////////////////////////////////////////////////////////

	Route::get('/dashboard', 'App\Http\Controllers\GestionnaireController@dash')->name('dashboard');
	Route::post('/statistique', 'App\Http\Controllers\GestionnaireController@statis')->name('getstatistique');
	Route::get('/utilisateur', 'App\Http\Controllers\UtilisateurController@getuser')->name('GU');
	Route::post('/utilisateur', 'App\Http\Controllers\UtilisateurController@adduser')->name('setuser');
	Route::get('/delete-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@deleteuser')->name('DU');
	Route::get('/reinitialiser-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@reinitialiseruser')->name('RU');
	Route::get('/desactivé-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@desactiveuser')->name('DSU');
	Route::get('/activé-utilisateur-{id}', 'App\Http\Controllers\UtilisateurController@activeuser')->name('ATU');
	Route::get('/desactive-mail-{id}', 'App\Http\Controllers\UtilisateurController@desactiveusermail')->name('DSUM');
	Route::get('/active-mail-{id}', 'App\Http\Controllers\UtilisateurController@activeusermail')->name('ATUM');
	Route::get('/modif-utilisateur', 'App\Http\Controllers\UtilisateurController@getmodifyuser')->name('MTU');
	Route::post('/modif-utilisateur', 'App\Http\Controllers\UtilisateurController@modifyuser')->name('MTUS');

	//////////////////////////////////** Rôle **//////////////////////////////////////////////////////////////////////
	Route::get('/listroles', 'App\Http\Controllers\RoleController@listrole')->name('GR');
	Route::post('/roles', 'App\Http\Controllers\RoleController@addrole')->name('AR');
	Route::get('/modif-roles-{id}', 'App\Http\Controllers\RoleController@getmodifrole')->name('MTR');
	Route::get('/delete-roles-{id}', 'App\Http\Controllers\RoleController@deleterole')->name('DR');
	Route::get('/menu-roles-{id}', 'App\Http\Controllers\RoleController@getmenurole')->name('MRR');
	Route::post('/menu-roles', 'App\Http\Controllers\RoleController@setmenurole')->name('MenuAttr');
	Route::post('/modif-roles', 'App\Http\Controllers\RoleController@modifrole')->name('SRL');
 

	//////////////////////////////////** Menu **//////////////////////////////////////////////////////////////////////
	Route::get('/listmenus', 'App\Http\Controllers\MenuController@getmenu')->name('GM');
	Route::post('/listmenus', 'App\Http\Controllers\MenuController@setmenu')->name('Menu_add');
	Route::get('/delete-menu-{id}', 'App\Http\Controllers\MenuController@delmenu')->name('DM');
	Route::get('/modif-menu-{id}', 'App\Http\Controllers\MenuController@getmodifmenu')->name('MTM');
	Route::post('/modif-menu', 'App\Http\Controllers\MenuController@setmodifmenu')->name('SML');
	Route::post('/action-menu', 'App\Http\Controllers\MenuController@setactionmenu')->name('Actionsave');
	Route::get('/action-menu-{id}', 'App\Http\Controllers\MenuController@getactionmenu')->name('ActionGet');

	//////////////////////////////////** Categorie d'incident **//////////////////////////////////////////////////////
	Route::get('/listcategories', 'App\Http\Controllers\CategorieController@listcat')->name('GC');
	Route::post('/categories', 'App\Http\Controllers\CategorieController@addcat')->name('AC');
	Route::get('/modif-categories-{id}', 'App\Http\Controllers\CategorieController@getmodifcat')->name('MTC');
	Route::post('/delete-categories', 'App\Http\Controllers\CategorieController@deletecat')->name('DC');
	Route::post('/modif-categories', 'App\Http\Controllers\CategorieController@modifcat')->name('SCL');

	//////////////////////////////////** Categorie d'outils **////////////////////////////////////////////////////////
	Route::get('/listcategoriesoutils', 'App\Http\Controllers\CategorieOutilsController@listcat')->name('GCO');
	Route::get('/actions/outils', 'App\Http\Controllers\CategorieOutilsController@listactionsoutils')->name('LAOS');
	Route::get('/listcategorie/actions/outils', 'App\Http\Controllers\CategorieOutilsController@listcatactionsoutils')->name('LCAO');
	Route::post('/categories-outils', 'App\Http\Controllers\CategorieOutilsController@addcat')->name('ACO');
	Route::post('/outil/actions', 'App\Http\Controllers\CategorieOutilsController@addactionsoutils')->name('AAO');
	Route::get('/delete-categoriesoutils', 'App\Http\Controllers\CategorieOutilsController@deletecat')->name('DCO');
	Route::post('/modif-categoriesoutils', 'App\Http\Controllers\CategorieOutilsController@modifcat')->name('SCLO');
	Route::post('/ajout-champs-categories-outils', 'App\Http\Controllers\CategorieOutilsController@setchampcaracteristiqueoutil')->name('SCCLO');
	// Get All Champ In Catégorie
	Route::get('/getchamp', 'App\Http\Controllers\CategorieOutilsController@getchampcategorie')->name('GACIC');


	//////////////////////////////////** Hierarchie **////////////////////////////////////////////////////////////////
	Route::get('/listhierarchies', 'App\Http\Controllers\HierarchieController@listhie')->name('GH');
	Route::post('/hiérarchies', 'App\Http\Controllers\HierarchieController@addhie')->name('AH');
	Route::get('/modif-hierarchies-{id}', 'App\Http\Controllers\HierarchieController@getmodifhie')->name('MHC');
	Route::post('/delete-hierarchies', 'App\Http\Controllers\HierarchieController@deletehie')->name('DH');
	Route::post('/modif-hierarchies', 'App\Http\Controllers\HierarchieController@modifhie')->name('SHL');

	//////////////////////////////////** Service **///////////////////////////////////////////////////////////////////
	Route::get('/listservices', 'App\Http\Controllers\ServiceController@listserv')->name('GS');
	Route::post('/services', 'App\Http\Controllers\ServiceController@addserv')->name('AS');
	Route::get('/modif-services-{id}', 'App\Http\Controllers\ServiceController@getmodifserv')->name('MSC');
	Route::post('/delete-services', 'App\Http\Controllers\ServiceController@deleteserv')->name('DS');
	Route::post('/modif-services', 'App\Http\Controllers\ServiceController@modifserv')->name('SSL');

	//////////////////////////////////** Etat / Avis **///////////////////////////////////////////////////////////////
	Route::get('/settings-etat', 'App\Http\Controllers\SettingController@list')->name('GETAT');
	Route::post('/settings-etat', 'App\Http\Controllers\SettingController@add')->name('AETAT');
	Route::get('/modif-settings-etat-{id}', 'App\Http\Controllers\SettingController@getmodif')->name('METAT');
	Route::get('/delete-settings-etat-{id}', 'App\Http\Controllers\SettingController@delete')->name('DMETAT');
	Route::post('/modif-settings-etat', 'App\Http\Controllers\SettingController@modif')->name('SMETAT');

	///////////////////////////////////** Incident Client **//////////////////////////////////////////////////////////

	Route::get('/incident', 'App\Http\Controllers\IncidentController@getincident')->name('GI');
	Route::post('/incident', 'App\Http\Controllers\IncidentController@setincident')->name('GIS');
	Route::get('/delete-incident-{id}', 'App\Http\Controllers\IncidentController@deleteincident')->name('DI');
	Route::get('/modif-incident-{id}', 'App\Http\Controllers\IncidentController@getmodifyincident')->name('MTI');
	Route::post('/modif-incident', 'App\Http\Controllers\IncidentController@modifyincident')->name('MTIS');
	Route::get('/avis', 'App\Http\Controllers\IncidentController@valideavis')->name('GIAvis');

	///////////////////////////////////** Incident Admin **///////////////////////////////////////////////////////////

	Route::get('/incidents', 'App\Http\Controllers\IncidentAdminController@getincident')->name('GIA');
	Route::post('/incidents', 'App\Http\Controllers\IncidentAdminController@setincident')->name('GISA');
	Route::get('/delete-incidents-{id}', 'App\Http\Controllers\IncidentAdminController@deleteincident')->name('DIA');
	Route::get('/modif-incidents-{id}', 'App\Http\Controllers\IncidentAdminController@getmodifyincident')->name('MTIA');
	Route::post('/modif-incidents', 'App\Http\Controllers\IncidentAdminController@modifyincident')->name('MTISA');

	Route::post('/changementEtat', 'App\Http\Controllers\IncidentAdminController@changetatincident')->name('CEI');
	Route::post('/AfferterIncident', 'App\Http\Controllers\IncidentAdminController@affecterincident')->name('AII');
	Route::get('/exportexcel', 'App\Http\Controllers\IncidentAdminController@exporterexcel')->name('EEID');
	Route::get('/aide', 'App\Http\Controllers\GestionnaireController@getaide')->name('MAD');
	
	//////////////////////////////////** OUtils **////////////////////////////////////////////////////////////////
	Route::get('/listoutils', 'App\Http\Controllers\OutilController@list')->name('GO');
	Route::get('/getchampcat', 'App\Http\Controllers\OutilController@getallchamp')->name('GCCO');
	Route::get('/actions/libelle/outils', 'App\Http\Controllers\OutilController@libelleactionsoutils')->name('LAO');
	Route::post('/outil', 'App\Http\Controllers\OutilController@add')->name('AO');
	Route::post('/affectation', 'App\Http\Controllers\OutilController@affectUserInOutil')->name('PAOU');
	Route::get('/getallusers', 'App\Http\Controllers\OutilController@getalluserssys')->name('GAUS');
	Route::post('/reaffectation', 'App\Http\Controllers\OutilController@reaffecteruser')->name('RAOU');
	Route::get('/gethistoutil', 'App\Http\Controllers\OutilController@gethistoutilsys')->name('GHO');
	Route::get('/getdetailoutil', 'App\Http\Controllers\OutilController@getdetailoutilsys')->name('GDOS');
	Route::get('/getdetailoutilforupdate', 'App\Http\Controllers\OutilController@getdetailoutilforupdatesys')->name('GDOSU');
	Route::post('/updateoutil', 'App\Http\Controllers\OutilController@setupdateoutil')->name('UO');
	Route::post('/deleteoutil', 'App\Http\Controllers\OutilController@setdeleteoutil')->name('DO');
	Route::post('/definitionetatoutil', 'App\Http\Controllers\OutilController@setdefinitionetatoutil')->name('DEO');
	Route::post('/export-pdf-detail', 'App\Http\Controllers\OutilController@exportPDFDetail')->name('export-pdf-detail');
	


	//////////////////////////////////** Maintenance préventive **/////////////////////////////////////
	Route::get('/listmaintenance', 'App\Http\Controllers\MaintenanceController@list')->name('GMPC');
	Route::post('/programmermaintenance', 'App\Http\Controllers\MaintenanceController@addmaintenance')->name('SMPC');
	Route::post('/deletemaintenance', 'App\Http\Controllers\MaintenanceController@setdeletemaintenance')->name('DPC');
	Route::post('/definitionetatmaintenance', 'App\Http\Controllers\MaintenanceController@setdefinitionetatmaintenance')->name('DEPC');
	Route::post('/updatemaintenance', 'App\Http\Controllers\MaintenanceController@setupdatemaintenance')->name('UPC');
	Route::get('/detailmaintenances', 'App\Http\Controllers\MaintenanceController@listesordinateurs')->name('GMDPC');
	Route::get('/exportmaintenances', 'App\Http\Controllers\MaintenanceController@exportexcel')->name('EMPC');
	Route::get('/exportmaintenancepdf-{id}', 'App\Http\Controllers\MaintenanceController@getexportmaintenancepdf')->name('GEMP');
	
	//////////////////////////////////** Maintenance Curative **/////////////////////////////////////
	Route::get('/listmaintenancecurative', 'App\Http\Controllers\MaintenanceController@listmaintenancecurative')->name('LMC');
	Route::get('/detailmaintenancescurative', 'App\Http\Controllers\MaintenanceController@detailsmaintenacecurative')->name('GDMC');
	Route::get('/gestionmaintenancecurative', 'App\Http\Controllers\MaintenanceController@listgestionmaintenancecurative')->name('GMC');
	Route::post('/maintenancescurative', 'App\Http\Controllers\MaintenanceController@addmaintenancecuartive')->name('ADDMC');
	Route::post('/traitement/maintenancescurative', 'App\Http\Controllers\MaintenanceController@traitementmaintenancecurative')->name('TMC');
	Route::post('/definitionetatmaintenancecurative', 'App\Http\Controllers\MaintenanceController@setdefinitionetatmaintenancecurative')->name('DEMC');
	Route::post('/updatemaintenancecurative', 'App\Http\Controllers\MaintenanceController@setupdatemaintenancecurative')->name('SUMC');
	Route::post('/deletemaintenancecurative', 'App\Http\Controllers\MaintenanceController@setdeletemaintenancecurative')->name('DMCR');
	Route::post('/updatedefinitionmaintenancescurative', 'App\Http\Controllers\MaintenanceController@setupdatedefinitionmaintenancescurative')->name('SUMUC');
	Route::post('/deletemaintenancesgestion', 'App\Http\Controllers\MaintenanceController@setdeletegmaintenancecurative')->name('DGMC');

	//////////////////////////////////** Commentaire Maintenance préventive ou curative **//////////////////////////
	Route::get('/maintenances', 'App\Http\Controllers\MaintenanceController@listordinateurmaintenance')->name('GMU');
	Route::post('/maintenances', 'App\Http\Controllers\MaintenanceController@traitementmaintenance')->name('SMU');
	Route::post('/deletemaintenances', 'App\Http\Controllers\MaintenanceController@setdeletegmaintenance')->name('DMU');
	Route::post('/updatedefinitionmaintenances', 'App\Http\Controllers\MaintenanceController@setupdatedefinitionmaintenances')->name('SUMU');
	Route::get('/commentaire', 'App\Http\Controllers\MaintenanceController@validecommentaire')->name('CMU');

	//////////////////////////////////** Les Exports **//////////////////////////
	Route::post('export-incident', [IncidentAdminController::class, 'exportincident'])->name('incident.export');
	Route::post('export-outils', [OutilController::class, 'exportoutils'])->name('outils.export');
	
	Route::get('/outilshisto/export', 'App\Http\Controllers\OutilController@expoutilhisto')->name('outilshisto.export');

	// Route::post('export-maintenancepreventive', [MaintenanceController::class, 'expmaintpre'])->name('export.mainte');
	Route::get('export-maintenancepreventive', [MaintenanceController::class, 'expmaintpre'])->name('export.mainte');




});
	
/* 
|--------------------------------------------------------------------------
| Web Routes 
| Dev :	MDP-DEST
*/