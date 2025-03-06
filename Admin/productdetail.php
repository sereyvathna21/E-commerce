<?php
include 'connectdb.php';
include 'dashboardII.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/font.css">
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <form class="requires-validation" novalidate>
                            <?php
                            $id = $_GET["id"];
                            $sql = "SELECT p.product_id, p.product_name, p.price, p.description, p.discount, i.image_product, c.name, s.quantity
                                    FROM products AS p
                                    INNER JOIN stock AS s ON p.product_id = s.product_id
                                    INNER JOIN image AS i ON p.product_id = i.product_id  
                                    INNER JOIN category AS c ON p.category_id = c.category_id
                                    WHERE p.product_id = $id";
                            $data = $con->query($sql);

                            if ($data->num_rows > 0) {
                                while ($row = $data->fetch_assoc()) {
                                    $proID = $row['product_id'];
                                    $proName = $row['product_name'];
                                    $proPrice = $row['price'];
                                    $description = $row['description'];
                                    $image = $row['image_product'];
                                    $categoryName = $row['name'];
                                    $qty = $row['quantity'];
                                    $discount = $row['discount'];
                                    ?>
                                    <div class="col-md-12">
                                        <?php echo "<img src='imageUploads/$image' class='img-thumbnail' style='margin-left:650px;width:250px;height:250px;position:absolute;margin-top:50px;'>"; ?>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 id="khmer" style="margin-top:0px;font-weight:500;font-size:40px;color:#E67E22;">
                                            <?php echo " លេខផលិតផល : $proID"; ?>
                                        </h3>
                                        <h1 style="font-size: 19px;margin-top:20px;"><b id="khmer">ឈ្មោះផលិតផល :</b>
                                            <?php echo "$proName"; ?>
                                        </h1>
                                        <h1 style="font-size: 19px;"><b id="khmer">តម្លៃ :</b>
                                            <?php echo "$ $proPrice "; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        </h1>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 style="font-size: 19px;"><b id="khmer">ពិពណ៌នា :</b>
                                            <?php echo "$description"; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        </h1>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 style="font-size: 19px;"> <b id="khmer">បញ្ចុះតម្លៃ: </b>
                                        </h1>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 id="khmer" style="font-size: 19px;"><b id="khmer">ប្រភេទ :</b>
                                            <?php echo "<span id='english' style='font-size:1.2rem'>$categoryName</span> ចំនួន: $qty"; ?>
                                        </h1>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="col-md-12" style="margin-top:100px">
                                <div class="form-button">
                                    <a id="khmer" style="text-decoration: none; width:100px;height:40px;background-color:#58D68D ;border-radius:15px;color:white;position:absolute;" href="updateproduct.php?show&id=<?php echo $proID ?>">&emsp;កែតម្រូវ</a>
                                </div>
                                <div class="form-button">
                                    <a id="khmer" style="text-decoration: none; width:125px;height:40px;background-color:#E74C3C ;border-radius:15px;color:white;margin-left:120px;" href="deleteproduct.php?show&id=<?php echo $proID ?>">&emsp;លុបទិន្នន័យ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

    *,
    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        -moz-osx-font-smoothing: grayscale;
    }

    html,
    body {
        height: 100%;
        background-color: #152733;
        overflow: hidden;
    }

    .form-holder {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 100vh;
    }

    .row {
        background-color: #ABEBC6;
    }

    .form-holder .form-content {
        margin-left: 500px;
        ;
        position: relative;
        text-align: center;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-align-items: center;
        align-items: center;
        padding: 60px;
    }

    .form-content .form-items {
        margin-left: -30%;
        border: 3px solid #fff;
        padding: 40px;
        display: inline-block;
        width: 1000px;
        min-width: 540px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        text-align: left;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .form-content h3 {
        color: #fff;
        text-align: left;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .form-content h3.form-title {
        margin-bottom: 30px;
    }


    .form-content p {
        color: #fff;
        text-align: left;
        font-size: 17px;
        font-weight: 300;
        line-height: 20px;
        margin-bottom: 30px;
    }


    .form-content label,
    .was-validated .form-check-input:invalid~.form-check-label,
    .was-validated .form-check-input:valid~.form-check-label {
        color: #fff;
    }

    .form-content input[type=text],
    .form-content input[type=password],
    .form-content input[type=email],
    .form-content select {
        width: 100%;
        padding: 9px 20px;
        text-align: left;
        border: 0;
        outline: 0;
        border-radius: 6px;
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        color: #8D8D8D;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        margin-top: 16px;
    }


    .btn-primary {
        background-color: #6C757D;
        outline: none;
        border: 0px;
        box-shadow: none;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
        background-color: #495056;
        outline: none !important;
        border: none !important;
        box-shadow: none;
    }

    .form-content textarea {
        position: static !important;
        width: 100%;
        padding: 8px 20px;
        border-radius: 6px;
        text-align: left;
        background-color: #fff;
        border: 0;
        font-size: 15px;
        font-weight: 300;
        color: #8D8D8D;
        outline: none;
        resize: none;
        height: 120px;
        -webkit-transition: none;
        transition: none;
        margin-bottom: 14px;
    }

    .form-content textarea:hover,
    .form-content textarea:focus {
        border: 0;
        background-color: #ebeff8;
        color: #8D8D8D;
    }

    .mv-up {
        margin-top: -9px !important;
        margin-bottom: 8px !important;
    }

    .invalid-feedback {
        color: #ff606e;
    }

    .valid-feedback {
        color: #2acc80;
    }
</style>