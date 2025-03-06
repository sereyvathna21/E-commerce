<?php
//   echo " <script>";
//   echo " swal('Please fill all information !', '', 'warning')";
//   echo " </script>";
session_start();
session_destroy();
header('location:loginstaff.php');
?>