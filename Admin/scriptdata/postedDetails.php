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

// Query to fetch pets based on the clicked label (e.g., 'Dog')
$sql = "SELECT * FROM tbl_pet WHERE pet_type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $label);
$stmt->execute();
$result = $stmt->get_result();

echo '<table class="table table-striped">';
echo '<thead><tr><th></th><th>Name</th><th>Breed</th></tr></thead><tbody>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td><img src="../images/'.($row['pet_image']).'" height="70px" width="70px"></td>';
    echo '<td>' . htmlspecialchars($row['pet_name']) . '</td>';
    echo '<td>' . htmlspecialchars($row['pet_breed']) . '</td>';
    echo '</tr>';
}

echo '</tbody></table>';

$stmt->close();
$conn->close();
?>
