<?php
include '../backend/db.php';

// Fetch all users with role 'Lender'
$lenders = $conn->query("SELECT User_ID, Name FROM user WHERE Role = 'Lender'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Loan</title>
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

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button, input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover, input[type="submit"]:hover {
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

    <h2>Create a New Loan</h2>

    <div class="card">
        <form action="../backend/insert_loan.php" method="POST">
            <label>Lender:</label>
            <select name="lender_id" required>
                <option value="">--Select Lender--</option>
                <?php while($row = $lenders->fetch_assoc()) { ?>
                    <option value="<?= $row['User_ID'] ?>"><?= $row['Name'] ?> (ID: <?= $row['User_ID'] ?>)</option>
                <?php } ?>
            </select><br><br>

            <label>Borrower Name:</label>
            <input type="text" name="borrower" required><br><br>

            <label>Amount:</label>
            <input type="number" name="amount" required><br><br>

            <label>Interest Rate (%):</label>
            <input type="number" step="0.01" name="interest_rate" required><br><br>

            <input type="submit" value="Create Loan">
        </form>
    </div>

</body>
</html>
