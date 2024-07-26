<?php
header('Content-Type: application/json');
include_once "../../Class/User.php";
$u = new User();
$piedata = $u->dtp();
// Sample data array
$labels = [];
$data = [];
$backgroundColor = [
   'rgba(255, 99, 132, 0.3)',
   'rgba(54, 162, 235, 0.3)'
];
$borderColor = [
   'rgba(255, 99, 132, 1)',
   'rgba(54, 162, 235, 1)'
];

while($row = $piedata->fetch_assoc()){
   $data[] = $row['pidc'];
   $labels[] = $row['ptc'];
}

$result = [
    "labels" => $labels,
    "datasets" => [
        [
         "data" => $data,
         "backgroundColor" => $backgroundColor,
         "borderColor" => $borderColor,
         "borderWidth" => 1
        ]
      ]
   ];

echo json_encode($result);
?>
