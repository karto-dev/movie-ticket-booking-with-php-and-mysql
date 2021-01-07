<?php

session_start();

if (isset($_REQUEST['username']) || isset($_REQUEST['password'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movieproject";
    $conn = mysqli_connect($server, $username, $password, $dbname);
    if (!$conn) {
        die("connection to database failed due to" . mysqli_connect_error());
    }
    // else echo "connected bro";


    if (isset($_POST['username'])) {

        $username = $_POST["username"];
        $karthik = $_SESSION['username'];

        $password = $_POST["password"];

        $result1 = mysqli_query($conn, "SELECT  username, password  FROM userinfo WHERE username= '" . $username . "' and password = '" . $password . "'");
        while ($row = mysqli_fetch_assoc($result1)) {

            $check_password = $row['password'];
            $check_username = $row['username'];
        }

        if ($password == $check_password && $username == $check_username) {

            echo '<script language="javascript">';
            echo 'alert("Login Success");';
            echo '</script>';

            header('location:home.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Login Failed")';
            echo '</script>';
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-repeat: no-repeat;
            background-image:url("images/addMovieBackground.jpg");
            background-attachment: fixed;
            background-size: cover;
        }

  

        a {
            text-decoration: none;
            color: white;
        }

        input {
            width: 50%;
        }
        h1{
            color:gold;
            background-color:#111;
            padding:15px;
            opacity:0.8;
        }
    </style>
</head>

<body>
<div class="container">
    

        

            <center>
            <h1> WELCOME TO MOVIEHOME LOGIN PAGE</H1>
                <br>
                <br>
                <form action="home1.php" method="POST">

                    <div class="form-group">
                        <h3>username:</h3>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <h3>password:</h3>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <span>
                        <button type="submit" class="btn btn-primary" id="button ">LOGIN</button>&nbsp;

                        <button type="submit" class="btn btn-primary" id="button"><a href="mov.php">SIGNUP</a></button>

                    </span>


                </form>
            </center>


        </div>
    
</body>

</html>