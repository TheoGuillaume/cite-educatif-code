<?php

namespace Config;

use App\Controllers\ModificationActeur;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::home');
$routes->get('/connexion', 'Home::connexion');

//login
$routes->post('/login', 'Home::login');

//logout 
$routes->get('logout', 'Home::logout');

$routes->get('logoutActeur', 'Profil::logout');

$routes->get('/sessionLogin', 'Inscription::sessionLogin');

//Routes Inscription Structure
$routes->get('/inscription/choix', 'Inscription::choix');
$routes->get('/inscription/password', 'Inscription::passwordReset');
$routes->get('/inscription/showPassword/(:num)', 'Inscription::showPassword/$1');
$routes->get('/inscription/changePassword', 'Inscription::changePassword');
$routes->get('/inscription/updatePassword', 'Inscription::updatePassword');


//sendEmail showPassord
$routes->post('/verification_mail', 'SendEmailController::sendEmailVerify');

/* Page utilisateur , sauvgarde type entite niveau session  */
$routes->get('/inscription/utilisateur', 'Inscription::utilisateur');
$routes->post('/inscription/utilisateur', 'Inscription::utilisateur');


// notification
$routes->get('/notification', 'Notification::notification');
$routes->get('/demandeConfirmer/(:segment)/(:segment)', 'Notification::demandeConfirmer/$1/$2');
$routes->get('/demandeRefuser/(:segment)/(:segment)', 'Notification::demandeRefuser/$1/$2');
$routes->get('/demandeRecu/(:num)', 'Notification::demandeRecu/$1');


//Inscription structure
$routes->get('/inscription/structure/inscriptionStructureCreerCompte', 'Inscription::inscriptionStructureCreerCompte');
$routes->post('/inscription/utilisateur/saveUtilisateur', 'Inscription::saveUtilisateur');

$routes->get('/inscription/structure/inscriptionStructureZero', 'Inscription::inscriptionStructureZero');
$routes->post('/inscription/structure/inscriptionStructureZeroSave', 'Inscription::inscriptionStructureZeroSave');

$routes->get('/inscription/structure/inscriptionStructureAntenneZero', 'Inscription::inscriptionStructureAntenneZero');
$routes->post('/inscription/structure/inscriptionStructureAntenneZeroSave', 'Inscription::inscriptionStructureAntenneZeroSave');

$routes->get('/inscription/structure/inscriptionStructureAntenneUn', 'Inscription::inscriptionStructureAntenneUn');

$routes->get('/inscription/structure/inscriptionStructureReferent', 'Inscription::inscriptionStructureReferent');
$routes->post('/inscription/structure/inscriptionStructureReferentSave', 'Inscription::inscriptionStructureReferentSave');


$routes->get('/inscription/structure/inscriptionStructureCategorieZero', 'Inscription::inscriptionStructureCategorieZero');
$routes->post('/inscription/structure/inscriptionStructureCategorieZeroSave', 'Inscription::inscriptionStructureCategorieZeroSave');


$routes->get('/inscription/structure/inscriptionStructureChampAction', 'Inscription::inscriptionStructureChampAction');
$routes->post('/inscription/structure/inscriptionStructureChampActionSave', 'Inscription::inscriptionStructureChampActionSave');

$routes->get('/inscription/structure/inscriptionStructureThematique', 'Inscription::inscriptionStructureThematique');
$routes->post('/inscription/structure/inscriptionStructureThematiqueSave', 'Inscription::inscriptionStructureThematiqueSave');

$routes->get('/inscription/structure/inscriptionStructurePublic', 'Inscription::inscriptionStructurePublic');
$routes->post('/inscription/structure/inscriptionStructurePublicSave', 'Inscription::inscriptionStructurePublicSave');

$routes->get('/inscription/structure/inscriptionStructureParticulariteAction', 'Inscription::inscriptionStructureParticulariteAction');
$routes->post('/inscription/structure/inscriptionStructureParticulariteActionSave', 'Inscription::inscriptionStructureParticulariteActionSave');

