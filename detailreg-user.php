<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$templates = new League\Plates\Engine('templates/site');
echo $templates->render('user-registration-details');
?>
