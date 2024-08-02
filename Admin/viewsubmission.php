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
$pid = $_GET['pid'];
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
    <style>
      img{
         object-fit: contain;
      }
    </style>
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
               $displayform = $u-> displaysubmission($pid);
               while($row = $displayform->fetch_assoc()){
                  echo '
                  <tr>
                     <td>Pet ID:</td>
                     <td>'.$row['pet_id'].'</td>
                  </tr>
                  <tr>
                     <td>Submission Date:</td>
                     <td>'.formatDate($row['date_reg']).'</td>
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
                     <td>Pet Image:</td>
                     <td><img id="viewpimg" src = "../images/'.$row['pet_image'].'" width="300px" height="300px" onclick="this.requestFullscreen()"
                         ></td>
                  </tr>
                  <tr>
                     <td>Government ID:</td>
                     <td><img id="viewgid" src = "../images/'.$row['user_gov_id'].'" width="300px" height="300px" onclick="this.requestFullscreen()"></td>
                  </tr>
                  <tr>
                     <td>Selfie with Pet:</td>
                     <td><img id="viewups" src = "../images/'.$row['user_pet_picture'].'" width="300px" height="300px" onclick="this.requestFullscreen()"></td>
                  </tr>
                  <tr>
                     <td>Pet Name:</td>
                     <td>'.$row['pet_name'].'</td>
                  </tr>
                  <tr>
                     <td>Pet Breed:</td>
                     <td>'.$row['pet_breed'].'</td>
                  </tr>
                  <tr>
                     <td>Pet Gender:</td>
                     <td>'.$row['pet_gender'].'</td>
                  </tr>
                  <tr>
                     <td>Description:</td>
                     <td>'.$row['pet_description'].'</td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <button class="w-100" type="button" data-bs-toggle="modal" data-bs-target="#accept" onclick="response(&quot;'.$row['pet_id'].'&quot;)">Accept Submission?</button>
                     </td>
                  </tr>
                  ';
               }
            ?>
               <!-- modal buttons -->
                  
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
   <script>
       $(document).ready(function(){$("#viewpimg").click(function(){this.requestFullscreen()})});
       $(document).ready(function(){$("#viewgid").click(function(){this.requestFullscreen()})});
       $(document).ready(function(){$("#iewups").click(function(){this.requestFullscreen()})});
   </script>
</body>
</html>
<script>
   function response(pid){
      document.getElementById("sr").value = pid;
   }
</script>
<?php
   if(isset($_POST['acceptsubmission'])){
      $petid = $_POST['petid'];
      echo '
         <script>
            alert("'.$u->submissionaccept($petid).'");
            window.close();
         </script>
      ';
   }else if(isset($_POST['declinesubmission'])){
      $petid = $_POST['petid'];
      echo '
         <script>
            alert("'.$u->submissiondeny($petid).'");
            window.close();
         </script>
      ';

   }
?>