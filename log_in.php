<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'project';
$conn =mysqli_connect($server,$user,$pass,$db) or die(mysqli_connect_error());
if(isset($_POST["submit"])){  
  if(!empty($_POST['username1']) && !empty($_POST['password1'])) {  
      $username1 = $_POST['username1'];  
      $password1 = $_POST['password1'];  
    
      $result = "SELECT * FROM login WHERE username ='$username1' AND password ='$password1'";
      $query = mysqli_query($conn, $result); 
      if($query){
      if(mysqli_num_rows($query) === 1)  
      {
      $row = mysqli_fetch_assoc($query);
      if($row['username']===$username1 && $row['password']===$password1){
        $_SESSION['login']=$username1;
        echo "<script> 
             document.location.href = 'lastpage.php';     
             </script>";
      }
      else{
       echo "Incorrect username or password";
      }
    }
  }
      else{
        echo "<script> alert('Something Went Wrong');
        document.location.href = 'login.php';     
        </script>";
      }
    }
  }  

if(isset($_POST['submit']))
{
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];

    $query = "SELECT * FROM USER_FORM WHERE USERNAME = '$username1' && password =  '$password1'";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);

    //echo $total;
    if($data)
    {
        $_SESSION['username'] = $username1;
        header('location: lastpage.php');
    }
    else{
        echo"<font color = 'red'> LOGIN FAILED </font>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="icon" href="images/favicon (1).ico">
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username1" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password1" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit" name="submit">Log in</button>
                </form>

                <!-- 
                    connecting that information page 
                 -->
                <div class="register">
                    <p>Don't have an account <a href="optionforsign.html">Sign in</a></p>
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>