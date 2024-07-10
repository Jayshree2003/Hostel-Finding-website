<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $hostelName = $_POST["hostelName"];
    $hostelAddress = $_POST["hostelAddress"];
    $nearbyPlace = $_POST["nearbyPlace"];
    $details = $_POST["details"];
    $parking = isset($_POST["parking"]) ? 1 : 0 ;
    $waterAvailability = isset($_POST["waterAvailability"]) ? 1 : 0 ;
    $electricSupply = isset($_POST["electricSupply"]) ? 1 : 0 ;
    $wifi = isset($_POST["wifi"]) ? 1 : 0 ;
    $mess = isset($_POST["mess"]) ? 1 : 0 ;
    $washingMachine = isset($_POST["washingMachine"]) ? 1 : 0 ;
    $geyser = isset($_POST["geyser"]) ? 1 : 0 ;

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO hostel_details (hostel_name, hostel_address, nearby_place, details, parking, water_availability, electric_supply, wifi, mess, washing_machine, geyser)
            VALUES ('$hostelName', '$hostelAddress', '$nearbyPlace', '$details', $parking, $waterAvailability, $electricSupply, $wifi, $mess, $washingMachine, $geyser)";

    if ($conn->query($sql) === TRUE) {
        header("Location: lastpage.php");
        exit;
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
    <title>Hostel Details</title>
    <link rel="stylesheet" href="hosteldetail.css">
    <link rel="icon" href="images/favicon (1).ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="hosteldetail.php" method="post">
                    <h2>Hostel details</h2>
                    <div class="inputbox">
                        <input type="text" name="hostelName" required>
                        <label for="">Hostel Name</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="hostelAddress" required>
                        <label for="">Hostel address</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="nearbyPlace" required>
                        <label for="">Nearby place</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="details" required>
                        <label for="">Some details </label>
                    </div>
                    <div class="main">
                        <h6>Parking?</h6>
                        <label class="switch">
                            <input type="checkbox" name="parking">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <div class="main">
                        <h6>Water availability</h6>
                        <label class="switch">
                            <input type="checkbox" name="waterAvailability">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <div class="main">
                        <h6>Electric supply</h6>
                        <label class="switch">
                            <input type="checkbox" name="electricSupply">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <div class="main">
                        <h6>Wifi</h6>
                        <label class="switch">
                            <input type="checkbox" name="wifi">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <div class="main">
                        <h6>Mess</h6>
                        <label class="switch">
                            <input type="checkbox" name="mess">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <div class="main">
                        <h6>Washing Machine?</h6>
                        <label class="switch">
                            <input type="checkbox" name="washingMachine">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <div class="main">
                        <h6>Geyser?</h6>
                        <label class="switch">
                            <input type="checkbox" name="geyser">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                    <button class="button" type="submit">Submit Details</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>