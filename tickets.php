<?php
session_start();
    if (isset($_POST['save'])) {
        $server = "localhost";
        $username = "root";
        $password = "";
    
        $conn = mysqli_connect($server, $username, $password);
        if (!$conn) {
            die("connection to database failed due to" . mysqli_connect_error());
        }
        
      $no_of_tickets =$yrclass=$price= " ";
        
        $no_of_tickets = $_POST['no_of_tickets'];  
        $karthik=$_SESSION['username'];  
        $price=$_POST['price'] ;
        $yrclass=$_POST['yrclass'];  
        $sqle="INSERT INTO `movieproject`.`tickets`(`user_id`,`no_of_tickets`,`yrclass`,`price`)
        VALUES ('$karthik','$no_of_tickets','$yrclass','$price')";
  
      
        if (mysqli_query($conn,$sqle)) {
           
            echo "<script language='javascript'> ";
            echo "your data is saved ";
            echo "</script>";
       
            
        } else {

            echo "ERROR :". $sqle."<br>". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>tickets for theatres</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
    
            body{
                background-color: lightgoldenrodyellow;
                opacity:0.8;
            }
            .header {
            background-color:#111;
    opacity: 0.8;
            color: white;
            border: none;
            width: 100%;
            height: 70px;
            position: fixed;
            top: 0px;
            padding-top: 10px;
            left: 0px;
            justify-content: center;
            overflow: hidden;
            text-align: center;
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
  select{
            align-items: center;
            cursor: pointer;
            width:80%;
            padding:15px;
     outline: none;
     color:#2e812e;
     left:20px;
        }
        form{
            align-items: center;
            text-align: center;
        }
 
       


            </style>
    </head>
    <body>
    <div class="header">
        <i>
            <H1> BOOK YOUR TICKETS</H1>
        </i>
    </div>
    <br>
    <br>
    <br>
    <br>
    <center>
    <img src="showtime.png" width="400px" height="300px">
    </center>
        <form action="tickets.php" method="post">
    <i>
                <H2>NUMBER OF TICKETS:</H2>
            </i>
        <select class="mdb-select md-form" name="no_of_tickets">

 <option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>


</select>
<BR>
<br>
<i>
                <H2>SELECT YOUR CLASS:</H2>
            </i>
<select class="mdb-select md-form" name="yrclass">

<option value="gold">GOLD</option>
<option value="firstclass">FIRSTCLASS</option>
<option value="balcony">BALCONY</option>



</select>
<BR>
<br>
<i>
                <H2>SELECT YOUR PRICE:</H2>
            </i>
<select class="mdb-select md-form" name="price">

<option value="150">gold-150</option>
<option value="120">firstclass-120</option>
<option value="100">balcony-100</option>
</select>
<br>
<br>
<br>
<button type="submit" class="btn btn-primary" name="save" >SAVE</button>

</form>
<br>
<br><br>
<br>
<div class="footer">
        <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.php">HOME</a>
        <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="payment.php">PAY</a>

      </div> 

    </body>
    </html>