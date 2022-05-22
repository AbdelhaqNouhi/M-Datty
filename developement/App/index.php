<?php
require_once 'loader.php';

$app = new Router();

// Users
$app->GET('/GetUser', function () {
  $user = new User();
  $user->all();
});

$app->POST('/AddUser', function ($data) {
  $user = new User();
  $user->add($data);
});

$app->PUT('/UpdateUser', function ($data) {
  $user = new User();
  $user->update($data);
});

$app->DELETE('/DeleteUser', function ($data) {
  $user = new User();
  $user->delete($data);
});

// Prudact
$app->GET('/GetProduct', function () {
  $product = new Product();
  $product->all();
});

$app->POST('/AddProduct', function ($data) {
  $product = new Product();
  $product->Add($data);
});

$app->PUT('/UpdateProduct', function ($data) {
  $product = new Product();
  $product->Update($data);
});

$app->DELETE('/DeleteProduct', function ($data) {
  $product = new Product();
  $product->Delete($data);
});