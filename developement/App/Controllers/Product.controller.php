<?php

class Product
{
  public function GetOneProduct($id) {
    $this->model = new ProductModel();
    $this->model->GetOneProduct($id);
  }

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

  // public function addd($data)
  // {
  //   $add = [
  //     'image' => $data['image'],
  //     'name' => $data['name'],
  //     'description' => $data['description'],
  //     'price' => $data['price']
  //   ];

  //   $this->model = new ProductModel();
  //   $this->model->add($add);

  //   if ($add) {
  //     echo json_encode(['message' => 'Product added successfully']);
  //   } else {
  //     echo json_encode(['message' => 'Product not added']);
  //   }
  // }

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
  public function add($data)
  {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
      $Image = $_FILES['image']['name'];
      $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
      $extensions_arr = array("jpg", "jpeg", "png", "gif");

      if (!empty($_FILES['image']['name'])) {
        if (in_array($imageFileType, $extensions_arr)) {
          $file_name = uniqid('', true) . '.' . $imageFileType;
          $target_path = $file_name;
          move_uploaded_file($_FILES['image']['tmp_name'], 'C:\\Users\\Youcode\\OneDrive\\Desktop\\MaisonDatty\\developement\\App\\uploads\\' . $target_path);
          $postsModel =
            new ProductModel();
          $postsModel->add($target_path, $name, $description, $price);
          echo json_encode(['message' => 'Product added successfully']);
        } else {
          echo json_encode(['message' => 'Invalid File Type']);
        }
      } else {
        $postsModel = new ProductModel();

        $postsModel->add(null, $name, $description, $price);
      }
  }
}
