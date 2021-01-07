<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2,
        h1 {
            color: green;
            font-style: italic;
        }

        form {
            padding: 15px 15px 15px 15px;
            display: block;
        }

        .footer {
            background-color: #111;
            opacity: 0.7;
            font-family: italic;
            border: none;
            width: 100%;
            height: 40px;
            position: fixed;
            font-size: 25px;
            bottom: 0px;
            padding: 10px;
            left: -10px;
            justify-content: center;
            overflow: hidden;
        }

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

        .header {
            background-color: #111;
            opacity: 0.7;
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

        button {
            background-color: goldenrod;

            color: white;
            font-style: italic;
            cursor: POINTER;
            font-size: 25px;
            margin-left: auto;
            padding: 15px;
            border: 1px solid goldenrod;
        }

        button:hover {
            color: red;

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
    </style>
</head>

<body>
    <center>
        <br>
        <div class="header">
            <h1>view OUR STATISTICS details HERE:</h1>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form action="STATS.php" method="post">
            <button name="report">MOVIES BOOKED THIS WEEK</button>
            <button name="report2">5 STAR RATED MOVIES</button>
            <button name="report3"> USER MOVIES and THEIR RATING</button><br><br><br>
            <button name="report4">MOST BOOKED MOVIES</button>
            <button name="report5">USER DIFFERENT CLASSES</button>
            <button name="report6">USER DIFFERENT LANGUAGES</button>
            <br><br><br>
           
         
            <input type="text" name="search" placeholder="search user" class="search">
            <input type="submit" style="color:white;width:70px;background-color:blue;padding:10px;border:none;cursor:pointer;" name="cheque">
           
           <br><br> <input type="text" name="searchm" placeholder="search movie" class="search">
            <input type="submit" style="color:white;width:70px;background-color:blue;padding:10px;border:none;cursor:pointer;" name="cheq">
            <br><br>
            <input type="text" name="searcht" placeholder="search theatre" class="search">
            <input type="submit" style="color:white;width:70px;background-color:blue;padding:10px;border:none;cursor:pointer;" name="cheker">
            <br><br>
        </form>
        <br>


        <div class="footer">
            <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.php">HOME</a>
            <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="contact.html">contact</a>
        </div>

        <table>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "movieproject");
            if (!$conn) {
                die("connection to database failed due to" . mysqli_connect_error());
            }
            if (isset($_POST['cheker'])) {
                error_reporting(0);
               // $karthik = $_SESSION['username'];
                $searchq = $_POST['searcht'];
                $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
                $kar = "SELECT theatre_name,theatre_place from theatre where theatre_place like '%$searchq%' ";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> theatre </th>" . " " . "<th> place </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['theatre_name'] . "</td><td>" . $sanju['theatre_place'] . "</td></tr>";
                    }
                } else echo "<h2>theatre not available</h2>";
            }
            if (isset($_POST['cheq'])) {
                error_reporting(0);
               // $karthik = $_SESSION['username'];
                $searchq = $_POST['searchm'];
                $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
                $kar = "SELECT movie_name,movie_language,avg(rating) from moviebook where movie_name like '%$searchq%' ";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> movie </th>" . " " . "<th> language </th>" . " " . "<th>avg rating</th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['movie_name'] . "</td><td>" . $sanju['movie_language'] . "</td><td>" . $sanju['avg(rating)'] . "</td></tr>";
                    }
                } else echo "<h2>movie not available</h2>";
            }
            if (isset($_POST['cheque'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $searchq = $_POST['search'];
                $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
                $kar = "SELECT fname,lname,phone,email from userinfo where fname like '%$searchq%' ";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> fname </th>" . " " . "<th> lname </th>" . " " . "<th>phone</th>" . " " . "<th>email</th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['fname'] . "</td><td>" . $sanju['lname'] . "</td><td>" . $sanju['phone'] . "</td><td>" . $sanju['email'] . "</td></tr>";
                    }
                } else echo "<h2>user not available</h2>";
            }
            if (isset($_POST['report5'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $kar = "SELECT yrclass,count( yrclass)from tickets GROUP by yrclass ";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> ticket type </th>" . " " . "<th> no of users </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['yrclass'] . "</td><td>" . $sanju['count( yrclass)'];
                    }
                }
            }
            if (isset($_POST['report6'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $kar = "SELECT movie_language,count( movie_language)from moviebook GROUP by movie_language ";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> movie type </th>" . " " . "<th> no of users </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['movie_language'] . "</td><td>" . $sanju['count( movie_language)'];
                    }
                }
            }
            if (isset($_POST['report4'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $kar = "SELECT movie_name,count(movie_name) from moviebook group by movie_name order by count(movie_name) desc";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> movie </th>" . " " . "<th> booked </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['movie_name'] . "</td><td>" . $sanju['count(movie_name)'];
                    }
                }
            }

            if (isset($_POST['report'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $kar = "SELECT shows.show_date,shows.show_movies,theatre.theatre_name,theatre.theatre_place from shows inner join theatre on theatre.user_id=shows.user_id  where show_date between '2020-12-24'and '2020-12-30' order by show_date";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> movie </th>" . " " . "<th> theatre name </th>" . " " . "<th> theatre place </th>" . " " . "<th> show-date </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['show_movies'] . "</td><td>" . $sanju['theatre_name'] . "</td><td>" . $sanju['theatre_place'] . "</td><td>" . $sanju['show_date'] . "</td><td>";
                    }
                }
            }
            if (isset($_POST['report3'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $kar = "SELECT fname,lname,movie_name,rating from moviebook as m,userinfo as u where u.username=m.username";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> firstname </th>" . " " . "<th> lastname </th>" . " " . "<th> movie </th>" . " " . "<th> rating </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['fname'] . "</td><td>" . $sanju['lname'] . "</td><td>" . $sanju['movie_name'] . "</td><td>" . $sanju['rating'] . "</td><td>";
                    }
                }
            }
            if (!$conn) {
                die("connection to database failed due to" . mysqli_connect_error());
            }
            if (isset($_POST['report2'])) {
                error_reporting(0);
                $karthik = $_SESSION['username'];
                $kar = "SELECT distinct movie_name,rating from moviebook where (rating)>4 order by movie_name";
                $result1 = mysqli_query($conn, $kar);
                $total = mysqli_num_rows($result1);
                echo "<th> movie</th>" . " " . "<th> rating </th>";
                if ($total != 0) {
                    while ($sanju = mysqli_fetch_assoc($result1)) {
                        echo "<tr><td>" . $sanju['movie_name'] . "</td><td>" . $sanju['rating'] . "</td><td>";
                    }
                }
            }
            ?>
        </table>
    </center>
    <br>
    <br>
    <br>
</body>

</html>