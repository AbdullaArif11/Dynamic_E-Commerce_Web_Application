<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "online_fashion_store"; // Your MySQL database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Delete the item from the men_collection table
    $sql = "DELETE FROM teen_collection WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "Item deleted successfully!";
    } else {
        echo "Error deleting item: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close MySQL connection
$conn->close();
?>
