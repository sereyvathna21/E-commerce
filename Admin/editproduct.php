<?php
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./Style/editproduct.css">
    <link rel="stylesheet" href="./Style/font.css">

    <title>Document</title>
</head>

<body style="background-color:#ABEBC6;">
    <div class="topped" style="position:fixed;;z-index:1;background-color: #ABEBC6;width:100%;margin-left:15%;">
        <div class=" d-flex flex-column gap-4" style="margin-top:-70px;margin-right:100px;padding-bottom:2%">
            <form class="d-flex" style="margin-top:7%;">
                <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search" style="width:400px;margin-left:400px" id="getName">
            </form>
        </div>
    </div>
    <div class="container" style="width:78%;margin-left: 20%;margin-top:90px;position:absolute;">
        <div class="table-wrapper" style="width:100%;">
            <div class="table-title" style="background-color: #58D68D ;">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 style="font-size: 1.2rem;" class="table_title" id="khmer">បញ្ជីផលិតផល</h2>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th id="khmer" style="width:60px; color: #D35400;">លេខ</th>
                        <th id="khmer" style="color: #D35400;">ឈ្មោះផលិតផល</th>
                        <th id="khmer" style="color: #D35400;">តម្លៃ</th>
                        <th id="khmer" style="color: #D35400;">ប្រភេទ</th>
                        <th id="khmer" style="color: #D35400;">រូបថត</th>
                        <th id="khmer" style="color: #D35400;">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody style="background-color:white;" id="showdata">
                    <tr>
                        <?php
                        $sql = "SELECT p.product_id, p.product_name, p.price, i.image_product, c.name 
                        FROM products AS p
                        INNER JOIN image AS i ON p.product_id = i.product_id  
                        INNER JOIN category AS c ON p.category_id = c.category_id order by product_id";
                        $data = $con->query($sql); // Connect and execute query
                        if ($data->num_rows > 0) { // If there are rows returned from the database
                            while ($row = $data->fetch_assoc()) {
                                $proID = $row['product_id'];
                                $proName = $row['product_name'];
                                $proPrice = $row['price'];
                                $image = $row['image_product'];
                                $categoryName = $row['name'];
                        ?>
                    <tr>
                        <td id="english" style="font-size: 1.2rem;">
                            <?php echo $proID; ?>
                        </td>
                        <td id="english" style="font-size: 1.2rem;">
                            <?php echo $proName; ?>
                        </td>
                        <td id="english" style="font-size: 1.2rem;">
                            <?php echo "$ " . $proPrice; ?>
                        </td>
                        <td id="english" style="font-size: 1.2rem;">
                            <?php echo $categoryName; ?>
                        </td>
                        <td><img src="./imageUploads/<?php echo $image;?>" class="img-thumbnail" style="margin-left:450px;width:50px;">
                        <td>
                            <a id="khmer" href="productdetail.php ?show&id=<?php echo $proID ?>" style="background-color:#A9DFBF;border-radius:50px;width:100px;margin-left:-15px;display:flex;justify-content: center;">
                                <button style="border:0px;text-align:center;background-color:#A9DFBF;font-size:15px">
                                    មើលបន្ថែម
                                </button>
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
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function() {
            if (this.checked) {
                checkbox.each(function() {
                    this.checked = true;
                });
            } else {
                checkbox.each(function() {
                    this.checked = false;
                });
            }
        });
        checkbox.click(function() {
            if (!this.checked) {
                $("#selectAll").prop("checked", false);
            }
        });
    });

    $(document).ready(function() {
        $('#getName').on("keyup", function() {
            var getName = $(this).val();

            $.ajax({
                method: 'POST',
                url: 'searchproduct.php',
                data: {
                    name: getName
                },
                success: function(response) {
                    $("#showdata").html(response);
                }
            });
        });
    });
</script>
</body>

</html>