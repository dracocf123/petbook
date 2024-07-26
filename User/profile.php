<?php 
session_start();
if(!isset($_SESSION['id_num'])){
  header('location:userlogout.php');
}
if($_SESSION['role']!="user"){
  header('location:userlogout.php');
}
include_once '../Class/User.php';
$u = new User();
$uid = $_SESSION['id_num'];
$profile = $u->userinfo($uid);
while($row = $profile->fetch_assoc()){
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $ad = $row['address'];
  $bday = $row['birthday'];
}
function calculateAge($bday) {
   // Convert the birthdate string into a DateTime object
   $bday = new DateTime($bday);
   // Get the current date
   $currentDate = new DateTime();
   // Calculate the age difference
   $age = $currentDate->diff($bday);
   // Return the number of years
   return $age->y;
}
$age = calculateAge($bday);

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
   <style>
   	 @font-face {
      font-family: "Poppins Medium";
      src: url(../Poppins/Poppins-Medium.ttf);
      }
      body{
        font-family: "Poppins Medium";
        background-color:white;
        margin-top: 60px;
      }
      img{
        object-fit: cover;
      }
      
   </style>
</head>
<body>
   <form method="POST" action="profileupdate.php" enctype="multipart/form-data">
	<div class="container">
		<h1 class="text-secondary">Manage Profile</h1>
      <div class="profile">
         <div class="row">
            <div class="col">
               <div><?= $fname.' '.$lname;?></div>
               <div><?= $ad;?></div>
               <div><?= $age.' Years Old';?></div>

               <br>

               <div>Add Image</div>
               <input type="file" name="pfimg" class="form-control form-control-sm w-25" onchange="getImagePreview(event)">
               <div class="mt-2 mb-2 pic" id="preview"></div>
               <button type="submit" name="profileupdate" class="btn btn-success">Upload</button>
            </div>
         </div>
      </div>
	</div>
   </form>
   <script>
      function getImagePreview(event){
         var image=URL.createObjectURL(event.target.files[0]);
         var imagediv= document.getElementById('preview');
         var newimg=document.createElement('img');
         imagediv.innerHTML='';
         newimg.src=image;
         newimg.width="300";
         imagediv.appendChild(newimg);
      }
   </script>
</body>
</html>
