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
<?php
include_once '../Class/User.php';
$u = new User();
?>
	<div class="container">
      <div class="row donation-card">
        <div class="col">
            <h1>My Adoption Request</h1>
            <table class="table table-sm">
                <thead class="table table-dark">
                    <th>Pet</th>
                    <th>Date of Application</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <?php
                $u = new User();
                $displayprocess = $u -> myadoptionrequest($uid); 
                while($row = $displayprocess->fetch_assoc()){
                    echo '
                        <tr>
                            <td>'.$row['pet_id'].'</td>
                            <td>'.$row['date'].'</td>
                            <td>'.$row['status'].'</td>
                            <td><button type="button" onclick="sendmessage(&quot;'.$row['user_id'].'&quot;)"><i class="fa-regular fa-comments"></i></button></td>
                        </tr>
                    ';
                }
                ?>
            </table>
        </div>
      </div>
	</div>
    <script>
    function requestaccept(aid) {
        document.getElementById("petadopt").value = aid;
    }
    function sendmessage(rid){
        window.open("index.php?reciever="+rid,"_new");
    }
    </script>
</body>
</html>

