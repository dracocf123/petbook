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
    <title>Breed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<main >
   <form method="POST">
   <div class="container pt-3">
      <div class="d-flex justify-content-center">
         <h1>All Breed</h1>
      </div>
         <div class="row">
            <div class="col-6">
               <table class="table table-bordered table-sm">
                  <tr class="table-dark">
                     <th>Breed Type For Dog:</th>
                  </tr>
                  <?php
                     include_once '../Class/User.php';
                     $type = 'Dog';
                     $u = new User();
                     $showallbreed1 = $u->displaybreed($type); 
                     while($row = $showallbreed1->fetch_assoc()){
                        echo '
                        <tr>
                           <td>'.$row['breed'].'</td>
                        </tr>
                              ';
                     }
                  ?>
               </table>
            </div>
            <div class="col-6">
               <table class="table table-bordered table-sm">
                  <tr class="table-dark">
                     <th>Breed Type for Cat:</th>
                  </tr>
                  <?php
                     include_once '../Class/User.php';
                     $type = 'Cat' ;
                     $u = new User();
                     $showallbreed = $u->displaybreed($type);  
                     while($row = $showallbreed->fetch_assoc()){
                        echo '
                        <tr>
                           <td>'.$row['breed'].'</td>
                        </tr>
                              ';
                     }
                  ?>
               </table>
            </div>
         </div>

        <div class="row text-start">
         <div class="col">
         <h4>Add Breed For Dog</h4>
         <input type="text" class="form-control form-control-sm border border-dark" name="dbreed">
         <button type="submit" class="btn btn-success mt-2" name="addbreeddog">Add Breed</button>
         </div>
         <div class="col">
         <h4>Add Breed For Cat</h4>
         <input type="text" class="form-control form-control-sm border border-dark" name="cbreed">
         <button type="submit" class="btn btn-success mt-2" name="addbreedcat">Add Breed</button>
         </div>
        </div>
    </div>
    </form>
  </main>
</body>
</html>
<?php
if(isset($_POST['addbreeddog'])){
   $breed = $_POST['dbreed'];
   $type = 'Dog';
   echo '
      <script>
      alert("'.$u->addbreeddog($breed,$type).'");
      window.location="breed.php";
      </script>
   ';
}else if(isset($_POST['addbreedcat'])){
   $breed = $_POST['cbreed'];
   $type = 'Cat'; 
   echo '
      <script>
      alert("'.$u->addbreedcat($breed,$type).'");
      window.location="breed.php";
      </script>
   ';
}
?>