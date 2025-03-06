<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];

    $sql = "SELECT p.product_name, p.price, i.image_product, p.description ,p.discount
            FROM products p 
            INNER JOIN image i ON p.image_id = i.image_id
            WHERE p.product_name LIKE '%$keyword%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = $row['image_product'];
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img src='./imageUploads/$image' class='card-img-top' alt='Product'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['product_name']}</h5>";
            echo "<p class='card-text'>{$row['description']}</p>";

            ?>
            
            <?php
            if($row['discount'] > 0)
            {

                echo "<h1 class='card-text' style='color:red;font-size:24px;'>{$row['discount']} %</h1>";
            }

            else{
                echo "<p class='card-text' style='color:white'>{$row['discount']} %</p>";


            }
        ?>
        <?php

            

            echo "</div>";
            echo "<div class='card-footer text-center'>";
            echo "<h6>{$row['price']}$</h6>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // No results found, display the message
        echo "<div class='col-12' style='text-align: center; margin-top: 70px;'>";
        echo "<h1 style='color: #333;'>មិនមានទំនិញ</h1>";
        echo "</div>";
    }
}
?>
