<?php
include '../backend/db.php'; // Connect to the DB

// Get total loans
$loanQuery = $conn->query("SELECT COUNT(*) AS total_loans FROM loan");
$loanData = $loanQuery->fetch_assoc();

// Get total users
$userQuery = $conn->query("SELECT COUNT(*) AS total_users FROM user");
$userData = $userQuery->fetch_assoc();

// Get total overdue alerts
$alertQuery = $conn->query("SELECT COUNT(*) AS total_alerts FROM overduealert");
$alertData = $alertQuery->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; padding: 40px; background: #f4f4f4; }
        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h1 { color: #333; }
        /* Navigation Bar Styles */
        .nav {
            background-color: #333;
            overflow: hidden;
        }

        .nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .nav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="new_loan.php">New Loan</a>
        <a href="new_user.php">New User</a>
        <a href="loan_history.php">Loan History</a>
        <a href="make_payment.php">Make Payment</a>
        <a href="overdue_alerts.php">Overdue Alerts</a>
        <a href="reliability_score.php">Reliability Score</a>
    </div>

    <h1>📊 Peer2Peer Lending Dashboard</h1>

    <div class="card">
        <h3>Total Users:</h3>
        <p><?= $userData['total_users'] ?></p>
    </div>

    <div class="card">
        <h3>Total Loans:</h3>
        <p><?= $loanData['total_loans'] ?></p>
    </div>

    <div class="card">
        <h3>Overdue Alerts:</h3>
        <p><?= $alertData['total_alerts'] ?></p>
    </div>

</body>
</html>
