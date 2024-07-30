<?php
header('Content-Type: application/json');
include_once "../../Class/User.php";
$u = new User();
$piedata = $u->dtp();
$statusdata = $u->dstatus();
   
// Sample data array for pets posted
$labelsPosted = [];
$dataPosted = [];
while($row = $piedata->fetch_assoc()){
   $dataPosted[] = $row['pidc'];
   $labelsPosted[] = $row['ptc'];
}

// Sample data array for pets status
$labelsStatus = [];
$dataStatus = [];
while($row = $statusdata->fetch_assoc()){
   $dataStatus[] = $row['pidc']; // Assuming the count of pets by status is in 'count'
   $labelsStatus[] = $row['pstat']; // Assuming the status is in 'status'
}

$backgroundColor = [
   'rgba(255, 99, 132, 0.3)',
   'rgba(54, 162, 235, 0.3)',
   'rgba(75, 192, 192, 0.3)',
   'rgba(153, 102, 255, 0.3)',
   'rgba(255, 159, 64, 0.3)'
];
$borderColor = [
   'rgba(255, 99, 132, 1)',
   'rgba(54, 162, 235, 1)',
   'rgba(75, 192, 192, 1)',
   'rgba(153, 102, 255, 1)',
   'rgba(255, 159, 64, 1)'
];

$result = [
    "posted" => [
        "labels" => $labelsPosted,
        "datasets" => [
            [
                "data" => $dataPosted,
                "backgroundColor" => $backgroundColor,
                "borderColor" => $borderColor,
                "borderWidth" => 1
            ]
        ]
    ],
    "status" => [
        "labels" => $labelsStatus,
        "datasets" => [
            [
                "data" => $dataStatus,
                "backgroundColor" => $backgroundColor,
                "borderColor" => $borderColor,
                "borderWidth" => 1
            ]
        ]
    ]
];

echo json_encode($result);
?>
