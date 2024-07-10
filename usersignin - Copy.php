<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile_number = $_POST["mobile_number"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert the data into the database
    $sql = "INSERT INTO user_form (name, mobile_number, email, address, username, password) 
            VALUES ('$name', '$mobile_number', '$email', '$address', '$username', '$password');";

    $sql1= "INSERT INTO login (username, password) VALUES ('$username', '$password');";

    if ($conn->query($sql)== TRUE && $conn->query($sql1) === TRUE) {
        // Redirect to index.html
        $_SESSION['username'] = $username1;
        header("Location: lastpage.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in to find a Hostel...</title>
    <link rel="icon" href="images/favicon (1).ico">
    <link rel="icon" href="images/favicon (1).ico">
    <link rel="stylesheet" href="usersignin.css">
</head>
<body>
    <section>
        <div class="form-box">
          <div class="form-value">
            <form action="usersignin.php" method="POST">
              <h2>Sign in</h2>
              <div class="inputbox">
                <ion-icon name="person-sharp"></ion-icon>
                <input type="text" name="name" required>
                <label for="">Name</label>
              </div>
              <div class="inputbox">
                <ion-icon name="call-sharp"></ion-icon>
                <input type="tel" name="mobile_number" required>
                <label for="">Mobile number</label>
              </div>
              <div class="inputbox">
                <ion-icon name="mail-sharp"></ion-icon>
                <input type="email" name="email" required>
                <label for="">Email address</label>
              </div>
              <div class="inputbox">
                <ion-icon name="pencil"></ion-icon>
                <input type="text" name="address" required>
                <label for="">Address</label>
              </div>
              <div class="inputbox">
                <ion-icon name="pencil"></ion-icon>
                <input type="text" name="username" required>
                <label for="">Username</label>
              </div>
              <div class="inputbox">
                <ion-icon name="lock-closed"></ion-icon>
                <input type="password" name="password" required>
                <label for="">Password</label>
              </div>
              <button type="submit">Submit</button>
              
              <div class="register">
                <p>Have you already registered? <a href="log_in.php">Log in</a></p>
            </div>
        </form>
    </div>
  </div>
</section>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>