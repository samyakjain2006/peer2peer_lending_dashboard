<?php
include 'db.php';

$loan_id = $_POST['loan_id'];
$amount = $_POST['amount'];
$payment_date = $_POST['payment_date'];

$sql = "INSERT INTO payment (Loan_ID, Amount, Payment_Date) 
        VALUES ('$loan_id', '$amount', '$payment_date')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Payment recorded successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
