<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
 }
if($_SESSION['role']!="admin"){
    header('location:adminlogout.php');
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
    <title>Pet Donated</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<main >
   <div class="container">
      <div class="row">
         <div class="col">
         <table class="table border table-admin">
                    <tr class="table-dark">
                        <th>Pet ID</th>
                        <th>Pet Name</th>
                        <th>User ID:</th>
                        <th>Date Submitted</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                
                <?php
                    $u = new User();
                    $postpetsubmission = $u->submission(); 
                    while($row = $postpetsubmission->fetch_assoc()){
                        $dateString = $row['date_reg'];
                        if($row['status'] == 'Pending'){
                            $col = 'table-danger';
                        }else{
                            $col = 'table-primary';
                        }
                        echo '
                            <tr class="align-middle '.$col.'">
                                <th>'.$row['pet_id'].'</th>
                                <th>'.$row['pet_name'].'</th>
                                <th>'.$row['user_id'].'</th>
                                <th>'.formatDate($dateString).'</th>
                                <th>'.$row['status'].'</th>
                                <th><button type="button" onclick="viewsubmission(&quot;'.$row['pet_id'].'&quot;)">View Application</button></th>
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
    function viewsubmission(pid){
        window.open("viewsubmission.php?pid=" + pid,"_new");
    }
</script>