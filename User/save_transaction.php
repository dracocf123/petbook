<?php
$servername = "localhost";
$username = "u320585682_petbook";
$password = "Mysqlphp1";
$dbname = "u320585682_petbook"; // Database Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction data
$input = file_get_contents("php://input");
$data = json_decode($input, true);

$transaction_id = $data['transaction_id'] ?? '';
$payer_name = $data['payer_name'] ?? '';
$amount = $data['amount'] ?? 0.0;
$currency = $data['currency'] ?? '';
$payment_status = $data['payment_status'] ?? '';
$pet_id = $data['pet_id'] ?? ''; // New field
$user_id = $data['user_id'] ?? ''; // New field

// Debugging logs
error_log("Transaction ID: " . $transaction_id);
error_log("Payer Name: " . $payer_name);
error_log("Amount: " . $amount);
error_log("Currency: " . $currency);
error_log("Payment Status: " . $payment_status);
error_log("Pet ID: " . $pet_id);
error_log("User ID: " . $user_id);

// Prepare and bind insert statement
$stmt = $conn->prepare("INSERT INTO transactions (transaction_id, payer_name, amount, currency, payment_status, pet_id, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssdssss", $transaction_id, $payer_name, $amount, $currency, $payment_status, $pet_id, $user_id);

// Execute insert statement
if ($stmt->execute()) {
    // Prepare and bind update statements
    $update_pet_status_stmt = $conn->prepare("UPDATE tbl_pet_status SET status = 'Pickup/Delivery' WHERE pet_id = ?");
    $update_pet_status_stmt->bind_param("s", $pet_id);

    $update_application_stmt = $conn->prepare("UPDATE tbl_application SET status = 'Pickup/Delivery' WHERE pet_id = ?");
    $update_application_stmt->bind_param("s", $pet_id);

    // Execute update statements
    if ($update_pet_status_stmt->execute() && $update_application_stmt->execute()) {
        http_response_code(200);
        echo json_encode(["message" => "Transaction saved and statuses updated successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Transaction saved, but error updating statuses"]);
    }

    $update_pet_status_stmt->close();
    $update_application_stmt->close();
} else {
    http_response_code(500);
    echo json_encode(["message" => "Error saving transaction"]);
}

$stmt->close();
$conn->close();
?>
