<?php
include '../backend/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f4f4f4;
        }

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

        h1, h2 {
            color: #333;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            width: 50%;
            margin: 20px auto;
        }

        label {
            font-weight: bold;
            margin: 10px 0;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
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

    <h2>Make a Loan Payment</h2>

    <div class="card">
        <form action="../backend/insert_payment.php" method="POST">
            <label for="loan_id">Loan ID:</label>
            <input type="number" name="loan_id" required>

            <label for="amount">Payment Amount:</label>
            <input type="number" name="amount" required>

            <label for="payment_date">Payment Date:</label>
            <input type="date" name="payment_date" required>

            <button type="submit">Submit Payment</button>
        </form>
    </div>

</body>
</html>
