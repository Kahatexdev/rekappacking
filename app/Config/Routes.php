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


$routes->group('/export', function ($routes) {
    $routes->get('mesin/(:any)', 'ExportController::exportMesin/$1');
    $routes->get('rosso/(:any)', 'ExportController::exportRosso/$1');
    $routes->get('handprint/(:any)', 'HandprintController::exportHandprint/$1');
    $routes->get('setting/(:any)', 'SettingController::exportSetting/$1');
    $routes->get('bordir/(:any)', 'BordirController::exportBordir/$1');
});

//packing routes
$routes->group('/packing', ['filter' => 'packingAuth'], function ($routes) {

    $routes->get('', 'PackingController::index');
    $routes->post('import', 'PackingController::importPDK');
    $routes->post('importproduksiMesin', 'PackingController::importProduksiMesin');
    $routes->post('importproduksiRosso', 'RossoController::importProduksiRosso');
    $routes->get('flowproses', 'PackingController::flowproses');
    $routes->post('getInisialByNoModel', 'PackingController::getInisialByNoModel');
    $routes->post('getDataByIdInisial', 'PackingController::getDataByIdInisial');
    $routes->post('inputproses', 'PackingController::inputproses');
    $routes->get('datamesin', 'PackingController::mesin');
    $routes->get('editmesin', 'PackingController::mesin_update');

    $routes->get('rosso', 'RossoController::rosso');

    $routes->get('setting', 'SettingController::setting');
    $routes->post('importproduksiSetting', 'SettingController::importProduksiSetting');

    $routes->get('handprint', 'HandprintController::handprint');
    $routes->post('importproduksiHandprint', 'HandprintController::importProduksiHandprint');



    $routes->get('bordir', 'BordirController::bordir');
    $routes->post('importproduksibordir', 'BordirController::importProduksiBordir');

    $routes->get('packing', 'PackingController::packing');
    $routes->get('stoklot', 'PackingController::stoklot');
});
