<?php

class BasketModel extends Database
{
    function fetch($id)
    {
        $query = 'SELECT * From basket WHERE user_id = ?';
        $check = array (
            $id['id']
        );
        $stmnt = $this->execStatement($query, $check);
        echo json_encode($stmnt->fetchAll(PDO::FETCH_ASSOC));
    }

    function add($data)
    {
        $query = 'INSERT INTO basket (image, name, description, price, product_id, user_id) VALUES (?, ?, ?, ?, ?, ?)';
        $add = array (
            $data['image'],
            $data['name'],
            $data['description'],
            $data['price'],
            $data['product_id'],
            $data['user_id']
        );
        $stmnt = $this->execStatement($query, $add);
        return $stmnt;
    }

    function update($data)
    {
        $query = 'UPDATE basket SET Quantite = ? WHERE id = ?';
        $update = array (
            $data['Quantite'],
            $data['id']
        );
        // var_dump($update);
        // die();
        $stmnt = $this->execStatement($query, $update);
        return $stmnt;
    }

    function delete ($data)
    {
        $query = 'DELETE FROM basket WHERE product_id = ?';
        $delete = array (
            $data['id']
        );
        $stmnt = $this->execStatement($query, $delete);
        return $stmnt;
    }   
}