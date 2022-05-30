<?php

class ProductModel extends Database 
{
    function getThre()
    {
        $query = 'SELECT * from products
        order by products.product_id desc LIMIT 3';
        $stmnt = $this->execStatement($query);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAll()
    {
        $query = 'SELECT * from products
        order by products.product_id desc';
        $stmnt = $this->execStatement($query);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function add($image, $name, $description, $price)
    {
        $query = 'INSERT INTO products (image, name, description, price)
        VALUES (:image, :name, :description, :price)';
        $stmnt = $this->execStatement($query, [
            'image' => $image,
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);
        return $stmnt;
    }
    // {
     
    //     $query = 'INSERT INTO products (image, name, description, price) VALUES (:image, :name, :description, :price)';
    //     // $add = array (
    //     //     $data['name'],
    //     //     $data['description'],
    //     //     $data['price']
    //     // );
    //     //bin
    //     $stmnt = $this->execStatement($query, $add, $image);
    //     return $stmnt;
    // }
    
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