<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "test"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);


if ($stmt->execute() === TRUE) {
    
    echo "Thank you for your submission!";
    
    header("refresh:2; url=contactus.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
?>