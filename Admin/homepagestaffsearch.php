<?php
include 'connectdb.php';

$name = $_POST['name'];

$sql = "SELECT p.product_id, p.product_name, p.price, i.image_product, c.name 
        FROM products AS p
        INNER JOIN image AS i ON p.product_id = i.product_id  
        INNER JOIN category AS c ON p.category_id = c.category_id 
        WHERE p.product_name LIKE '%$name%' ";
$query = mysqli_query($con, $sql);

$data = '';
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $image = $row['image_product'];
        $proID = $row['product_id'];
        $data .= "<tr>
        <td>{$row['product_id']}</td>
        <td>{$row['product_name']}</td>
        <td>{$row['price']}</td>
        <td>{$row['name']}</td>
        <td><img src='imageUploads/$image' style='width:50px;'></td>
        <td>
            <a id='khmer' href=\"productdetail.php?show&id=$proID\" style=\"background-color:#A9DFBF;border-radius:50px;width:100px;margin-left:-15px;display:flex;justify-content: center;font-size:15px;font-weight:500;\">
                <button style=\"text-align:center;background-color:#A9DFBF;\">មើលបន្ថែម</button>
            </a>
        </td>
    </tr>";
    }
} else {
    $data = "<tr><td colspan='6'>No results found</td></tr>";
}

echo $data;
?>
