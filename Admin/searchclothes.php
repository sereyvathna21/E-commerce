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

    $sql = "SELECT p.product_name, p.price, i.image_product, p.description,p.discount
    FROM products p 
    INNER JOIN image i ON p.image_id = i.image_id
    WHERE p.product_name LIKE '%$keyword%' AND p.category_id = 8
    ORDER BY p.category_id";



    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = $row['image_product'];
            echo "<div class='card' style='width: 18rem;height: 600px; ' id='card'>";
            echo "<img src='./imageUploads/$image' class='card-img-top' alt='Product'>";
            echo "<div class='card-body'>";
            echo "<h1>{$row['product_name']}</h1>";
            echo "<p class='card-text'>{$row['description']}</p>";


            echo "</div>";
           
            echo "<div class='card-footer text-center' style='margin-top:-20px;'>";
            echo "<h2>{$row['price']}$</h2>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // No results found, display the centered message
        echo "<div class='col-12' style='text-align: center; margin-top: 70px;'>";
        echo "<h1 style='color: #333;'>មិនមានទំនិញ</h1>";
        echo "</div>";
    }
}
