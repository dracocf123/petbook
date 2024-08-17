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
   $apptopick = $_POST['apptopickup1'];
   $pettopick = $_POST['pettopickup1'];
   echo '<script>
             alert("'.$u->coordinationaccept($apptopick, $pettopick).'");
         </script>';
}else if(isset($_POST['deletepet'])){
   $petaccept = $_POST['petdelete'];
   echo '<script>
             alert("'.$u->cancelpet($petaccept).'");
         </script>';
}else if(isset($_POST['donepicking'])){
   $apptopick = $_POST['apptopickup3'];
   $pettopick = $_POST['pettopickup3'];
   echo '<script>
             alert("'.$u->adopted($apptopick, $pettopick).'");
         </script>';
}
?>
<body>
   
   <form method="POST">
      <!-- Modal Cancel Pet-->
         <div class="modal fade" id="requestmod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Cancel Post Submission?</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-auto">
                           <img src="" id="petimg" alt="" width="200px" height="200px" class="rounded">
                        </div>
                        <div class="col-auto">
                           <input type="hidden" name="petdelete" id="pidforcancel">
                        </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" name="deletepet">Delete</button>
                  </div>
               </div>
            </div>
         </div>

         <!-- Modal Pickup-->
         <div class="modal fade" id="pickupdelivery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Pick up or Delivery</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <input type="hidden" id="apptopickup" name="apptopickup1">
                     <input type="hidden" id="pettopickup" name="pettopickup1">
                     <div class="row">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" name="acceptreq">Confirm</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
               </div>
            </div>
         </div>

         <!-- Modal Adopted-->
         <div class="modal fade" id="pickupdone" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Pick up/ Deliver Done?</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <input type="hidden" id="apptopickup2" name="apptopickup3">
                     <input type="hidden" id="pettopickup2" name="pettopickup3">
                     Confirmation
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" name="donepicking">Confirm</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
               </div>
            </div>
         </div>

   </form>
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
                  <table class="table text-center table-bordered text-nowrap pet-table">
                  <tr class="table-dark">
                     <th colspan="4">Pet for adoption</th>
                  </tr>
                  <?php
                     $u = new User();
                     $mypostedpet1 = $u->mypetposted($uid);
                     while($row = $mypostedpet1->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                              <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pet_name'].'</td>
                              <td>'.$row['status'].'</td>
                              <td><button data-bs-toggle="modal" data-bs-target="#requestmod" 
                              onclick="cancelpost(
                              &quot;'.$row['pet_id'].'&quot;,
                              &quot;'.$row['pet_image'].'&quot;
                              )">Cancel</button></td>
                           </tr>
                        ';
                     }
                  ?>
                  <tr>
                     <td colspan="4">No More Data</td>
                  </tr>
               </table>
                  </div>
                  <div class="col">
                  <table class="table text-center table-bordered text-nowrap pet-table">
                  <tr class="table-dark">
                     <th colspan="6">Adoption Request</th>
                  </tr>
                  <?php
                  $u = new User();
                     $adopterform = $u->adopterform($uid);
                     while($row = $adopterform->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                               <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pname'].'</td>
                              <td>'.$row['fname'].'</td>
                              <td>'.$row['status'].'</td>
                              <td>
                                 <button type="button" 
                                 onclick="viewapplication(
                                 &quot;'.$row['apid'].'&quot;,
                                 &quot;'.$row['petid'].'&quot;,
                                 &quot;'.$row['adopterid'].'&quot;)">Review</button>
                              </td>
                           </tr>
                        ';
                     }
                     $mypostedpet3 = $u->mypetpostedpickup1($uid);
                     while($row = $mypostedpet3->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                               <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pname'].'</td>
                              <td>'.$row['fname'].' '.$row['lname'].'</td>
                              <td>'.$row['status'].'</td>
                              <td>
                              <button type="button" onclick="sendmessage(&quot;'.$row['rid'].'&quot;)"><i class="fa-regular fa-comments"></i></button></td>
                              <td>
                                 <button type="button" data-bs-toggle="modal" data-bs-target="#pickupdelivery"
                                    onclick="pickup(&quot;'.$row['apid'].'&quot;,&quot;'.$row['petid'].'&quot;)">Update
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
                  <table class="table text-center table-bordered text-nowrap pet-table">
                  <tr class="table-dark">
                     <th colspan="5">Pick Up/Deliver</th>
                  </tr>
                  <?php
                     $mypostedpet3 = $u->mypetpostedpickup($uid); 
                     while($row = $mypostedpet3->fetch_assoc()){
                        echo '
                           <tr class="align-middle">
                               <td><img src="../images/'.$row['pet_image'].'" height="50px"></td>
                              <td>'.$row['pname'].'</td>
                              <td>'.$row['status'].'</td>
                              <td><button type="button" onclick="sendmessage(&quot;'.$row['rid'].'&quot;)"><i class="fa-regular fa-comments"></i></button></td></td>
                              <td>
                                 <button type="button" data-bs-toggle="modal" data-bs-target="#pickupdone"
                                    onclick="pickupdone(&quot;'.$row['apid'].'&quot;,&quot;'.$row['petid'].'&quot;)">Update
                                 </button>
                              </td>
                           </tr>
                        ';
                     }
                  ?>
                  <tr>
                     <td colspan="5">No More Data</td>
                  </tr>
               </table>
                  </div>
               </div>   
            </div>
        </div>
   
    <script>
         function sendmessage(rid){
         window.open("index.php?reciever="+rid,"_new");
      }
         function cancelpost(pid,petimg){
            document.getElementById("pidforcancel").value = pid;
            document.getElementById("petimg").src = '../images/'+petimg;
         }
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var profilePicture = document.getElementById('profile-picture');
            var uploadButton = document.getElementById('upload-button');
            profilePicture.src = image;
            uploadButton.style.display = 'block';
        }
        function pickup(appid, pid, rid) {
         document.getElementById("apptopickup").value = appid;
         document.getElementById("pettopickup").value = pid;
         document.getElementById("reciever").value = rid;
         } 
        function pickupdone(appid, pid,rid) {
         document.getElementById("apptopickup2").value = appid;
         document.getElementById("pettopickup2").value = pid;
        
         } 
        function petviewdetails(pid,pname,pgen,pbreed,pimg){
           document.getElementById("petpostid").value = pid;
           document.getElementById("petname").innerHTML = pname;
           document.getElementById("petgender").innerHTML = pgen;
           document.getElementById("petbreed").innerHTML = pbreed;
           document.getElementById("petimg").src = '../images/'+pimg;
      } 
      function viewapplication(apid,pid,uid){
         window.open("reviewapplication.php?apid="+apid+"&&pid="+pid+"&&uid="+uid,"_new")
      }
    </script>
</body>
</html>


