<?php
session_start();
include_once '../Class/User.php';
if(isset($_POST['profileupdate'])){
   $uid = $_SESSION['id_num'];

   $file = $_FILES['pfimg'];

   $fileName = $_FILES['pfimg']['name'];
   $fileTmpName = $_FILES['pfimg']['tmp_name'];
   $fileSize = $_FILES['pfimg']['size'];
   $fileError = $_FILES['pfimg']['error'];
   $fileType = $_FILES['pfimg']['type'];

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
            $a->updateimage($uid, $img); 
         }else{
            echo '
            <script>
               alert("Your File is Too Big")
            </script>
            ';
         }
      }else{
         echo '
            <script>
               alert("There was an error!")
            </script>
            ';
      }
   }else{
      echo '
            <script>
               alert("YOU CANNOT UPLOAD THIS TYPE OF FILE!")
            </script>
            ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile Upload</title>
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
   <h1>Upload Success!</h1>
   <a href="profile.php"><h3>Back to home</h3></a>
   </section>
</body>
</html> 