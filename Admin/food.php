<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha384-rvZcHfE8LdqqOlJqzY3H8gcDJo5RU8dUM8E2C5RcNInu7HLhq3oYl7KRvoqLOHp4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./styleII.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <title>Document</title>
</head>
<style>
.bannertop #food {
    background-color: #468f66;

    box-shadow: inset 0 0 1px rgb(0, 0, 0);
}

.categorybg .subcat1,
.categorybg .subcat2,
.categorybg .subcat3,
.categorybg .subcat4,
.categorybg .subcat5 {
    position: absolute;
    top: 830px;
}
</style>

<body>
    <header style="position: fixed;">
    <div class="header">
        <a href="#"><img src="./FONT & IMAGE/jkj.png" alt=""></a>

        <input type="search" name="search" id="input" class="form-control" placeholder="Search your product"
            required="required" title="">
        <button id="searchBtn"><i class="bi bi-search"></i><a href="#show"
                style="text-decoration: none ; color:aliceblue">Search</a></button>
    </div>
    <b>
        <p id="dis">10% OFF ON YOUR FIRST BUY NOW!</p>
    </b>
    <div class="bannertop">
        <ul><b>
                <b>
                    <li id="all"><a href="./index.php">All</a></li>
                    <li id="fruit"><a href="./fruit.php">Fruit</a></li>
                    <li id="vegetable"><a href="./vegetable.php">Vegetable</a></li>
                    <li id="food"><a href="./food.php">Food</a></li>
                    <li id="lifestyle"><a href="./lifestyle.php">Clothes</a></li>
                    <li id="aboutus"><a href="feedbackcustomers.php">Feedback Us</a></li>

                </b>
            </b>

        </ul>
    </div>

    </header>
        <!-- <img id="welcome" src="./FONT & IMAGE/welcome.png" alt="">
    <img id="banner" src="https://delishop.s3-ap-southeast-1.amazonaws.com/product/1709015445090" alt=""> -->
    <div class="container text-center">

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000"
            style="margin:25px 0px 25px 250px ;">
            <div class="carousel-inner" style="margin-top: 12%;"> 
                <div class="carousel-item active" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);">
                    <img src="./FONT & IMAGE/fresh-fruit.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);">
                    <img src="./FONT & IMAGE/fruit.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);">
                    <img src="./FONT & IMAGE/rice.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);">
                    <img src="./FONT & IMAGE/vegfrui.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                    <img src="./FONT & IMAGE/salmon.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class="categorybanner">

        <h1 style="margin-top: 25px; font-size:50px;  font-family:Verdana, Geneva, Tahoma, sans-serif; "><b id="category">Top sales Products</b></h1>
        <div class="categorybg">
            <img src="https://southlandrealtors.com/wp-content/uploads/iStock-11379962072.jpg" alt="">
            <div class="subcat1">
                <!-- <h3>Khmer<span> 
                    Rice</span></h3> -->
                <img src="https://adkrice.com/wp-content/uploads/2022/02/special-romdoul-khmer-rice-25.jpg" alt="">
            </div>
            <div class="subcat2">
                <!-- <h3>Dairy<span>&Product</span></h3> -->
                <img src="https://www.veggycation.com.au/siteassets/veggycationvegetable/bok-choy.jpg" alt="">
            </div>
            <div class="subcat3">
                <!-- <h3>Accessories<span>
                    &Clothes</span></h3> -->
                <img src="https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/358596959_232240316399603_3462274637679877943_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeEVqKiTlToNo6XjOtpZwRdHtjgphFPagNC2OCmEU9qA0BIASP0rB4FP4ncmfTRAcYEGcCEey9sXLIiGja194Vu6&_nc_ohc=5aDCrR7oOkUAX8ZcDr3&_nc_ht=scontent.fpnh19-1.fna&oh=00_AfCESxRtOIgEm6gB7Rh7dFOYz5f3mgm9hwBr5N-CXTHa5A&oe=65EAC043" alt="">
            </div>
            <div class="subcat4">
                <!-- <h3>Vegetable <span>&Fruit</span></h3> -->
                <img src="https://lifestylethai.files.wordpress.com/2017/05/durian.jpg" alt="">
            </div>
            <div class="subcat5">
                <!-- <h3>Beverage <span>&Water</span></h3> -->
                <img src="https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1674219617-51e4Sqrt30L._SL500_.jpg?crop=1xw:1.00xh;center,top&resize=980:*" alt="">
            </div>
        </div>
    </div>

    <div class="container text-center" id="show">
        <div class="row row-cols-3">
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $.ajax({
        url: "searchfood.php",
        type: "POST",
        data: {
            keyword: ''
        },
        success: function(data) {
            if (data.trim() === "") {
                // If the response is empty, display "Search not found"
                $(".row.row-cols-3").html(
                    "<h1 style='text-align: center; color: #333;'>Search not found</h1>");
            } else {
                // Display the search results
                $(".row.row-cols-3").html(data);
            }
        }
    });

    $("#input").on("keyup", function() {
        var keyword = $(this).val();
        $.ajax({
            url: "searchfood.php",
            type: "POST",
            data: {
                keyword: keyword
            },
            success: function(data) {
                if (data.trim() === "") {
                    // If the response is empty, display "Search not found"
                    $(".row.row-cols-3").html(
                        "<h1 style='text-align: center; color: #333;'>Search not found</h1>"
                    );
                } else {
                    // Display the search results
                    $(".row.row-cols-3").html(data);
                }
            }
        });
    });
});
</script>
<div class="footer_introduce" style="background-color:#52BE80;">
    <p style="text-align: center;"><img src="./FONT & IMAGE/jkj.png" alt="jkjshop" width="227" height="79"></p>

    <ul class="footer-contact normal" style="margin-right:10px;">
        <li class="fas fa-phone"><span>017 398 902</span></li>
        <li class="fas fa-clock"><span>7 days a week, from 10am to 8pm</span></li>
        <li class="far fa-envelope-open"><span><a href="#">jkj@gmail.com</a></span></li>
    </ul>
    <footer class="bg-body-tertiary text-center">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;"
                    href="#!" role="button"><i class="fab fa-facebook"></i></a>
                <!-- Google -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
                    href="#!" role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
                    href="#!" role="button"><i class="fab fa-instagram"></i></a>

            </section>
        </div>

    </footer>
    <div class="feedback-button" data-bs-toggle="modal" data-bs-target="#feedbackModal">
    <i class="fas fa-comment"></i>
</div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-body" href="#">JomkaKamjea</a>
    </div>
</div>
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="mb-3">
                        <label for="feedbackInput" class="form-label">Your Feedback</label>
                        <textarea class="form-control" id="feedbackInput" rows="8" placeholder="Give us a feedback"></textarea>
                    </div>
                    <button type="submit" class="btn btn-green" style="background-color: #52BE80;">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>