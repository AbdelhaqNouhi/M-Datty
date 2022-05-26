<?php

class User
{
  public function login($data)
  {
    $log =  [
      'email' => $data['email'],
      'password' => $data['password']
    ];
    $this->model = new UserModel();
    $res = $this->model->login($log);

    if($res && password_verify($data['password'], $res['password']))
    {
      echo json_encode($res);
    }
    else
    {
      echo json_encode(['error' => 'Wrong password']);
    }
  }

  public function add($data)
 {
   $add = [
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'phone' => $data['phone'],
      'password' => password_hash($data['password'], PASSWORD_DEFAULT)
    ];
    $this->model = new UserModel();
    $this->model->add($add);

    if ($add) {
      echo json_encode(['message' => 'User added successfully']);
    } else {
      echo json_encode(['message' => 'User not added']);
    }
 }

  public function update($data)
  {
    $update = [
      'first_name' => $data->first_name,
      'last_name' => $data->last_name,
      'email' => $data->email,
      'phone' => $data->phone,
      'password' => $data->password,
      'id' => $data->user_id
    ];
    
    $this->model = new UserModel();
    $this->model->update($update);

    if ($update) {
      echo json_encode(['message' => 'user update successfully']);
    } else {
      echo json_encode(['message' => 'user not updated']);
    }
  }

  public function delete($data)
  {
    $this->model = new UserModel();
    $this->model->delete($data);

    if ($data) {
      echo json_encode(['message' => 'user delete successfully']);
    } else {
      echo json_encode(['message' => 'user not deleted']);
    }
  }
}
