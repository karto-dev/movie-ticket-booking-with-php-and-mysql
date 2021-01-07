<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ticket details</title>
    <style>
    
    .search {
            width: 5%;
            border-radius: 50%;
            height: 40px;
            text-align: center;
            border: none;
            font-style: italic;
            font-size: 25px;
            background-color: #111;
            color: red;

        }

        .search:hover {
            width: 30%;
            transition-duration: 1s;
            color: green;
            height: 40px;
            border-radius: 0px;
            cursor: pointer;

        }
        body{
            background-color:lightgoldenrodyellow;
        }
        form{
            padding:15px 15px 15px 15px;
           
           display: block;
        }

        button {
            background-color:goldenrod;
            color: white;
            font-style: italic;
            cursor:POINTER;
            font-size:25px;
            margin-left:auto;
            padding: 15px;
            border: 1px solid goldenrod;
            cursor:pointer;
        }

        a{
            cursor:pointer;
            text-decoration:none;
            color:red;
            FONT-STYLE:ITALIC;
        }
        div{
            font-size:25px;
            padding:20px;
            margin-right:20px;
            
        }
        table {
            color: black;
            border: lightgreen;
            color: #588c7e;
            font-family: monospace;
            text-align: left;
            padding: 25px;
            font-size: 25px;
        }

        th {
            color: white;
            background-color: goldenrod;
            padding: 20px;
        }

        tr:nth-child(odd) {
            overflow: hidden;
        }

        tr:nth-child(even) {
            background-color: lightgoldenrodyellow;
            overflow: hidden;
        }
        h2{
            color:red;
            font-style:italic;
        }
        .footer {
            background-color: #111;
            opacity: 0.7;
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

        .footer a:hover {
            text-decoration: none;
            color: green;
            opacity: 0.8;
        }

        a {
            text-decoration: none;

        }

        a:hover {
            color: red;
            text-decoration: none;
        }
h1{
    color:goldenrod;
    font-style:italic;
}
    </style>
</head>

<body>
    <center>
        <br>
        <h1>view your ticket details:</h1>

        <form action="checkout.php" method="post">
            <button name="print">VIEW</button>
           <table>
            <br><br>
            <input type="text" name="search" placeholder="search  with username" class="search">&nbsp;
            <input type="submit" style="color:white;width:70px;background-color:blue;padding:10px;border:none;cursor:pointer;" name="cheque">
           </table>
        </form>
        
        <div class="footer">
        <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.php">HOME</a>
        <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="stats.php">STATISTICS</a>
        </div>
           

<?php


session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbname = "movieproject";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("connection to database failed due to" . mysqli_connect_error());
}

if (isset($_POST['cheque'])) {
    error_reporting(0);
    $karthik = $_SESSION['username'];
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
    $kar="select fname,lname,movie_name,show_date,no_of_tickets,yrclass,totalcost,theatre_name,theatre_place from moviebook as m,tickets as ti,theatre as t,userinfo as u,shows as s WHERE
(t.user_id like '%$searchq%' and ti.user_id like '%$searchq%' and u.username like '%$searchq%' and m.username like '%$searchq%' and s.user_id like '%$searchq%')";
   // $kar = "SELECT fname,lname,movie_name,show_date,no_of_tickets,totalcost,yrclass,theatre_name,price,theatre_place FROM moviebook as m,tickets as ti,shows as s,theatre as t where fname like '%$searchq%' ";
    $result1 = mysqli_query($conn, $kar);
    $total = mysqli_num_rows($result1);
   
    if ($total != 0) {
        while ($sanju = mysqli_fetch_assoc($result1)) {
        
           echo "<center>";
           echo "<h2>first name:" . $sanju['fname'] . "</h2><br> ";
           echo  "<h2>last name:" . $sanju['lname'] . "</h2><br> ";
           echo "<h2>movie-name:" . $sanju['movie_name'] . "</h2><br> ";
           echo  "<h2>show-date:" . $sanju['show_date'] . "</h2><br> ";
           echo "<h2>your class:" . $sanju['yrclass'] . "</h2><br> ";
           echo  "<h2>no-of-tickets:" . $sanju['no_of_tickets'] . "</h2><br> ";
           echo  "<h2>totalcost:" . $sanju['totalcost'] . "</h2><br> ";
           echo  "<h2>theatre name:" . $sanju['theatre_name'] . "</h2><br> ";
           echo  "<h2>theatre place:" . $sanju['theatre_place'] . "</h2><br> ";
           echo "</center>";
           echo "<br><br><br>";
        }
    } else echo "<span><h2>username not available</h2></span>";
}



if (isset($_POST['print'])) {
    error_reporting(0);

    $karthik = $_SESSION['username'];
    $kar = "SELECT movie_name,show_date,no_of_tickets,totalcost,yrclass,theatre_name,price,theatre_place FROM moviebook as m,tickets as ti,shows as s,theatre as t where (t.user_id='$karthik'and u.username='$karthik' and ti.user_id='$karthik'and s.user_id='$karthik' and m.username='$karthik') ";
    $result1 = mysqli_query($conn, $kar);
    $total = mysqli_num_rows($result1);
    

    if ($total != 0) {
        while ($sanju = mysqli_fetch_assoc($result1)) {
            echo "<center>";
            echo "<h2>first name:" . $sanju['fname'] . "</h2><br> ";
            echo  "<h2>last name:" . $sanju['lname'] . "</h2><br> ";
            echo "<h2>movie-name:" . $sanju['movie_name'] . "</h2><br> ";
            echo  "<h2>show-date:" . $sanju['show_date'] . "</h2><br> ";
            echo "<h2>your class:" . $sanju['yrclass'] . "</h2><br> ";
            echo  "<h2>no-of-tickets:" . $sanju['no_of_tickets'] . "</h2><br> ";
            echo  "<h2>totalcost:" . $sanju['price'] . "</h2><br> ";
            echo  "<h2>theatre name:" . $sanju['theatre_name'] . "</h2><br> ";
            echo  "<h2>theatre place:" . $sanju['theatre_place'] . "</h2><br> ";
            echo "</center>";
        }
    }

}

 
mysqli_close($conn);

?>