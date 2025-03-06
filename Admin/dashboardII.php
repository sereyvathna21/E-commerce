<?php
include 'connectdb.php';
session_start();
if(!isset($_SESSION['alradyLoggedIN'])){
  echo "<script> alert('Verify Login!') </script>";
  header('location: login.php');
}
?>
<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Dashboard | By Code Info</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./Style/font.css">
    <link rel="stylesheet" href="./Style/style.css">
  </head>

  <body>
    <div class="container">
      <nav>
        <ul>
          <li><a href="#" class="logo">
              <?php
              if (isset($_SESSION['name'])) {
                echo "<img src='imageUploads/" . $_SESSION['image'] . "' alt='user'>";
                echo "<span id='english' style='font-size:1.2rem' class='nav-item'>" . $_SESSION['name'] . "</span>";
              }
              ?>
            </a></li>
          <li><a href="admin.php" id="a1">
              <iP
          <li><a href="addproduct.php" id="a2">
              <i class="fas fa-user"></i>
              <span id="khmer" class="nav-item">បន្ថែមផលិតផល</span>
            </a></li>
          <li><a href="editproduct.php" id="a3">
              <i class="fas fa-wallet"></i>
              <span id="khmer" class="nav-item">គ្រប់គ្រងផលិតផល</span>
            </a></li>
          <li><a href="addstaff.php" id="a4">
              <i class="fas fa-tasks"></i>
              <span id="khmer" class="nav-item">បន្ថែមបុគ្គលិក</span>
            </a></li>
          <li><a href="editstaff.php" id="a5">
              <i class="fas fa-cog"></i>
              <span id="khmer" class="nav-item">គ្រប់គ្រងបុគ្គលិក</span>
            </a></li>
          <li><a href="./logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span id="khmer" class="nav-item">ចាកចេញ</span>
            </a></li>
        </ul>
      </nav>

      </section>
    </div>
  </body>

  </html>
</span>