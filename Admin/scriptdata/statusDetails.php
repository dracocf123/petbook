<?php
$label = isset($_GET['label']) ? $_GET['label'] : '';

// Example database connection and query
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet-adoption-system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch pets based on the clicked status (e.g., 'Available')
$sql = "SELECT tbl_pet.pet_name as name, tbl_pet.pet_image as petimg, tbl_pet.pet_breed as breed FROM tbl_pet inner join tbl_pet_status on tbl_pet.pet_id = tbl_pet_status.pet_id WHERE status = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $label);
$stmt->execute();
$result = $stmt->get_result();

echo '<table class="table table-striped">
      <thead>
         <tr>
            <th></th>
            <th>Name</th>
            <th>Breed</th>
         </tr>
      </thead>
      <tbody>
';
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td><img src="../images/'.($row['petimg']).'" height="70px" width="70px"></td>';
    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
    echo '<td>' . htmlspecialchars($row['breed']) . '</td>';
    echo '</tr>';
}

echo '</tbody>
</table>';

$stmt->close();
$conn->close();
?>
