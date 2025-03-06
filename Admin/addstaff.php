<?php
include 'dashboardII.php';
include 'connectdb.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="./Style/addstaff.css">
    <link rel="stylesheet" href="./Style/font.css">
    <title>Add Product</title>
</head>

<body>
    <div class="topped" style="float: left;">
    <h1 id="khmer" style="color:red;text-align: center;font-size:2.3rem;margin-bottom:5%">ចុះឈ្មោះបុគ្គលិក</h1>
        <form method="POST" role="form" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example1">គោត្តនាម</label>
                        <input type="text" id="form3Example1" class="form-control" name="firstname" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example2">នាម</label>
                        <input type="text" id="form3Example2" class="form-control" name="lastname" />
                    </div>
                </div>
            </div>
            <div class="form-outline mb-4" data-mdb-input-init style="margin-top:20px;">
                <label id="khmer" class="form-label" for="form3Example4">អុីម៉ែល </label>
                <input type="text" id="form3Example4" class="form-control" name="email" />
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example1">លេខទូរសព្ទ័</label>
                        <input type="text" id="form3Example1" class="form-control" name="phone" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example2">ថ្ងៃ ខែ ឆ្នាំ កំណើត</label>
                        <input type="date" id="form3Example2" class="form-control" name="dob" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example2">ថ្ងៃចូលធ្វើការ</label>
                        <input type="date" id="form3Example2" class="form-control" name="hire_date" />
                    </div>
                </div>
            </div>


            <div class="col-md-6 mb-4" style="margin-top:20px;">
                <h6 id="khmer" class="mb-2 pb-1">ភេទ: </h6>
                <div class="form-check form-check-inline">
                    <label id="khmer" class="form-check-label" for="femaleGender">ស្រី</label>
                    <input class="form-check-input" type="radio" name="gender" value="Female" checked />
                </div>
                <div class="form-check form-check-inline">
                    <label id="khmer" class="form-check-label" for="maleGender">ប្រុស</label>
                    <input class="form-check-input" type="radio" name="gender" value="Male" />
                </div>

            </div>
            <label id="khmer">ទីលំនៅបច្ចុប្បន្ន</label>
            <select id="khmer" class="form-select" name="city" style="margin-top:10px">
                <option value="Phnom Penh">ភ្នំពេញ</option>
                <option value="Battambang">បាត់ដំបង</option>
                <option value="Pailin">ប៉ៃលិន</option>
                <option value="Pursat">ពោធិ៍សាត់</option>
                <option value="Kompong Chhnang">កំពង់ឆ្នាំង</option>
                <option value="Kondal">កណ្តាល</option>
                <option value="Svay Rieng">ស្វាយរៀង</option>
                <option value="Kratie">ក្រចេះ</option>
                <option value="Siem Reap">សៀមរាប</option>
                <option value="Kampong Cham">កំពង់ចាម</option>
                <option value="Banteay Meanchey">បន្ទាយមានជ័យ</option>
                <option value="Kampong Thom">កំពង់ធំ</option>
                <option value="Preah Vihear">ព្រះវិហារ</option>
                <option value="Prey Veng">ព្រៃវែង</option>
                <option value="Stung Treng">ស្ទឹងត្រែង</option>
                <option value="Kampot">កំពត</option>
                <option value="Tbong Khmum">ត្បូងឃ្មុំ</option>
                <option value="Kampong Speu">កំពង់ស្ពឺ</option>
                <option value="Koh Kong">កោះកុង</option>
                <option value="Kampong Chhnang">កំពង់ឆ្នាំង</option>
                <option value="Mondulkiri">មណ្ឌលគិរី</option>
                <option value="Oddar Meanchey">ឧត្តរមានជ័យ</option>
                <option value="Pursat">ពោធិ៍សាត់</option>
                <option value="Ratanakiri">រតនគិរី</option>
            </select>

            <!-- Password input -->

            <div class="row mb-4">
                <div class="mb-3" style="margin-top:20px;">
                    <label id="khmer" for="video_url" class="form-label">រូបភាពបុគ្គលិក</label>
                    <input type="file" class="form-control" name="filename">
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example1">ពាក្យសម្ងាត់</label>
                        <input type="password" id="form3Example1" class="form-control" name="pswd" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <label id="khmer" class="form-label" for="form3Example2">បញ្ជាក់ពាក្យសម្ងាត់</label>
                        <input style="font-family:eng-font" type="password" id="form3Example2" class="form-control" name="confirm_pwsd" />
                    </div>
                </div>
            </div>

            <!-- Checkbox -->

            <!-- Submit button -->
            <button id="khmer" type="submit" class="btn btn-primary btn-block mb-4" name="submit" style="color:white">បន្ថែមបុគ្គលិក</button>

            <!-- Register buttons -->

        </form>
    </div>

</body>

</html>


<?php


if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['email'];
    $pass = $_POST['pswd'];
    $confirmpass = $_POST['confirm_pwsd'];
    $encrypt = md5($pass);
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $hire_date = $_POST['hire_date'];
    $city = $_POST['city'];
    $namefile = $_FILES['filename']['name']; //filename
    $tempname = $_FILES["filename"]["tmp_name"]; //temp name
    $usertype = "staff";
    move_uploaded_file($tempname, 'imageUploads/' . $namefile);
    if (empty($fname) || empty($lname) || empty($username) || empty($pass) || empty($gender) || empty($phone) || empty($dob) || empty($hire_date) || empty($city) || empty($namefile)) {
        echo " <script>";
            echo " swal('Please enter a valid name !', 'Try again !', 'warning')";
            echo " </script>";
    } else {
        if (strlen($fname) >= 255 || strlen($lname) >= 255 || !preg_match("/^[a-zA-Z-a'\s]+$/", $fname)) {
            echo " <script>";
            echo " swal('Please enter a valid name !', 'Try again !', 'warning')";
            echo " </script>";
        } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            echo " <script>";
            echo " swal('Please enter a valid email !', 'Try again !', 'warning')";
            echo " </script>";
        } else if ($confirmpass !== $pass) {
            echo " <script>";
            echo " swal('Password is not match ', 'Try again !', 'error')";
            echo " </script>";
        } else {
            $sql = "INSERT INTO staff (	firstname,lastname,phone_number,gender,hire_date,date_of_birth,city,username,password,staff_image) VALUES (?,?,?,?,?,?,?,?,?,?)";
            // $sql ="INSERT INTO users(username,password,usertype)VALUES (?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssssssss", $fname, $lname, $phone, $gender, $hire_date, $dob, $city, $username, $encrypt, $namefile);
            if ($stmt->execute()) {

                $staff_id = $con->insert_id;
                $sql_staff = "INSERT INTO users (username,password,usertype) VALUES (?,?,?)";
                $stmt_staff = $con->prepare($sql_staff);
                $stmt_staff->bind_param("sss", $username, $encrypt, $usertype);

                if ($stmt_staff->execute()) {
                    echo " <script>";
                    echo " swal('Add staff success!', 'Data inserted!', 'success')";
                    echo " </script>";
                }
            }
        }
    }
}



?>