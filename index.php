<?php
    session_start();
if(!isset($_SESSION['user_id'])){
    header("Location:public/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --danger-color: #7209b7;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fb;
            color: var(--dark-color);
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .navbar {
            background: white;
            padding: 15px 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-link {
            color: var(--dark-color);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .logout-btn {
            background-color: var(--warning-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .logout-btn:hover {
            opacity: 0.9;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .logo span {
            color: var(--warning-color);
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-color);
        }

        .page-subtitle {
            color: var(--gray-color);
            margin-bottom: 30px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .kpi-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease;
        }

        .kpi-card:hover {
            transform: translateY(-5px);
        }

        .kpi-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .kpi-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-color);
        }

        .kpi-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .icon-revenue {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        .icon-net {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
        }

        .icon-pending {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--warning-color);
        }

        .kpi-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .kpi-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .trend {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 500;
        }

        .trend-up {
            background-color: rgba(76, 201, 240, 0.15);
            color: #28a745;
        }

        .trend-down {
            background-color: rgba(247, 37, 133, 0.15);
            color: #dc3545;
        }

        .charts-container {
            display: grid;
            grid-template-columns: 2fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        @media (max-width: 992px) {
            .charts-container {
                grid-template-columns: 1fr;
            }
        }

        .chart-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--box-shadow);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .chart-title {
            font-size: 22px;
            font-weight: 600;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: var(--gray-color);
            font-size: 14px;
            margin-top: 30px;
            border-top: 1px solid #dee2e6;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .navbar {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .page-title {
                font-size: 24px;
            }
            
            .kpi-value {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="logo">Smart_wallet</div>
            <div class="nav-links">
                <a href="../index.php" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="public/income.php" class="nav-link">
                    <i class="fas fa-money-bill-wave"></i>
                    Income
                </a>
                <a href="public/expense.php" class="nav-link">
                    <i class="fas fa-receipt"></i>
                    Expense
                </a>
                <a href="public/category.php?type=all" class="nav-link">
                    <i class="fas fa-tags"></i>
                    Category
                </a>
              <form method="POST" action="public/authservice/logout.php" style="display:inline;">
    <button type="submit" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
        Logout
    </button>
</form>

            </div>
        </nav>

        <main>
            <div>
                <h1 class="page-title">Financial Dashboard</h1>
                <p class="page-subtitle">Track your income, expenses, and financial performance</p>
            </div>

            <div class="dashboard-grid">
                <div class="kpi-card">
                    <div class="kpi-header">
                        <h3 class="kpi-title">Income</h3>
                        <div class="kpi-icon icon-revenue">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="kpi-value" id="incomeValue">0 DH</div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-header">
                        <h3 class="kpi-title">Expense</h3>
                        <div class="kpi-icon icon-net">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="kpi-value" id="expenseValue">0 DH</div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-header">
                        <h3 class="kpi-title">Balance</h3>
                        <div class="kpi-icon icon-pending">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="kpi-value" id="balanceValue">0 DH</div>
                </div>
            </div>

            <div class="charts-container">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Financial Overview</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                
            </div>
        </main>
    </div>

    <script>
      

         

        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Income',
                    data: [],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Expenses',
                    data: [],
                    borderColor: '#4cc9f0',
                    backgroundColor: 'rgba(76, 201, 240, 0.05)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

       
    </script>
</body>
</html>