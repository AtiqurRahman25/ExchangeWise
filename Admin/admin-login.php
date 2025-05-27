<?php
$conn = new mysqli("localhost", "root", "", "SESA");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if ($row['password'] === $password) {
        echo "<script>alert('✅ Login Successful!'); window.location.href='admin-dashboard.html';</script>";
    } else {
        echo "<script>alert('❌ Invalid Password'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('❌ Admin not found'); window.history.back();</script>";
}

$conn->close();
?>
