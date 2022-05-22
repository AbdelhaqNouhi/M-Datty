<?php

class Product
{
  public function all()
  {
    $this->model = new ProductModel();
    echo json_encode($this->model->fetch());
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

  public function delete($data)
  {
    $this->model = new ProductModel();
    $this->model->delete($data);

    if ($data) {
      echo json_encode(['message' => 'Product delete successfully']);
    } else {
      echo json_encode(['message' => 'Product not deleted']);
    }
  }
}