<?php

session_start();

if (!isset($_SESSION['alradyLoggedIN'])) {
     echo "<script> alert('Verify Login!') </script>";
     header('location: login.php');
}
include 'connectdb.php';
include 'headerstaff.php';
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "test");
if (isset($_POST["add_to_cart"])) {
     $qty = 0;
     $id = $_GET['id'];
     $sql = "SELECT quantity from stock where product_id = $id";

     $data = $con->query($sql); // Connect and execute query
     if ($data->num_rows > 0) { // If there are rows returned from the database
          while ($row = $data->fetch_assoc()) {
               // Fetching other data...
               $qty = $row['quantity']; // Update $qty with fetched value
               // Rest of your loop...
          }
     }
     $available_quantity = $qty;
     // Get the quantity input by the user
     $input_quantity = $_POST["quantity"];

     if ($input_quantity > $available_quantity) {
          echo '<script>alert("Quantity exceeds available stock!")</script>';
          echo '<script>window.location="homepagestaff.php"</script>';
     } else {
          $remaining_quantity = $available_quantity - $input_quantity;
          $update_query = "UPDATE stock SET quantity = $remaining_quantity WHERE product_id = {$_GET['id']}";
          if ($con->query($update_query) === TRUE) {
               if (isset($_SESSION["shopping_cart"])) {
                    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
                    if (!in_array($_GET["id"], $item_array_id)) {
                         $count = count($_SESSION["shopping_cart"]);
                         $item_array = array(
                              'item_id' => $_GET["id"],
                              'item_name' => $_POST["hidden_name"],
                              'item_discount' => $_POST["hidden_discount"],
                              'item_price' => $_POST["hidden_price"],
                              'item_quantity' => $_POST["quantity"]
                         );
                         $_SESSION["shopping_cart"][$count] = $item_array;
                    } else {
                         echo '<script>alert("Item Already Added")</script>';
                         echo '<script>window.location="homepagestaff.php"</script>';
                    }
               } else {
                    $item_array = array(
                         'item_id' => $_GET["id"],
                         'item_name' => $_POST["hidden_name"],
                         'item_discount' => $_POST["hidden_discount"],
                         'item_price' => $_POST["hidden_price"],
                         'item_quantity' => $_POST["quantity"]
                    );
                    $_SESSION["shopping_cart"][0] = $item_array;
               }
          }

     }
}
if (isset($_GET["action"])) {
     if ($_GET["action"] == "delete") {
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
               if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="homepagestaff.php"</script>';
               }
          }
     }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Document</title>
</head>
<style>
     * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
     }

     ul li #A1 {

          color: white;
     }

     element.style {
          color: #E74C3C;
          font-size: 25px;
          margin-top: 75px;
          margin-left: 15px;
          position: absolute;
     }
</style>

