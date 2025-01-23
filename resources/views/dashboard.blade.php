<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 18px;
            color: #17a2b8;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            font-weight: bold;
            color: #343a40;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        /* Layout for the charts */
        .chart-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Two charts in a row */
            gap: 30px;
            margin-top: 30px;
        }

        .chart-container canvas {
            width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }
            .chart-container {
                grid-template-columns: 1fr; /* Stack the charts */
            }
        }
    </style>
</head>
<body>

            <div class="card-container">
                <div class="card">
                    <h3>Users</h3>
                    <p>{{ $userCount }}</p>
                </div>
                <div class="card">
                    <h3>Products</h3>
                    <p>{{ $productCount }}</p>
                </div>
                <div class="card">
                    <h3>Orders</h3>
                    <p>{{ $orderCount }}</p>
                </div>
                <div class="card">
                    <h3>Contact Messages</h3>
                    <p>{{ $contactUs }}</p>
                </div>
                <div class="card">
                    <h3>Categories</h3>
                    <p>{{ $categoryCount }}</p>
                </div>
            </div>

            <div class="chart-container">
                <div>
                    <h3>Month-wise Orders</h3>
                    <canvas id="ordersChart"></canvas>
                </div>
            
                <div>
                    <h3>Most Sold Products</h3>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
            
        
    

    <script>
        $(document).ready(function () {
            // Data from Laravel passed as JSON
            const ordersData = @json($orders);
            const salesData = @json($sales);

            // Month-wise Orders Chart
            if (ordersData.length > 0) {
                const months = ordersData.map(item => `Month ${item.month}`);
                const counts = ordersData.map(item => item.count);

                new Chart(document.getElementById('ordersChart'), {
                    type: 'bar',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Orders',
                            data: counts,
                            backgroundColor: 'rgba(23, 162, 184, 0.7)'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                console.error('No orders data available.');
            }

            // Most Sold Products Chart
            if (salesData.length > 0) {
                const productNames = salesData.map(item => item.product_name);
                const totalSold = salesData.map(item => item.total_sold);

                new Chart(document.getElementById('salesChart'), {
                    type: 'pie',
                    data: {
                        labels: productNames,
                        datasets: [{
                            data: totalSold,
                            backgroundColor: ['#ffc107', '#17a2b8', '#28a745', '#6f42c1', '#dc3545']
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            } else {
                console.error('No sales data available.');
            }
        });
    </script>
</body>
</html>
