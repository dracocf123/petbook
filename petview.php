<?php $pid = $_GET['pet_id'];
include 'Class/User.php';
$u = new User();
$petview = $u->petviewinfo($pid);
while($row = $petview->fetch_assoc()){
   $pname = $row['pet_name'];
   $ptype = $row['pet_type'];
   $pgender = $row['pet_gender'];
   $pimage = $row['pet_image'];
   $breed = $row['pet_breed'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pet Profile</title>
   <link rel="icon" type="image/jpg" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      @font-face {
    font-family: "Poppins Medium";
    src: url(Poppins/Poppins-Medium.ttf);
    }
      body{
         font-family: "Poppins Medium";
         background-color:gainsboro;
      }
      img{
         object-fit: cover;
         border-radius: 15px;
         padding: 20px;
         transition: .3s ease;
         cursor: pointer;
         box-shadow: -5px -5px 5px rgba(255,255,255,0.2), 15px 15px 15px rgba(0,0,0,0.1),
         inset -5px -5px 5px rgba(255,255,255,0.2), 5px 5px 5px rgba(0,0,0,0.1);
      }
      
      </style>
</head>
<body>
   <div class="container mt-5">
      <div class="row">
         <div class="col-6">
            <img src="images/<?= $pimage;?>" alt="" height="200px" width="200px">
         </div>
      </div>
      <br>
      <div class=""><?=$pname ?></div>
      <div class=""><?=$ptype?></div>
      <div class=""><?=$breed ?></div>
      <div class=""><?=$pgender ?></div>
   </div>
</body>
</html>