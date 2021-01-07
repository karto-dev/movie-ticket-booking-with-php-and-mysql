<?php
session_start();
  
        $server = "localhost";
        $username = "root";
        $password = "";
    
        $conn = mysqli_connect($server, $username, $password);
        if (!$conn) {
            die("connection to database failed due to" . mysqli_connect_error());
        }
        
         if (isset($_POST['show_movies'])) {
        $show_date = $show_movies = $show_type = " ";
        // $available_tickets=100;
       
        $show_date = $_POST['show_date'];
        $show_type = $_POST['show_type'];
        $show_movies = $_POST['show_movies'];
        $karthik=$_SESSION['username'];
     $sql = " INSERT INTO `movieproject`.`shows`(`user_id`,`show_date`,`show_type`,`show_movies`,`dt`)
    VALUES ('$karthik','$show_date','$show_type','$show_movies',current_timestamp())";
       
       
       

        if (mysqli_query($conn, $sql)) {
          echo '<script language="javascript"> ';
          echo "your data is saved ";
          echo "</script>";
        } else {

            echo "ERROR :". $sql ."<br>". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST['clear'])) {
      $karthik=$_SESSION['username'];
     $sqlc="DELETE FROM `movieproject`.`shows` where user_id='".$karthik."'";
    
 

     if (mysqli_query($conn,$sqlc)) {
     
         echo '<script language="javascript"> ';
         echo "your data is deleted";
         echo "</script>";
     } else {
         echo "ERROR :". $sqlc ."<br>". mysqli_error($conn);
     }
     mysqli_close($conn);
 }
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SHOWS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
             body {
            background-repeat: no-repeat;
            background-image:url("images/thor.jpg");
            background-attachment: fixed;
            background-size: cover;
        }
    
    select {
      width: 50%;
      cursor: pointer;
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

    .footer {
      background-color: #111;
      opacity: 0.8;
      font-family: italic;
      border: none;
      width: 100%;
      height: 50px;
      position: fixed;
      font-size: 25px;
      bottom: 0px;
      padding: 10px;
      left: 0px;
      justify-content: center;
      overflow: hidden;
    }

    h3 {
      font-style: italic;
      color: lightgreen;
    }

    .screens {
      display: flex;
      flex-direction: row;
     

    }

    img {
      width: 450px;
      height: 350px;
      border-radius:50%;
      padding: 55px;
      left: 20px;
    }
    img:hover{
      border-radius:0%;
    }
  </style>
</head>

<body>
  <div class="container ">
    <div class="header">
      <i>
        <H1>SHOWS FOR ALL THEATRES</H1>
      </i>
    </div>

    <br>
    <br>
    <br>
    <div>
      <img src="https://th.bing.com/th/id/OIP.pPLi145O58oIcQp5-iWYHwHaEK?w=326&h=183&c=7&o=5&pid=1.7" alt="1screen">
      <img src="https://th.bing.com/th/id/OIP.CzpcNZmeEb7pqntO_XmxDgHaEK?w=326&h=183&c=7&o=5&pid=1.7" alt="2screen">
      <img src="https://th.bing.com/th/id/OIP.l7eHEK-SDS_vPPrn1ULQtAHaEb?w=285&h=180&c=7&o=5&pid=1.7" alt="3screen">
      <img src="https://th.bing.com/th/id/OIP.OuifEl5FG-6N9_z6foCwwwHaEK?w=308&h=180&c=7&o=5&pid=1.7" alt="4screen">
      <img src="https://th.bing.com/th/id/OIP.Bmtq9JSW2ph_pkKXqyzq7AHaE8?w=232&h=180&c=7&o=5&pid=1.7" alt="5screen">
      <img src="https://th.bing.com/th/id/OIP.qobsLU3DZRDtF0EuzrR3eQHaDx?w=320&h=178&c=7&o=5&pid=1.7" alt="6screen">
      <div style="text-align: center;"><h1>OUR SCREENS</h1></div>
    </div>
    <br>
    <br>
    <form action="shows.php" method="POST">
      <div class="form-group">
       
        <br>
        <br>
        <h3>SELECT YOUR SHOW TYPE:</h3>
        <select name="show_type" class="custom-select mb-4">

          <option value="morning">morning(9am-12pm)</option>
          <option value="mid-day">matnee(2pm-5pm)</option>
         <option value="late-night">late-night(8-pm-11pm)</option>
        </select>

        <h3>AVAILABLE MOVIES WITH TIMINGS:</h3>
        <select name="show_movies" class="custom-select mb-4">
          <optgroup label="ENGLISH AT MORNING">ENGLISH AT MORNING
            <option value="black panther(mon,wed,sun)">black panther(mon,wed,sun)</option>
            <option value="end game(tue,thur,sat)">end game(tue,thur,sat)</option>

          </optgroup>
          <optgroup label="HINDI AT MATNEE"> HINDI AT MATNEE
            <option value="chichore(mon,wed,sun)">chichore(mon,wed,sun)</option>
            <option value="super 30(tue,sat)">super 30(tue,fri)</option>
            <option value="dangal(thur,sat)">dangal(thur,sat)</option>
          </optgroup>
          <optgroup label="KANNADA AT LATE-NIGHT"> KANNADA AT LATE-NIGHT
            <option value="kgf(mon,wed,sun)">kgf(mon,wed,sun)</option>
            <option value="kirik party(tue,sat)">kirik party(tue,fri)</option>
            <option value="kasargodu(thur,sat)">kasargodu(thur,sat)</option>
          </optgroup>

          
          </select>
          <br>
          <br>
          <h3>SELECT YOUR SHOW DATE:</h3>
        <input type="date" style="width: 40%;cursor: pointer;" name="show_date">
          <center>
          <button type="submit" class="btn btn-primary" onclick="kar()">SAVE</button>
  </center>
      </div>
    </form>


    <br>
    <br>
    <div class="footer">
      <a href="home.php" STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;">HOME</a>
      <a href="tickets.php" STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;">tickets</a>

    </div>




</body>

</html>