$routes->get('/inscription/structure/inscriptionStructureZone', 'Inscription::inscriptionStructureZone');
$routes->post('/inscription/structure/inscriptionStructureZoneSave', 'Inscription::inscriptionStructureZoneSave');

$routes->get('/inscription/structure/inscriptionStructureModalitePublic', 'Inscription::inscriptionStructureModalitePublic');
$routes->post('/inscription/structure/inscriptionStructureModalitePublicSave', 'Inscription::inscriptionStructureModalitePublicSave');

$routes->get('/inscription/structure/inscriptionStructureUploadFile', 'Inscription::inscriptionStructureUploadFile');
$routes->post('/inscription/structure/inscriptionStructureUploadFileSave', 'Inscription::inscriptionStructureUploadFileSave');

$routes->get('/inscription/structure/inscriptionStructureFin', 'Inscription::inscriptionStructureFin');
//Inscription Structure

//Landing Page
$routes->get('/landingPage/landingPageTous', 'LandingPage::landingPageTous');
$routes->get('/landingPage/landingPageDetail/(:num)', 'LandingPage::landingPageDetail/$1');
$routes->get('/landingPage/landindPageResulatCategories/(:num)', 'LandingPage::landindPageResulatCategories/$1');
//Landing Page

$routes->get('/recherche/rechercheFiltre', 'Recherche::rechercheFiltre');
$routes->post('/rechercheResultat', 'Recherche::rechercheResultat');

//Routes Inscription Acteur
$routes->get('/inscription/acteur/inscriptionStructureActeurInfoProf', 'Inscription::inscriptionStructureActeurInfoProf');
//Routes INscription Acteur
$routes->post('/inscription/acteur/inscriptionStructureActeurInfoProf', 'Inscription::saveActeur');

//Routes Profil
$routes->get('/profil', 'Profil::profil');
$routes->post('/modifiePhotoProfil', 'Profil::modifiePhotoProfil');
//Routes Profil


//RouTes Ma structure modifier Informations

$routes->get('/structure/modifier/structureModifierInformationsNom', 'Structure::structureModifierInformationsNom');
$routes->get('/structure/modifier/structureModifierInformations', 'Structure::structureModifierInformations');
$routes->get('/structure/modifier/structureModifierInformationsCategorie', 'Structure::structureModifierInformationsCategorie');
$routes->get('/structure/modifier/structureModifierInformationsModalites', 'Structure::structureModifierInformationsModalites');
$routes->get('/structure/modifier/structureModifierInformationsAdressePrincipal', 'Structure::structureModifierInformationsAdressePrincipal');
$routes->get('/structure/modifier/structureModifierInformationsEmail', 'Structure::structureModifierInformationsEmail');
$routes->get('/structure/modifier/structureModifierInformationsNumero', 'Structure::structureModifierInformationsNumero');
$routes->get('/structure/modifier/structureModifierInformationsActions', 'Structure::structureModifierInformationsActions');
$routes->get('/structure/modifier/structureModifierInformationsThematique', 'Structure::structureModifierInformationsThematique');
$routes->get('/structure/modifier/structureModifierInformationsPublics', 'Structure::structureModifierInformationsPublics');
$routes->get('/structure/modifier/structureModifierInformationsParticulariterAction', 'Structure::structureModifierInformationsParticulariterAction');
$routes->get('/structure/modifier/structureModifierInformationsDescription', 'Structure::structureModifierInformationsDescription');
$routes->get('/structure/modifier/structureModifierExemplesAction', 'Structure::structureModifierExemplesAction');
$routes->get('/structure/modifier/structureModifierDocument', 'Structure::structureModifierDocument');
$routes->get('/structure/modifier/structureModifierInformationsTerritoires', 'Structure::structureModifierInformationsTerritoires');
$routes->get('/structure/modifier/structureModifierHeureOuverture', 'Structure::structureModifierHeureOuverture');
$routes->get('/structure/modifier/structureModifierSiteWeb', 'Structure::structureModifierSiteWeb');
$routes->get('/structure/modifier/structureModifierReferent', 'Structure::structureModifierReferent');
$routes->get('/structure/modifier/deleteDocument/delete/(:num)', 'ModificationStructure::deleteDocument/$1');
//RouTes Ma structure modifier Informations

