<?php
session_start();
$uid =  $_SESSION['id_num'];
header('Content-Type: application/json');
include_once "../Class/User.php";
$u = new User();
$displayallpets = $u -> petdisplaytouser($uid); 
// Sample data array
$data = [];

while($row = $displayallpets->fetch_assoc()){
    $data[] = [
        'petimage' => '../images/'.$row['pet_image'],
        'petid' => $row['pet_id'],
        'type' => $row['pet_type'],
        'name' => $row['pet_name'],
        'breed' => $row['pet_breed']
    ];
}
echo json_encode($data);
?>
