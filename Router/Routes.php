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

$router->add('{controller}/{action}')->get();