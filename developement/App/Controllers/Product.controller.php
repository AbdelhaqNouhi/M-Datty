<?php

class Product
{
  public function getThre()
  {
    $this->model = new ProductModel();
    echo json_encode($this->model->getThre());
  }

  public function getAll()
  {
    $this->model = new ProductModel();
    echo json_encode($this->model->getAll());
  }

  public function add($data)
  {
    $add = [
      'image' => $data['image'],
      'name' => $data['name'],
      'description' => $data['description'],
      'price' => $data['price']
    ];

    $this->model = new ProductModel();
    $this->model->add($add);

    if ($add) {
      echo json_encode(['message' => 'Product added successfully']);
    } else {
      echo json_encode(['message' => 'Product not added']);
    }
  }

  public function update($data)
  {
    $update = [
      'image' => $data->image,
      'name' => $data->name,
      'description' => $data->description,
      'price' => $data->price,
      'id' => $data->product_id
    ];

    $this->model = new ProductModel();
    $this->model->update($update);

    if ($update) {
      echo json_encode(['message' => 'Product updated successfully']);
    } else {
      echo json_encode(['message' => 'Product not updated']);
    }
  }

  public function delete($id)
  {
    $this->model = new ProductModel();
    $this->model->delete($id);

    if ($id) {
      echo json_encode(['message' => 'Product delete successfully']);
    } else {
      echo json_encode(['message' => 'Product not deleted']);
    }
  }
}