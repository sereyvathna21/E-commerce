<?php
include 'connectdb.php';

if (isset($_POST['search'])) {
    $searchValue = $_POST['search'];
    $sql = "SELECT staff_id, firstname, lastname, gender, phone_number, username FROM staff WHERE firstname LIKE ? OR lastname LIKE ?";
    $stmt = $con->prepare($sql);
    $searchParam = "%$searchValue%";
    $stmt->bind_param("ss", $searchParam, $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['staff_id'];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $gender = $row["gender"];
            $phone_number = $row["phone_number"];
            $username = $row["username"];

            echo "<tr>
                    <td style='padding-top: 1%; font-size: 1.3rem;' id='english'>$id</td>
                    <td style='padding-top: 1%; font-size: 1.3rem;' id='english'>$firstname $lastname</td>
                    <td style='padding-top: 1%; font-size: 1.3rem;' id='english'>$gender</td>
                    <td style='padding-top: 1%; font-size: 1.3rem;' id='english'>$phone_number</td>
                    <td style='padding-top: 1%; font-size: 1.3rem;' id='english'>$username</td>
                    <td>
                        <a href='staffdetail.php?show&id=$id' style='background-color:#A9DFBF;border-radius:50px;width:100px;margin-left:-15px;text-decoration:none;display:flex;justify-content: center;'>
                            <button id='khmer' style='border:0px;text-align:center;background-color:#A9DFBF;font-size:15px'>មើលបន្ថែម</button>
                        </a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td id='english' style='font-size:1.5rem;padding:2%' colspan='6'>No results found</td></tr>";
    }

    $stmt->close();
}
?>
