<?php session_start();
if(!isset($_SESSION['id_num'])){
    header('location:../logout.php');
}
if($_SESSION['role']!="user"){
    header('location:../index.php');
}
include_once 'usernav.php';
$uid = $_SESSION['id_num'];
$pid = $_GET['petid'];
include_once '../Class/User.php';
function formatDate($dateString) {
   // Create a DateTime object from the input string
   $date = new DateTime($dateString);
   // Format the date in the desired format
   return $date->format('F jS, Y');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
   <form method="POST">
	<div class="container">
      <div class="row donation-card">
         <h1 class="text-center">Application Form</h1>
         <div class="border border-1 border-black">
            <div class="row text-end">
               <div>Application Date: <p><?=date('F jS, Y')?></p></div>
               <input type="hidden" name="uid" value="<?=$uid?>">
               <input type="hidden" name="pid" value="<?=$pid?>">
            </div>
            <div class="row justify-content-center">
               <div class="col-8">
                  <table width="100%" class="adoptionform table shadow">
                     <tr class="table-dark">
                        <td colspan="2"><h4>Personal Details:</h4></td>
                     </tr>
                  <?php 
                  $u = new User();
                  $personalinfo = $u->userinfo($uid);  
                     while($row = $personalinfo->fetch_assoc()){
                        $dateString = $row['birthday'];
                        echo '
                           <tr>
                              <td>Name:</td>
                              <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                           </tr>
                           <tr>
                              <td>Gender:</td>
                              <td>'.$row['gender'].'</td>
                           </tr>
                           <tr>
                              <td>Birthdate: </td>
                              <td>'.formatDate($dateString).'</td>
                           </tr>
                           <tr>
                              <td>Address:</td>
                              <td>'.$row['address'].'</td>
                           </tr>
                           <tr>
                              <td>Email:</td>
                              <td>'.$row['email'].'</td>
                           </tr>
                           <tr>
                              <td>Contact:</td>
                              <td>'.$row['contact'].'</td>
                           </tr>
                           <tr>
                              <td>Occupation:</td>
                              <td><input type="text" name="ocp" id="" required class="form-control"></td>
                           </tr>
                           ';
                     }
                  ?>
                  <tr>
                     <td colspan="2"><h4>Personal Details:</h4></td>
                  </tr>
               <tr>
                  <td>Type of Residence:</td>
                  <td>
                     <select name="house" id="" class="form-control">
                        <option value="House">House</option>
                        <option value="Condo">Condo</option>
                     </select>
               </td>
               </tr>
               <tr>
                  <td>Ownership Status:</td>
                  <td>
                  <select name="owner" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Allergies:</td>
                  <td>
                  <select name="allerg" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Permission to Visit Home:</td>
                  <td>
                  <select name="perm" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Pet Responsibility</td>
                  <td><input type="text" name="respon" required class="form-control"></td>
               </tr>
               <tr>
                  <td>Financial Responsibility</td>
                  <td><input type="text" name="finan" required class="form-control"></td>
               </tr>
               <tr>
                  <td>Home Security</td>
                  <td><input type="text" name="sec" required class="form-control"></td>
               </tr>
               <tr>
                  <td>Describe Household</td>
                  <td>
                  <select name="household" id="" class="form-control">
                        <option value="Noisy">Noisy</option>
                        <option value="Quite">Quite</option>
                        <option value="Average">Average</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Reason for Adopting this pet?</td>
                  <td><textarea name="reason" id="" required class="form-control"></textarea></td>
               </tr>
            </table>
            <button class="btn btn-primary" type="submit" name="applybtn">Apply</button>
         </div>
      </div>
	</div>
   </form>
    <script>
    function requestaccept(aid) {
        document.getElementById("petadopt").value = aid;
    }
    </script>
</body>
</html>
<?php
   if(isset($_POST['applybtn'])){
      $uid = $_POST['uid']; 
      $pid = $_POST['pid']; 
      $ocp = $_POST['ocp']; 
      $house = $_POST['house']; 
      $own = $_POST['owner']; 
      $alg = $_POST['allerg']; 
      $perm = $_POST['perm']; 
      $res = $_POST['respon']; 
      $fin = $_POST['finan']; 
      $sec = $_POST['sec']; 
      $hh = $_POST['household']; 
      $reas = $_POST['reason']; 
      echo '<script>
               alert("'.$u -> applicationrequestsend($uid,$pid,$ocp ,$house ,$own ,$alg ,$perm ,$res ,$fin ,$sec ,$hh ,$reas).'")
            </script>';
      
   }
?>


