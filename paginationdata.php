<?php
header('Content-Type: application/json');
include_once "Class/User.php";
$u = new User();
$displayallpets = $u -> petalldisplay(); 
// Sample data array
$data = [];

while($row = $displayallpets->fetch_assoc()){
    $data[] = [
        'petimage' => 'images/'.$row['pet_image'],
        'petid' => $row['pet_id'],
        'type' => $row['pet_type'],
        'name' => $row['pet_name']
    ];
}

echo json_encode($data);
?>
