<?php session_start();
if(!isset($_SESSION['id_num'])){
    header('location:../logout.php');
}
if($_SESSION['role']!="user"){
    header('location:../index.php');
}
$uid = $_SESSION['id_num'];
$pid = $_GET['pid'];
include_once '../Class/User.php';
$u = new User();
$petdetails = $u->pet($pid);
while($row = $petdetails->fetch_assoc()){
   $petimg = '../images/'.$row['pet_image'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Payment Page</title>
    <script src="https://www.paypal.com/sdk/js?client-id=Aef5sXrY5CjFkxJRNsUafRmjrRXaHFK5d8xxuf7gQ3pKXQniZOTTdR6DAnDg00_QmborpZaIG5cFMvuZ"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }
        .payment-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .payment-container h1 {
            margin-bottom: 20px;
        }
        .payment-container #paypal-button-container {
            margin-top: 20px;
        }
        img{
         object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <img src="<?=$petimg;?>" alt="" height="200px" width="200px">
        <h1>Pay for Adoption Fee</h1>
        <b>Amount: $100.00</b>
        <div id="paypal-button-container"></div>
    </div>
    <script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '100.00'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                fetch('save_transaction.php', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        transaction_id: details.id,
                        payer_name: details.payer.name.given_name,
                        amount: details.purchase_units[0].amount.value,
                        currency: details.purchase_units[0].amount.currency_code,
                        payment_status: details.status,
                        pet_id: '<?=$pid;?>', // Pass pet_id to server
                        user_id: '<?=$uid;?>'  // Pass user_id to server
                    })
                }).then(response => {
                    if (response.ok) {
                        // Show success alert
                        alert('Transaction completed by ' + details.payer.name.given_name);
                        // Redirect to another page after a short delay
                        setTimeout(() => {
                            window.location.href = 'petreq.php'; // Replace with your success page URL
                        }, 3000); // 2000 milliseconds = 2 seconds delay
                    } else {
                        alert('Transaction could not be saved.');
                    }
                }).catch(error => {
                    console.error('Fetch error:', error);
                    alert('An error occurred while saving the transaction.');
                });
            });
        },
        onError: function(err) {
            console.error(err);
            alert('An error occurred during the transaction.');
        }
    }).render('#paypal-button-container');
</script>
</body>
</html>
