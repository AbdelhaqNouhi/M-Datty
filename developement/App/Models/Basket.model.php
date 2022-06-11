<?php

class BasketModel extends Database
{
    function fetch()
    {
        $query = 'SELECT * from basket';
        $stmnt = $this->execStatement($query);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
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
        $query = 'UPDATE basket SET image = ?, name = ?, description = ?, price = ? WHERE basket_id = ?';
        $update = array (
            $data['image'],
            $data['name'],
            $data['description'],
            $data['price'],
            $data['id']
        );
        $stmnt = $this->execStatement($query, $update);
        return $stmnt;
    }

    function delete ($data)
    {
        $id = $data->id;
        $query = 'DELETE FROM basket WHERE basket_id = ?';
        $stmnt = $this->execStatement($query,[$id]);
        return $stmnt;
    }   
}