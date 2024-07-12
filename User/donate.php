<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <style>
   	 @font-face {
      font-family: "Poppins Medium";
      src: url(../Poppins/Poppins-Medium.ttf);
      }
      body{
        font-family: "Poppins Medium";
        background-color:white;
      }
      .post-pet{
         border: black solid 1px;
         padding: 10px;
         border-radius: 10px;
      }
   </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container">
    <a class="navbar-brand" href="#">Paws-Connect</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="found-pet.php">Post a Found Pet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="signoutbtn" href="donate.php">Donate</a>
        </li>
      </ul>
       <form class="d-flex">
      <button class="btn btn-outline-light" type="button" id="signoutbtn">Log-out</button>
    </form>
    </div>
  </div>
</nav>
	<div class="container">
		<div>
			<h1 class="text-center"> WELCOME <span id="dname"></span>! </h1>
            <div id="user-info">
               <p><strong>Email:</strong> <span id="email"></span></p>
            </div>
		</div>
      <div class="post-pet bg-light">
         <h1>Donate?</h1>
         <h5>Gcash Payment</h5>
         <img src="images/Gcash-payment.jpg" alt="" height="500px">
      </div>
	</div>
  
</body>
</html>