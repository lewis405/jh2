<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citylight-uni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form inputs
$fullname = $conn->real_escape_string($_POST['fullname']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$dob = $conn->real_escape_string($_POST['dob']);
$gender = $conn->real_escape_string($_POST['gender']);
$course = $conn->real_escape_string($_POST['course']);

// Insert query
$sql = "INSERT INTO regestration-from (full name, email address, phone number, date of birth, gender, course applying for)
        VALUES ('$fullname', '$email', '$phone', '$dob', '$gender', '$course')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>Registration Successful!</h2>";
  echo "<p><a href='index.html'>Back to Home</a></p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
