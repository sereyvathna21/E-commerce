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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Staff Detail</title>
    <link rel="stylesheet" href="./Style/font.css">
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">

                        <div class="col-md-12">
                            <?php
                            $id = $_GET["id"];
                            $sql = "SELECT staff_id, firstname,lastname,staff_image,phone_number,gender,hire_date,date_of_birth,city from staff where staff_id = $id";
                            $data = $con->query($sql);

                            if ($data->num_rows > 0) {
                                while ($row = $data->fetch_assoc()) {
                                    $staffID = $row['staff_id'];
                                    $fname = $row['firstname'];
                                    $lname = $row['lastname'];
                                    $gender = $row['gender'];
                                    $phone = $row['phone_number'];
                                    $dob = $row['date_of_birth'];
                                    $hire_date = $row['hire_date'];
                                    $city = $row['city'];
                                    $image = $row['staff_image'];
                                    echo "<img src='imageUploads/$image' class='img-thumbnail' style='margin-left:450px;width:200px;height:200px;'>";
                                    ?>
                                    <h3 id="khmer" style="position:absolute;margin-top:-200px;font-weight:500;font-size:40px;color:black"><i style='font-size:35px;color:black' class='far'>&#xf2b9;</i> &emsp; លេខកាត : <?php echo "$staffID"; ?></h3>
                                    <h1 id="khmer" style="font-size: 35px;"><?php echo "ឈ្មោះ: <span id='english' style='font-size:2.3rem'>$fname $lname</span>" ?> </h1>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h1 id="khmer" style="font-size: 19px;">ថ្ងៃ ខែ ឆ្នាំ កំណើត : <?php echo "<span id='english' style='font-size:1.5rem'>$dob</span>" ?> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&emsp;&emsp;ថ្ងៃចូលធ្វើការ : <?php echo "<span id='english' style='font-size:1.5rem'>$hire_date</span>"; ?></h1>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h1>
                                        <h1 id="khmer" style="font-size: 19px;">ទីលំនៅបច្ចុប្បន្ន: <?php echo "<span id='english' style='font-size:1.5rem'>$city</span>" ?> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&emsp;&emsp;ភេទ : <?php echo "<span id='english' style='font-size:1.5rem'>$gender</span>"; ?></h1>
                                    </h1>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h1>
                                        <h1 id="khmer" style="font-size: 19px;">លេខទូរសព្ទ័: <?php echo "<span id='english' style='font-size:1.5rem'>$phone</span>" ?></h1>
                                </div>
                    <?php
                                }
                            }
                    ?>
                            <hr>
                            <div class="col-md-12" style="margin-left:600px;">
                                <div class="form-button mt-3">
                                    <a href="updatestaff.php?show&id=<?php echo $staffID ?>" style="border-radius: 10px;width:50px;height:10px;background-color:#2ECC71;color:white">
                                        <button id="submit" type="submit" style="font-family:kh-koulen" class="btn">កែតម្រូវ</button>
                                    </a>
                                </div>
                                <div class="form-button mt-3">
                                    <a href="deletestaff.php?show&id=<?php echo $staffID ?>" style="border-radius: 10px;width:130px;height:40px;background-color:#E74C3C;">
                                        <button id="submit" type="button" class="btn" style="font-family:kh-koulen">លុបទិន្នន័យ</button>
                                    </a>
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
        margin-left: 0px;
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
        border: 3px solid black;
        padding: 40px;
        display: inline-block;
        width: 800px;
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