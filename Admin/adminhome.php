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
    <!-- Modal -->
<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="chartModalLabel">Chart Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modalContent">Loading...</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    
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
            const postedChart = new Chart(ctxPosted, {
                type: 'doughnut',
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
                                size: 25
                            }
                        }
                    },
                    onClick: (event, elements) => {
                        if (elements.length) {
                            const index = elements[0].index;
                            const clickedLabel = data.posted.labels[index];
                            showModal('posted', clickedLabel);
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the datalabels plugin
            });

            // Pets Status Chart
            const ctxStatus = document.getElementById('petsStatusChart').getContext('2d');
            const statusChart = new Chart(ctxStatus, {
                type: 'doughnut',
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
                                size: 25
                            }
                        }
                    },
                    onClick: (event, elements) => {
                        if (elements.length) {
                            const index = elements[0].index;
                            const clickedLabel = data.status.labels[index];
                            showModal('status', clickedLabel);
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the datalabels plugin
            });

            // Show modal function with chart type and clicked label
            function showModal(chartType, label) {
                fetch(`scriptdata/${chartType}Details.php?label=${encodeURIComponent(label)}`)
                    .then(response => response.text())
                    .then(content => {
                        document.getElementById('modalContent').innerHTML = content;
                        var myModal = new bootstrap.Modal(document.getElementById('chartModal'));
                        myModal.show();
                    })
                    .catch(error => console.error('Error fetching modal data:', error));
            }
        })
        .catch(error => console.error('Error fetching data:', error));
});

</script>

<!-- <script>
document.addEventListener('DOMContentLoaded', () => {
    fetch('scriptdata/piedata.php')
        .then(response => response.json())
        .then(data => {
            // Pets Posted Chart
            const ctxPosted = document.getElementById('petsPostedChart').getContext('2d');
            new Chart(ctxPosted, {
                type: 'doughnut',
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
                                size: 25
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the datalabels plugin
            });

            // Pets Status Chart
            const ctxStatus = document.getElementById('petsStatusChart').getContext('2d');
            new Chart(ctxStatus, {
                type: 'doughnut',
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
                                size: 25
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the datalabels plugin
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script> -->
</body>
</html>
