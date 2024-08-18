<?php

include_once '../../Class/User.php';

function formatDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('F jS, Y');
}

$u = new User();
$displayapplication = $u->application();

while($row = $displayapplication->fetch_assoc()){
    $dateString = $row['application_date'];
    $rowClass = $row['status'] === 'Pending' ? 'table-danger' : 'table-primary';
    echo '
        <tr class="align-middle ' . $rowClass . '">
            <td>' . htmlspecialchars($row['application_id']) . '</td>
            <td>' . htmlspecialchars($row['pet_id']) . '</td>
            <td>' . htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) . '</td>
            <td>' . htmlspecialchars(formatDate($dateString)) . '</td>
            <td>' . htmlspecialchars($row['status']) . '</td>
            <td><button type="button" onclick="viewapplication(\'' . htmlspecialchars($row['application_id']) . '\')">View Application</button></td>
        </tr>
    ';
}
?>
