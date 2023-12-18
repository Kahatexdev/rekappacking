<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// login
$routes->get('/login', 'AuthController::index');
$routes->get('/logout', 'AuthController::logout');
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

//admin routes
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/mesin', 'AdminController::mesin');
$routes->get('/admin/mesin/update', 'AdminController::mesin_update');
$routes->get('/admin/rosso', 'AdminController::rosso');
$routes->get('/admin/setting', 'AdminController::setting');
$routes->get('/admin/packing', 'AdminController::packing');
$routes->get('/admin/stoklot', 'AdminController::stoklot');
