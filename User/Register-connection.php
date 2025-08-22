<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'online_fashion_store');

$Email = $_POST['Email'];
$Name = $_POST['Name'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$billing_address = $_POST['billing_address'];
$birth_date = $_POST['birth_date'];
$pass = $_POST['pass'];


// Check if Email already exists in the table
$checkQuery = "SELECT * FROM user WHERE Email = '$Email'";
$result = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($result) > 0) {
  // If  Email already exists, show a message and redirect to the login page
  echo '<h3 style="color: white; background: red;">Email already exists. Please use a different Email.</h3>';
  echo '<a href="Register.php" style=" 
                                    padding: 10px 20px; 
                                    background-color: black; 
                                    color: white; 
                                    text-decoration: none; 
                                    border-radius: 4px; 
                                    font-size: 16px;
                                    border: 2px solid #4CAF50;
                                    transition: background-color 0.3s ease-in-out;">
        Go Back
      </a>';
  // header("Location: login-page.php");
} else {
  // If Email are unique, insert the data into the database
  $query = "INSERT INTO user (email, name, surname, address, billing_address, birth_date, password)
            VALUES ('$Email', '$Name', '$surname', '$address', '$billing_address', '$birth_date', '$pass')";

  if (mysqli_query($con, $query)) {
    echo "Submitted";
    header("Location: login-page.php");
  } else {
    echo "Error: " . mysqli_error($con);
  }
}

mysqli_close($con);
?>
