<?php
require 'vendor/autoload.php'; // Include Composer autoloader

// Database connection
$servername = "localhost";
$username = "u320585682_petbook";
$password = "Mysqlphp1";
$dbname = "u320585682_petbook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
$message_class = '';

if (isset($_POST['submit'])) {
    $token = $_POST['token'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        // Check if the token is valid and not expired
        $stmt = $conn->prepare("SELECT id FROM tbl_user WHERE reset_token = ? AND reset_expires > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->close();

            // Update password
            $stmt = $conn->prepare("UPDATE tbl_user SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
            $stmt->bind_param("ss", $new_password, $token);
            $stmt->execute();
            $stmt->close();

            // Set a success message and redirect after 5 seconds
            $message = 'Your password has been reset successfully. Redirecting to login page...';
            $message_class = 'alert-success';
        } else {
            $message = 'Invalid or expired token.';
            $message_class = 'alert-danger';
        }
    } else {
        $message = 'Passwords do not match.';
        $message_class = 'alert-danger';
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @font-face {
         font-family: "Poppins Medium";
         src: url(../Poppins/Poppins-Medium.ttf);
         }
         body{
         font-family: "Poppins Medium";
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007bff;
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
    </style>
</head>
<body>
    <div class="container">
    <a href="../index.php" class="text-white back"> Back to Login</a>
        <h1 class="text-center">Reset Password</h1>
        <p class="text-center">Enter a new password below.</p>
        <?php if ($message): ?>
            <div class="alert <?php echo $message_class; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php if ($message_class === 'alert-success'): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '../index.php'; // Redirect to login page after 5 seconds
                    }, 5000);
                </script>
            <?php endif; ?>
        <?php endif; ?>
        <form id="resetForm" action="reset_password.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Reset Password</button>
            <div id="error-message" class="alert alert-danger mt-3"></div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        document.getElementById('resetForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var errorMessage = document.getElementById('error-message');

            if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                errorMessage.textContent = 'Passwords do not match.';
                errorMessage.style.display = 'block'; // Show the error message
            } else {
                errorMessage.style.display = 'none'; // Hide the error message
            }
        });
    </script>
</body>
</html>
