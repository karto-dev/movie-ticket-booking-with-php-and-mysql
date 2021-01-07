<?php
session_start();
  
        $server = "localhost";
        $username = "root";
        $password = "";
        $dname="movieproject";
        $conn = mysqli_connect($server, $username, $password,$dname);
        if (!$conn) {
            die("connection to database failed due to" . mysqli_connect_error());
        }
         
         if (isset($_POST['save'])) {
        $cardname=$cardnumber=$cvv=$expmonth=$expyear= " ";
         $karthik=$_SESSION['username'];
         $cvv=$_POST['cvv'];
         $expmonth=$_POST['expmonth'];
         $expyear=$_POST['expyear'];
         $cardname=$_POST['cardname'];
         $cardnumber=$_POST['cardnumber'];   
        $sql="INSERT INTO `payment`(`username`,`cardname`,`cardnumber`,`expmonth`,`expyear`,`cvv`)
        VALUES ('$karthik','$cardname','$cardnumber','$expmonth','$expyear','$cvv')";


        if (mysqli_query($conn,$sql)) {
          echo '<script language="javascript"> ';
            echo "ticket booked succesfully";
            echo "</script>";
            header("location:checkout.php");
        } else {

            echo "ERROR :". $sql."<br>". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST['clear'])) {
      $karthik=$_SESSION['username'];
     $sqlc="DELETE FROM `userinfo` where username='".$karthik."'";
    
 

     if (mysqli_query($conn,$sqlc)) {
     
         echo '<script language="javascript"> ';
         echo "your data is deleted ";
         echo "</script>";
     } else {
         echo "ERROR :". $sqlc ."<br>". mysqli_error($conn);
     }
     mysqli_close($conn);
 }
    ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; 
  display: block;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 30%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
center{
    display:block;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}
.footer{
    background-color:#111;
    opacity: 0.8;
    font-family:italic;
    border:none;
    width:100%;
    height: 50px;
    position:fixed;
    font-size:25px;
    bottom:0px;
    padding:10px;
    left:0px;
    justify-content: center;
    overflow: hidden;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="payment.php" method="post">
      
        
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="card-holders-name">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2025">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div><br>
        <center>
          <span>
        <button type="submit" class="btn btn-primary" name="save" >PAY</button>
        <button type="submit" class="btn btn-primary" name="clear">CANCEL TICKET</button>
</span>
        <br>
        <br>
        <br>
        <br>
        <div class="footer">
        <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.php">HOME</a>
        <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="checkout.php">PAY</a>
        </div>
</center>
      </form>
      
    </div>
  </div>

  
</div>

</body>
</html>
