<?php
session_start();
include_once '../Class/user.php';

if(isset($_POST['petreg'])){
    $uid = $_SESSION['id_num'];
    $pname = $_POST['name'];
    $ptype = $_POST['type'];
    $pgender = $_POST['gender'];

    $a = new User();
   $a->petreg($uid, $pname, $ptype, $pgender, $img);
    
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
   <h1>Upload Success!</h1>
   <a href="found-pet.php"><h3>Back to home</h3></a>
   </section>
</body>
</html>
