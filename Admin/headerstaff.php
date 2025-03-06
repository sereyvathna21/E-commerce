<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script language="javascript" type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.12/p5.js"></script>
    <script language="javascript" type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.12/addons/p5.dom.js"></script>
    <script language="javascript" type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.12/addons/p5.sound.js"></script>
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm" style="background-color:#27AE60 ;">
        <div class="container">
            <a style="color:gold" class="navbar-brand" href="#"><i class="fa-solid fa-shop me-2"></i> <strong>J K
                    J</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
                <div class="input-group">
                    <span class="border-warning input-group-text bg-warning text-white"><i
                            class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control border-warning" style="color:#7a7a7a">
                    <button class="btn btn-warning text-white">Search</button>
                </div>
            </div>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <div class="ms-auto d-none d-lg-block">
                    <div class="input-group">
                        <span class=" input-group-text text-white"
                            style="background-color:#82E0AA;border-color:#82E0AA"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control" style="border-color:#82E0AA;">
                        <button class="btn btn-warning text-white">Search</button>
                    </div>
                </div>
                <ul class="navbar-nav ms-auto ">

                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" id="A1" href="homepagestaff.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" id="A2" href="feedbackstaff.php">FeedBack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" id="A3" href="orderhistory.php">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" id="A4" href="settings.php">Settings</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" id="A5" href="#"><i
                                class="fa-solid fa-cart-shopping me-1"></i>
                            Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" id="A6" href="logoutstaffs.php"><i
                                class="fa-solid fa-circle-user me-1"></i>
                            Logout </a>
                    </li>
                    <li class="nav-item">
                        <a style="color:#27AE60;" class="nav-link mx-2 text-uppercase" id="A6" href="#"><i
                                class="fa-solid fa-circle-user me-1"></i>
                            Account</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link mx-2 text-uppercase" id="A6" href="#"><i
                                class="fa-solid fa-circle-user me-1"></i> -->
                            <?php
                            if (isset($_SESSION['lastname'])) {
                                echo "<span id='english' style='font-size:1.2rem;color:gold;margin-left:30px;' class='nav-item'>" . $_SESSION['lastname'] . "</span>&emsp;";
                                echo "<img src='imageUploads/" . $_SESSION['staff_image'] . "' alt='user' style='width:40px;border-radius:15px;' class='IMAGE'>";
                            }
                            ?>
                        <!-- </a> -->
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
<style>
    .IMAGE:hover{
        -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
  transition: transform 0.3s ease;

    }
    nav ul li a {
        color: blue;
    }

    .btn-warning {
        color: #000;
        background-color: #82E0AA;
        border-color: #82E0AA;
    }

    a {
        font-size: 14px;
        font-weight: 700;
        color: white;
    }

    .superNav {
        font-size: 13px;
    }

    .form-control {
        outline: none !important;
        box-shadow: none !important;
    }

    @media screen and (max-width:540px) {
        .centerOnMobile {
            text-align: center
        }
    }
</style>