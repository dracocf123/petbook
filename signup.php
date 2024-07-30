<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <style>
      @font-face {
      font-family: "Poppins Medium";
      src: url(Poppins/Poppins-Medium.ttf);
      }
      *{
         margin: 0;
        padding: 0;
        list-style: none;
        box-sizing: border-box;
      }
      body{
        font-family: "Poppins Medium";
        background-color:whitesmoke;
      }
      section{
         display: flex;
         justify-content: center;
         align-items: center;
         text-align: center;
         height: 100vh;
         flex-direction: column;
      }
      .signup-content{
         border: 1px solid rgb(255,255,255,0.18);
         box-shadow: 0 8px 32px rgb(0,0,0,0.37);
         padding: 30px;
         border-radius: 10px;
         max-width: 500px;
         margin: 10px;
         background: linear-gradient(135deg, rgb(255,255,255,0));
         backdrop-filter: blur(10px);
         -webkit-backdrop-filter: blur(10px);
         position: relative;
      }
      #passwordMatchMessage {
         color: red;
         font-size: 12px;
         position: absolute;
         left: 0;
         right: 0;
      }
      .back{
         position: absolute;
         right: 0;
         top: 0;
         background-color: #FC4100;
         border-radius: 0 0 0 10px;
         padding: 10px;
         text-decoration: none;
      }
      .passmess{
         position: relative;
         margin-bottom: 20px;
      }
      .form-control{
         font-size: 14px;
         padding-left: 35px;
      }
      .bday-form{
         border-top-left-radius: 50rem;
         border-bottom-left-radius: 50rem;
      }
      .bday-input{
         border-top-right-radius: 50rem;
         border-bottom-right-radius: 50rem;
      }
      .form-box{
         position: relative;
      }
      .form-icon{
         position: absolute;
         bottom: 10px;
         left: 17px;
      }
      body{
         background: url("images/signupbg.jpg");
         height: 100vh;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: 50%;
      }
      h1{
         color: #FC4100;
      }
      .top{
         width: 50px;
         height: 50px;
         position: absolute;
         top: -25px;
         margin-right: auto;
         margin-left: auto;
         left: calc(50% - 25px);
         text-shadow: 1px 2px 3px white;
      }
   </style>
</head>
<body>
<div class="image"></div>
   <form method="POST">
   <section>
      <a href="index.php"class=" text-white back"><i class="fa-solid fa-arrow-left"></i> Back to Login</a>
      <div class="signup-content">
         <img src="images/logo.png" height="40px" class="top"> 
         <h1>Paws-Connect </h1>
            <h2 class="pb-2 text-white">Sign Up</h2>
               <form id="signupform">
                  <div class="container ">
                  <div class="row row-cols-2 g-3">
                  <div class="col form-box">
                     <input type="text" class="form-control rounded-pill" name="fname" autocomplete="off" required placeholder="First Name">
                     <i class="fa-solid fa-pen form-icon"></i>
                  </div>
                  <div class="col form-box">
                     <input type="text" class="form-control rounded-pill" name="lname" autocomplete="off" required placeholder="Last Name">
                     <i class="fa-solid fa-pen form-icon"></i>
                  </div>
                  <div class="col-12 form-box">
                     <input type="text" class="form-control rounded-pill"  name="address" autocomplete="off" required placeholder="Address">
                     <i class="fa-solid fa-location-dot form-icon ps-1 pe-1 text-danger"></i>
                     </div>
                  <div class="col-12 form-box">
                     <input type="email" class="form-control rounded-pill" name="email" autocomplete="off" required placeholder="Email">
                     <i class="fa-solid fa-at form-icon"></i>
                     </div>
                  <div class="col-6 form-box">
                     <input type="text" class="form-control bday-form" name="contact" autocomplete="off" required placeholder="Contact Number">
                     <i class="fa-solid fa-address-book form-icon"></i>
                     </div>
                  <div class="col-6 form-box">
                     <select class="form-control bday-input" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                     <i class="fa-solid fa-venus-mars form-icon"></i>
                     </div>
                  <div class="col-6 form-box">
                     <input type="Text" class="form-control bday-form" autocomplete="off" required placeholder="Birthday" disabled>
                     <i class="fa-solid fa-cake-candles form-icon text-warning"></i>
                     </div>
                  <div class="col-6 form-box">
                     <input type="Date" class="form-control bday-input" name="bday" autocomplete="off" required placeholder="Birthday">
                     </div>
                  <div class="col-12 form-box">
                     <input type="text" class="form-control rounded-pill" name="uname" autocomplete="off" required placeholder="Username">
                     <i class="fa-solid fa-user form-icon text-primary"></i>
                     </div>
                     <div class="col-12 form-box">
                     <input type="password" class="form-control rounded-pill" id="password" name="pword" autocomplete="new-password" required placeholder="Password">
                     <i class="fa-solid fa-key form-icon text-success"></i>
                     </div>
                     <div class="col-12 passmess form-box">
                     <input type="password" class="form-control rounded-pill" id="confpassword" name="cpword" autocomplete="new-password" required placeholder="Re-Password">
                     <i class="fa-solid fa-key form-icon text-success"></i>
                     <span id="passwordMatchMessage"></span>
                  </div>
                  </div>
                  </div>
               </form>
            <button type="submit" id="signup" name="signupbtn" class="btn btn-primary mt-2 rounded-pill"><i class="fa-solid fa-right-to-bracket"></i> Sign Up </button>
         </div>
            
      
   </section>
   </form>
</body>
<script>
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('confpassword');
      const passwordMatchMessage = document.getElementById('passwordMatchMessage');
      const submitButton = document.getElementById('signup');

      function validatePassword() {
      const password = passwordInput.value;
      const confirmPassword = confirmPasswordInput.value;

      if (password === confirmPassword) {
         passwordMatchMessage.textContent = '';
         submitButton.disabled = false;
      } else {
         passwordMatchMessage.textContent = 'Passwords do not match';
         submitButton.disabled = true;
      }
      }

      passwordInput.addEventListener('input', validatePassword);
      confirmPasswordInput.addEventListener('input', validatePassword);

      document.getElementById('signupform').addEventListener('button', function(event) {
      event.preventDefault(); // Prevent form submission for demonstration purposes
      // You can add further logic here to submit the form data
      });

   </script>
</html>

<?php
include_once 'Class/User.php';
if(isset($_POST['signupbtn'])){
   $u = new User();
   $fn = $_POST['fname'];
   $ln = $_POST['lname'];
   $ad = $_POST['address'];
   $em = $_POST['email'];
   $cn = $_POST['contact'];
   $gen = $_POST['gender'];
   $bday = $_POST['bday'];
   $un = $_POST['uname'];
   $pw = $_POST['pword'];
   echo '
      <script>
      alert("'.$u->signup($fn, $ln, $ad, $gen, $bday, $em, $cn, $un, $pw).'");
      window.location="index.php";
      </script>
   ';
}
?>