<?php

class ProductModel extends Database 
{
    function fetch()
    {
        $query = 'SELECT * from products';
        $stmnt = $this->execStatement($query);
        $result = $stmnt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    function add($data)
    {
        $query = 'INSERT INTO products (image, name, description, price) VALUES (?, ?, ?, ?)';
        $add = array (
            $data['image'],
            $data['name'],
            $data['description'],
            $data['price']
        );
        $stmnt = $this->execStatement($query, $add);
        return $stmnt;
    }
    
    function update($data)
    {
        $query = 'UPDATE products SET image = ?, name = ?, description = ?, price = ? WHERE product_id = ?';
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
        $query = 'DELETE FROM products WHERE product_id = ?';
        $stmnt = $this->execStatement($query,[$id]);
        return $stmnt;
    }   
}