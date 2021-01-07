<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);
if (!$conn) {
    die("connection to database failed due to" . mysqli_connect_error());
}



if (isset($_POST['save'])) {
    $movie_language = $movie_name = $rating = " ";
    $karthik = $_SESSION['username'];
    $rating = $_POST['rating'];
    $movie_language = $_POST['movie_language'];
    $movie_name = $_POST['movie_name'];
    $sqlc = "INSERT INTO `movieproject`.`moviebook`(`username`,`movie_language`,`movie_name`,`rating`)
        VALUES ('$karthik','$movie_language','$movie_name','$rating')";



    if (mysqli_query($conn, $sqlc)) {

        echo '<script language="javascript"> ';
        echo "your data is saved ";
        echo "</script>";
    } else {
        echo "ERROR :" . $sqlc . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
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

        body {
            background-color: burlywood;
        }

        select {
            cursor: pointer;
        }

        .MOVIESELECTION {
            text-align: center;

            color: blue;
        }

        .MOVIESELECTION select {
            width: 80%;
            height: 50PX;
            outline: none;
            text-align: center;
            font-size: 25px;
            color: rgb(32, 106, 170);
            font-style: italic;


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

        div {
            padding: 25px;
            margin: auto;
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

        .moviebody {

            margin-top: 50px;
            padding: 30px;
            display: flex;
            flex-direction: row;
            text-align: center;
        }

        img {
            width: 350px;
            height: 300px;
            padding: 25px;
        }

        .moviebody a {
            font-size: 30px;
            font-family: italic;



        }
    </style>
</head>

<body>
    <div class="header">
        <i>
            <H1>BOOK YOUR MOVIES HERE</H1>
        </i>
    </div>
    <br>





    <div class="moviebody">
        <div>
            <img src="https://th.bing.com/th/id/OIP.Tu4CFwhI-T1Xc01YBIX9YQHaFj?w=233&h=180&c=7&o=5&pid=1.7" alt="KIRIK PARTY">
            <a href="https://www.bing.com/videos/search?q=kirik+trailer&&view=detail&mid=D84A53A253F795DA594AD84A53A253F795DA594A&&FORM=VRDGAR&ru=%2Fvideos%2Fsearch%3Fq%3Dkirik%2520trailer%26qs%3Dn%26form%3DQBVR%26sp%3D-1%26pq%3Dkirik%2520trailer%26sc%3D1-13%26sk%3D%26cvid%3D550130B625FB4C0F9FEC5FE21626CE49">KIRIK
                PARTY</a>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.d9fZ-YinIZQDTnTpk8N-ewHaJ8?w=125&h=180&c=7&o=5&pid=1.7" alt="kgf1">
            <a href="https://www.bing.com/videos/search?q=kgf+trailer+youtube&&view=detail&mid=D11495C82052894900F2D11495C82052894900F2&&FORM=VRDGAR&ru=%2Fvideos%2Fsearch%3Fq%3Dkgf%2Btrailer%2Byoutube%26FORM%3DHDRSC3">KGF CHAPTER 1</a>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.gfdtj20CJY1PnQmhvbDChAHaEI?w=290&h=180&c=7&o=5&pid=1.7" alt="kasargodu">
            <a href="https://www.bing.com/videos/search?q=karsargodu+trailer&&view=detail&mid=1E4CD93207ABFF24E1061E4CD93207ABFF24E106&&FORM=VRDGAR&ru=%2Fvideos%2Fsearch%3Fq%3Dkarsargodu%2Btrailer%26FORM%3DHDRSC3">S H P S KASARGODU</a>
        </div>
        <div>
            <img src="https://www.bing.com/th?id=AMMS_62967c81df588f82b47e513e63f6c27c&w=180&h=270&c=7&rs=1&qlt=80&cdv=1&pid=16.1" alt="super30">
            <a href="https://www.bing.com/videos/search?q=super+30+trailer&&view=detail&mid=CE0379A630F4B484F723CE0379A630F4B484F723&&FORM=VRDGAR">SUPER 30 </a>
        </div>
        <div>
            <img src="https://www.bing.com/th?id=AMMS_00f3bbeae9b22800117624718f5de251&w=180&h=270&c=7&rs=1&qlt=80&cdv=1&pid=16.1" alt="chichore">
            <a href="https://www.bing.com/videos/search?q=chichore+trailer&&view=detail&mid=92A964EDD056768FBC7592A964EDD056768FBC75&&FORM=VRDGAR">CHICHORE</a>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.6ORc_88b3ZPTbJvgyMv2vgAAAA?w=181&h=241&c=7&o=5&pid=1.7" alt="dangal">
            <a href="https://www.bing.com/videos/search?q=dangal+trailer&&view=detail&mid=F0F2F567D20F7C3A4615F0F2F567D20F7C3A4615&&FORM=VRDGAR">DANGAL</a>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.ai8N76mhUEJh4DdtccKfUAHaLC?w=116&h=180&c=7&o=5&pid=1.7" alt="black panther">
            <a href="https://www.bing.com/videos/search?q=black+panter+trailer&&view=detail&mid=C40A398303E600F1247BC40A398303E600F1247B&&FORM=VRDGAR">BLACK PANTHER</a>
        </div>
        <div>
            <img src="https://www.bing.com/th?id=AMMS_0785f61b3b764080c2076adadadd0eb5&w=180&h=270&c=7&rs=1&qlt=80&cdv=1&pid=16.1" alt="endgame">
            <a href="https://www.bing.com/videos/search?q=end+game+trailer&&view=detail&mid=DE16CC14EF1912A5312BDE16CC14EF1912A5312B&&FORM=VRDGAR">END GAME</a>
        </div>
    </DIV>


    <form action="movies.php" method="post">

        <DIV CLASS="MOVIESELECTION">
            <i>
                <H2>SELECT YOUR LANGUAGE:</H2>
            </i>
            <select class="mdb-select md-form" name="movie_language">

                <option value="KANNADA">KANNADA</option>
                <option value="HINDI">HINDI</option>
                <option value="ENGLISH">ENGLISH</option>
            </select>
            <BR>
            <BR>
            <i>
                <H2>SELECT YOUR MOVIE:</H2>
            </i>

            <select class="mdb-select md-form" name="movie_name">
                <optgroup label="KANNADA">KANNADA
                    <option value="kgf">kgf chapter 1</option>
                    <option value="kirik party">kirik party</option>
                    <option value="shps kasargodu">s h p s kasargodu</option>
                </optgroup>
                <optgroup LABEL="HINDI">HINDI
                    <option value="super30">super30</option>
                    <option value="chichore">chichore</option>
                    <option value="dangal">dangal</option>
                </optgroup>
                <optgroup LABEL="ENGLISH">ENGLISH
                    <option value="black panther">black panther</option>
                    <option value="end game">avengers end game</option>
                </optgroup>
            </select>
            <br>
            <i>
                <H2> YOUR RATING:</H2>
            </i>
            <select class="mdb-select md-form" name="rating">

                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

            </select>
            <BR>
            <br>
            <span>

                <button type="submit" class="btn btn-primary" name="save">SAVE</button>
            </span>
        </div>

    </form>
    <br>
    <br>
    <br>
    <br>
    <div class="footer">
        <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.php">HOME</a>
        <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="theatres.php">THEATRES</a>
    </div>
</body>

</html>