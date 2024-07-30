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
$u = new User();
if(!empty($_GET['petid'])){
   $pid = $_GET['petid'];
}else{
   $pid = '';
   $owner = '';
   $pname = '';
   $breed = '';
   $pgender = '';
   $location = '';
   $des = '';
}
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
   $fosteruid = $row['user_id'];
}
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
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
   <main>
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
            <img src="../images/<?= $ownerpic;?>" alt="" width="50px" height="50px" style="border:1px solid black;border-radius:50%;"><br>
            <?= $owner ;?>
               <table class="mt-3">
                  <tr>
                     <td class="text-primary">Pet Name: </td>
                     <td><?=$pname ;?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Breed: </td>
                     <td><?=$breed ;?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Gender: </td>
                     <td><?=$pgender ;?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Location: </td>
                     <td><?= $location ;?></td>
                  </tr>
                  <tr>
                     <td class="text-primary">Description: </td>
                     <td><?= $des ;?></td>
                  </tr>
               </table>
               <button class="inquire-btn mt-2" type="submit" name="deletepost">Delete</button>
            </div>
         </div>

      </div>
	</div>
   
</main>
   </form>
</body>
</html>
<?php
   if(isset($_POST['deletepost'])){
      $auid = $uid;
      echo '
         <script>
            alert("'.$u->deletepost($pid).'");
            window.location="pets.php";
         </script>
      '; 
   }
?>
