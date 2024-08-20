<?php
// Autoload models and controllers
spl_autoload_register(function ($className) {
    if (file_exists(__DIR__ . "/models/$className.php")) {
        require_once __DIR__ . "/models/$className.php";
    }
    if (file_exists(__DIR__ . "/controllers/$className.php")) {
        require_once __DIR__ . "/controllers/$className.php";
    }
});

// Load configuration
$config = require_once __DIR__ . '/../config/config.php';

// Create database connection
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
