<?php

class AdminModel extends Database
{
    function login($data)
    {
        $query = 'SELECT * from Admin WHERE email = ?';
        $check = array(
            $data['email']
        );
        $stmnt = $this->execStatement($query, $check);
        $res = $stmnt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function add($add)
    {
        $query = 'INSERT INTO admin (first_name, last_name, email, password) VALUES (?, ?, ?, ?)';
        $data = array(
            $add['first_name'],
            $add['last_name'],
            $add['email'],
            $add['password']
        );
        $stmnt = $this->execStatement($query, $data);
        return $stmnt;
    }
}