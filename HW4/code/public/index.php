<?php
// public/index.php
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\ItemsController;
use App\Middleware\AuthMiddleware;

header('Content-Type: application/json; charset=utf-8');

// Basic bootstrap
$config = require __DIR__ . '/../src/config.php';
$db = \App\DB::get(); // initialize DB singleton

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/api';
$path = substr($uri, strlen($base));
$path = $path === false ? '' : $path;
$segments = array_values(array_filter(explode('/', $path), fn($s)=>$s!=='' ));

// routing table (very small)
function json($data, $code = 200) { http_response_code($code); echo json_encode($data); exit; }

$authController = new AuthController($config);
$itemsController = new ItemsController($config);
$authMiddleware = new AuthMiddleware($config['jwt']['secret']);

try {
    // /api/auth/register
    if ($method === 'POST' && implode('/', $segments) === 'auth/register') {
        $data = json_decode(file_get_contents('php://input'), true) ?: [];
        $authController->register($data);
    }

    // /api/auth/login
    elseif ($method === 'POST' && implode('/', $segments) === 'auth/login') {
        $data = json_decode(file_get_contents('php://input'), true) ?: [];
        $authController->login($data);
    }

    // items listing: GET /api/items
    elseif ($method === 'GET' && count($segments) === 1 && $segments[0] === 'items') {
        $itemsController->index();
    }

    // GET /api/items/{id}
    elseif ($method === 'GET' && count($segments) === 2 && $segments[0] === 'items') {
        $itemsController->show((int)$segments[1]);
    }

    // POST /api/items  (protected)
    elseif ($method === 'POST' && count($segments) === 1 && $segments[0] === 'items') {
        $user = $authMiddleware->handle();
        $data = json_decode(file_get_contents('php://input'), true) ?: [];
        $itemsController->store($data, $user);
    }

    // PUT /api/items/{id} (protected)
    elseif (($method === 'PUT' || $method === 'PATCH') && count($segments) === 2 && $segments[0] === 'items') {
        $user = $authMiddleware->handle();
        parse_str(file_get_contents('php://input'), $data);
        $itemsController->update((int)$segments[1], $data, $user);
    }

    // DELETE /api/items/{id} (protected)
    elseif ($method === 'DELETE' && count($segments) === 2 && $segments[0] === 'items') {
        $user = $authMiddleware->handle();
        $itemsController->delete((int)$segments[1], $user);
    }

    else {
        http_response_code(404);
        echo json_encode(['error' => 'not_found', 'path' => $uri]);
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'server_error', 'message' => $e->getMessage()]);
}
