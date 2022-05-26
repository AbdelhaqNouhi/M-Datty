<?php
require_once './Router.php';

spl_autoload_register(function ($class_name) {
  if (file_exists('Controllers/' . $class_name . '.controller.php'))
    include 'Controllers/' . $class_name . '.controller.php';
  if (file_exists('Models/' . $class_name . '.model.php'))
    include 'Models/' . $class_name . '.model.php';
});

require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
