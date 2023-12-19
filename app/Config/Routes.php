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
//mesin
$routes->group('/mesin', ['filter' => 'roles:mesin'], function ($routes) {

    $routes->get('', 'MesinController::mesin_index');
    $routes->get('data', 'MesinController::mesindata');
    $routes->post('import', 'MesinController::import');
    $routes->post('getData', 'MesinController::getData');
});

//exportcontroller
$routes->post('export', 'ExportController::export');




$routes->get('/user/rosso', 'Home::rosso_index');
$routes->get('/user/rosso/data', 'Home::rossodata');
$routes->get('/user/setting', 'Home::setting_index');
$routes->get('/user/setting/data', 'Home::settingdata');
$routes->get('/user/packing', 'Home::packing_index');
$routes->get('/user/packing/data', 'Home::packingdata');
$routes->get('/user/stoklot', 'Home::stoklot_index');
$routes->get('/user/stoklot/data', 'Home::stoklotdata');

//admin routes
$routes->group('/admin', ['filter' => 'roles:admin'], function ($routes) {

    $routes->get('', 'AdminController::index');
    $routes->get('datamesin', 'AdminController::mesin');
    $routes->get('mesin/update', 'AdminController::mesin_update');
    $routes->get('rosso', 'AdminController::rosso');
    $routes->get('setting', 'AdminController::setting');
    $routes->get('packing', 'AdminController::packing');
    $routes->get('stoklot', 'AdminController::stoklot');
});
