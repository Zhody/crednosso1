<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

// ROTAS DE SHIPPING
$router->get('/shipping', 'ShippingController@index');
$router->get('/shipping/add', 'ShippingController@add');
$router->post('/shipping/add', 'ShippingController@addAction');
$router->get('/shipping/edit/{id}', 'ShippingController@edit');
$router->post('/shipping/edit/{id}', 'ShippingController@editAction');
$router->get('/shipping/disable/{id}', 'ShippingController@disable');
$router->get('/shipping/enable/{id}', 'ShippingController@enable');
// FIM DAS ROTAS DE SHIPPING

// ROTAS DE TESOURARIA
$router->get('/treasury', 'TreasuryController@index');
$router->get('/treasury/add/{id}', 'TreasuryController@add');
$router->post('/treasury/add/{id}', 'TreasuryController@addAction');

// ROTAS DE CONTESTACOES
$router->get('/contestation', 'ContestationController@index');
$router->get('/contestation/add', 'ContestationController@add');
$router->post('/contestation/add', 'ContestationController@addAction');
$router->get('/contestation/edit/{id}', 'ContestationController@edit');
$router->post('/contestation/edit/{id}', 'ContestationController@editAction');
$router->get('/contestation/disable/{id}', 'ContestationController@disable');
$router->get('/contestation/enable/{id}', 'ContestationController@enable');

// FIM DAS ROTAS DE CONTESTAÇOES

// ROTAS DE LOTE
$router->get('/batch', 'BatchController@index');
// FIM DAS ROTAS DE LOTE

// ROTAS DE ATM
$router->get('/atm', 'AtmController@index');
$router->get('/atm/add', 'AtmController@add');
$router->post('/atm/add', 'AtmController@addAction');
$router->get('/atm/edit/{id}', 'AtmController@edit');
$router->post('/atm/edit/{id}', 'AtmController@editAction');
$router->get('/atm/enable/{id}', 'AtmController@enable');
$router->get('/atm/disable/{id}', 'AtmController@disable');

//FIM DAS ROTAS DE ATM

// ROTAS DE PEDIDOS
$router->get('/request', 'RequestController@index');
$router->get('/supplies', 'SuppliesController@index');
//$router->get('/sobre/{nome}', 'HomeController@sobreP');