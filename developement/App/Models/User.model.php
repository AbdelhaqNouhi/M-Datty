<?php
class UserModel extends Database
{
  function login($data)
  {
    $query = 'SELECT * from users WHERE email = ?';
    $check = array (
      $data['email']
    );
    $stmnt = $this->execStatement($query, $check);
    $res = $stmnt->fetch(PDO::FETCH_ASSOC);
    return $res;
  }

  function add($add)
  {
    $query = 'INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)';
    $data = array (
      $add['first_name'],
      $add['last_name'],
      $add['email'],
      $add['phone'],
      $add['password']
    ); 
    $stmnt = $this->execStatement($query, $data);
    return $stmnt;
  }

  function update($data)
  {
    $query = 'UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, password = ? WHERE user_id = ?';
    $update = array (
      $data ['first_name'],
      $data ['last_name'],
      $data ['email'],
      $data ['phone'],
      $data ['password'],
      $data ['id']
    );
    $stmnt = $this->execStatement($query, $update);
    return $stmnt;
  }

  function delete ($data)
  {
    $id = $data->user_id;
    $query = 'DELETE FROM users WHERE user_id = ?';
    $stmnt = $this->execStatement($query, [$id]);
    return $stmnt;
  }
}
