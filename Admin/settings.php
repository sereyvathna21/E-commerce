<?php
session_start();
if(!isset($_SESSION['alradyLoggedIN'])){
    echo "<script> alert('Verify Login!') </script>";
    header('location: login.php');
}
include 'connectdb.php';
include 'headerstaff.php';

// if(!isset($_SESSION['alradyLoggedIN'])){
//     header("location:login.php");
// }
// if (isset($_SESSION['login'])) {
//     echo "<span class='nav-item'>" . $_SESSION['login'] . "</span>";
//     echo"<script>alert(' hello' );</script>";
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
        <a href="#">Change password</a>
    </div>
</head>
<style>
    ul li #A4 {

        color: white;
    }
</style>

<body>
    <div class="center modal-box">
        <div class="fas fa-times"></div>
        <div class="form_container">
            <form method="POST" role="form">
                <h1>Change password</h1>
                <p>Your password must be at least 6 characters and should include a combination of number, letters and
                    special characters (!$@$%)</p>


                <div class="form_wrap">
                    <div class="form_item">
                        <input type="password" name="oldpass" placeholder="Current password">
                        <div class="error" id="phone"></div>
                    </div>
                </div>
                <div class="form_wrap form_grp">
                    <div class="form_item">
                        <input type="password" name="newpass" placeholder="New password">

                    </div>
                    <div class="form_item">
                        <input type="password" name="cfnewpass" placeholder="Retype new Password">

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


<?php
if (isset($_POST['submit'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $cfpass = $_POST['cfnewpass'];
    $oldpassencrypt = md5($oldpass);
    $newpassencrypt = md5($newpass);
    $id = $_SESSION['login'];
    $sql = "SELECT * FROM staff WHERE staff_id ='$id'";
    $data = $con->query($sql);
    if ($data->num_rows > 0) {
        $row = $data->fetch_assoc();
        // echo $row['password'];
        if (empty($oldpass) || empty($newpass) || empty($cfpass)) {

            echo " <script>";
            echo " swal('Please fill all information !', '', 'warning')";
            echo " </script>";
        } else {
            if ($newpass != $cfpass) {
                echo " <script>";
                echo " swal('Password is not match !', '', 'error')";
                echo " </script>";
            } else if ($oldpassencrypt != $row['password']) {
                echo " <script>";
                echo " swal('Wrong password!', '', 'error')";
                echo " </script>";
            } else {
                $sql = "UPDATE staff SET password=? WHERE staff_id=?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("si",$newpassencrypt, $id);
                if ($stmt->execute()) {
                    // header("Location: editstaff.php");
                    echo " <script>";
                    echo " swal('Success!', '', 'success')";
                    echo " </script>";
                    exit();
                }


            }
        }
    } else {
        echo "<center><p style='color:red'>Login error</p></center>";
    }


}




?>