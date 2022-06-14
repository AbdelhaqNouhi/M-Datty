<?php

class ProductModel extends Database 
{
    public function GetOneProduct($id)
    {
        $query = "SELECT * FROM products WHERE product_id = ?";
        $one = [
             $id
        ];
        $stmnt = $this->execStatement($query, $one);
        echo json_encode($stmnt->fetch(PDO::FETCH_ASSOC));
    }
    
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

    public function Update($id, $name, $description, $price, $image)
    {
        // var_dump($_POST);
        // var_dump($_FILES);


        if ($image == null) {
        $query = 'UPDATE products SET name = ?, description = ?, price = ? WHERE product_id = ?';
        $one = array (
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'id' => $id
        );
        $stmnt = $this->execStatement($query, array_values($one));
            if ($stmnt) {
                echo json_encode(['message' => 'Product updated successfully']);
            } else {
                echo json_encode(['message' => 'error']);
            }

        } else {
            $query = 'UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE product_id = ?';
            $two = [
                $name,
                $description,
                $price,
                $image,
                $id
            ];
            var_dump($two);
            $stmnt = $this->execStatement($query, $two);
                if($stmnt) {
                    echo json_encode(['message' => 'Product updated successfully']);
                } else {
                    echo json_encode(['message' => 'error']);
                }
        }
    }
    
    function delete ($data)
    {

        $query = 'DELETE FROM products WHERE product_id = ?';
        $delete = array (
            $data['data']
        );
        $stmnt = $this->execStatement($query, $delete);
        return $stmnt;
    }   
}