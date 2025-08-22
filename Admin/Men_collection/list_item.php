<!-- List of items with Update button -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Items</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
<header style="border: 1px solid black; background-color: white; padding: 1rem; text-align: center;">
        <a href="../index.html"><button style="background-color: black; color: white; padding: 0.5rem 1rem; border: none; cursor: pointer; font-weight: bold; text-decoration: none; transition: background-color 0.3s; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">Go Back</button></a>
    </header>
    <h1>Admin Panel - Manage Items</h1>
    
    <table>
        <tr>
            <th>Title</th>
            <th>Price ($)</th>
            <th>Quantity Sold</th>
            <th>Actions</th>
        </tr>

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

        // Fetch data from men_collection table
        $sql = "SELECT id, title, price, sell_quantity FROM men_collection";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['sell_quantity'] . "</td>";
                echo "<td>";
                echo "<form action='update_item.php' method='get'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
                echo "<form action='delete_item.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<input type='submit' value='Delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }

        // Close MySQL connection
        $conn->close();
        ?>
    </table>
</body>
</html>