<body>
     <div class=" container" style="margin-top:100px;margin-left:100px">
          <div class="row row-cols-4  g-3">
               <?php
               $sql = "SELECT p.product_id,p.product_name, p.price, p.discount, i.image_product, c.name, s.quantity
             FROM products AS p
             INNER JOIN stock AS s ON p.product_id = s.product_id
             INNER JOIN image AS i ON p.product_id = i.product_id  
             INNER JOIN category AS c ON p.category_id = c.category_id";
               $data = $con->query($sql); // Connect and execute query
               if ($data->num_rows > 0) { // If there are rows returned from the database
                    while ($row = $data->fetch_assoc()) {
                         $qty = $row['quantity'];
                         $proName = $row['product_name'];
                         $proID = $row['product_id'];
                         $discount = $row['discount'];
                         $proPrice = $row['price'];
                         $image = $row['image_product'];
                         $categoryName = $row['name'];
                         ?>
                         <form method="post" action="?action=add&id=<?php echo $proID ?>">

                              <div class="col mycard" style="width:315px;height:600px; margin-left:10px;">
                                   <div id="showdata" class="card h-100 " style="background-color:white;">
                                        <img class="image" src="imageUploads/<?php echo "$image" ?>"
                                             style="width:100%;height:50%;" />
                                        <div class="card-body">
                                             <h5 class="card-title mb-3" style="color:#909497;">
                                                  <?php
                                                  echo "$categoryName" ?>
                                             </h5>
                                             <h5 class="card-title mb-3" style="color:black;font-weight:600">
                                                  <?php
                                                  echo "$proName" ?>
                                             </h5>
                                             <div class="d-flex" style="margin-left: -10px;">
                                                  <?php
                                                  if ($discount > 0) {
                                                       ?>
                                                       <h5><span class="badge ms-2" style="background-color:#82E0AA ">Discount :
                                                                 <?php echo "$discount" ?>% off
                                                            </span></h5>
                                                       <?php

                                                  } else ?>
                                                  <h5><span class="badge ms-2" style="background-color:white">Discount :
                                                            <?php echo "$discount" ?>% off
                                                       </span></h5>
                                                  <?php

                                                  ?>
                                             </div>
                                             <div class="d-flex" style="margin-left: -10px;">
                                                  <?php
                                                  if ($qty > 0) {
                                                       ?>
                                                       <h5><span class="badge ms-2" style="background-color:#E74C3C">Available :
                                                                 <?php echo "$qty" ?>
                                                            </span></h5>
                                                       <?php
                                                  } else {
                                                       ?>
                                                       <h5><span class="badge ms-2" style="background-color:#E74C3C">Out of stock
                                                            </span></h5>
                                                       <?php
                                                  }

                                                  ?>
                                             </div>
                                             <div>
                                                  <h5 class="card-title mb-3"
                                                       style="color:#E74C3C;font-size:25px;margin-top:75px;margin-left:15px;position:absolute;">
                                                       <?php
                                                       //     $proPrice = 15.5; // Example price
                                                       if (is_float($proPrice)) {
                                                            echo "$" . number_format($proPrice, 2, '.', '');
                                                       } else {
                                                            echo "$" . number_format($proPrice, is_int($proPrice) ? 0 : 2, '.', '');
                                                            if (is_int($proPrice)) {
                                                                 echo ",00";
                                                            }
                                                       }
                                                       ?>

                                                  </h5>
                                                  <input type="text" name="quantity" class="form-control" value="1" />
                                                  <input type="hidden" name="hidden_name" value="<?php echo $proName ?>" />
                                                  <input type="hidden" name="hidden_price" value="<?php echo $proPrice ?>" />
                                                  <input type="hidden" name="hidden_discount" value="<?php echo $discount ?>" />
                                                  <input type="submit" name="add_to_cart"
                                                       style="margin-top:40px;margin-left:160px;" class="btn btn-success"
                                                       value="Add to Cart" />
                                                  <!-- <input type="number" name="quantity" class="form-control" value="1" />
                                   <input type="hidden" name="hidden_name" value="<?php
                                   //    echo $row["name"];       ?>" />
                                   <input type="hidden" name="hidden_price" value="<?php
                                   //    echo $row["price"];       ?>" />
                                   <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                                        value="Add to Cart" /> -->

                                             </div>
                                        </div>

                                   </div>
                              </div>
                         </form>

                         <?php
                         //     if(isset('$_POST['add')){
                         //     }
                    }
               } ?>
          </div>

     </div>
     <div style="clear:both"></div>
     <br />
     <h3>Order Details</h3>
     <div class="table-responsive">
          <table class="table table-bordered">
               <tr>
                    <th width="40%">Item Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Price</th>
                    <th width="20%">Discount</th>
                    <th width="15%">Full Price</th>
                    <!-- <th width="15%">After discont</th> -->
                    <th width="5%">Action</th>
               </tr>
               <?php
               if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                         ?>
                         <tr>
                              <td>
                                   <?php echo $values["item_name"]; ?>
                              </td>
                              <td>
                                   <?php echo $values["item_quantity"]; ?>
                              </td>
                              <td>$
                                   <?php echo $values["item_price"]; ?>
                              </td>
                              <td>
                                   <?php echo isset($values["item_discount"]) ? $values["item_discount"] : "0.00"; ?> %
                              </td>

                              <td>$
                                   <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>
                              </td>
                              <td><a href="homepagestaff.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                             class="text-danger">Remove</span></a></td>
                         </tr>
                         <?php
                         $total = $total + ($values["item_quantity"] * $values["item_price"]);
                         $afterdiscount = $total - ($total * ($values["item_discount"] / 100));
                    }
                    ?>
                    <tr>
                         <td colspan="3" align="right">Total</td>
                         <td align="right">$
                              <?php echo number_format($total, 2); ?>
                         </td>

                         <!-- <td>afterdiscount</td>
                         <td align="right">$
                         </td> -->
                    </tr>
                    <tr>
                         <td colspan="3" align="right">After discuont</td>
                         <td align="right">$
                              <?php echo number_format($afterdiscount, 2); ?>
                         </td>

                         <!-- <td>afterdiscount</td>
                         <td align="right">$
                         </td> -->
                    </tr>
                    <?php
               }
               ?>
          </table>
     </div>
     </div>
</body>

</html>
<style>
     element.style {
          color: white;
          font-size: 35px;
     }
</style>