<?php
$host = 'localhost';
$db = 'u320585682_petbook';
$user = 'u320585682_petbook';
$pass = 'Mysqlphp1';


// $host = 'localhost';
// $db = 'u320585682_petbook';
// $user = 'u320585682_petbook';
// $pass = 'Mysqlphp1';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
