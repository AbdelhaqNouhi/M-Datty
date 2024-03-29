<?php
require_once './Router.php';

// load classes
spl_autoload_register(function ($class_name) {
  if (file_exists('Controllers/' . $class_name . '.controller.php'))
    include 'Controllers/' . $class_name . '.controller.php';
  if (file_exists('Models/' . $class_name . '.model.php'))
    include 'Models/' . $class_name . '.model.php';
});

// load .env variables
require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
