<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
 }
if($_SESSION['role']!="admin"){
    header('location:adminlogout.php');
}
include_once 'topnavbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Donated</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="adminstyle.css">
    <script>
        function fetchTableData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'scriptdata/fetch_pet_data.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('data-table-body').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function viewsubmission(pid){
            window.open("viewsubmission.php?pid=" + pid,"_new");
        }

        // Fetch table data every 5 seconds
        setInterval(fetchTableData, 5000);

        // Fetch table data on initial page load
        window.onload = fetchTableData;
    </script>
</head>
<body>
<main>
   <div class="container">
      <div class="row">
         <div class="col">
            <table class="table border table-admin">
                <thead>
                    <tr class="table-dark">
                        <th>Pet ID</th>
                        <th>Pet Name</th>
                        <th>User ID</th>
                        <th>Date Submitted</th>
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
