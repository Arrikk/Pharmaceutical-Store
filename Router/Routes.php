<?php

/**
 * Add routes
 */

// $router->add('', ['controller' => 'home', 'action' => 'index']); 

$router->add('', ['controller' => 'account', 'action' => 'index', 'namespace' => 'Fe']); 
$router->add('login', ['controller' => 'auth', 'action' => 'login', 'namespace' => 'Fe']); 
$router->add('auth/setLogin', ['controller' => 'auth', 'action' => 'set-login', 'namespace' => 'Fe']); 
$router->add('auth/logout', ['controller' => 'auth', 'action' => 'logout', 'namespace' => 'Fe']); 
$router->add('account/management', ['controller' => 'account', 'action' => 'management', 'namespace' => 'Fe']); 
$router->add('managers', ['controller' => 'managers', 'action' => 'manage', 'namespace' => 'Fe']); 
$router->add('managers/details', ['controller' => 'managers', 'action' => 'details', 'namespace' => 'Fe']); 
$router->add('companies', ['controller' => 'companies', 'action' => 'companies', 'namespace' => 'Fe']); 
$router->add('approved', ['controller' => 'companies', 'action' => 'approved', 'namespace' => 'Fe']); 
$router->add('company', ['controller' => 'companies', 'action' => 'company', 'namespace' => 'Fe']); 

$router->add('supply', ['controller' => 'supply', 'action' => 'list', 'namespace' => 'Fe']); 
$router->add('supply/', ['controller' => 'supply', 'action' => 'supply', 'namespace' => 'Fe']); 


$router->add('{controller}/{action}')->get();