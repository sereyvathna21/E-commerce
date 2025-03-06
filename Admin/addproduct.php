<?php
include 'dashboardII.php';
include 'connectdb.php';
if(!isset($_SESSION['alradyLoggedIN'])){
  echo "<script> alert('Verify Login!') </script>";
  header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link rel="stylesheet" href="./Style/addproduct.css">
  <link rel="stylesheet" href="./Style/font.css">
  <title>Add Product</title>
</head>
<style>

</style>

<body>
  <div class="topped">
    <h1 style="font-size: 2.4rem;text-align:center;color:red;padding-bottom:2%" id="khmer">គាំទ្រផលិតផលខ្មែរ</h1>
    <form class="mt-4" method="POST" role="form" enctype="multipart/form-data">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline" data-mdb-input-init>
            <label id="khmer" class="form-label" for="form3Example1">ឈ្មោះផលិតផល</label>
            <input type="text" id="form3Example1" class="form-control" name="name"/>
          </div>
        </div>
        <div class="col">
          <div class="form-outline" data-mdb-input-init>
            <label id="khmer" class="form-label" for="form3Example2">តម្លៃផលិតផល</label>
            <input type="text" id="form3Example2" class="form-control" name="price" />
          </div>
        </div>
      </div>

      <!-- Email input -->
      <div class="selcet_cate">
        <label id="khmer">ប្រភេទផលិតផល :</label>
        <select class="form-select" name="select_category">
          <option value="8">Clothing</option>
          <option value="9">Food</option>
          <option value="10">Vegetable</option>
          <option value="17">Fruit</option>
        </select>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4" data-mdb-input-init style="margin-top:20px;">
        <label id="khmer" class="form-label" for="form3Example4">ពិពណ៌នាពីផលិតផល</label>
        <input type="text" id="form3Example4" class="form-control" name="discription" />
      </div>
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline" data-mdb-input-init>
            <label id="khmer" class="form-label" for="form3Example1">ចំនួនផលិតផល</label>
            <input type="text" id="form3Example1" class="form-control" name="qty" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline" data-mdb-input-init>
            <label id="khmer" class="form-label" for="form3Example2">ភាគរយបញ្ចុះតម្លៃ</label>
            <input type="text" id="form3Example2" class="form-control" name="dis" />
          </div>
        </div>
        <div class="mb-3" style="margin-top:20px;">
          <label id="khmer" for="video_url" class="form-label">រូបភាពផលិតផល</label>
          <input type="file" class="form-control" name="filename">
        </div>
      </div>

      <!-- Checkbox -->

      <!-- Submit button -->
      <button id="khmer" type="submit" style="color: white; margin-top:-2%" class="btn btn-primary btn-block mb-4" name="submit">បញ្ចូលផលិតផល</button>

      <!-- Register buttons -->

    </form>
  </div>
  <img style="float: right;margin-right:7%;border:black solid 5px;margin:3%" src="./image/rice.jpg" width="25%">

</body>

</html>

<?php


if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['select_category'];
  $description = $_POST['discription'];
  $stock = $_POST['qty'];
  $dis = $_POST['dis']; // Fixed assignment operator
  $namefile = $_FILES['filename']['name']; //filename
  $tempname = $_FILES["filename"]["tmp_name"]; //temp name

  move_uploaded_file($tempname, 'imageUploads/' . $namefile);

  $sql = "INSERT INTO products (product_name, price, category_id, description, discount) VALUES (?, ?, ?, ?, ?)";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("sdisi", $name, $price, $category, $description, $dis); // Corrected parameter types
  if ($stmt->execute()) {
    $product_id = $con->insert_id;
    $sql_image = "INSERT INTO image (image_product, product_id) VALUES (?, ?)";
    $stmt_image = $con->prepare($sql_image);
    $stmt_image->bind_param("si", $namefile, $product_id);

    if ($stmt_image->execute()) {
      $image_id = $con->insert_id;
      $sql_update = "UPDATE products SET `image_id` = ? WHERE `product_id` = ?";
      $stmt_update = $con->prepare($sql_update);
      $stmt_update->bind_param("ii", $image_id, $product_id); // Fixed order of parameters
      if ($stmt_update->execute()) {
        $sql_stock = "INSERT INTO stock (product_id, quantity) VALUES (?, ?)";
        $stmt_stock = $con->prepare($sql_stock);
        $stmt_stock->bind_param("ii", $product_id, $stock);
        if ($stmt_stock->execute()) {
          echo " <script>";
          echo " swal('Add Product success!', 'Congrate bro !', 'success')";
          echo " </script>";
          exit;
        }
      }
    }
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
  $con->close();
}
?>