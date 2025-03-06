<?php
include'connectdb.php';
// session_start();
if (isset($_POST['submit'])) 
{
    
    session_start(); // Start the session
    $uname = $_POST['email'];
    $pass = $_POST['pwd'];
    $encrypt = md5($pass);
    
    $sql = "SELECT * FROM staff WHERE username='$uname' AND password='$encrypt'";
    $data = $con->query($sql);
    if ($data->num_rows > 0) {
        $row = $data->fetch_assoc();
        if ($row['username'] == $uname && $row['password'] == $encrypt) {
            // Check if the 'lastname' column exists and is not empty
            if (isset($row['lastname']) && !empty($row['lastname'])) {
                $_SESSION['login'] = $row["staff_id"];
                $_SESSION['alradyLoggedIN'] = "Success";
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['staff_image'] = $row['staff_image'];
                // $_SESSION['name'] = $row['name'];
                // $_SESSION['image'] = $row['image'];
                //  $_SESSION['login'] = 'success';
                header("Location: homepagestaff.php");
                exit; // Ensure to exit after redirecting
            } else {
                echo "<center><p style='color:red'>Lastname is empty or not set in the database</p></center>";
            }
        }
    } else {
        echo "<center><p style='color:red'>Login error</p></center>";
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
    <link rel="stylesheet" href="Style/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <!-- <img src="image/000749_online_store_logos_design_free_online_E-commerce_cart_logo_maker-02.webp"
                            class="img-fluid" alt="Sample image"> -->
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    
                        <form action="" method="POST">
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3" style="color:#FDFEFE ;">Log in with</p>
                                <button type="button" class="btn btn-success btn-floating mx-1">
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
                                <p class="text-center fw-bold mx-3 mb-0">Or</p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="email"  name ="email" class="form-control form-control-lg"
                                    placeholder="Enter a valid email address" required />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control form-control-lg"
                                    name="pwd" placeholder="Enter password" required />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!" style="color:#3498DB; text-decoration: none; font-weight: 600;">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
                                <p class="large fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                                        style="color:#3498DB;text-decoration:none;">Registration</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


</html>

