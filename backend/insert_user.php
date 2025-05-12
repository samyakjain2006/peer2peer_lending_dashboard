<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];

$sql = "INSERT INTO user (Name, Email, Role) VALUES ('$name', '$email', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "✅ User created successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}
$conn->close();
?>
