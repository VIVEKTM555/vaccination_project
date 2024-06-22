<?php
// Assuming your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaccination";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data sent from the React component
$data = json_decode(file_get_contents('php://input'), true);

$fullName = $data['fullName'];
$phoneNumber = $data['phoneNumber'];
$adharNumber = $data['adharNumber'];
$address = $data['address'];
$password = $data['password'];

// Insert data into the database
$sql = "INSERT INTO users (fullName, phoneNumber, adharNumber, address, password) VALUES ('$fullName', '$phoneNumber', '$adharNumber', '$address', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
