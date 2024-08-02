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
$appid = $_GET['appid'];
function formatDate($dateString) {
   // Create a DateTime object from the input string
   $date = new DateTime($dateString);
   // Format the date in the desired format
   return $date->format('F jS, Y');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Review Application </title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
   <main>
   <form method="POST">
      <div class="row">
         <div class="col">
            <table class="table table-bordered">
               <tr class="table-dark">
                  <th>Labels:</th>
                  <th>Information:</th>
               </tr>
            
            <?php
               $u = new User();
               $displayform =$u-> displayapplicationform($appid);
               while($row = $displayform->fetch_assoc()){
                  echo '
                  <tr>
                     <td>Application ID:</td>
                     <td>'.$row['application_id'].'</td>
                  </tr>
                  <tr>
                     <td>Application Date:</td>
                     <td>'.formatDate($row['application_date']).'</td>
                  </tr>
                  <tr>
                     <td>User ID:</td>
                     <td>'.$row['user_id'].'</td>
                  </tr>
                  <tr>
                     <td>Full name:</td>
                     <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                  </tr>
                  <tr>
                     <td>Birthdate:</td>
                     <td>'.formatDate($row['birthday']).'</td>
                  </tr>
                  <tr>
                     <td>Address:</td>
                     <td>'.$row['address'].'</td>
                  </tr>
                  <tr>
                     <td>Occupation:</td>
                     <td>'.$row['occupation'].'</td>
                  </tr>
                  <tr>
                     <td>Type of Residence:</td>
                     <td>'.$row['house'].'</td>
                  </tr>
                  <tr>
                     <td>Ownership:</td>
                     <td>'.$row['ownership'].'</td>
                  </tr>
                  <tr>
                     <td>Allergies:</td>
                     <td>'.$row['allergies'].'</td>
                  </tr>
                  <tr>
                     <td>Permision to Visit Home:</td>
                     <td>'.$row['permission_to_visit'].'</td>
                  </tr>
                  <tr>
                     <td>Pet Responsibility:</td>
                     <td>'.$row['pet_responsibility'].'</td>
                  </tr>
                  <tr>
                     <td>Financial Responsibility:</td>
                     <td>'.$row['financial_responsibility'].'</td>
                  </tr>
                  <tr>
                     <td>Home Security:</td>
                     <td>'.$row['home_security'].'</td>
                  </tr>
                  <tr>
                     <td>House Environment:</td>
                     <td>'.$row['household'].'</td>
                  </tr>
                  <tr>
                     <td>Reason to Adopt:</td>
                     <td>'.$row['reason_adoption'].'</td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <button class="w-100" type="button" data-bs-toggle="modal" data-bs-target="#accept" onclick="response(&quot;'.$row['application_id'].'&quot;)">Accept Submission?</button>
                     </td>
                  </tr>
                  ';
               }
            ?>
            </table>
         </div>
      </div>
      <!-- Modal Request-->
      <div class="modal fade" id="accept" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <input type="hidden" id="sr" name="petid">
                           Send Answer to Request
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary" name="acceptsubmission">Accept</button>
                           <button type="submit" class="btn btn-danger" name="declinesubmission">Decline</button>
                        </div>
                     </div>
                  </div>
               </div>
       
   </form>
   </main>
</body>
</html>
<script>
   function response(pid){
      document.getElementById("sr").value = pid;
   }
</script>

<?php
   if(isset($_POST['acceptsubmission'])){
      $aid = $_POST['petid'];
      echo '
         <script>
            alert("'.$u->applicationaccept($aid).'");
            window.close();
         </script>
      ';
   }else if(isset($_POST['declinesubmission'])){
      $aid = $_POST['petid'];
      echo '
         <script>
            alert("'.$u->applicationdecline($aid).'");
            window.close();
         </script>
      ';

   }
?>