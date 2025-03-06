<?php
session_start();

// if(!isset($_SESSION['alradyLoggedIN'])){
    //     header("location:login.php");
    // }
    if(!isset($_SESSION['alradyLoggedIN'])){
        echo "<script> alert('Verify Login!') </script>";
        header('location: login.php');
    }
    include'connectdb.php';
    include'headerstaff.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Feedback</title>

    <link rel="stylesheet" href="Style/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <div class="start-btn">
        <a href="#">Give a Feedback</a>
    </div>
</head>
<style>
        ul li #A2{
        
        color: white;
     }
</style>

<body>
    <div class="center modal-box">
        <div class="fas fa-times"></div>
        <div class="form_container">
            <form method="POST" role="form">
                <h1>Feedback</h1>
                <div class="form_wrap">
                    <div class="form_item">
                        <input type="text" name="feedback" placeholder="Type here"
                            style="height:120px;border-radius:10px;">
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

    $fb = $_POST['feedback'];
    $from = "Staff";

    if(!empty( $fb)){

        $sql = "INSERT INTO feedback (by_cmt,from_where) VALUES (?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $fb, $from); // Corrected parameter types
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