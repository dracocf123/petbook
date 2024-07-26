<?php 
session_start();
if(!isset($_SESSION['id_num'])){
  header('location:userlogout.php');
}
if($_SESSION['role']!="user"){
  header('location:userlogout.php');
}
include_once '../Class/User.php';
$u = new User();
$uid = $_SESSION['id_num'];
$profile = $u->userinfo($uid);
while($row = $profile->fetch_assoc()){
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $pic = '../images/'.$row['profile_image'];
}
$pid = $_GET['pet_id'];
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
      img{
        object-fit: cover;
      }

      .pet-card{
          position: relative;
          transition: 0.2s ease;
          box-shadow: 0px 4px 8px  rgb(0, 0, 0, 0.5);
      }

      .gradient{
          height: 50%;
          width: 100%;
          background-image: linear-gradient(to top,black, transparent);
          opacity: .9;
          position: absolute;
          bottom:0;
          left: 0;
      }
      .bottom-left{
          position: absolute;
          bottom: 8px;
          left: 14px;
      }

      div.pet-card-link{
          color: white;
      }
      .pet-card:hover{
          transform: translateY(-3px);
          cursor: pointer;
      }
      .pfname{
        cursor: pointer;
        padding: 10px;
        transition: .1s ease;
        border-radius: 10px;
      }
      .pfname:hover{
        background-color:darkgray;
        padding: 10px;
      }
      .pfpic{
        height: 40px;
        border-radius: 100px;
        border: 3px gray solid;
      }
   </style>
</head>
<body>
   <form method="POST">
	<div class="container">
      <div class="row row-cols-2">
         <div class="col-4 h-25 p-2">
            <div class="row">
               <div class="col d-flex align-items-center">
               <img class="pfpic" src="<?= $pic;?>" alt="">
               <p class="pfname m-0 ms-2"><?= strtoupper($fname.' '.$lname);?></p>
               </div>
            </div>
            <div class="row">
            <div class="pet-adoption-info">
               <input type="checkbox" name="" id=""> <label>asdasd</label><br>
               <input type="checkbox" name="" id=""> <label>asdasd</label><br>
               <input type="checkbox" name="" id=""> <label>asdasd</label><br>
               <input type="checkbox" name="" id=""> <label>asdasd</label><br>
               <input type="checkbox" name="" id=""> <label>asdasd</label><br>
               <input type="checkbox" name="" id=""> <label>asdasd</label><br>
            </div>
            </div>
            <button class="btn btn-success" type="submit" name="adoptbtn">Adopt</button>
         </div>
         <div class="col-8">
               <div class="col">
               <?php
                  $petdetails = $u->petviewinfo($pid);
                  while($row = $petdetails->fetch_assoc()){
                     $fuid = $row['user_id'];
                     if($row['pet_gender'] == 'Male'){
                        $gicon = '<i class="fa-solid fa-mars text-primary"></i>';
                     }else{
                        $gicon = '<i class="fa-solid fa-venus text-danger"></i>';
                     }
                     echo '
                     <div class="pet-card-link">
                      <div class="pet-card">
                        <div class="gradient"></div>
                        <img src="../images/'.$row['pet_image'].'" class="card-img-top" alt="..." height="500px">
                        <div class="bottom-left">'.$row['pet_name'].' '.$gicon.'</div>
                        <input type="hidden" id="pet_id" value="'.$row['pet_id'].'">
                      </div>
                      </div>
                     ';
                  }
                  ?>
               </div>
        </div>
      </div>
	</div>
   </form>
</body>
</html>
<?php
   if(isset($_POST['adoptbtn'])){
      $auid = $uid;
      echo '
         <script>
            alert("'.$u->adoptionrequest($fuid, $auid, $pid).'");
            window.location="home.php";
         </script>
      '; 
   }
?>
