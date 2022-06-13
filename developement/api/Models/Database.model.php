<?php
class Database
{
  protected $connection;

  function __construct()
  {
    $dsn = "mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'];

    
    $connection = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $this->connection = $connection;
  }

  function execStatement($query, $params = [])
  {
    $stmnt = $this->connection->prepare($query);
     $stmnt->execute($params);
     return $stmnt;
  }
}
