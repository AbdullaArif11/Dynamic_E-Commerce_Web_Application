<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {
  $Email = $_POST['Email'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM user WHERE Email = '$Email' AND password = '$pass'";
  $result = mysqli_query($con, $sql);

  if ($result && mysqli_num_rows($result) == 1) {
    // Fetch the user's data
    $row = mysqli_fetch_assoc($result);

    // Store the email in the session
    $_SESSION['Email'] = $row['Email'];

    // Redirect to welcome.php
    header("Location: welcome.php");
    exit();
  } else {
    echo '<script>
      window.location.href = "login-page.php";
      alert("Login failed. Invalid UserID or Password!!!");
      </script>';
  }
}
?>
