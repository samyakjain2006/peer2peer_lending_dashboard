<?php
// Include your DB connection file
include '../backend/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reliability Score</title>
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

        .score-info {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .no-data {
            text-align: center;
            color: #ff0000;
            font-size: 18px;
            margin-top: 20px;
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

    <h1>User Reliability Scores</h1>

    <?php
    // Fetch all users who have loans
    $sql = "SELECT DISTINCT Borrower_ID FROM loan";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $borrowerID = $row['Borrower_ID'];

            // Initialize score
            $score = 0;

            // +10 points for completed loans
            $sqlCompletedLoans = "SELECT * FROM loan WHERE Borrower_ID = $borrowerID AND Status = 'Completed'";
            $completedLoans = $conn->query($sqlCompletedLoans);
            $score += $completedLoans->num_rows * 10;  // +10 per completed loan

            // -5 points for overdue loans
            $sqlOverdueLoans = "SELECT * FROM loan WHERE Borrower_ID = $borrowerID AND Status = 'Overdue'";
            $overdueLoans = $conn->query($sqlOverdueLoans);
            $score -= $overdueLoans->num_rows * 5;  // -5 per overdue loan

            // Display borrower info and their reliability score
            echo "<div class='card'>";
            echo "<div class='score-info'><strong>User ID:</strong> $borrowerID</div>";
            echo "<div class='score-info'><strong>Reliability Score:</strong> $score</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='no-data'>No loans found for any users.</div>";
    }
    ?>

</body>
</html>
