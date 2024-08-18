<?php
include_once '../../Class/User.php';
function formatDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('F jS, Y');
}

$u = new User();
$postpetsubmission = $u->submission(); 

while($row = $postpetsubmission->fetch_assoc()) {
    $dateString = $row['date_reg'];
    $col = $row['status'] == 'Pending' ? 'table-danger' : 'table-primary';
    echo '
        <tr class="align-middle '.$col.'">
            <td>'.$row['pet_id'].'</td>
            <td>'.$row['pet_name'].'</td>
            <td>'.$row['user_id'].'</td>
            <td>'.formatDate($dateString).'</td>
            <td>'.$row['status'].'</td>
            <td><button type="button" onclick="viewsubmission(\''.$row['pet_id'].'\')">View Application</button></td>
        </tr>
    ';
}
?>
