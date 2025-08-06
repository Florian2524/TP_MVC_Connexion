<?php

use App\Controllers\AuthController;


$route = $_GET['route'] ?? 'login';

$controller = new AuthController();

switch ($route) {
    case 'login':
        $controller->login();
        break;

    case 'register':
        $controller->register();
        break;

    default:
        echo "404 - Page non trouvée";
        break;
}
