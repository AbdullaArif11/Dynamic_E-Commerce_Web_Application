<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item - Admin Panel</title>
</head>
<body>
<header style="border: 1px solid black; background-color: white; padding: 1rem; text-align: center;">
        <a href="../index.html"><button style="background-color: black; color: white; padding: 0.5rem 1rem; border: none; cursor: pointer; font-weight: bold; text-decoration: none; transition: background-color 0.3s; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Go Back</button></a>
    </header>
    <h1>Update Item - Admin Panel</h1>

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

    // Retrieve item details
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT title, price FROM teen_collection WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = $row["title"];
            $price = $row["price"];
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>">
                <button type="submit" name="update_title">Update Title</button>
                <br><br>
                
                <label for="price">Price ($):</label><br>
                <input type="number" id="price" name="price" step="0.01" value="<?php echo $price; ?>">
                <button type="submit" name="update_price">Update Price</button>
            </form>

            <?php
        } else {
            echo "Item not found.";
        }

        // Close statement and result
        $stmt->close();
        $result->close();
    }

    // Handle update requests
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];

        if (isset($_POST["update_title"])) {
            $title = $_POST["title"];
            $sql = "UPDATE teen_collection SET title = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $title, $id);
        } elseif (isset($_POST["update_price"])) {
            $price = $_POST["price"];
            $sql = "UPDATE teen_collection SET price = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("di", $price, $id);
        }

        // Execute update query
        if ($stmt->execute()) {
            echo "Item updated successfully!";
        } else {
            echo "Error updating item: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }

    // Close MySQL connection
    $conn->close();
    ?>
</body>
</html>
