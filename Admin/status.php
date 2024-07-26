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
    <title>Status</title>
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
         .stat-loc{
            position: relative;
         }
         .stat-x{
            position: absolute;
            top: 0;
            right: 0;
            font-size: 20px;
         }
   </style>
</head>
<?php
include_once '../Class/User.php';
 $u = new User();
   if(isset($_POST['statusbtn'])){
      $stat = $_POST['status'];
      echo '
         <script>
            alert("'.$u -> addstatus($stat).'"); 
         </script>
      ';
      header('Location: status.php');
   }
?>
<body>
<main >
   <form method="POST">
      <div class="container">
         <div class="row p-2">
            <div class="col d-flex flex-column align-items-center">
               <?php
                  $display = $u->displayallstatus(); 
                  $color = array("warning", "success", "danger", "primary", "secondary", "dark", "info");
                  $i = 0;
                  while($row = $display->fetch_assoc()){
                     $bgcol = $color[$i];
                     echo '
                     <div class="stat-loc">
                        <div class="status-card text-white m-2 bg-'.$bgcol.'">'.$row['status'].'</div>
                        <div class="text-black stat-x border-1"><i class="fa-solid fa-circle-xmark"></i></div>
                     </div>
                     ';
                     $i++;
                  }
               ?>
            </div>
            <div class="col">
               <label for="status">Input Status:</label>
               <input type="text" name="status" class="form-control form-control-sm border border-2 border-dark mb-2">
               <button type="submit" name="statusbtn" class="btn btn-success">Add Status</button>
            </div>
         </div>
      </div>
    </form>
  </main>
</body>
</html>
