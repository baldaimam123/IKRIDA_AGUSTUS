<?php
require_once __DIR__ . '/app/init.php';

$controller = new FormController($conn);
$controller->handleFormSubmission();
