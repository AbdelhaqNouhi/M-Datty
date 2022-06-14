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
  public function add() {
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
          move_uploaded_file($_FILES['image']['tmp_name'], '/app/api/uploads/' . $target_path);
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

  public function update()
  { 
    if($_FILES['image'] != null) {
      $id = $_POST['product_id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $image = $_FILES['image']['name'];

    } else {
      $id = $_POST['product_id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
    }


      $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
      $extensions_arr = array("jpg", "jpeg", "png", "gif");

      if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        if (in_array($imageFileType, $extensions_arr)) {
          $file_name = uniqid('', true) . '.' . $imageFileType;
          $target_path = $file_name;
          move_uploaded_file($_FILES['image']['tmp_name'], '/app/api/uploads/' . $target_path);
          $postsModel = new ProductModel();
          $postsModel->update($id, $name, $description, $price, $target_path);
          return json_encode(['message' => 'Product updated successfully']);
        } else {
          return json_encode(['message' => 'Invalid File Type']);
        }
      } else {
        $postsModel = new ProductModel();
        $postsModel->update($id, $name, $description, $price, null);
      }
  }
}
