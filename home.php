<!doctype html>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>movie home</title>

  <style>
    body{
      background-color: aliceblue;
      background-attachment: fixed;
      background-size: cover;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 14px 14px 14px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: green;
    }

    .sidenav .closebtn:hover {
      color: red;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }
    .gallery{
      position:relative;
      height: auto;
      width: 90%;
      padding:45px 0px;
      display:grid;
      grid-template-columns: auto auto auto auto;
     
      grid-gap: 2vh;
      grid-auto-flow: dense;
    }
    .gallery img{
position: relative;
overflow:hidden;
height: 100%;
width: 100%;
object-fit: cover;
filter:brightness(0.6) grayscale(100);
transition:0.3s ease-in-out;
border-radius: 3px;
box-shadow: 0 2px 2px rgba(0,0,0,0.9);

    }
    .gallery img:hover{
      filter:brightness(1) grayscale(0);
    }
    .gallery img:first-child{
      grid-column-start:span 2;
      grid-row-start:span 3;
    }
    .gallery img:nth-child(2n+3){
      
      grid-row-start:span 3;
    }
    .gallery img:first-child(4n+5){
      grid-column-start:span 2;
      grid-row-start:span 2;
    }
   
    @media only screen and (max-width:768px){
      .gallery{
        display: grid;
        grid-template-columns: auto auto auto;
      }
    }
    .header{
      text-align: center;
      color:blue;
      font-style: italic;
    }
    #nothing{

      color:green;
      font-style:italic;
      font-size:25px;

    }
  </style>
</head>

<body>
  <div class="header">
    <h1>WELCOME TO MOVIE HOME</h1>
  </div>
  <div id="nothing">
    <center>
    online movie ticket booking is made easy here try have a go with our app !...
  </center>
  </div>
  
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="home1.php">LOG IN</a>
    <a href="mov.php">USERS</a>
    <a href="movies.php">MOVIES</a>
    <a href="theatres.php">THEATRES</a>
    
    <a href="shows.php">SHOWS</a>
    <a href="tickets.php">Tickets</a>
    <a href="payment.php">PAYMENTS</a>
    <a href="stats.php">OUR STATS</a>
    <a href="contact.html">CONTACT</a>
  </div>
  <div id="main">
    <span style="font-size:30px;cursor:pointer;color:rgb(100, 237, 162);" onclick="openNav()">&#9776; HOME</span>

    <div class="gallery">
  
        <div>
          <img src="images/addMovieBackground.jpg" alt="1screen">
        </div>
        <div>
          <img src="images/bg_spiderman.png" alt="2screen">
        </div>
        <div>
          <img src="pop.jpg" alt="3screen">
        </div>
        <div>
          <img src="tic.jpg" alt="4screen">
        </div>
        <div><img src="theatre.jpg" alt="5screen"></div>
        <div><img src="popcorn.jpg" alt="6screen"></div>
        <div><img src="ticket.jpg" alt="7screen"></div>
        <div><img src="kgf.jpg" alt="8screen"></div>
        <div><img src="images/theatre.jpg" alt="5screen"></div>
        <div><img src="images/timeslot.jpg" alt="6screen"></div>
        <div><img src="showtime.png" alt="7screen"></div>
        <div><img src="images/thor.jpg" alt="8screen"></div>
        <div>
    
  
    </div>
      
  </div>
  
</div>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
    }
  </script>

</body>

</html>