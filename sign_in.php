<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $hostelName = $_POST["hostelName"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO owner_first (name, mobile, email, hostelName, username, password) VALUES (?, ?, ?, ?, ?, ?);";
    $sql1 = "INSERT INTO login (username, password) 
    VALUES ('$username', '$password')";
    if ($conn->query($sql1) === TRUE) {
        // Redirect to index.html
        $_SESSION['username'] = $username1;
        header("Location: hosteldetail.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("ssssss", $name, $mobile, $email, $hostelName, $username, $password);
    // $stmt->execute();

    // // Check if the data was inserted successfully
    // if ($stmt->affected_rows > 0) {
    //     header("Location: hosteldetail.php");
    //     exit;
    // } else {
    //     echo "Error inserting data: " . $conn->error;
    // }

    // Close the statement
    //  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="icon" href="images/favicon (1).ico">
    <link rel="stylesheet" href="sign_in.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="sign_in.php" method="post">
                    <h2>Sign in</h2>
                    <div class="inputbox">
                        <ion-icon name="person-sharp"></ion-icon>
                        <input type="text" name="name" required>
                        <label for="">Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-sharp"></ion-icon>
                        <input type="tel" name="mobile" required>
                        <label for="">Mobile number</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-sharp"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email address</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="pencil"></ion-icon>
                        <input type="text" name="hostelName" required>
                        <label for="">Hostel Name</label>
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