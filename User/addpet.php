<?php
session_start();
include_once '../Class/User.php';
if(isset($_POST['petreg'])){
   $uid = $_SESSION['id_num'];
   $pname = $_POST['name'];
   $ptype = $_POST['type'];
   $pgender = $_POST['gender'];
   $breed = $_POST['breed'];
   $des = $_POST['description'];

   $file = $_FILES['img'];

   $fileName = $_FILES['img']['name'];
   $fileTmpName = $_FILES['img']['tmp_name'];
   $fileSize = $_FILES['img']['size'];
   $fileError = $_FILES['img']['error'];
   $fileType = $_FILES['img']['type'];

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('jpg','jpeg','png','pdf');

   if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
         if($fileSize < 5000000){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = '../images/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            $img=$fileNameNew;
            $a = new User();
            $a->petreg($uid, $pname, $ptype, $breed, $pgender, $img, $des);
            $message = 'Upload Success!';
         }else{
            $message = 'Upload Failed! Your File is Too Big';
         }
      }else{
         $message = "There was an error!";
      }
   }else{
      $message = "YOU CANNOT UPLOAD THIS TYPE OF FILE!";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pet Upload</title>
   <style>
      section{
         display: flex;
         height: 100vh;
         justify-content: center;
         align-items: center;
         flex-direction: column;
      }
      *{
         font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
         text-decoration: none;
         margin: 0;
         padding: 0;
      }
      a{
         background-color: #FC4100;
         padding: 20px;
         border-radius: 10px;
         color: white;
         margin-top: 20px;
      }
   </style>
</head>
<body>
   <section>
   <h1><?= $message; ?></h1>
   <a href="found-pet.php"><h3>Back</h3></a>
   </section>
</body>
</html>