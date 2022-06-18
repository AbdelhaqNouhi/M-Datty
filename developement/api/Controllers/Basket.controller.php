<?php

class Basket
{
    public function Get($id)
    {

        $this->model = new BasketModel();
        $this->model->fetch($id);
    }

    public function add($data)
    {
        $add = [
            'image' => $data['image'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id']
        ];

        $this->model = new BasketModel();
        $this->model->add($add);

        if ($add) {
            echo json_encode(['message' => 'Basket added successfully']);
        } else {
            echo json_encode(['message' => 'Basket found']);
        }
    }

    public function update($data)
    {
        $update = [
            'id' => $data['id'],
            'Quantite' => $data['Quantite']
        ];

        $this->model = new BasketModel();
        $this->model->update($update);

        if ($update) {
            echo json_encode(['message' => 'Basket updated successfully']);
        } else {
            echo json_encode(['message' => 'Basket not updated']);
        }
    }

    public function delete($data)
    {
        $this->model = new BasketModel();
        $this->model->delete($data);

        if ($data) {
            echo json_encode(['message' => 'Basket delete successfully']);
        } else {
            echo json_encode(['message' => 'Basket not deleted']);
        }
    } 
}