<?php
include 'connectdb.php';
// session_start();
// if(!isset($_SESSION['alradyLoggedIN'])){
//     header("location:login.php");
// }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration form</title>

  <link rel="stylesheet" href="Style/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <div class="start-btn">
    <a href="#">Click to feedback</a>
  </div>
</head>
<style>
    body{
  font-family: 'Poppins',sans-serif;
  margin: 0;
  justify-content: center;
  align-items: center;
  background-image: url(../image/farm4.gif);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  background-color: black;
}
</style>
<body>
  <div class="center modal-box">
    <div class="fas fa-times"></div>
    <div class="form_container">
      <form method="POST" role="form">
        <h1>Give us a feedback</h1>
        
        <div class="form_wrap" style="margin-top:40px;">
          <div class="form_item">
            <label style="font-size:15px;">Rate our services</label>
            <input type="number" name="rate" placeholder="? / 5">
          </div>
        </div>
       

        <div class="form_wrap">
          <div class="form_item">
            <label>Comment</label>
            <input type="text" name="comment" placeholder="Type here">
            <div class="error" id="phone"></div>
          </div>
        </div>
        
        <div class="btn">
          <input type="submit" value="Confirm" name="submit">
      </form>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('.start-btn').click(function () {
        $('.modal-box').toggleClass("show-modal");
        $('.start-btn').toggleClass("show-modal");
      });
      $('.fa-times').click(function () {
        $('.modal-box').toggleClass("show-modal");
        $('.start-btn').toggleClass("show-modal");
      });
    });
  </script>
</body>

</html>

<?php


if (isset($_POST['submit'])) {
    $rate = $_POST['rate'];
    $cmt = $_POST['comment'];

    $from = "Customers";

    if(!empty( $rate &&  $cmt )){

        $sql = "INSERT INTO feedback (by_rate,by_cmt,from_where) VALUES (?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $rate,$cmt,$from); // Corrected parameter types
        if ($stmt->execute()) {
          
                        echo " <script>";
                        echo " swal('Successfully !', '', 'success')";
                        echo " </script>";
                        exit;
    
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $con->close();
    }
    else{
        echo " <script>";
        echo " swal('Type somthing !', '', 'error')";
        echo " </script>";   
    }
  }


  ?>