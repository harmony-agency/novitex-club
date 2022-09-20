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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->match(['get', 'post'], 'register', 'UserController::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'login', 'UserController::login', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'forgotPassword', 'User::forgotPassword', ['filter' => 'noauth']);


$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->post('referralCode', 'DashboardController::referralCode', ['filter' => 'auth']);
$routes->get('logout', 'User::logout');

$routes->match(['get', 'post'], 'sendMail', 'EmailController::sendMail', ['filter' => 'noauth']);


$routes->get('admin/login', 'AdminController::index', ['filter' => 'noauthAdmin']);

$routes->match(['get', 'post'], 'admin/login', 'AdminController::login', ['filter' => 'noauthAdmin']);


// Admin routes

$routes->group('admin',["filter" => "authAdmin"],  function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('users', 'AdminController::users');
    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('user/update/(:num)', 'UserController::update/$1');
    $routes->get('codes', 'CodeController::index');
    $routes->match(['get', 'post'],'code/create', 'CodeController::create');
    $routes->get('code/edit/(:num)', 'CodeController::edit/$1');
    $routes->post('code/update/(:num)', 'CodeController::update/$1');
    $routes->get('code/delete/(:num)', 'CodeController::delete/$1');

});









$routes->get('admin/logout', 'AdminController::logout');



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
