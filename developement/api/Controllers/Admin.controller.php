<?php

class Admin 
{
    public function login($data)
    {
        $log =  [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        $this->model = new AdminModel();
        $res = $this->model->login($log);

        if ($res && password_verify($data['password'], $res['password'])) {
            echo json_encode($res);
        } else {
            echo json_encode(['error' => 'Wrong password']);
        }
    }


    public function add($data)
    {
        $add = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ];
        $this->model = new AdminModel();
        $this->model->add($add);

        if ($add) {
            echo json_encode(['message' => 'User added successfully']);
        } else {
            echo json_encode(['message' => 'User not added']);
        }
    }
    
}