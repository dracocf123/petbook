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
    <title>Users</title>
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
         .card-pet{
            font-size: 12px;
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
               <h1>Users:</h1>
               <input type="hidden" name="petidshelter" id="idforshelter">
                  <?php
                  include_once '../Class/User.php';
                  $u = new User();
                  $users = $u->UsersInfo();
                  while($row = $users->fetch_assoc()){
                     $pic = '../images/'.$row['profile_image'];
                      echo '
                      <div class="card-pet d-flex justify-content-between align-items-center">
                          <div class="d-flex flex-column justify-content-center align-items-start">
                              <div><b>Name:</b> '.$row['first_name'].' '.$row['last_name'].'</div>
                              <div>Address: '.$row['address'].'</div>
                              <div>Gender: '.$row['gender'].'</div>
                              <div>Email: '.$row['email'].'</div>
                              <div>Contact: '.$row['contact'].'</div>
                          </div>
                          <div>
                              <img src="'.$pic.'" height="80px" width="80px">
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
