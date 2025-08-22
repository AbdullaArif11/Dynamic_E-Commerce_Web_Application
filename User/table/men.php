<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Collection</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            display: inline-block;
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
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

    // Fetch data from men_collection table
    $sql = "SELECT title, price, sell_quantity, sample FROM men_collection";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['sample']) . "' alt='" . $row['title'] . "' />";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>Price: $" . $row['price'] . "</p>";
            echo "<p>Sold: " . $row['sell_quantity'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    // Close MySQL connection
    $conn->close();
    ?>
</body>
</html>
