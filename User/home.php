<?php 
session_start();
if(!isset($_SESSION['id_num'])){
  header('location:userlogout.php');
}
if($_SESSION['role']!="user"){
  header('location:userlogout.php');
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
      .sec{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #fafafc;
      }
   </style>
</head>
<body>
	<div class="sec">
			<h1> WELCOME <span id="dname"></span>! </h1>
      <div id="user-info">
    </div>
	</div>
</body>
</html>
