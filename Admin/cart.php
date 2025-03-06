<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .right {
        width: 30%;
        height: 1000px;
        background-color: gold;
        float: left;
        position: fixed;
        margin-left: 1300px;
        margin-top: -1200px;
        border-radius: 15px;
    }
</style>

<body>
    <div class="right">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Lastname</th>
                <th>Contact</th>
                <th>Address</th>
            </thead>
            <?php
            $query = mysqli_query($db, "SELECT * FROM tbl_info");
            while ($row = mysqli_fetch_array($query)) {

                $name = $row['name'];
                $lastname = $row['lastname'];
                $contact = $row['contact'];
                $address = $row['address'];
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $name; ?>
                        </td>
                        <td>
                            <?php echo $lastname; ?>
                        </td>
                        <td>
                            <?php echo $contact; ?>
                        </td>
                        <td>
                            <?php echo $address; ?>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</body>

</html>