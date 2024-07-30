<?php session_start();
if(!isset($_SESSION['id_num'])){
    header('location:../logout.php');
}
if($_SESSION['role']!="user"){
    header('location:../index.php');
}
include_once 'usernav.php';
$uid = $_SESSION['id_num'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
	<div class="container">
        <div class="row justify-content-center g-4">
            <div class="col-md align-self-center">
                <div class="donation-text donation-card">
                    <h3 class="text-primary">Support Our Mission</h3>
                    <p>At Paws-Connect, we believe every pet deserves a loving home. Your generous donation helps us continue our mission of connecting pets with their forever families. With your support, we can provide essential resources and services to ensure the well-being of both pets and adopters.</p>
                    <hr>
                    <h4 class="text-primary">How Your Donation Helps: </h4>
                    <li><strong>Shelter Support:</strong> Providing safe and comfortable temporary homes for pets in need.</li>
                    <li><strong>Outreach Programs:</strong> Promoting pet adoption and responsible pet ownership.</li>
                    <li><strong>Technology Enhancements:</strong> Improving our platform to better serve the community.</li>
                    <hr>
                    <p>Join us in making a difference. Every contribution, big or small, brings us one step closer to a world where every pet is cherished.</p>

                    <p>Thank you for your support!</p>

                    <h5><i class="fa-regular fa-heart fa-beat text-danger" style="--fa-animation-duration: 0.5s;"></i> Donate Now <i class="fa-regular fa-heart fa-beat  text-danger" style="--fa-animation-duration: 0.5s;"></i></h5> 
                </div>
            </div>
            <div class="col-auto">
                <div class="text-center donation-card">
                    <h3>Gcash for Donation</h3>
                    <img class="donation-img" src="../images/gcash.jpg" alt="" width="" height="400px">
                </div>
            </div>
        </div>
	</div>
</body>
</html>