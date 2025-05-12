<?php
include '../backend/db.php';

// Fetch loan details along with borrower names
$sql = "SELECT 
            loan.Loan_ID,
            loan.Amount,
            loan.Start_Date,
            loan.Due_Date,
            loan.Status,
            borrower.Name AS Borrower
        FROM loan
        JOIN user AS borrower ON loan.Borrower_ID = borrower.User_ID";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loan History</title>
    <style>
        body {
            font-family: Arial;
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
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        table th, table td {
            font-size: 14px;
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

    <h1>📊 Loan History</h1>

    <div class="card">
        <table>
            <tr>
                <th>Loan ID</th>
                <th>Borrower</th>
                <th>Amount</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Loan_ID']; ?></td>
                <td><?php echo $row['Borrower']; ?></td>
                <td><?php echo $row['Amount']; ?></td>
                <td><?php echo $row['Start_Date']; ?></td>
                <td><?php echo $row['Due_Date']; ?></td>
                <td><?php echo $row['Status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
