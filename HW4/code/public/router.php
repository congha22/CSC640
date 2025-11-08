<?php
// public/router.php

$requested = $_SERVER['REQUEST_URI'];
$file = __DIR__ . parse_url($requested, PHP_URL_PATH);

if ($requested !== '/' && file_exists($file)) {
    // Serve the requested file if it exists
    return false;
}

// Otherwise, forward request to index.php
require __DIR__ . '/index.php';
