<?php

namespace Config;

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
$routes->get('/', 'Home::connexion');

//Routes Inscription Structure
$routes->get('/inscription/structure/inscriptionStructureCreerCompte', 'Inscription::inscriptionStructureCreerCompte');
$routes->post('/inscription/utilisateur/saveUtilisateur', 'Inscription::saveUtilisateur');

$routes->get('/inscription/structure/inscriptionStructureZero', 'Inscription::inscriptionStructureZero');


$routes->get('/inscription/structure/inscriptionStructureAntenneZero', 'Inscription::inscriptionStructureAntenneZero');
$routes->get('/inscription/structure/inscriptionStructureAntenneUn', 'Inscription::inscriptionStructureAntenneUn');
$routes->get('/inscription/structure/inscriptionStructureReferent', 'Inscription::inscriptionStructureReferent');
$routes->get('/inscription/structure/inscriptionStructureCategorieZero', 'Inscription::inscriptionStructureCategorieZero');
$routes->get('/inscription/structure/inscriptionStructureCategorieUn', 'Inscription::inscriptionStructureCategorieUn');
$routes->get('/inscription/structure/inscriptionStructureChampAction', 'Inscription::inscriptionStructureChampAction');
$routes->get('/inscription/structure/inscriptionStructureThematique', 'Inscription::inscriptionStructureThematique');
$routes->get('/inscription/structure/inscriptionStructurePublic', 'Inscription::inscriptionStructurePublic');
$routes->get('/inscription/structure/inscriptionStructureParticulariteAction', 'Inscription::inscriptionStructureParticulariteAction');
$routes->get('/inscription/structure/inscriptionStructureZone', 'Inscription::inscriptionStructureZone');
$routes->get('/inscription/structure/inscriptionStructureModalitePublic', 'Inscription::inscriptionStructureModalitePublic');
$routes->get('/inscription/structure/inscriptionStructureUploadFile', 'Inscription::inscriptionStructureUploadFile');
$routes->get('/inscription/structure/inscriptionStructureFin', 'Inscription::inscriptionStructureFin');
//Routes Inscription Structure

//Routes Inscription Acteur
$routes->get('/inscription/acteur/inscriptionStructureActeurInfoProf', 'Inscription::inscriptionStructureActeurInfoProf');
//Routes INscription Acteur

//Routes Inscription LandingPage
$routes->get('/landingPage/landingPageTous', 'LandingPage::landingPageTous');
$routes->get('/landingPage/landindPageCategories', 'LandingPage::landindPageCategories');
$routes->get('/landingPage/landindPageResulatCategories', 'LandingPage::landindPageResulatCategories');
//Routes Inscription LandingPage

//Routes Recherche
$routes->get('/recherche/rechercheFiltre', 'Recherche::rechercheFiltre');
$routes->get('/recherche/rechercheResultat', 'Recherche::rechercheResultat');
//Routes Recherche

//Route Structure
$routes->get('/structure/structureVueVisiteur', 'Structure::structureVueVisiteur');
$routes->get('/structure/structureVueVisiteurSignalement', 'Structure::structureVueVisiteurSignalement');
//Route Structure

//RouTes Ma structure modifier Informations
$routes->get('/structure/modifier/structureModifierInformations', 'Structure::structureModifierInformations');
$routes->get('/structure/modifier/structureModifierInformationsCategorie', 'Structure::structureModifierInformationsCategorie');
$routes->get('/structure/modifier/structureModifierInformationsAdressePrincipal', 'Structure::structureModifierInformationsAdressePrincipal');
$routes->get('/structure/modifier/structureModifierInformationsEmail', 'Structure::structureModifierInformationsEmail');
$routes->get('/structure/modifier/structureModifierInformationsNumero', 'Structure::structureModifierInformationsNumero');
$routes->get('/structure/modifier/structureModifierInformationsActions', 'Structure::structureModifierInformationsActions');
$routes->get('/structure/modifier/structureModifierInformationsThematique', 'Structure::structureModifierInformationsThematique');
$routes->get('/structure/modifier/structureModifierInformationsPublics', 'Structure::structureModifierInformationsPublics');
$routes->get('/structure/modifier/structureModifierInformationsParticulariterAction', 'Structure::structureModifierInformationsParticulariterAction');
$routes->get('/structure/modifier/structureModifierInformationsDescription', 'Structure::structureModifierInformationsDescription');
//RouTes Ma structure modifier Informations

//Routes desactivation profil structure
$routes->get('/structure/structureDesactivationProfil', 'Structure::structureDesactivationProfil');
//Routes desactivation profil structure

//Routes deconnexion structure
$routes->get('/structure/structureDeconnexion', 'Structure::structureDeconnexion');
//Routes deconnexion structure

//Routes Signalement problème
$routes->get('/structure/structureSignaleProbleme', 'Structure::structureSignaleProbleme');
//Routes deconnexion structure

//Routes Profil
$routes->get('/profil/profilVueActeur', 'Profil::profilVueActeur');
//Routes Profil

//Routes Profil Modification
$routes->get('/profil/modifier/profilModifierInformation', 'Profil::profilModifierInformation');
$routes->get('/profil/modifier/profilModifierNomPrenom', 'Profil::profilModifierNomPrenom');
$routes->get('/profil/modifier/profilModifierPoste', 'Profil::profilModifierPoste');
$routes->get('/profil/modifier/profilModifierNomStructure', 'Profil::profilModifierNomStructure');
$routes->get('/profil/modifier/profilModifierAdressMail', 'Profil::profilModifierAdressMail');
$routes->get('/profil/modifier/profilModifierNumeroTel', 'Profil::profilModifierNumeroTel');
//Routes Profil

//$routes->get('/inscription/utilisateur', 'Inscription::utilisateur');
$routes->get('/inscription/choix', 'Inscription::choix');
$routes->get('/', 'Home::index');

//Routes FaQ
$routes->get('/faQ', 'LandingPage::faQ');

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
