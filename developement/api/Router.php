<?php

class Router
{
  private $method;
  private $uri;

  // set the request method and request url
  public function __construct()
  {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->uri = $_SERVER['REQUEST_URI'];
  }

  //  handle GET request on a given route
  public function get(string $route, callable $callable)
  {
    $path = parse_url($this->uri, PHP_URL_PATH);
    $query = parse_url($this->uri, PHP_URL_QUERY);
    if ($query) parse_str($query, $query);

    if ('/api' . $route == $path && $this->method == 'GET') {
      call_user_func($callable, $query);
      die();
    }
  }

  //  handle POST request on a given route
  public function post(string $route, callable $callable)
  {
    $path = parse_url($this->uri, PHP_URL_PATH);
    if ('/api' . $route == $path && $this->method == 'POST') {
      $data = empty($_POST) ? json_decode(file_get_contents('php://input'), true) : $_POST;
      call_user_func($callable, $data);
      die();
    }
  }

  //  handle PUT request on a given route
  public function PUT(string $route, callable $callable)
  {
    $path = parse_url($this->uri, PHP_URL_PATH);
    if ('/api' . $route == $path && $this->method == 'PUT') {
      $data = json_decode(file_get_contents('php://input'));
      call_user_func($callable, $data);
      die();
    }
  }

  //  handle DELETE request on a given route
  public function delete(string $route, callable $callable)
  {
    $path = parse_url($this->uri, PHP_URL_PATH);
    if ('/api' . $route == $path && $this->method == 'DELETE') {
      $data = json_decode(file_get_contents('php://input'));
      call_user_func($callable, $data);
      die();
    }
  }
}
