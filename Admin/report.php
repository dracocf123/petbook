<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
 }
if($_SESSION['role']!="admin"){
    header('location:adminlogout.php');
}
include_once 'topnavbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="adminstyle.css">
   <style>
       .status-card{
         background-color: #E8E8E8;
         padding: 15px 25px;
         border-radius: 10px;
         box-shadow: 1px 2px 3px rgb(0,0,0,0.2), -1px 1px 3px rgb(0,0,0,0.2) ;
         }
   </style>
</head>
<?php


?>
<body>
<main >
   <form method="POST">
      <div class="container">
         <div class="row p-2">
            <div class="col">
               <h1>Report:</h1>
               <input type="hidden" name="petidshelter" id="idforshelter">
                  <?php
                  include_once '../Class/User.php';
                  $u = new User();
                  $reports = $u->report1();
                  while($row = $reports->fetch_assoc()){
                      echo '
                      <div class="card-pet">
                          <div class="d-flex justify-content-between align-items-center">
                              <div>Most Breed Posted: <b>'.$row['breed'].' '.$row['most'].'</b> </div>
                              <div></div>
                          </div>
                      </div>';
                  }
                  $reports2 = $u->report2();
                  while($row = $reports2->fetch_assoc()){
                      echo '
                      <div class="card-pet">
                          <div class="d-flex justify-content-between align-items-center">
                              <div>Most Breed Adopted: <b>'.$row['breed'].' '.$row['most'].'</b> </div>
                              <div></div>
                          </div>
                      </div>';
                  }
               ?>
            </div>
         </div>
      </div>
    </form>
  </main>
  
</body>
</html>
