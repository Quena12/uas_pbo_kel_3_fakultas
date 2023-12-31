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

//fakultas
$routes->get('/', 'Home::index');
$routes->get('/fakultas', 'Fakultas::index');
$routes->post('/fakultas/addfakultas', 'Fakultas::createNewFakultas');
$routes->get('/fakultas/deletefakultas/(:num)', 'Fakultas::delete/$1');
$routes->get('/fakultas/editfakultas/(:num)', 'Fakultas::edit/$1');
$routes->post('/fakultas/editfakultas/(:num)', 'Fakultas::update/$1');

//ruangan
$routes->get('/ruangan', 'RuanganController::index');
$routes->post('/ruangan/addruangan', 'RuanganController::addRuangan');
$routes->get('/ruangan/editruangan/(:num)', 'RuanganController::editRuangan/$1');
$routes->post('/ruangan/editruangan/(:num)', 'RuanganController::editRuangan/$1');
$routes->get('/ruangan/deleteruangan/(:num)', 'RuanganController::deleteRuangan/$1');


//kelas
$routes->get('/kelas', 'KelasController::index');
$routes->post('/kelas/adddkelas', 'KelasController::addKelas');
$routes->get('/kelas/editkelas/(:num)', 'KelasController::editKelas/$1');
$routes->post('/kelas/editkelas/(:num)', 'KelasController::editKelas/$1');
$routes->get('/kelas/deletekelas/(:num)', 'KelasController::deleteKelas/$1');

//prodi
$routes->get('/prodi', 'ProdiController::index');
$routes->post('/prodi/addprodi', 'ProdiController::addprodi');
$routes->get('/prodi/editprodi/(:num)', 'ProdiController::editProdi/$1');
$routes->post('/prodi/editprodi/(:num)', 'ProdiController::editProdi/$1');
$routes->get('/prodi/deleteprodi/(:num)', 'ProdiController::deleteprodi/$1');
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
