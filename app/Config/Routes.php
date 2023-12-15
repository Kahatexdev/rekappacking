<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// login
$routes->get('/login', 'AuthController::index');
$routes->post('authverify', 'AuthController::auth');

// 
// user routes
$routes->get('/user/mesin', 'Home::mesin_index');
$routes->get('/user/mesin/data', 'Home::mesindata');
$routes->get('/user/rosso', 'Home::rosso_index');
$routes->get('/user/rosso/data', 'Home::rossodata');
$routes->get('/user/setting', 'Home::setting_index');
$routes->get('/user/setting/data', 'Home::settingdata');
$routes->get('/user/packing', 'Home::packing_index');
$routes->get('/user/packing/data', 'Home::packingdata');
$routes->get('/user/stoklot', 'Home::stoklot_index');
$routes->get('/user/stoklot/data', 'Home::stoklotdata');
