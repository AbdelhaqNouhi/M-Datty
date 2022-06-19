<?php

class Commande
{
    public function get()
    {
        $this->model = new CommandeModel();
        $res = $this->model->get();
        if ($res) {
            echo json_encode($res);
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