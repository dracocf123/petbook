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

$message = '';
$message_class = '';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid and not expired
    if ($stmt = $conn->prepare("SELECT email FROM tbl_registration WHERE verification_token = ? AND token_expires > NOW() AND is_verified = FALSE")) {
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email);
            $stmt->fetch();
            $stmt->close();

            // Mark the email as verified
            if ($update_stmt = $conn->prepare("UPDATE tbl_registration SET is_verified = TRUE WHERE verification_token = ?")) {
                $update_stmt->bind_param("s", $token);
                $update_stmt->execute();
                $update_stmt->close();

                // Redirect to the sign-up page with a success message
                header("Location: ../signup.php?email=" . urlencode($email));
                exit();
            } else {
                $message = "Error preparing the SQL statement for updating.";
                $message_class = 'alert-danger';
            }
        } else {
            $message = 'Invalid or expired token.';
            $message_class = 'alert-danger';
        }
    } else {
        $message = "Error preparing the SQL statement for checking token.";
        $message_class = 'alert-danger';
    }
} else {
    $message = 'No token provided.';
    $message_class = 'alert-danger';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <h1 class="text-center">Email Verification</h1>
        <?php if ($message): ?>
            <div class="alert <?php echo $message_class; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <p class="text-center">If your email was successfully verified, you will be redirected to the sign-up page shortly.</p>
        <script>
            setTimeout(function() {
                window.location.href = '../sign-up.php?email=' + <?php echo json_encode($_GET['email']); ?>;
            }, 3000);
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
