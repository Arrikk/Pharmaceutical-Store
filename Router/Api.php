<?php

# Registeration URLS
$router->add('api/register', ['controller' => 'Admin', 'action' => 'register-company', 'namespace' => 'Accounts'])->post();
$router->add('api/register/', ['controller' => 'Admin', 'action' => 'register-self', 'namespace' => 'Accounts'])->post();
# Update Account URL
$router->add('api/account/update', ['controller' => 'Profile', 'action' => 'update'])->post();
$router->add('api/account/information', ['controller' => 'Profile', 'action' => 'information']);
# Login Url
$router->add('api/login', ['controller' => 'user', 'action' => 'login'])->post();

# Accounts Url
$router->add('api/accounts/admin', ['controller' => 'admin', 'action' => 'accounts', 'namespace' => 'Accounts']);
$router->add('api/accounts/company', ['controller' => 'company', 'action' => 'accounts', 'namespace' => 'Accounts']);
$router->add('api/accounts/manager', ['controller' => 'manager', 'action' => 'accounts', 'namespace' => 'Accounts']);

$router->add('api/password/update', ['controller' => 'password', 'action' => 'change'])->post();