//Routes desactivation profil structure
$routes->get('/structure/structureDesactivationProfil', 'Structure::structureDesactivationProfil');
//Routes desactivation profil structure


//Routes FaQ
$routes->get('/faq', 'Faq::faq');

//Routes Profil Modification
$routes->get('/profil/modifier/profilModifierInformation', 'Profil::profilModifierInformation');
$routes->get('/profil/modifier/profilModifierNomPrenom', 'Profil::profilModifierNomPrenom');
$routes->get('/profil/modifier/profilModifierPoste', 'Profil::profilModifierPoste');
$routes->get('/profil/modifier/profilModifierNomStructure', 'Profil::profilModifierNomStructure');
$routes->get('/profil/modifier/profilModifierAdressMail', 'Profil::profilModifierAdressMail');
$routes->get('/profil/modifier/profilModifierNumeroTel', 'Profil::profilModifierNumeroTel');
$routes->get('/profil/modifier/profilModifierNumero', 'Profil::profilModifierNumero');


//Routes Profil

//Modification Structure methode post
$routes->post('/updateDescStrcucture', 'ModificationStructure::updateDescStrcucture');
$routes->post('/upadteAdressePrincipal', 'ModificationStructure::upadteAdressePrincipal');
$routes->post('/updateExemplesAction', 'ModificationStructure::updateExemplesAction');
$routes->post('/updateDocument', 'ModificationStructure::updateDocument');
$routes->post('/updateNomstructure', 'ModificationStructure::updateNomstructure');
$routes->post('/updateCategorie', 'ModificationStructure::updateCategorie');
$routes->post('/updateEmail', 'ModificationStructure::updateEmail');
$routes->post('/updateNumeroTel', 'ModificationStructure::updateNumeroTel');
$routes->post('/updateChampAction', 'ModificationStructure::updateChampAction');
$routes->post('/updateThematique', 'ModificationStructure::updateThematique');
$routes->post('/updatePublic', 'ModificationStructure::updatePublic');
$routes->post('/updateParticulariteAction', 'ModificationStructure::updateParticulariteAction');
$routes->post('/updateModaliteInformations', 'ModificationStructure::updateModaliteInformations');
$routes->post('/updateTerritores', 'ModificationStructure::updateTerritores');
$routes->post('/updateJourHorraire', 'ModificationStructure::updateJourHorraire');
$routes->post('/updateSiteWeb', 'ModificationStructure::updateSiteWeb');
$routes->post('/updateReferent', 'ModificationStructure::updateReferent');

//Modification Acteur post method

$routes->post('/updateNameActeur', 'ModificationActeur::updateNameActeur');
$routes->post('/updatePoste', 'ModificationActeur::updatPoste');
$routes->post('/updatePhoneNumber', 'ModificationActeur::updatePhoneNumber');
$routes->post('/updateEmailActeur', 'ModificationActeur::updateEmailActeur');
$routes->post('/modifiePhotoProfilActeur', 'ModificationActeur::modifiePhotoProfilActeur');
$routes->post('/updateNomStruct', 'ModificationActeur::updateNomStruct');


//


//Router Header
$routes->get('/profil', 'Profil::profil');
//

//Map
$routes->get('/getPhotoProfilUser', 'Header::getPhotoProfilUser');

//Admin
$routes->get('/admin', 'Admin\Dashboard::index', ['filter' => 'loginadmin']);
$routes->get('/admin/login', 'Admin\Login::new', ['filter' => 'guest']);
$routes->get('/admin/logout', 'Admin\Login::delete');

//ajax routes
$routes->get('notification/(:segment)/(:segment)', 'Notification::fecthNotification/$1/$2');
$routes->get('detailReferentStructure/(:num)', 'Admin\Structure::detailReferentStructure/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
