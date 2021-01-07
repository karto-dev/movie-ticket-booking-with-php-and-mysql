<?php
session_start();
    
        $server = "localhost";
        $username = "root";
        $password = "";
      $dbname="movieproject";
        $conn = mysqli_connect($server, $username, $password,$dbname);
        if (!$conn) {
            die("connection to database failed due to" . mysqli_connect_error());
        }
        // echo "Success in connecting to  database";
        if (isset($_POST['fname'])) {
        $lname =  $fname = $gender = $email = $phone = $place = " ";
        // $available_tickets=100;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $place = $_POST['place'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $_SESSION['username']=$username;

        $sqlb ="INSERT INTO `userinfo` (`fname`,`lname`,`gender`,`email`,`phone`,`place`,`username`,`password`) 
        VALUES ( '$fname', '$lname', '$gender', '$email', '$phone', '$place','$username','$password')";
       
       // echo $sqlb;
       // echo $sqlc;
       // echo $sqld;
       // echo $sqle;

        if (mysqli_query($conn,$sqlb)) {
        
            echo "<script> ";
            echo "your data is saved ";
            echo "</script>";
           
        } else die("could not add");
        mysqli_close($conn);
    }
    if (isset($_POST['clear'])) {
      $karthik=$_SESSION['username'];
     $sqlc="DELETE FROM `userinfo` where username='".$karthik."'";
    
 

     
     mysqli_close($conn);
 }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking movies</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <style>

body{
        
        
         
         justify-content: center;
          text-align:center;
        
          margin:auto;
          font-size:25px;
          font-family: sans-serif;
          

       }
       body {
            background-repeat: no-repeat;
            background-image:url("images/addMovieBackground.jpg");
            background-attachment: fixed;
            background-size: cover;
        }
    form{

      display:flex;
      flex-direction: column;
      width:80%;
      padding:15px;
     outline: none;
     cursor: pointer;
    }
    h3{
      color:DARKblue;
      font-family:italic;
    }
  .header{
    background-color: goldenrod;
  
    font-family:italic;
    border:none;
    width:100%;
    height: 50px;
    position:fixed;
    top:0px;
    padding:5px;
    left:0px;
    justify-content: center;
    overflow: hidden;
  }
  .header h2{
    color:white;
    margin-right:250px;
  }
  .container{
    margin-top: 50px;
    position: relative;
  }
  .footer{
    background-color: goldenrod;
   
    font-family:italic;
    border:none;
    width:100%;
    height: 50px;
    position:fixed;
    bottom:0px;
    padding:15px;
    left:0px;
    justify-content: center;
    overflow: hidden;
  }
  #button{
    width:100px;
  }
  </style>
</head>
<body>
 
  
<div class="container">
  <div class="header">
    <h2>PLEASE FILL THE SIGNUP PAGE </h2>
  </div>

 
  
  <form action="mov.php" method="post" class="needs-validation" novalidate>
    
    <div class="form-group">
      <h3>FIRSTNAME:</h3>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter firstname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <h3>LASTNAME:</h3>
         <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter lastname" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
       </div>
       <div class="form-group">
       <h3>GENDER:</h3>
       <select class="custom-select md-3" name="gender" required>
       <option selected>gender</option>
        <option value="MALE">male</option>
        <option value="FEMALE">female</option>
        <option value="OTHERS">Others</option>
        </select>
        <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
       </div>
      
    
       
      
       <div class="form-group">
        <h3>GMAIL:</h3>
      <input type="text" class="form-control" id="email" placeholder="Enter gmail" name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <h3>PHONE NUMBER:</h3>
        <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
        <h3>PLACE:</h3>
      <input type="text" class="form-control" id="place" placeholder="Enter your place" name="place" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
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
       <br>
   <center>
  
      <button type="submit" class="btn btn-primary" id="button">SAVE</button>
   </center>
      </form>
      <BR>
       <BR>
        <BR>
            
               
  <div class="footer">
    <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.html">HOME</a>
    <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="movies.php">MOVIES</a>
  </div>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
