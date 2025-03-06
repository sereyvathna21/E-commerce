<?php

session_start();
include 'connectdb.php';
include 'headerstaff.php';
if(!isset($_SESSION['alradyLoggedIN'])){
    echo "<script> alert('Verify Login!') </script>";
    header('location: login.php');
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
    ul li #A3 {

        color: white;
    }
</style>

<body>
    <h1>មកដល់ពេលឆាប់ៗនេះ</h1>
    <h1>
       
    </h1>

</body>

</html>