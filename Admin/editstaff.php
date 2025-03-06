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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Style/editstaff.css">
    <link rel="stylesheet" href="./Style/font.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>

<body style="background-color:#ABEBC6">
    <div class="topped" style="position:fixed;z-index:1;background-color: #ABEBC6;width:100%;margin-left:15%;">
        <div class="d-flex flex-column gap-4" style="margin-top:-70px;margin-right:100px;padding-bottom:2%">
            <form id="english" class="d-flex" style="margin-top:7%;">
                <input id="getName" class="form-control me-1" type="search" placeholder="Search" aria-label="Search" style="width:400px;margin-left:400px">
            </form>
        </div>
    </div>

    <div class="container" style="margin-left:18%;margin-top:7%;width:82%">
        <table class="table table-hover" style="width: 95%;">
            <thead>
                <tr id="khmer" >
                    <th style="width:60px; color: #D35400;">លេខ</th>
                    <th style="color: #D35400;">ឈ្មោះ</th>
                    <th style="color: #D35400;">ភេទ</th>
                    <th style="color: #D35400;">លេខទូរសព្ទ័</th>
                    <th style="color: #D35400;">អុីម៉ែល</th>
                    <th style="color: #D35400;">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT staff_id, firstname,lastname,gender,phone_number,username from staff";
                $data = $con->query($sql);

                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_assoc()) {
                        $id = $row['staff_id'];
                        $firstname = $row["firstname"];
                        $lastname = $row["lastname"];
                        $gender = $row["gender"];
                        $phone_number = $row["phone_number"];
                        $username = $row["username"];
                ?>
                        <tr>
                            <td style="padding-top: 1%;font-size: 1.3rem;" id="english"><?php echo $id; ?></td>
                            <td style="padding-top: 1%;font-size: 1.3rem;" id="english"><?php echo "$firstname $lastname"; ?></td>
                            <td style="padding-top: 1%;font-size: 1.3rem;" id="english"><?php echo "$gender"; ?></td> <!-- Add the corresponding price information here -->
                            <td style="padding-top: 1%;font-size: 1.3rem;" id="english"><?php echo "$phone_number"; ?></td>
                            <td style="padding-top: 1%;font-size: 1.3rem;" id="english"><?php echo "$username"; ?></td>
                            <td>
                                <a href="staffdetail.php?show&id=<?php echo $id ?>" style="background-color:#A9DFBF;border-radius:50px;width:100px;margin-left:-15px;text-decoration:none;display:flex;justify-content: center;">
                                    <button id="khmer" style="border:0px;text-align:center;background-color:#A9DFBF;font-size:15px">មើលបន្ថែម</button>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<script>
    $(document).ready(function () {
        $("#getName").on("input", function () {
            var searchValue = $(this).val();
            $.ajax({
                type: "POST",
                url: "searchstaff.php",
                data: { search: searchValue },
                success: function (data) {
                    $("tbody").html(data);
                }
            });
        });
    });
</script>

