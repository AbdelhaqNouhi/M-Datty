<?php

class Commande
{
    public function all()
    {
        $this->model = new CommandeModel();
        echo json_encode($this->model->fetch());

        if ($this->model->fetch()) {
            echo json_encode(['message' => 'Commande fetched successfully']);
        } else {
            echo json_encode(['message' => 'Commande not fetched']);
        }
    }

    public function add($data)
    {
        $add = [
            'product_name' => $data['product_name'],
            'user_name' => $data['user_name'],
            'phone' => $data['phone'],
            'ville' => $data['ville'],
            'adress' => $data['adress'],
            'quantite' => $data['quantite'],
            'total_prix' => $data['total_prix']
        ];
        $this->model = new CommandeModel();
        $this->model->add($add);

        if ($add) {
            echo json_encode(['message' => 'Commande added successfully']);
        } else {
            echo json_encode(['message' => 'Commande not added']);
        }
    }

    public function update($data)
    {
        // var_dump($data);
        // die();
        $update = [
            'image' => $data->image,
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
            'id' => $data->commande_id
        ];
        // var_dump($update);
        // die();

        $this->model = new CommandeModel();
        $this->model->update($update);

        if ($update) {
            echo json_encode(['message' => 'Commande updated successfully']);
        } else {
            echo json_encode(['message' => 'Commande not updated']);
        }
    }

    public function delete($data)
    {
        $this->model = new CommandeModel();
        $this->model->delete($data);

        if ($data) {
            echo json_encode(['message' => 'Commande delete successfully']);
        } else {
            echo json_encode(['message' => 'Commande not deleted']);
        }
    }
}