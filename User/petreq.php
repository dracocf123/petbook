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
   <style>
   	 @font-face {
      font-family: "Poppins Medium";
      src: url(../Poppins/Poppins-Medium.ttf);
      }
      body{
        font-family: "Poppins Medium";
        background-color:white;
        margin-top: 60px;
      }
      table{
        font-size: 12px;
      }
   </style>
</head>
<body>
<?php
include_once '../Class/User.php';
$u = new User();
if(isset($_POST['acceptreq'])){
    $aid = $_POST['petadoptval'];
    echo '
        <script>
            alert("'.$u->requestaccepted($aid).'");
        </script>';
    
}
?>
    <form method="POST">
            <!-- Modal -->
        <div class="modal fade" id="requestmod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Adoption Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="petadopt" name="petadoptval">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="acceptreq">Accept</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
            </div>
    </form>
	<div class="container">
      <div class="row">
        <div class="col">
            <h1>Adoption Request</h1>
            <table class="table table-sm">
                <thead class="table table-dark">
                    <th>Adoption ID</th>
                    <th>Pet Id</th>
                    <th>Foster</th>
                    <th>Status</th>
                </thead>
                <?php
                $displayprocess = $u -> petadoptionrequest($uid); 
                while($row = $displayprocess->fetch_assoc()){
                    echo '
                        <tr>
                            <td>'.$row['adoption_id'].'</td>
                            <td>'.$row['pet_id'].'</td>
                            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td>'.$row['status'].'</td>
                        </tr>
                    ';
                }
                ?>
            </table>
        </div>
        <div class="col">
            <h1>Pet for Adoption</h1>
            <table class="table table-sm align-middle">
                <thead class="table table-dark">
                    <th>Adoption ID</th>
                    <th>Pet Id</th>
                    <th>Foster</th>
                    <th>Status</th>
                </thead>
                <?php
                $displayprocess = $u -> petforadoption($uid); 
                while($row = $displayprocess->fetch_assoc()){
                    echo '
                        <tr >
                            <td>'.$row['adoption_id'].'</td>
                            <td>'.$row['pet_id'].'</td>
                            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#requestmod"
                            onclick="requestaccept(&quot;'.$row['adoption_id'].'&quot;)"
                            >
                            '.$row['status'].'</td>
                            </button>
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
    </script>
</body>
</html>

