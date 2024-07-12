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
      }
      section{
         display: flex;
         justify-content: center;
         align-items: center;
         text-align: center;
         height: 100vh;
         
      }
      .signup-content{
         box-shadow: 0px 4px 8px  rgb(0, 0, 0, 0.3);
         padding: 25px;
         border-radius: 10px;
      }
      #passwordMatchMessage {
         color: red;
         font-size: 12px;
         position: absolute;
         left: 0;
      }
      .back{
         position: absolute;
         right: 0;
         top: 0;
         background-color: black;
         border-radius: 0 0 0 10px;
         padding: 10px;
         text-decoration: none;
         box-shadow: 0px 3px 5px  rgb(0, 0, 0, 0.3);
      }
      
   </style>
</head>
<body>
   <form method="POST">
   <section>
      <div class="container">
         <div class="row d-flex justify-content-center">
            <div class="col-md-6">
               <div class="signup-content">
                  <a href="index.php" class=" text-white back"><i class="fa-solid fa-arrow-left"></i> Back to Login</a>
                  <h1>Register</h1>
                  <form id="signupform">
                        <div class="form-floating mb-3">
                           <input type="text" class="form-control border-0 border-bottom border-4 rounded-0" id="firstname" name="fname" placeholder="name@example.com" autocomplete="off" required>
                           <label for="firstname" class="text-muted">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" class="form-control border-0 border-bottom border-4 rounded-0" id="lastname" name="lname" placeholder="name@example.com" autocomplete="off" required>
                           <label for="lastname" class="text-muted">last Name</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                           <input type="text" name="uname" class="form-control border-0 border-bottom border-4 rounded-0" id="email" placeholder="name@example.com" autocomplete="off" required>
                           <label for="uname" class="text-muted">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" class="form-control border-0 border-bottom border-4 rounded-0" id="password" name="pword" placeholder="name@example.com" autocomplete="new-password" required>
                           <label for="password" class="text-muted">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" class="form-control border-0 border-bottom border-4 rounded-0" id="confpassword" name="cpword" placeholder="name@example.com" autocomplete="new-password" required>
                           <label for="confirmpassword" class="text-muted">Confirm Password</label>
                           <span id="passwordMatchMessage"></span>
                        </div>
                         <!-- <input type="text" class="form-control" name="fn" id="firstname" required>
                         <input type="text" class="form-control" name="ln" id="lastname" required>
                         <input type="email" class="form-control" name="email" id="email" required autocomplete="off">
                         <input type="password" class="form-control" name="password" id="password" required autocomplete="new-password">
                         <input type="password" class="form-control" name="confpassword" id="confpassword" required autocomplete="new-password"> -->
                     </form>
                  <button type="submit" id="signup" name="signupbtn" class="btn btn-primary mt-3"><i class="fa-solid fa-right-to-bracket"></i> Sign Up </button>
               </div>
            </div>
         </div>
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
   $un = $_POST['uname'];
   $pw = $_POST['pword'];
   echo '
      <script>
      alert("'.$u->signup($fn, $ln, $un, $pw).'");
      </script>
   ';
}
?>