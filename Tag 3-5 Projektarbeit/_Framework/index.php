<?php
require 'core/bootstrap.php';

$routes = [
	'/hallo/welt' => 'WelcomeController@index',
];

$router = new Router($routes);
$router->run($_GET['uri'] ?? '');