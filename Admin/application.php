<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
}
if($_SESSION['role']!="admin"){
    header('location:../index.php');
}
include_once 'topnavbar.php';
include_once '../Class/User.php';
function formatDate($dateString) {
    // Create a DateTime object from the input string
    $date = new DateTime($dateString);
    // Format the date in the desired format
    return $date->format('F jS, Y');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<main>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <table class="table border">
                    <tr class="table-dark">
                        <th>Adoption ID</th>
                        <th>Pet ID</th>
                        <th>Full Name:</th>
                        <th>Date Apply</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                
                <?php
                    $u = new User();
                    $displayapplication = $u->application();
                    while($row = $displayapplication->fetch_assoc()){
                        $dateString = $row['application_date'];
                        if($row['status'] == 'Pending'){
                            $col = 'table-danger';
                        }else{
                            $col = 'table-primary';
                        }
                        echo '
                            <tr class="align-middle '.$col.'">
                                <th>'.$row['application_id'].'</th>
                                <th>'.$row['pet_id'].'</th>
                                <th>'.$row['first_name'].' '.$row['last_name'].'</th>
                                <th>'.formatDate($dateString).'</th>
                                <th>'.$row['status'].'</th>
                                <th><button type="button" onclick="viewapplication(&quot;'.$row['application_id'].'&quot;)">View Application</button></th>
                            </tr>
                        ';
                    }
                ?>
                
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<script>
    function viewapplication(appid){
        window.open("viewapplication.php?appid=" + appid,"_new");
    }
</script>

