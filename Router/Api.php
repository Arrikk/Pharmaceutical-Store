<?php

# Admin Registeration URLS
$router->add('api/register', ['controller' => 'Admin', 'action' => 'register-company', 'namespace' => 'Accounts'])->post();
$router->add('api/register/', ['controller' => 'Admin', 'action' => 'register-self', 'namespace' => 'Accounts'])->post();

# Company Registeration URLS
$router->add('api/company/register', ['controller' => 'company', 'action' => 'register', 'namespace' => 'Accounts'])->post();

# Update Account URL
$router->add('api/account/update', ['controller' => 'Profile', 'action' => 'update'])->post();
$router->add('api/account/information', ['controller' => 'Profile', 'action' => 'information']);
# Login Url
$router->add('api/login', ['controller' => 'user', 'action' => 'login'])->post();

# Accounts Url
$router->add('api/accounts/admin', ['controller' => 'admin', 'action' => 'accounts', 'namespace' => 'Accounts']);
$router->add('api/accounts/company', ['controller' => 'company', 'action' => 'accounts', 'namespace' => 'Accounts']);
$router->add('api/accounts/manager', ['controller' => 'manager', 'action' => 'accounts', 'namespace' => 'Accounts']);

# Current Company / Managers
$router->add('api/account/reps', ['controller' => 'company', 'action' => 'accounts', 'namespace' => 'Accounts']);
$router->add('api/user', ['controller' => 'user', 'action' => 'user']);
$router->add('api/manager/delete', ['controller' => 'company', 'action' => 'delete', 'namespace' => 'Accounts']);

$router->add('api/password/update', ['controller' => 'password', 'action' => 'change'])->post();

$router->add('api/supplies', ['controller' => 'supply', 'action' => 'supplies']);
$router->add('api/supply/', ['controller' => 'supply', 'action' => 'supply'])->post();
$router->add('api/supply/update', ['controller' => 'supply', 'action' => 'update'])->post();
$router->add('api/supply/import', ['controller' => 'supply', 'action' => 'import'])->post();


