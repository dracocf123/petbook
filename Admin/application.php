<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
}
if($_SESSION['role']!="admin"){
    header('location:../index.php');
}
include_once 'topnavbar.php';
include_once '../Class/User.php';

function formatDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('F jS, Y');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="adminstyle.css">
    <script>
        function fetchTableData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'scriptdata/fetch_application.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('data-table-body').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function viewapplication(appid){
            window.open("viewapplication.php?appid=" + appid,"_new");
        }

        // Fetch table data every 5 seconds
        setInterval(fetchTableData, 5000);

        // Fetch table data on initial page load
        window.onload = fetchTableData;
    </script>
</head>
<body>
<main>
    <div class="container text-center">
        <div class="row">
            <div class="col table-responsive">
                <table class="table border table-admin text-nowrap">
                    <thead>
                        <tr class="table-dark">
                            <th>Adoption ID</th>
                            <th>Pet ID</th>
                            <th>Full Name</th>
                            <th>Date Apply</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="data-table-body">
                        <!-- Data will be loaded here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
