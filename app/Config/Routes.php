<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Route untuk halaman berhasil login
$routes->get('/', 'Home::index');

// Route untuk autentikasi
$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
	$routes->get('/', 'Login::index');
	$routes->get('login', 'Login::index', ['as' => 'login']);
	$routes->post('login', 'Login::loginProcess');
	$routes->get('logout', 'Login::logout', ['as' => 'logout']);
	$routes->get('register', 'Register::index', ['as' => 'register']);
	$routes->post('register', 'Register::registerProcess');
	$routes->get('forgot', 'Forgot::index', ['as' => 'forgot_password']);
	$routes->post('forgot', 'Forgot::resetProcess');
	$routes->get('reset', 'Reset::show', ['as' => 'reset_password']);
	$routes->get('reset/(:segment)', 'Reset::index/$1');
	$routes->post('reset', 'Reset::update');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
