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
      }
      .signup-content{
         box-shadow: -5px -5px 5px rgb(255, 255, 255, 0.5), 5px 5px 5px rgb(0, 0, 0, 0.3);
         padding: 10px;
         border-radius: 10px;
         max-width: 500px;
         margin: 10px;
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
         background-color: black;
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
         left: 15px;
      }
   </style>
</head>
<body>
   <form method="POST">
   <section>
      <div class="signup-content">
         <a href="index.php" class=" text-white back"><i class="fa-solid fa-arrow-left"></i> Back to Login</a>
            <h1>Sign Up</h1>
               <form id="signupform">
                  <div class="container ">
                  <div class="row row-cols-2 g-2">
                  <div class="col form-box">
                     <input type="text" class="form-control rounded-pill" id="firstname" name="fname" autocomplete="off" required placeholder="First Name">
                     <i class="fa-solid fa-pen form-icon"></i>
                  </div>
                  <div class="col form-box">
                     <input type="text" class="form-control rounded-pill" id="lastname" name="lname" autocomplete="off" required placeholder="Last Name">
                     <i class="fa-solid fa-pen form-icon"></i>
                  </div>
                  <div class="col-12 form-box">
                     <input type="text" class="form-control rounded-pill" id="address" name="address" autocomplete="off" required placeholder="Address">
                     <i class="fa-solid fa-location-dot form-icon ps-1 pe-1 text-danger"></i>
                     </div>
                  <div class="col-4 form-box">
                     <input type="Text" class="form-control bday-form" id="address" autocomplete="off" required placeholder="Birthday" disabled>
                     <i class="fa-solid fa-cake-candles form-icon text-warning"></i>
                     </div>
                  <div class="col-8 form-box">
                     <input type="Date" class="form-control bday-input" id="address" name="bday" autocomplete="off" required placeholder="Birthday">
                     </div>
                  <div class="col-12 form-box">
                     <input type="text" class="form-control rounded-pill" id="email" name="uname" autocomplete="off" required placeholder="Username">
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
            <button type="submit" id="signup" name="signupbtn" class="btn btn-primary mt-3"><i class="fa-solid fa-right-to-bracket"></i> Sign Up </button>
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
   $bday = $_POST['bday'];
   $un = $_POST['uname'];
   $pw = $_POST['pword'];
   echo '
      <script>
      alert("'.$u->signup($fn, $ln, $ad, $bday, $un, $pw).'");
      window.location="index.php";
      </script>
   ';
}
?>