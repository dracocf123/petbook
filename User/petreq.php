<?php
session_start();
if (!isset($_SESSION['id_num'])) {
    header('location:../logout.php');
    exit();
}
if ($_SESSION['role'] != "user") {
    header('location:../index.php');
    exit();
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
        <h1>My Adoption Request</h1>
        <div class="col table-responsive ">
            <table class="table table-sm align-middle text-nowrap">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Pet</th>
                        <th>Date of Application</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $displayprocess = $u->myadoptionrequest($uid);
                while ($row = $displayprocess->fetch_assoc()) {
                    $status = $row['status'];
                    $disabled = $status != 'Coordinating' ? 'disabled' : '';
                    $note = $status != 'Coordinating' ? '<span class="text-danger">!</span>' : '';

                    echo '
                        <tr>
                            <td><img src="../images/' . $row['petimg'] . '" alt="image" height="100px" width="100px"></td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['date'] . '</td>
                            <td>' . $status . '</td>
                            <td>
                                <button type="button" ' . $disabled . ' onclick="adoptionfee(\'' . $row['pet_id'] . '\')">Payment</button>
                                ' . $note . '
                            </td>
                            <td><button type="button" onclick="sendmessage(\'' . $row['user_id'] . '\')"><i class="fa-regular fa-comments"></i></button></td>
                        </tr>
                    ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function sendmessage(rid) {
    window.open("index.php?reciever=" + rid, "_new");
}
function adoptionfee(pid) {
    window.open("payment.php?pid=" + pid, "_self");
}
</script>
</body>
</html>
