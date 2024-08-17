<?php 
session_start();
if(!isset($_SESSION['id_num'])){
  header('location:userlogout.php');
}
if($_SESSION['role']!="user"){
   header('location:../index.php');
}
include_once '../Class/User.php';
$u = new User();
$uid = $_SESSION['id_num'];

$reqc = $u->reqcount($uid);
while($row = $reqc->fetch_assoc()){
  $rc = $row['request_count'];
}
$profile = $u->userinfo($uid);
while($row = $profile->fetch_assoc()){
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $pic = '../images/'.$row['profile_image'];
}
$pid = $_GET['pet_id'];
$petview = $u->petviewinfo($pid);
while($row = $petview->fetch_assoc()){
   $pname = $row['pet_name'];
   $ptype = $row['pet_type'];
   $pgender = $row['pet_gender'];
   $pimage = $row['pet_image'];
   $breed = $row['pet_breed'];
   $location = $row['address'];
   $owner = $row['first_name'].' '.$row['last_name'];
   $ownerpic = $row['profile_image'];
   $des = $row['pet_description'];
}
include_once 'usernav.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="user.css">
</head>
<body>
   <form method="POST">
  <div class="container">
      <div class="row row-cols-1 row-cols-md-2">
         <div class="col p-2">
               <?php
                  $petdetails = $u->petviewinfo($pid);
                  while($row = $petdetails->fetch_assoc()){
                     $fuid = $row['user_id'];
                     if($row['pet_gender'] == 'Male'){
                        $gicon = '<i class="fa-solid fa-mars text-primary"></i>';
                     }else{
                        $gicon = '<i class="fa-solid fa-venus text-danger"></i>';
                     }
                     echo '
                        <img class="rounded border" src="../images/'.$row['pet_image'].'"  alt="..." height="350px" width="100%">
                     ';
                  }
                  ?>
         </div>
         <div class="col p-2">
            <div class="pet-adoption-info">
            <img src="../images/<?= $ownerpic;?>" alt="" width="50px" height="50px" style="border:1px solid black;border-radius:50%;"><br><?= $owner ?>
               <table class="mt-3">
                  <tr>
                     <td class="text-primary">Pet ID: </td>
                     <td id="petid"><?=$pid ?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Pet Name: </td>
                     <td><?=$pname ?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Breed: </td>
                     <td><?=$breed ?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Gender: </td>
                     <td><?=$pgender ?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Location: </td>
                     <td><?= $location ?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Description: </td>
                     <td><?= $des ?></td>
                  </tr>
               </table>
               <?php
               $disabled = ($rc > 1 ) ? 'disabled' : '';
               ?>
               <button class="inquire-btn mt-2" type="button" name="adoptbtn" onclick="adoptapplication()" <?= $disabled ?>>Apply for Adoption</button>
               <?php if ($rc > 1): ?>
                  <p class="text-danger mt-2">You have reached the limit for adoption requests.</p>
               <?php endif; ?>
            </div>
         </div>
      </div>
  </div>
   </form>
</body>
</html>
<script>
   function adoptapplication(){
      var pid = document.getElementById("petid").innerHTML; 
      window.open("applicationform.php?petid="+pid,"_new");
   }
</script>
