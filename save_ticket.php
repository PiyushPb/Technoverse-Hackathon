<?php

$ticketData = json_decode(file_get_contents("php://input"), true);

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techno";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $ticketData["Please enter your name:"];
$email = $ticketData["Please enter your email:"];
$phone = $ticketData["Please enter your phone number:"];
$gender = $ticketData["Please enter your gender:"];
$service = $ticketData["Please select a service:"];

$sql = "INSERT INTO tickets (name, email, phone, gender, service) VALUES ('$name', '$email', '$phone', '$gender', '$service')";

if ($conn->query($sql) === true) {
    echo "Ticket created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
