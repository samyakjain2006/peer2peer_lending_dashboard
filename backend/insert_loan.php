<?php
include 'db.php';

$lender_id = $_POST['lender_id'];
$borrower = $_POST['borrower'];
$amount = $_POST['amount'];
$interest_rate = $_POST['interest_rate']; // optional, if you're using interest table

// Sanitize input
$borrower = mysqli_real_escape_string($conn, $borrower);

// Get borrower ID from name
$getBorrowerIdQuery = "SELECT User_ID FROM user WHERE Name = '$borrower' LIMIT 1";
$result = $conn->query($getBorrowerIdQuery);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $borrower_id = $row['User_ID'];

    // Set static values for required fields
    $start_date = date('Y-m-d');
    $due_date = date('Y-m-d', strtotime("+30 days")); // or however you calculate due date
    $status = 'Active';

    $sql = "INSERT INTO loan (Amount, Start_Date, Due_Date, Status, Lender_ID, Borrower_ID)
            VALUES ('$amount', '$start_date', '$due_date', '$status', '$lender_id', '$borrower_id')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Loan created successfully!";
    } else {
        echo "❌ Error inserting loan: " . $conn->error;
    }
} else {
    echo "❌ Error: Borrower name not found in user table.";
}

$conn->close();
?>
