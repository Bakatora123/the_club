<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/Home', 'Home::index');
//Socios
$routes->get('/Socios', 'Socios::index');
$routes->get('/Socios/addSocio', 'Socios::addSocio');
$routes->post('/Socios/add', 'Socios::add');
$routes->get('/Socios/editSocio', 'Socios::editSocio');
$routes->post('/Socios/edit', 'Socios::edit');
$routes->post('/Socios/delete', 'Socios::delete');

// Pagos
$routes->get('/Pagos', 'Pagos::index');
$routes->get('/Pagos/addPago', 'Pagos::add');
$routes->get('/Pagos/editPago', 'Pagos::edit');

// Utileria
$routes->get('/Utileria', 'Utileria::index');
$routes->get('/Utileria/addArticulo', 'Utileria::add');
$routes->get('/Utileria/editArticulo', 'Utileria::edit');

// Gastos
$routes->get('/Gastos', 'Gastos::index');
$routes->get('/Gastos/addGasto', 'Gastos::add');
$routes->get('/Gastos/editGasto', 'Gastos::edit');

// Ingresos
$routes->get('/Ingresos', 'Ingresos::index');
$routes->post('/Ingresos/add', 'Ingresos::add');
$routes->get('/Ingresos/addIngreso', 'Ingresos::addIngreso');
$routes->post('/Ingresos/edit', 'Ingresos::edit');
$routes->get('/Ingresos/editIngreso', 'Ingresos::editIngreso');
$routes->post('/Ingresos/delete', 'Ingresos::delete');




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
