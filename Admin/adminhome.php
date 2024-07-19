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
    <title>Admin Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<main >
<div class="container text-center">
        <h1 class="title">Available Pets</h1>
        <div class="row row-cols-4 justify-content-center">
            <?php
                include_once '../Class/User.php';
                $u = new User();
                $displaytotalpets = $u->dtp(); 
                while($row = $displaytotalpets->fetch_assoc()){
                    echo '
                    <div class="col">
                        <div class="bg-primary text-white p-4 rounded shadow">
                            <h3>'.$row['ptc'].'</h3>
                            <h4>'.$row['pidc'].'</h4>
                        </div>
                    </div>
                    ';
                }
            ?>
        </div>
    </div>
  </main>
</body>
</html>