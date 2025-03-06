<?php
session_start();

include 'connectdb.php';
// session_start();
if (isset($_POST['submit'])) {
    $uname = $_POST['email'];
    $pass = $_POST['pwd'];
    $encrypt = md5($pass);

    $sql = "SELECT * FROM admin WHERE username='$uname' AND password='$encrypt'";
    $data = $con->query($sql);
    if ($data->num_rows > 0) {
        $row = $data->fetch_assoc();
        if ($row['username'] == $uname && $row['password'] == $encrypt) {
            // Check if the 'lastname' column exists and is not empty
            if (isset($row['name']) && !empty($row['name'])) {
                // $_SESSION['login'] = $row["username"];
                $_SESSION['name'] = $row['name'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['alradyLoggedIN'] = "Success";
                header("Location: admin.php");
                exit; // Ensure to exit after redirecting
            } else {
                echo "<script>alert('Lastname is empty or not set in the database')</script>";
            }
        } else {
            echo "<script>alert('Incorrect Email or Password')</script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="./Style/login.css">
    <link rel="stylesheet" href="./Style/font.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                    </div>
                    <div style="background-color:rgba(255, 237, 237, 0.607);padding:2%;border:black solid 5px;border-radius:10px;"
                        class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="" method="POST">
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p id="khmer" class="lead fw-normal mb-0 me-3" style="font-size:2rem;color:black">
                                    ចូលជាមួយ</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-linkedin-in"></i>
                                </button>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p id="khmer" class="text-center fw-bold mx-3 mb-0">ឬ</p>
                            </div>
                            <div class="form-outline mb-4">
                                <label id="khmer" style="color:whit" class="form-label"
                                    for="form3Example3">អាស័យដ្ឋានអុីម៉ែល</label>
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Enter a valid email address" required />
                            </div>
                            <div class="form-outline mb-3">
                                <label id="khmer" style="color: whit" class="form-label"
                                    for="form3Example4">ពាក្យសម្ងាត់</label>
                                <input type="password" id="form3Example4" class="form-control form-control-lg"
                                    name="pwd" placeholder="Enter password" required />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label id="khmer" class="form-check-label" for="form2Example3" style="color: whit">
                                        ចងចាំខ្ញុំ
                                    </label>
                                </div>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button id="khmer" type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem" name="submit">ចូលគណនី</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


</html>