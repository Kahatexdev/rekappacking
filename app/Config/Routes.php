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





//packing routes
$routes->group('/packing', ['filter' => 'packingAuth'], function ($routes) {

    $routes->get('', 'PackingController::index');
    $routes->post('import', 'PackingController::importPDK');
    $routes->post('importproduksi', 'PackingController::importProduksi');
    $routes->get('flowproses', 'PackingController::flowproses');
    $routes->post('getInisialByNoModel', 'PackingController::getInisialByNoModel');
    $routes->post('getDataByIdInisial', 'PackingController::getDataByIdInisial');
    $routes->post('inputproses', 'PackingController::inputproses');
    $routes->get('datamesin', 'PackingController::mesin');
    $routes->get('editmesin', 'PackingController::mesin_update');
    $routes->get('rosso', 'PackingController::rosso');
    $routes->get('setting', 'PackingController::setting');
    $routes->get('packing', 'PackingController::packing');
    $routes->get('stoklot', 'PackingController::stoklot');
});
