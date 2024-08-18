<?php
require 'vendor/autoload.php'; // Include Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the user exists
    if ($stmt = $conn->prepare("SELECT id FROM tbl_user WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $token = bin2hex(random_bytes(32));

            // Update the user's reset token and expiry
            if ($update_stmt = $conn->prepare("UPDATE tbl_user SET reset_token = ?, reset_expires = NOW() + INTERVAL 1 HOUR WHERE email = ?")) {
                $update_stmt->bind_param("ss", $token, $email);
                $update_stmt->execute();
                $update_stmt->close();

                // Send the reset link via email
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'jayanthonygonzaga123@gmail.com'; // Replace with your email
                    $mail->Password   = 'exqy wzut udbe nipz';     // Replace with your app-specific password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('no-reply@example.com', 'Paws-Connect');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset Request';
                    $mail->Body    = 'Click <a href="http://paws-connect.online/email/reset_password.php?token=' . $token . '">here</a> to reset your password.';

                    $mail->send();
                    $message = 'Reset link has been sent to your email address.';
                    $message_class = 'alert-success';
                } catch (Exception $e) {
                    $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    $message_class = 'alert-danger';
                }
            } else {
                $message = "Error preparing the SQL statement for updating.";
                $message_class = 'alert-danger';
            }
        } else {
            $message = 'No account found with that email address.';
            $message_class = 'alert-danger';
        }
        $stmt->close();
    } else {
        $message = "Error preparing the SQL statement for checking user.";
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
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Forgot Password</h1>
        <p class="text-center">Enter your email address below to receive a password reset link.</p>
        <?php if ($message): ?>
            <div class="alert <?php echo $message_class; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <form action="forgot_password.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Send Reset Link</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
