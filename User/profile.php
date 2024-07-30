<?php 
session_start();
if(!isset($_SESSION['id_num'])){
  header('location:userlogout.php');
}
if($_SESSION['role']!="user"){
   header('location:../index.php');
}
include_once '../Class/User.php';
$u = new User();
$uid = $_SESSION['id_num'];
$profile = $u->userinfo($uid);
while($row = $profile->fetch_assoc()){
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $ad = $row['address'];
  $em = $row['email'];
  $cn = $row['contact'];
  $gen = $row['gender'];
  $bday = $row['birthday'];
  $pic = '../images/'.$row['profile_image'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="user.css">
</head>
<?php
   if(isset($_POST['acceptreq'])){
      $petaccept = $_POST['petadoptval'];
      echo '<script>
                alert("'.$u->coordinationaccept($petaccept).'");
            </script>';
   }else if(isset($_POST['cancelreq'])){
      $petaccept = $_POST['petadoptval'];
      echo '<script>
                alert("'.$u->coordinationcancel($petaccept).'");
            </script>';
   }else if(isset($_POST['donepicking'])){
      $adoptedpet = $_POST['adoptedpet'];
      echo '<script>
                alert("'.$u->adopted($adoptedpet).'");
            </script>';
   }
   ?>
<body>
   
   <form method="POST">
      <!-- Modal Coordinating-->
      <div class="modal fade" id="requestmod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Adoption Request</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <input type="hidden" id="petadopt" name="petadoptval">
                     <div class="row">
                        <div class="col-auto">
                           <img src="" id="img" alt="" width="200px" height="200px" class="rounded">
                        </div>
                        <div class="col-auto">
                           <h5>Request By: <span id="adopter"></span></h5>
                           <h6>Address: <span id="address"></span></h6>
                           <h6>Birthdate: <span id="bday"></span></h6>
                           <h6>Gender: <span id="gen"></span></h6>
                           <h6>Email: <span id="em"></span></h6>
                           <h6>Contact Number: <span id="cn"></span></h6>
                        </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" name="acceptreq">Accept</button>
                     <button type="submit" class="btn btn-secondary" name="cancelreq">Cancel</button>
                  </div>
               </div>
            </div>
         </div>


         <!-- Modal Pickup-->
         <div class="modal fade" id="pickupdelivery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Pick up or Delivery</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <input type="hidden" id="petadopt1" name="adoptedpet">
                     <div class="row">
                        <div class="col-auto">
                           <img src="" id="img1" alt="" width="200px" height="200px" class="rounded">
                        </div>
                        <div class="col-auto">
                           <h5>Request By: <span id="adopter1"></span></h5>
                           <h6>Address: <span id="address1"></span></h6>
                           <h6>Birthdate: <span id="bday1"></span></h6>
                           <h6>Gender: <span id="gen1"></span></h6>
                           <h6>Email: <span id="em1"></span></h6>
                           <h6>Contact Number: <span id="cn1"></span></h6>
                        </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" name="donepicking">Accept</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
               </div>
            </div>
         </div>
   </form>
      <div class="modal fade" id="viewpetmod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">View Pet Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-auto">
                        <img src="" id="petimg" alt="" width="200px" height="200px" class="rounded">
                     </div>
                     <div class="col-auto">
                        <input type="hidden" id="petpostid">
                        <b>Name </b><div class="text-muted" id="petname"></div><br>
                        <b>Gender </b><div class="text-muted" id="petgender"></div><br>
                        <b>Breed </b><div class="text-muted" id="petbreed"></div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" name="deletepet">Delete</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
               </div>
            </div>   
         </div>
      </div>
        <div class="container">
            <div class="row profile-card mb-2">
               <a class="btn btn-sm m-2 lobtn rounded-pill border border-dark" type="button" href="userlogout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                <div class="col-auto d-flex align-items-center">
                     <label for="profile-pic" class="profile-pic" >
                        <img id="profile-picture" class="profile-picture" src="<?=$pic;?>" alt="" width="250px" height="250px" class="rounded">
                        
                     </label>
                </div>
                <div class="col align-self-center">
                    <h1 class="text-secondary">Manage Profile</h1>
                    <form method="POST" action="profileupdate.php" enctype="multipart/form-data">
                        <div class="profile">
                              <div class="row">
                                 <div class="col">
                                    <h4><?= $fname.' '.$lname;?></h4>
                                    <div class="profile-details"><?= $ad;?></div>
                                    <div class="profile-details"><?= $age.' Years Old';?></div>
                                    <div class="profile-details"><?= $gen?></div>
                                    <div class="profile-details"><?= $em?></div>
                                    <div class="profile-details"><?= $cn?></div>
                                    <br>
                                    <input type="file" id="profile-pic" name="pfimg" style="display:none;" class="form-control form-control-sm mb-2" onchange="getImagePreview(event)">
                                 </div>
                                 <button type="submit" id="upload-button"  name="profileupdate" style="display:none;" class="updatepic">Update</button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="donation-card">
               <h4 class="text-center">My Pets</h4>
               <div class="row">
                  <div class="col">
                  <table class="table text-center table-bordered text-nowrap">
                  <tr class="table-dark">
                     <th colspan="3">Pet for adoption</th>
                  </tr>
                  <?php
                     $mypostedpet = $u->mypetposted($uid);
                     while($row = $mypostedpet->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                              <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pet_name'].'</td>
                              <td><button data-bs-toggle="modal" data-bs-target="#viewpetmod"
                              onclick="petviewdetails(&quot;'.$row['pet_id'].'&quot;,&quot;'.$row['pet_name'].'&quot;,&quot;'.$row['pet_gender'].'&quot;,&quot;'.$row['pet_breed'].'&quot;,&quot;'.$row['pet_image'].'&quot;)"
                              >View Pet</button></td>
                           </tr>
                        ';
                     }
                  ?>
                  <tr>
                     <td colspan="3">No More Data</td>
                  </tr>
               </table>
                  </div>
                  <div class="col">
                  <table class="table text-center table-bordered text-nowrap">
                  <tr class="table-dark">
                     <th colspan="3">Adoption Request</th>
                  </tr>
                  <?php
                     $mypostedpet = $u->mypetpostedrequest($uid);
                     while($row = $mypostedpet->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                              <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pet_name'].'</td>
                              <td>
                                 <button type="button" data-bs-toggle="modal" data-bs-target="#requestmod"
                                    onclick="requestaccept(&quot;'.$row['pet_id'].'&quot;,&quot;'.$row['first_name'].' '.$row['last_name'].'&quot;,&quot;'.$row['address'].'&quot;,&quot;'.$row['birthday'].'&quot;
                                    ,&quot;'.$row['gender'].'&quot;
                                    ,&quot;'.$row['email'].'&quot;
                                    ,&quot;'.$row['contact'].'&quot;
                                    ,&quot;'.$row['profile_image'].'&quot;)">'.$row['status'].'
                                 </button>
                              </td>
                           </tr>
                        ';
                     }
                  ?>
                  <tr>
                     <td colspan="7">No More Data</td>
                  </tr>
               </table>
                  </div>
                  <div class="col">
                  <table class="table text-center table-bordered text-nowrap">
                  <tr class="table-dark">
                     <th colspan="3">Pick up/Delivery</th>
                  </tr>
                  <?php
                     $mypostedpet = $u->mypetpostedpickup($uid);
                     while($row = $mypostedpet->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                              <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pet_name'].'</td>
                              <td>
                                 <button type="button" data-bs-toggle="modal" data-bs-target="#pickupdelivery"
                                    onclick="pickup(&quot;'.$row['pet_id'].'&quot;,&quot;'.$row['first_name'].' '.$row['last_name'].'&quot;,&quot;'.$row['address'].'&quot;,&quot;'.$row['birthday'].'&quot;
                                    ,&quot;'.$row['gender'].'&quot;
                                    ,&quot;'.$row['email'].'&quot;
                                    ,&quot;'.$row['contact'].'&quot;
                                    ,&quot;'.$row['profile_image'].'&quot;)">'.$row['status'].'
                                 </button>
                              </td>
                           </tr>
                        ';
                     }
                  ?>
                  <tr>
                     <td colspan="7">No More Data</td>
                  </tr>
               </table>
                  </div>
               </div>   
            </div>
        </div>
   
    <script>
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var profilePicture = document.getElementById('profile-picture');
            var uploadButton = document.getElementById('upload-button');
            profilePicture.src = image;
            uploadButton.style.display = 'block';
        }
        function requestaccept(aid, adopter, location,bday,gen,em,cn, img) {
         function formatDate(dateStr) {
               const options = { year: 'numeric', month: 'long', day: 'numeric' };
               const date = new Date(dateStr);
               return date.toLocaleDateString(undefined, options);
            }
            document.getElementById("petadopt").value = aid;
            document.getElementById("adopter").innerHTML = adopter;
            document.getElementById("address").innerHTML = location;
            document.getElementById("bday").innerHTML = formatDate(bday);
            document.getElementById("gen").innerHTML = gen;
            document.getElementById("em").innerHTML = em;
            document.getElementById("cn").innerHTML = cn;
            document.getElementById("img").src = '../images/'+img;
         } 
        function pickup(aid, adopter, location,bday,gen,em,cn, img) {
         function formatDate(dateStr) {
               const options = { year: 'numeric', month: 'long', day: 'numeric' };
               const date = new Date(dateStr);
               return date.toLocaleDateString(undefined, options);
            }
            document.getElementById("petadopt1").value = aid;
            document.getElementById("adopter1").innerHTML = adopter;
            document.getElementById("address1").innerHTML = location;
            document.getElementById("bday1").innerHTML = formatDate(bday);
            document.getElementById("gen1").innerHTML = gen;
            document.getElementById("em1").innerHTML = em;
            document.getElementById("cn1").innerHTML = cn;
            document.getElementById("img1").src = '../images/'+img;
         } 
        function petviewdetails(pid,pname,pgen,pbreed,pimg){
           document.getElementById("petpostid").value = pid;
           document.getElementById("petname").innerHTML = pname;
           document.getElementById("petgender").innerHTML = pgen;
           document.getElementById("petbreed").innerHTML = pbreed;
           document.getElementById("petimg").src = '../images/'+pimg;
      } 
    </script>
</body>
</html>

