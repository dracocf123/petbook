<?php 
session_start();
if (!isset($_SESSION['id_num'])) {
    header('location:adminlogout.php');
}
if ($_SESSION['role'] != "admin") {
    header('location:adminlogout.php');
}
include_once 'topnavbar.php';
include_once '../Class/User.php';

$u = new User();

function daysFromNowTo($date_reg) {
    // Create a DateTime object for the current date
    $currentDate = new DateTime();
    
    // Create a DateTime object for the given date
    $givenDate = new DateTime($date_reg);
    
    // Calculate the difference between the two dates
    $interval = $currentDate->diff($givenDate);
    
    // Return the difference in days (use abs() to ensure a positive number)
    return $interval->days;
}

if (isset($_POST['shelterbtn'])) {
    $pid = $_POST['petidshelter'];
    echo '<script>alert("' . $u->changetoshelter($pid) . '");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="adminstyle.css">
    <style>
        .status-card {
            background-color: #E8E8E8;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 1px 2px 3px rgb(0,0,0,0.2), -1px 1px 3px rgb(0,0,0,0.2);
        }
    </style>
</head>
<body>
<main>
    <form method="POST">
        <div class="container">
            <div class="row p-2">
                <div class="col d-flex flex-column align-items-center table-responsive">
                    <input type="hidden" name="petidshelter" id="idforshelter">
                    <table class="table table-sm table-bordered table-admin text-nowrap">
                        <tr class="table-dark">
                            <th>Pet ID</th>
                            <th>Pet Status</th>
                            <th>Pet Registered</th>
                            <th>Duration</th>
                            <th>Option</th>
                        </tr>
                        <?php
                        $display = $u->displayforshelterpet();
                        while ($row = $display->fetch_assoc()) {
                            $date_reg = $row['date_reg'];
                            $date = new DateTime($date_reg);

                            // Format the date into a readable format, e.g., 'F j, Y' for 'July 20, 2024'
                            $formattedDate = $date->format('F j, Y');
                            $daysDifference = daysFromNowTo($date_reg);

                            echo '
                            <tr class="align-middle">
                                <td>' . $row['pet_id'] . '</td>
                                <td>' . $row['status'] . '</td>
                                <td>' . $formattedDate . '</td>
                                <td>' . $daysDifference . ' Days No Progress</td>
                                <td><button type="submit" name="shelterbtn" onclick="
                                shelterfunc(&quot;' . $row['pet_id'] . '&quot;)
                                ">To Shelter</button></td>
                            </tr>
                            ';
                        }

                        $display2 = $u->displayallshelter();
                        while ($row = $display2->fetch_assoc()) {
                            $date_reg = $row['date_reg'];
                            $date = new DateTime($date_reg);

                            // Format the date into a readable format, e.g., 'F j, Y' for 'July 20, 2024'
                            $formattedDate = $date->format('F j, Y');
                            $daysDifference = daysFromNowTo($date_reg);

                            echo '
                            <tr>
                                <td>' . $row['pet_id'] . '</td>
                                <td>' . $row['status'] . '</td>
                                <td>' . $formattedDate . '</td>
                                <td>' . $daysDifference . ' Days No Progress</td>
                                <td><button type="submit" name="shelterbtn" onclick="
                                shelterfunc(&quot;' . $row['pet_id'] . '&quot;)
                                ">To Shelter</button></td>
                            </tr>
                            ';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </form>
</main>
<script>
    function shelterfunc(pid) {
        document.getElementById("idforshelter").value = pid;
    }
</script>
</body>
</html>
