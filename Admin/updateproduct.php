<?php
include('connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link rel="stylesheet" href="./Style/font.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ABEBC6;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 id="khmer" style="font-size: 2.3rem;padding:1%">កែទិន្នន័យ
                            <a href="editproduct.php" class="btn float-end" style="background-color:green; color:white;">ត្រឡប់</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $sql_id = mysqli_real_escape_string($con, $_GET['id']);

                            $query = "SELECT p.product_id, p.product_name, p.price, p.description, p.discount, i.image_product, c.name, s.quantity
                            FROM products AS p
                            INNER JOIN stock AS s ON p.product_id = s.product_id
                            INNER JOIN image AS i ON p.product_id = i.product_id  
                            INNER JOIN category AS c ON p.category_id = c.category_id
                            WHERE p.product_id = $sql_id ";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $sql = mysqli_fetch_array($query_run);
                        ?>
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label id="khmer">ឈ្មោះផលិតផល</label>
                                        <input type="text" name="proname" value="<?= htmlspecialchars($sql['product_name']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">តម្លៃផលិតផល</label>
                                        <input type="text" name="price" value="<?= htmlspecialchars($sql['price']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">ពិពណ៍នាពីផលិតផល</label>
                                        <input type="text" name="discription" value="<?= htmlspecialchars($sql['description']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">បញ្ចុះតម្លៃ</label>
                                        <input type="text" name="discount" value="<?= htmlspecialchars($sql['discount']); ?>" class="form-control">
                                    </div>
                                    <div class="selcet_cate">
                                        <label id="khmer">ប្រភេទផលិតផល :</label>
                                        <select class="form-select" name="select_category">
                                            <option value="8">Clothing</option>
                                            <option value="9">Food</option>
                                            <option value="10">Vegetable</option>
                                            <option value="17">Fruit</option>
                                        </select>
                                    </div>
                                    <div class="mb-3" style="margin-top:20px;">
                                        <label id="khmer">ចំនួន</label>
                                        <input type="number" name="qty" value="<?= htmlspecialchars($sql['quantity']); ?>" class="form-control">
                                    </div>

                                    <div class="mb-3" style="margin-top:40px;">
                                        <label id="khmer">រូបភាពផលិតផល</label>
                                        <img class="image" src="imageUploads/<?php echo $sql['image_product']; ?>" style="width:100px; border-radius:10px;" />

                                        <input style="margin-top:10px;" type="file" name="pro_image" value="<?= htmlspecialchars($sql['image_product']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button style="color:white" id="khmer" type="submit" name="update_product" class="btn btn-primary">កែទិន្នន័យ</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_product'])) {
        $name = $_POST['proname'];
        $price = $_POST['price'];
        $category = $_POST['select_category'];
        $description = $_POST['discription'];
        $stock = $_POST['qty'];
        $dis = $_POST['discount'];
        $namefile = $_FILES['pro_image']['name'];
        $tempname = $_FILES["pro_image"]["tmp_name"];
        move_uploaded_file($tempname, 'imageUploads/' . $namefile);

        $id = $_GET['id'];

        // Begin transaction
        $con->begin_transaction();

        // Update products table
        $sql = "UPDATE products 
                SET product_name = ?, price = ?, description = ?, discount = ?, category_id = ?
                WHERE product_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sdssii", $name, $price, $description, $dis, $category, $id);
        $stmt->execute();

        // Update image table
        $sql_image = "UPDATE image SET image_product = ? WHERE product_id = ?";
        $stmt_image = $con->prepare($sql_image);
        $stmt_image->bind_param("si", $namefile, $id);
        $stmt_image->execute();

        // Update stock table
        $sql_stock = "UPDATE stock SET quantity = ? WHERE product_id = ?";
        $stmt_stock = $con->prepare($sql_stock);
        $stmt_stock->bind_param("ii", $stock, $id);
        $stmt_stock->execute();

        // Commit transaction if all updates are successful
        if ($stmt->affected_rows > 0 && $stmt_image->affected_rows > 0 && $stmt_stock->affected_rows > 0) {
            $con->commit();
            header("Location: editproduct.php");
            echo "<script>";
            echo "swal('Add Product success!', 'Congrate bro !', 'success')";
            echo "</script>";
            exit;
        } else {
            $con->rollback();
            echo "Error updating product: " . $stmt->error;
        }
    }
}
?>