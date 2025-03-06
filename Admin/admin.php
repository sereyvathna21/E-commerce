<?php
include 'connectdb.php';
include 'dashboardII.php';

    if(!isset($_SESSION['alradyLoggedIN'])){
        echo "<script> alert('Verify Login!') </script>";
        header('location: login.php');
    }
$productSql = "SELECT COUNT(product_id) as number_product FROM products";
$productData = $con->query($productSql);

$feedbackSql = "SELECT COUNT(feedback_id) as feedback_id FROM feedback where from_where LIKE 'staff'";
$feedbackData = $con->query($feedbackSql);

$feedbackcustomer = "SELECT COUNT(by_rate)as cFEED FROM feedback";
$feedbackcus = $con->query($feedbackcustomer);

$staffSql = "SELECT COUNT(staff_id) as staff_id FROM staff";
$staffData = $con->query($staffSql);




if ($productData && $feedbackData && $feedbackcus && $staffData) {
    $productCount = ($productCount = $productData->fetch_assoc()) ? $productCount['number_product'] : 0;
    $feedbackCount = ($feedbackCount = $feedbackData->fetch_assoc()) ? $feedbackCount['feedback_id'] : 0;
    $staffCount = ($staffCount = $staffData->fetch_assoc()) ? $staffCount['staff_id'] : 0;
    $feedbackcus = ($feedbackcus = $staffData->fetch_assoc()) ? $feedbackcus['cFEED'] : 0;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css"> -->
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <title>Admin</title>
        <link rel="stylesheet" href="./style/admin.css">
        <link rel="stylesheet" href="./style/font.css">
    </head>

    <body style="background-color:#ABEBC6;">
        <div style="margin-left: -5%;" class="grey-bg container-fluid">
            <section id="minimal-statistics" style="margin-left:350px;">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 id="khmer" style="font-size: 2.3rem;" class="text-uppercase">ព័ត៍មានខ្លះៗទាក់ទងជាមួយទិន្នន័យ</h4>
                        <p id="khmer" class="mt-2" style="font-size: 1.5rem;">ស្ថិតិនៃទិន្នន័យ</p>
                    </div>
                </div>
                <div class="row">
                    <!-- Display product count -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i style="font-size: 3rem;" class="icon-pencil primary font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <?php echo "<h3>" . $productCount . "&emsp;</h3>" ?>
                                            <span id="khmer">ចំនួននៃផលិតផល</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Display feedback count -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i style="font-size: 3rem;" class="icon-speech warning font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3><?php echo $feedbackCount . "&emsp;" ?></h3>
                                            <span id="khmer">ចំនួននៃមតិរបស់បុគ្គលិក</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i style="font-size: 3rem;" class="icon-graph success font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3><?php echo $staffCount . "&emsp;" ?></h3>
                                            <span id="khmer">ចំនួនបុគ្គលិក</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                        <i style="font-size: 3rem;" class="icon-speech warning font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                        <h3><?php echo $feedbackcus . "&emsp;" ?></h3>
                                            <span id="khmer">ចំនួននៃមតិរបស់អតិថិជន</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="stats-subtitle" style="margin-left:350px;">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <p id="khmer" style="font-size: 1.5rem;">ក្រាបនៃទិន្នន័យ</p>
                </div>
        </div>

        <?php
        $genderSql = "SELECT COUNT(CASE WHEN gender = 'Male' THEN 1 END) AS male_count, COUNT(CASE WHEN gender = 'Female' THEN 1 END) AS female_count FROM staff;";
        $genderData = $con->query($genderSql);

        if ($genderData) {
            $result = $genderData->fetch_assoc();
            $male_count = $result['male_count'];
            $female_count = $result['female_count'];

            $dataPoints = array(
                array("label" => "Male", "y" => $male_count),
                array("label" => "Female", "y" => $female_count),
            );
        } else {
            // Handle the error or provide a default value
            $dataPoints = array(
                array("label" => "Male", "y" => 0),
                array("label" => "Female", "y" => 0),
            );
        }
        ?>
        <div style="width: 100%;">
            <p id="khmer" style="font-size: 1.2rem;color:red;">ភាគរយនៃបុគ្គលិក ប្រុស និង ស្រី</p>
            <div id="chartContainer" style="height: 370px; width: 100%; font-family:kh-koulen;"></div>
        </div>
        </section>
        </div>
    </body>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: ""
                },
                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bolder",
                    showInLegend: true,
                    legendText: "{label}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>

    </html>
<?php
}
?>