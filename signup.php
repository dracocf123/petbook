<?php
// Database connection
$servername = "localhost";
$username = "u320585682_petbook";
$password = "Mysqlphp1";
$dbname = "u320585682_petbook";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize email and validity variables
$email = '';
$emailValid = false;

// Get email from URL and check its existence in the database
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    if ($stmt = $conn->prepare("SELECT id FROM tbl_registration WHERE email = ? AND is_verified = TRUE")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        // Email exists in the database
        if ($stmt->num_rows > 0) {
            $emailValid = true;
        }
        $stmt->close();
    }
}

// Check username existence when the form is submitted


if (isset($_POST['signupbtn'])) {
   $uname = $_POST['uname'];
   $usernameExists = false;

   if ($stmt = $conn->prepare("SELECT id FROM tbl_user WHERE username = ?")) {
       $stmt->bind_param("s", $uname);
       $stmt->execute();
       $stmt->store_result();
       
       // Check if username exists
       if ($stmt->num_rows > 0) {
           $usernameExists = true;
       }
       $stmt->close();
   }

   if ($usernameExists) {
       echo '<script>
               alert("Username already exists. Please choose a different username.");
               window.location = "signup.php?email='.$email.'"; // Redirect to signup page
             </script>';
   } else {
       // Proceed with sign up
       include_once 'Class/User.php';
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
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <style>
      @font-face {
         font-family: "Poppins Medium";
         src: url(Poppins/Poppins-Medium.ttf);
      }
      * {
         margin: 0;
         padding: 0;
         list-style: none;
         box-sizing: border-box;
      }
      body {
         font-family: "Poppins Medium";
         background-color: whitesmoke;
      }
      section {
         display: flex;
         justify-content: center;
         align-items: center;
         text-align: center;
         height: 100vh;
         flex-direction: column;
      }
      .signup-content {
         border: 1px solid rgb(255, 255, 255, 0.18);
         box-shadow: 0 8px 32px rgb(0, 0, 0, 0.37);
         padding: 20px;
         border-radius: 10px;
         max-width: 500px;
         margin: 10px;
         background: whitesmoke;
         position: relative;
      }
      #passwordMatchMessage {
         color: red;
         font-size: 12px;
         position: absolute;
         left: 0;
         right: 0;
      }
      #emailValidationMessage {
         color: <?php echo $emailValid ? 'green' : 'red'; ?>;
         font-size: 12px;
         position: absolute;
         left: 0;
         right: 0;
         top: 40px;
         margin-right: 9px;
         margin-left: 9px;
         border-radius: 2px;
      }
      .back {
         position: absolute;
         right: 0;
         top: 0;
         background-color: #FC4100;
         border-radius: 0 0 0 10px;
         padding: 10px;
         text-decoration: none;
      }
      .passmess {
         position: relative;
         margin-bottom: 20px;
      }
      .form-control {
         font-size: 14px;
         padding-left: 35px;
      }
      .form-box {
         position: relative;
      }
      .form-icon {
         position: absolute;
         bottom: 10px;
         left: 17px;
      }
      body {
         background: url("images/signupbg.jpg");
         height: 100vh;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: 50%;
      }
      h4 {
         color: #FC4100;
      }
      .top {
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
   <form method="POST">
   <section>
      <a href="index.php" class="text-white back"><i class="fa-solid fa-arrow-left"></i> Back to Login</a>
      <div class="signup-content">
         <div class="d-flex justify-content-between align-items-center">
            <h4>Paws-Connect</h4>
            <h5> Sign Up</h5>
         </div>
         <hr>
         <div class="container">
            <div class="row row-cols-2 g-3">
               <div class="col-12 mb-3 form-box">
                  <input type="email" class="form-control rounded" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" autocomplete="off" required placeholder="Email" <?php echo $emailValid ? 'readonly' : 'readonly'; ?>>
                  <i class="fa-solid fa-at form-icon"></i>
                  <span id="emailValidationMessage"><?php echo $emailValid ? 'Email is valid' : 'Email not found'; ?></span>
               </div>
               <div class="col form-box">
                  <input type="text" class="form-control rounded" name="fname" autocomplete="off" required placeholder="First Name">
                  <i class="fa-solid fa-pen form-icon"></i>
               </div>
               <div class="col form-box">
                  <input type="text" class="form-control rounded" name="lname" autocomplete="off" required placeholder="Last Name">
                  <i class="fa-solid fa-pen form-icon"></i>
               </div>
               <div class="col-12 form-box">
                  <input type="text" class="form-control rounded" name="address" autocomplete="off" required placeholder="Address">
                  <i class="fa-solid fa-location-dot form-icon ps-1 pe-1 text-danger"></i>
               </div>
               <div class="col-6 form-box">
                  <input type="number" class="form-control" name="contact" autocomplete="off" required placeholder="Contact Number">
                  <i class="fa-solid fa-address-book form-icon"></i>
               </div>
               <div class="col-6 form-box">
                  <select class="form-control" name="gender">
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                  </select>
                  <i class="fa-solid fa-venus-mars form-icon"></i>
               </div>
               <div class="col-6 form-box">
                  <input type="text" class="form-control" autocomplete="off" required placeholder="Birthday" disabled>
                  <i class="fa-solid fa-cake-candles form-icon text-warning"></i>
               </div>
               <div class="col-6 form-box">
                  <input type="date" class="form-control" name="bday" autocomplete="off" required placeholder="Birthday" id="bday">
               </div>
               <div class="col-12 form-box">
                  <input type="text" class="form-control rounded" name="uname" autocomplete="off" required placeholder="Username">
                  <i class="fa-solid fa-user form-icon text-primary"></i>
               </div>
               <div class="col-12 form-box">
                  <input type="password" class="form-control rounded" id="password" name="pword" autocomplete="new-password" required placeholder="Password">
                  <i class="fa-solid fa-key form-icon text-success"></i>
               </div>
               <div class="col-12 passmess form-box">
                  <input type="password" class="form-control rounded" id="confpassword" name="cpword" autocomplete="new-password" required placeholder="Re-Password">
                  <i class="fa-solid fa-key form-icon text-success"></i>
                  <span id="passwordMatchMessage"></span>
               </div>
            </div>
         </div>
         <button type="submit" id="signup" name="signupbtn" class="btn btn-primary rounded" <?php echo $emailValid ? '' : 'disabled'; ?>><i class="fa-solid fa-right-to-bracket"></i> Sign Up</button>
      </div>
   </section>
   </form>
</body>
</html>

<script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confpassword');
    const passwordMatchMessage = document.getElementById('passwordMatchMessage');
    const submitButton = document.getElementById('signup');

    function checkPasswordMatch() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordMatchMessage.textContent = 'Passwords do not match';
            confirmPasswordInput.setCustomValidity('Passwords do not match');
        } else {
            passwordMatchMessage.textContent = '';
            confirmPasswordInput.setCustomValidity('');
        }
    }

    passwordInput.addEventListener('input', checkPasswordMatch);
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

    // Calculate the maximum date value for the date of birth input field
    const today = new Date();
    const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
    const maxDateString = maxDate.toISOString().split('T')[0];

    document.getElementById('bday').setAttribute('max', maxDateString);
</script>

