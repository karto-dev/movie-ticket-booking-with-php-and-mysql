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
        $theatre_name = $theatre_place = $no_of_tickets=" ";
        $theatre_place = $_POST['theatre_place'];
        $theatre_name = $_POST['theatre_name'];
      
       $karthik= $_SESSION['username'];
       
        $sqld="INSERT INTO `movieproject`.`theatre`(`user_id`,`theatre_place`,`theatre_name`) VALUES ('$karthik','$theatre_place','$theatre_name')";
 
  

     //  echo $sqld;
   

        if (mysqli_multi_query($conn,$sqld)) {
            echo "<script language='javascript'> ";
            echo "your data is saved ";
            echo "</script>";
            //$available_tickets=$available_tickets-$no_of_tickets;
            // echo $available_tickets;
        } else {

            echo "ERROR :". $sqld ."<br>". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if (isset($_POST['clear'])) {
        $karthik=$_SESSION['username'];
       $sqlc="DELETE FROM `movieproject`.`userinfo` where username='".$karthik."'";
      
   
  
       if (mysqli_query($conn,$sqlc)) {
       
           echo '<script language="javascript"> ';
           echo "your data is saved ";
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
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>THEATRES OF KARNATAKA</title>
    <style>

        body{
     background-color: cadetblue;   
font-style:italic ;

font-size:25px;
background-attachment: fixed;
background-size: cover;
        }
        .theatreplace{

            margin-top: 50px;
            padding: 30px;
            display: flex;
            flex-direction:row;
            text-align: center;
        }
        img{
            width:400px;
            height:300px;
            padding:25px;
            border-radius:50%;
        }
        img:hover{
            width:400px;
            height:300px;
            padding:25px;
            border-radius:10%;
        }
        a {
            text-decoration: none;
            color:#111;
        }

        a:hover {
            color: red;
            text-decoration: none;
        }
        form{
            align-items: center;
            width:80%;
            padding:15px;
     outline: none;
            
        }
       
        select{
            align-items: center;
            cursor: pointer;
            width:80%;
            padding:15px;
     outline: none;
     color:#2e812e;
        }
        .karthi{
            align-items: center;
            width:80%;
            height:auto;
            overflow: hidden;
            display: block;
            margin:auto;
            padding: 10px 14px 10px 14px;

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
 
       

    </style>
</head>

<body>
    <div class="header">
        <i>
            <H1>THEATRES OF KARNATAKA</H1>
        </i>
    </div>
    
    <div class="theatreplace">
        <div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.jPwAmSDdH1S7yQw6yVhaNgHaEK?w=325&h=182&c=7&o=5&pid=1.7" alt="bangalore">
            <a href="https://www.bing.com/images/search?q=bangalore&form=HDRSC2&first=1&tsc=ImageBasicHov">bangalore</a>

        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.-py7RspBqiT2FZtCBqUpigHaE8?w=241&h=180&c=7&o=5&pid=1.7" alt="chikmaglure">
            <a href="https://www.bing.com/images/search?q=chikmaglure&form=HDRSC2&first=1&tsc=ImageBasicHover">chikmaglure</a>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.LRqsx5gPtUofkGGU1lhh1AHaDn?w=317&h=170&c=7&o=5&pid=1.7" alt="mysore">
            <a href="https://www.bing.com/images/search?q=mysore&form=HDRSC2&first=1&tsc=ImageBasicHover">mysore</a>
        </div>
    </div>
    <div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.1z0FX_swU2j52_wROfv4aQHaJQ?w=133&h=180&c=7&o=5&pid=1.7" alt="shivamogga">
            <a href="https://www.bing.com/images/search?q=shivamogga&form=HDRSC2&first=1&tsc=ImageBasicHover">shivamogga</a>
        </div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.sAexDHriG2WONBE3vW2QvwHaE8?w=251&h=180&c=7&o=5&pid=1.7" alt="mangalore">
            <a href="https://www.bing.com/images/search?q=mangalore&form=HDRSC2&first=1&tsc=ImageBasicHover">mangalore</a>
        </div>
        
        <div>
            <img src="https://th.bing.com/th/id/OIP.V-GDWT6GgKUr8uEIJtNyIgHaFL?w=241&h=180&c=7&o=5&pid=1.7" alt="davangere">
            <a href="https://www.bing.com/images/search?q=davangere&form=HDRSC2&first=1&tsc=ImageBasicHover">davangere</a>
        </div>
    </div>
    <div>
        <div>
            <img src="https://th.bing.com/th/id/OIP.LhjV7z8MJWInxEoAaTK7EwHaEK?w=322&h=181&c=7&o=5&pid=1.7" alt="belgaum">
            <a href="https://www.bing.com/images/search?q=belgaum&form=HDRSC2&first=1&tsc=ImageBasicHover">belgaum</a>
        </div>
       
        <div>
            <img src="https://th.bing.com/th/id/OIP.JePYSbympkmklIEFQbNQrgHaFK?w=259&h=180&c=7&o=5&pid=1.7" alt="hassan">
            <a href="https://www.bing.com/images/search?q=Hassan+Karnataka&form=RESTAB&first=1&tsc=ImageBasicHover">hassan</a>
        </div>
    </div>
    </div>
    <form action="theatres.php" method="post">
<center>
       
            <i>
                <H2>SELECT YOUR PLACE:</H2>
            </i>
            <select class="mdb-select md-form" name="theatre_place">
            
                    <option value="bangalore">bangalore</option>
                    <option value="chikmaglure">chikmaglure</option>
                    <option value="mysore">mysore</option>
                    <option value="shivamogga">shivamogga</option>
                    <option value="mangalore">mangalore</option>
                   
                    <option value="davangere">davangere</option>
                    <option value="belgaum">belgaum</option>
                   
                    <option value="hassan">hassan</option>
                    
                </select>
                <BR><br>
                    <BR>
            <i>
                <H2>SELECT YOUR NEARBY THEATRE:</H2>
            </i>

            <select class="mdb-select md-form" name="theatre_name">
                <optgroup label="bangalore">
                    <option value="PVR kormangala"> PVR, koramangala</option>
                    <option value="INOX jp nagar">INOX CENTRAL, jp nagar</option>
                </optgroup>
                <optgroup LABEL="chikmaglure">
                    <option value="SRElekha basavanahalli">SRELEKHA, basavanahalli</option>
                    <option value="gurunath kadur">GURUNATH, kadur</option>
                 
                </optgroup>
                <optgroup LABEL="mysore">
                    <option value="INOX MG road">INOX ,MG road</option>
                    <option value="saraswathi saraswathipuram">SARASWATHI, saraswathipuram</option>
                </optgroup>
                <optgroup label="shivamogga">
                    <option value="mallikarjuna, nehru road">MALLIKARJUNA, nehru road</option>
                    <option value="hpc, gopi circle">HPC TALKIES, gopi circle</option>
                </optgroup>
                <optgroup LABEL="mangalore">
                    <option value="suchitra ks rao road">SUCHITRA,ks rao road</option>
                    <option value="balaji car street">BALAJI, car street</option>
                    
                </optgroup>
                <optgroup LABEL="davangere">
                    <option value="padmanjali ,lingeshwar temple road">PADMANJALI,lingeshwar temple road</option>
                    <option value="geethanjali,kb extension">GEETHANJALI,kb extension</option>
                </optgroup>
                <optgroup label="belgaum">
                    <option value="nartaki, strasti nagar"> NARTAKI, strasti nagar</option>
                    <option value="INOX, head post office">INOX, head post office</option>
                </optgroup>
                <optgroup label="hassan">
                    <option value="banu, bm road">BHANU, bm road</option>
                    <option value="prithvi,bm road">PRITHVI,bm road</option>
                </optgroup>
                </select>
            <BR>
                <BR>
                    <BR>
                    
        <button type="submit" class="btn btn-primary" name="save" >SAVE</button>
    </form>
    <br>
    <br>
    <br>
    <div class="footer">
        <a STYLE="FLOAT:left;cursor:pointer;color:white;text-decoration:none;" href="home.php">HOME</a>
        <a STYLE="FLOAT:right;cursor:pointer;color:white;text-decoration:none;" href="shows.php">shows</a>

      </div> 

</center>
</body>

</html>