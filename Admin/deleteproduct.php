<?php
include("connectdb.php");
session_start();
if(!isset($_SESSION['alradyLoggedIN'])){
    echo "<script> alert('Verify Login!') </script>";
    header('location: login.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE product_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['status'] = "success";
        header("Location: editproduct.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        header("Location: editproduct.php");
        exit();
    }
}
?>
