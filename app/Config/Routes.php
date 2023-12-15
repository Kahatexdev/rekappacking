<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// login
$routes->get('/login', 'AuthController::index');
$routes->post('authverify', 'AuthController::auth');

// 

$routes->get('/mesin', 'Home::mesin_index');
$routes->get('/mesin/dataproduksi', 'Home::dataproduksi');
