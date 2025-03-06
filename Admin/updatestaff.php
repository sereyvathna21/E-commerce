<?php
include('connectdb.php');

ob_start(); // Start output buffering

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit </title>
    <link rel="stylesheet" href="./Style/font.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ABEBC6;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 id="khmer" style="font-size: 2.3rem;padding:1%">កែទិន្នន័យ
                            <a id="khmer" href="editstaff.php" class="btn float-end" style="background-color:green; color:white;">ត្រឡប់</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $sql_id = mysqli_real_escape_string($con, $_GET['id']);

                            $query = "SELECT staff_id, firstname, lastname, staff_image, phone_number, gender, hire_date, date_of_birth, city, username from staff where staff_id = $sql_id";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $sql = mysqli_fetch_array($query_run);
                        ?>
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label id="khmer">គោត្តនាម</label>
                                        <input type="text" name="firstname" value="<?= htmlspecialchars($sql['firstname']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">នាម</label>
                                        <input type="text" name="lastname" value="<?= htmlspecialchars($sql['lastname']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">អុីម៉ែល</label>
                                        <input type="text" name="email" value="<?= htmlspecialchars($sql['username']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">លេខទូរសព្ទ័</label>
                                        <input type="text" name="phone" value="<?= htmlspecialchars($sql['phone_number']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">ថ្ងៃ ខែ ឆ្នាំ កំណើត</label>
                                        <input type="date" name="dob" value="<?= htmlspecialchars($sql['date_of_birth']); ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label id="khmer">ថ្ងៃចូលធ្វើការ</label>
                                        <input type="date" name="hire_date" value="<?= htmlspecialchars($sql['hire_date']); ?>" class="form-control">
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
                                    <div class="mb-3" style="margin-top:40px;">
                                        <label id="khmer">រូបភាពបុគ្គលិក</label>
                                        <img class="image" src="imageUploads/<?php echo $sql['staff_image']; ?>" style="width:100px; border-radius:10px;" />
                                        <input style="margin-top:10px;" type="file" name="profile_picture" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button style="color:white" id="khmer" type="submit" name="update_student" class="btn btn-primary">កែទិន្នន័យ</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_student'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $username = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $hire_date = $_POST['hire_date'];
        $city = $_POST['city'];

        if (!empty($_FILES['profile_picture']['name'])) {
            $namefile = $_FILES['profile_picture']['name'];
            $tempname = $_FILES["profile_picture"]["tmp_name"];
            move_uploaded_file($tempname, 'imageUploads/' . $namefile);
        } else {
            $namefile = $sql['staff_image'];
        }

        $id = $_GET['id'];
        $sql = "UPDATE staff SET firstname=?, lastname=?, username=?, phone_number=?, hire_date=?, date_of_birth=?, city=?, staff_image=? WHERE staff_id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssi", $fname, $lname, $username, $phone, $hire_date, $dob, $city, $namefile, $id);
        if ($stmt->execute()) {
            header("Location: editstaff.php");
            exit();
        } else {
            echo "<script>alert('Error updating record:')</script>" . $stmt->error;
        }
    }
}

ob_end_flush(); // Flush the output buffer
?>
