<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - (TEEN)</title>
</head>
<body>
<header style="border: 1px solid black; background-color: white; padding: 1rem; text-align: center;">
        <a href="../index.html"><button style="background-color: black; color: white; padding: 0.5rem 1rem; border: none; cursor: pointer; font-weight: bold; text-decoration: none; transition: background-color 0.3s; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Go Back</button></a>
    </header>
    <h1>Add Item - (TEEN)</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br><br>
        
        <label for="price">Price ($):</label><br>
        <input type="number" id="price" name="price" step="0.01"><br><br>
        
        <label for="sell_quantity">Quantity Sold:</label><br>
        <input type="number" id="sell_quantity" name="sell_quantity"><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        
        <input type="submit" value="Add Item">
    </form>

    <?php
    // Connect to MySQL database
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "online_fashion_store";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $price = $_POST["price"];
        $sell_quantity = $_POST["sell_quantity"];
        
        // Image handling
        $image = file_get_contents($_FILES['image']['tmp_name']);
        
        // Prepare SQL statement
        $sql = "INSERT INTO teen_collection (title, price, sell_quantity, sample) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters and execute
        $stmt->bind_param("sdis", $title, $price, $sell_quantity, $image);
        $stmt->execute();
        
        // Check if insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "<p>Item added successfully!</p>";
        } else {
            echo "<p>Error adding item: " . $stmt->error . "</p>";
        }
        
        // Close statement
        $stmt->close();
    }

    // Close MySQL connection
    $conn->close();
    ?>
</body>
</html>
