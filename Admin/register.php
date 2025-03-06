<?php
include 'connectdb.php';
// session_start();
// if(!isset($_SESSION['alradyLoggedIN'])){
//     header("location:login.php");
// }
if (isset($_POST['submit'])) {
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $username = $_POST['email'];
  $pass = $_POST['pwd'];
  $confirmpass = $_POST['cfpassword'];
  $encrypt = md5($pass);
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $usertype = "Customer";
  if (empty($fname) || empty($lname) || empty($username) || empty($pass) || empty($gender) || empty($phone) || empty($city)) {
    $message = "Please fill all informatioin";
    echo "<script type='text/javascript'>alert(\"$message\"); document.querySelector('.swal-text').style.color = 'red';</script>";
  } else {
    if (strlen($fname) >= 255 || strlen($lname) >= 255 || !preg_match("/^[a-zA-Z-a'\s]+$/", $fname)) {
      echo "Please enter a valid name";
    } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
      echo " Please enter a valid email";
    } 
    else if ($confirmpass !== $pass) 
    {
      $message = "Username and/or Password incorrect.\\nTry again.";
      echo "<script type='text/javascript'>alert('$message');</script>";
    } 
    else {
      $sql = "INSERT INTO customers (first_name,last_name,phone,city,username,password) VALUES (?,?,?,?,?,?)";
      // $sql ="INSERT INTO users(username,password,usertype)VALUES (?,?,?)";
      $stmt = $con->prepare($sql);
      $stmt->bind_param("ssssss", $fname, $lname, $phone, $city, $username, $encrypt);
      if ($stmt->execute()) {
        $customer_id = $con->insert_id;
        $sql_user = "INSERT INTO users (username,password,usertype) VALUES (?,?,?)";
        $stmt_user = $con->prepare($sql_user);
        $stmt_user->bind_param("sss", $username, $encrypt, $usertype);

        if ($stmt_user->execute()) {
          header("Location: login.php");
          exit();
        }
        // header('Location:login.php');
      } else {
        echo "Error: " . $stmt->error;
      }
      $stmt->close();
      $conn->close();
    }
  }
  // $stmt->execute([$username, $password,$usertype]);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration form</title>

  <link rel="stylesheet" href="Style/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <div class="start-btn">
    <a href="#">Registration</a>
  </div>
</head>

<body>
  <div class="center modal-box">
    <div class="fas fa-times"></div>
    <div class="form_container">
      <form method="POST" role="form">
        <div class="form_wrap form_grp">
          <div class="form_item">
            <label>First Name</label>
            <input type="text" name="first_name" placeholder="First Name">
          </div>
          <div class="form_item">
            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name">
          </div>
        </div>
        <div class="form_wrap">
          <div class="form_item">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Email">
          </div>
        </div>
        <div class="form_wrap form_grp">
          <div class="form_item">
            <label>Password</label>
            <input type="password" name="pwd" placeholder="Password">

          </div>
          <div class="form_item">
            <label>Confirm Password</label>
            <input type="password" name="cfpassword" placeholder="Confirm Password">

          </div>
        </div>
        <div class="form_wrap">
          <div class="form_item">
            <label>Gender</label>
            <select name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">others</option>
            </select>
          </div>
        </div>
        <div class="form_wrap">
          <div class="form_item">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="Phone Number">
            <div class="error" id="phone"></div>
          </div>
        </div>
        <div class="form_wrap">
          <div class="form_item">
            <label>City</label>
            <select name="city">
              <option value="Phnom Penh">Phnom Penh</option>
              <option value="Battambang">Battambang</option>
              <option value="Pailin">Pailin</option>
              <option value="Pursat">Pursat</option>
              <option value="Kompong Chhnang">Kompong Chhnang</option>
              <option value="Kondal">Kondal</option>
              <option value="Svay Rieng">Svay Rieng</option>
              <option value="Kratie">Kratie</option>
              <option value="Siem Reap">Siem Reap</option>
              <option value="Kampong Cham">Kampong Cham</option>
              <option value="Banteay Meanchey">Banteay Meanchey</option>
              <option value="Kampong Thom">Kampong Thom</option>
              <option value="Preah Vihear">Preah Vihear</option>
              <option value="Prey Veng">Prey Veng</option>
              <option value="Stung Treng">Stung Treng</option>
              <option value="Kampot">Kampot</option>
              <option value="Tbong Khmum">Tbong Khmum</option>
              <option value="Kampong Speu">Kampong Speu</option>
              <option value="Koh Kong">Koh Kong</option>
              <option value="Kampong Chhnang">Kampong Chhnang</option>
              <option value="Mondulkiri">Mondulkiri</option>
              <option value="Oddar Meanchey">Oddar Meanchey</option>
              <option value="Pursat">Pursat</option>
              <option value="Ratanakiri">Ratanakiri</option>
            </select>
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