<?php
require_once 'loader.php';

$app = new Router();

// Users
$app->POST('/Login', function ($data) {
  $user = new User();
  $user->login($data);
});

$app->POST('/Register', function ($data) {
  $user = new User();
  $user->add($data);
});

$app->GET('/GetUsers', function ($id) {
  $user = new User();
  $user->get($id);
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
$app->GET('/GetOneProduct', function ($data) {
  $product = new Product();
  $product->GetOneProduct($data["id"]);
});

$app->GET('/ThreProduct', function () {
  $product = new Product();
  $product->getThre();
});

$app->GET('/GetProduct', function () {
  $product = new Product();
  $product->getAll();
});

$app->POST('/AddProduct', function ($data) {
  $product = new Product();
  $product->Add($data);
});

$app->POST('/UpdateProduct', function ($data) {
  $product = new Product();
  $product->Update($data);
});

$app->post('/DeleteProduct', function ($data) {
  $product = new Product();
  $product->Delete($data);
});


// Commande
$app->GET('/GetCommande', function () {
  $commande = new Commande();
  $commande->get();
});

$app->POST('/AddCommande', function ($data) {
  $commande = new Commande();
  $commande->add($data);
});

$app->POST('/DeleteCommande', function ($data) {
  $commande = new Commande();
  $commande->delete($data);
});


// Basket
$app->GET('/GetBasket', function ($id) {
  $basket = new Basket();
  $basket->Get($id);
});

$app->POST('/AddBasket', function ($data) {
  $basket = new Basket();
  $basket->add($data);
});

$app->POST('/UpdateBasket', function ($data) {
  $basket = new Basket();
  $basket->update($data);
});

$app->POST('/DeleteBasket', function ($data) {
  $basket = new Basket();
  $basket->delete($data);
});
