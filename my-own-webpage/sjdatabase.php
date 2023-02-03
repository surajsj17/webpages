<?php
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO form_data (name, email, message)
    VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
      echo "Data inserted successfully";
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
?>
