<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// login
$routes->get('/', 'AuthController::index');
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
    $routes->get('lipat/(:any)', 'LipatController::exportLipat/$1');
    $routes->get('aplikasi/(:any)', 'AplikasiController::exportAplikasi/$1');
    $routes->get('potongcorak/(:any)', 'PotongCorakController::exportPotongCorak/$1');
    $routes->get('obras/(:any)', 'ObrasController::exportObras/$1');
    $routes->get('stocklot/(:any)', 'StocklotController::exportStocklot/$1');
    $routes->get('outgudang/(:any)', 'GudangController::exportOutGudang/$1');
    $routes->get('qbs/(:any)', 'QbsController::exportQbs/$1');
    $routes->get('qc/(:any)', 'QcController::exportQc/$1');
    $routes->get('format', 'PackingController::downloadExcel');
    $routes->get('formatPdk', 'PpcController::downloadExcel');
});

$routes->group('/ppc', ['filter' => 'ppcAuth'], function ($routes) {
    $routes->get('', 'PpcController::index');
    $routes->post('getInisial', 'PpcController::getInisial');
    $routes->post('import', 'PackingController::importPDK');
    $routes->get('flowproses/(:any)', 'PpcController::flowproses/$1');
    $routes->post('flowproses/update/(:any)', 'PpcController::updateFlow/$1');
    $routes->post('importFlowProses', 'PackingController::importFlowProses');
});

//packing routes
$routes->group('/packing', ['filter' => 'packingAuth'], function ($routes) {

    $routes->get('', 'PackingController::index');
    $routes->get('details/(:any)', 'PackingController::details/$1');
    $routes->post('importproduksiMesin', 'PackingController::importProduksiMesin');
    $routes->post('importproduksideffect', 'PackingController::importDeffect');
    $routes->post('importproduksiRosso', 'RossoController::importProduksiRosso');
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

    $routes->get('lipat', 'LipatController::lipat');
    $routes->post('importproduksiLipat', 'LipatController::importProduksiLipat');

    $routes->get('aplikasi', 'AplikasiController::aplikasi');
    $routes->post('importproduksiaplikasi', 'AplikasiController::importProduksiAplikasi');

    $routes->get('potongcorak', 'PotongCorakController::potongcorak');
    $routes->post('importproduksipotongcorak', 'PotongCorakController::importProduksiPotongCorak');

    $routes->get('obras', 'ObrasController::obras');
    $routes->post('importproduksiobras', 'ObrasController::importProduksiObras');

    $routes->get('ingudang', 'GudangController::ingudang');
    $routes->get('outgudang', 'GudangController::outgudang');
    $routes->post('importproduksiGudang', 'GudangController::importOutGudang');

    $routes->get('qbs', 'QbsController::Qbs');
    $routes->post('importoutqbs', 'QbsController::importOutQbs');

    $routes->get('qc', 'QcController::Qc');
    $routes->post('importoutqc', 'QcController::importOutQc');

    $routes->get('perbaikanarea/(:any)', 'PerbaikanController::perbaikanArea/$1');
    $routes->get('perbaikanrosso/(:any)', 'PerbaikanController::perbaikanRosso/$1');
    $routes->get('outperbaikanrosso', 'PerbaikanController::outPerbaikanArea');
    $routes->get('outperbaikanarea', 'PerbaikanController::outPerbaikanRosso');
    $routes->post('importproduksioutperbaikan', 'PerbaikanController::importOutPerbaikan');

    $routes->get('rekap', 'RekapController::rekapPacking');
    $routes->post('detailrekap/(:any)', 'RekapController::detailRekap/$1');



    $routes->get('stocklot', 'StocklotController::stocklot');
});
