<?php
include '../backend/db.php';

$sql = "SELECT 
            overduealert.Alert_ID,
            overduealert.Loan_ID,
            overduealert.Alert_Date,
            overduealert.Message,
            loan.Amount,
            loan.Due_Date,
            user.Name AS Borrower
        FROM overduealert
        JOIN loan ON overduealert.Loan_ID = loan.Loan_ID
        JOIN user ON loan.Borrower_ID = user.User_ID
        ORDER BY overduealert.Alert_Date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Overdue Alerts</title>
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

        h1 {
            color: #333;
            text-align: center;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            margin: 20px auto;
            width: 80%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            font-size: 14px;
        }

        .no-alerts {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: green;
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

    <h1>Overdue Loan Alerts</h1>

    <div class="card">
        <table>
            <tr>
                <th>Alert ID</th>
                <th>Loan ID</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Borrower</th>
                <th>Alert Date</th>
                <th>Message</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Alert_ID']; ?></td>
                    <td><?php echo $row['Loan_ID']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                    <td><?php echo $row['Due_Date']; ?></td>
                    <td><?php echo $row['Borrower']; ?></td>
                    <td><?php echo $row['Alert_Date']; ?></td>
                    <td><?php echo $row['Message']; ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" class="no-alerts">No overdue alerts. ✅</td></tr>
            <?php endif; ?>
        </table>
    </div>

</body>
</html>
