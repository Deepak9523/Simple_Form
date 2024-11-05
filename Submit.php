<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data from POST
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$description = $_POST['description'];

// Insert data into the database using a prepared statement
$sql = "INSERT INTO name (name, Contact, Email, Description) VALUES ('$name', '$contact', '$email', '$description')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $contact, $email, $description);

if ($stmt->execute()) {
    echo "Your details have been submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
