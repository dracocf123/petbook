<?php
include_once '../Class/User.php';
$u = new User();
if (isset($_POST['type'])) {
   $type = $_POST['type'];
   $showpetfrombreed = $u->displaybreed($type);
   $breeds = [];
   while ($row = $showpetfrombreed->fetch_assoc()) {
       $breeds[] = $row['breed'];
   }

   echo json_encode($breeds);
}
?>
