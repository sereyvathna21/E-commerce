<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include("connectdb.php");
if(!isset($_SESSION['alradyLoggedIN'])){
    echo "<script> alert('Verify Login!') </script>";
    header('location: login.php');
}
if (isset($_GET['id'])) {
    $_SESSION['status'] = "success";
    $id = $_GET['id'];
    $sql = "DELETE FROM staff WHERE staff_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i",$id);
    if ($stmt->execute()) {
        echo "<script>";
        echo "swal('Delete Product success!', 'Congrate bro !', 'success')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "swal('Delete Product failed!', 'Sorry bro !', 'error')";
        echo "</script>";
    }
}

header("Location: editstaff.php");
exit();
?>
