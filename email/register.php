<?php
require 'vendor/autoload.php'; // Include Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set the default time zone
date_default_timezone_set('Asia/Manila'); // Set this to your local time zone

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
$show_resend_button = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if the email already exists in tbl_user
    if ($user_stmt = $conn->prepare("SELECT id FROM tbl_user WHERE email = ?")) {
        $user_stmt->bind_param("s", $email);
        $user_stmt->execute();
        $user_result = $user_stmt->get_result(); // Get result from statement

        if ($user_result->num_rows > 0) {
            // Email already exists in tbl_user
            $message = "This email address is already in use. Please use a different email.";
            $message_class = 'alert-danger';
        } else {
            // Check if the email already exists in tbl_registration
            if ($stmt = $conn->prepare("SELECT id, verification_token, token_expires, is_verified FROM tbl_registration WHERE email = ?")) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result(); // Get result from statement

                if ($result->num_rows == 0) {
                    // Email does not exist, generate a new token
                    $token = bin2hex(random_bytes(32));
                    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

                    // Insert the email and token into tbl_registration
                    if ($insert_stmt = $conn->prepare("INSERT INTO tbl_registration (email, verification_token, token_expires) VALUES (?, ?, ?)")) {
                        $insert_stmt->bind_param("sss", $email, $token, $expires);
                        $insert_stmt->execute();
                        $insert_stmt->close();

                        $show_resend_button = false;
                    } else {
                        $message = "Error preparing the SQL statement for inserting.";
                        $message_class = 'alert-danger';
                    }
                } else {
                    // Email already exists
                    $row = $result->fetch_assoc(); // Fetch result as associative array

                    if ($row['is_verified'] === 1) {
                        // Email is already verified, redirect to sign_up.php
                        header("Location: ../signup.php?email=" . urlencode($email));
                        exit();
                    } else {
                        // Email exists but is not verified, update the token and expiration
                        $token = bin2hex(random_bytes(32));
                        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

                        if ($update_stmt = $conn->prepare("UPDATE tbl_registration SET verification_token = ?, token_expires = ? WHERE email = ?")) {
                            $update_stmt->bind_param("sss", $token, $expires, $email);
                            $update_stmt->execute();
                            $update_stmt->close();
                        } else {
                            $message = "Error preparing the SQL statement for updating.";
                            $message_class = 'alert-danger';
                        }

                        $show_resend_button = true;
                    }
                }
                $stmt->close();

                // Send the verification link via email
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'exalead123@gmail.com'; // Replace with your email
                    $mail->Password   = 'ness aikv rryb hbvv'; // Replace with your app-specific password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('no-reply@example.com', 'Paws-Connect');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Email Verification Request';
                    $mail->Body    = '<p>Hello,</p>
                                      <p>Thank you for signing up with us!</p>
                                      <p>To complete your registration, please verify your email address by clicking the link below:</p>
                                      <p><a href="http://paws-connect.online/email/verify_email.php?token=' . $token . '">Verify Email Address</a></p>
                                      <p>Please note that this link will expire in 1 hour. If you do not verify your email address within this time frame, you will need to request a new verification link.</p>
                                      <p>If you did not create an account with us, please ignore this email.</p>
                                      <p>Best regards,<br>The Paws-Connect Team</p>';

                    $mail->send();
                    $message = 'Verification link has been sent to your email address.';
                    $message_class = 'alert-success';
                } catch (Exception $e) {
                    $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    $message_class = 'alert-danger';
                }
            } else {
                $message = "Error preparing the SQL statement for checking email.";
                $message_class = 'alert-danger';
            }
        }
        $user_stmt->close();
    } else {
        $message = "Error preparing the SQL statement for checking user email.";
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
    <title>Sign Up Request</title>
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
        <h1 class="text-center">Sign Up</h1>
        <p class="text-center">Enter your email address below to receive a verification link.</p>
        <?php if ($message): ?>
            <div class="alert <?php echo $message_class; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Send Verification Link</button>
            <?php if ($show_resend_button): ?>
                <a href="register.php?resend=true" class="btn btn-secondary w-100 mt-3">Resend Verification Link</a>
            <?php endif; ?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
