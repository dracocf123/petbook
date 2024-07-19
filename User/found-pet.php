<?php session_start();
if(!isset($_SESSION['id_num'])){
    header('location:../logout.php');
}
if($_SESSION['role']!="user"){
    header('location:../index.php');
    echo $_SESSION['role'];
}
$uid = $_SESSION['id_num'];
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
      .post-pet{
         border: black solid 1px;
         padding: 10px;
         border-radius: 10px;
      }
   </style>
</head>
<body>
<form method="POST" action="addpet.php" enctype="multipart/form-data">
	<div class="container">
      <div class="post-pet bg-light">
         <h5>Found a Pet?</h5>
         <div class="row">
            <div class="col-md-4">
               <label for="">Image:</label>
               <div class="m-2" id="preview"></div>
               <input type="file" name="img" class="form-control form-control-sm" onchange="getImagePreview(event)">
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <label for="">Name of Pet:</label>
               <input type="text" name="name" class="form-control form-control-sm">
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <label for="">Type:</label>
               <select name="type" id="" class="form-control form-control-sm">
                  <option value="Cat">Cat</option>
                  <option value="Dog">Dog</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col-md-2">
               <label for="">Gender:</label>
               <select name="gender" id="" class="form-control">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
               </select>
            </div>
         </div>
         <button type="submit" name="petreg" class="btn btn-primary">Post</button>
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