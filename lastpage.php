<?php
session_start();
if(!$_SESSION)
{
    header("Location: index.html");
}
else
{
    echo "Welcome ".$_SESSION['username']."<br />";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO Hostel_खोजो</title>
    <link rel="stylesheet" href="lastpage.css">
</head>
<body>
<button id="logout" onclick="logOutFunction()">Log Out</button>
<table border="2">
  <tr>
    <th>Hostel Name</th>
    <th>Hostel Address</th>
    <th>Landmark</th>
    <th>Details</th>
    <th>Parking</th>
    <th>Water Availability</th>
    <th>Electricity</th>
    <th>Wifi</th>
    <th>Mess</th>
    <th>Washing Machine</th>
    <th>Geyser</th>
  </tr>

<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';
$conn = mysqli_connect($server, $user, $pass, $db) or die(mysqli_connect_error());

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM `hostel_details`;";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["hostel_name"] . "</td>";
        echo "<td>" . $row["hostel_address"] . "</td>";
        echo "<td>" . $row["nearby_place"] . "</td>";
        echo "<td>" . $row["details"] . "</td>";
        echo "<td>" . $row["parking"] . "</td>";
        echo "<td>" . $row["water_availability"] . "</td>";
        echo "<td>" . $row["electric_supply"] . "</td>";
        echo "<td>" . $row["wifi"] . "</td>";
        echo "<td>" . $row["mess"] . "</td>";
        echo "<td>" . $row["washing_machine"] . "</td>";
        echo "<td>" . $row["geyser"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>0 results</td></tr>";
}

$conn->close();
?>
</table>




</body>
<script>
    function logOutFunction()
    {
        <?php  session_destroy();?>
        location.reload();
    }
</script>
</html>