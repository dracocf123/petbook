<?php 
session_start();
if(!isset($_SESSION['id_num'])){
   header('location:adminlogout.php');
}
if($_SESSION['role']!="admin"){
    header('location:../index.php');
}
include_once 'topnavbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<main>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <h3>Number of Pets Posted</h3>
                <canvas id="petsPostedChart"></canvas>
            </div>
            <div class="col-md-6">
                <h3>Number of Pets by Status</h3>
                <canvas id="petsStatusChart"></canvas>
            </div>
        </div>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fetch('scriptdata/piedata.php')
        .then(response => response.json())
        .then(data => {
            // Pets Posted Chart
            const ctxPosted = document.getElementById('petsPostedChart').getContext('2d');
            new Chart(ctxPosted, {
                type: 'pie',
                data: data.posted,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return data.posted.labels[tooltipItem.dataIndex] + ': ' + data.posted.datasets[0].data[tooltipItem.dataIndex];
                                }
                            }
                        },
                        datalabels: {
                            color: 'black',
                            formatter: (value, context) => {
                                return value;
                            },
                            font: {
                                weight: 'bold',
                                size: 16
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the datalabels plugin
            });

            // Pets Status Chart
            const ctxStatus = document.getElementById('petsStatusChart').getContext('2d');
            new Chart(ctxStatus, {
                type: 'pie',
                data: data.status,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return data.status.labels[tooltipItem.dataIndex] + ': ' + data.status.datasets[0].data[tooltipItem.dataIndex];
                                }
                            }
                        },
                        datalabels: {
                            color: 'black',
                            formatter: (value, context) => {
                                return value;
                            },
                            font: {
                                weight: 'bold',
                                size: 16
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the datalabels plugin
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>
</body>
</html>
