<?php
session_start();

if(isset($_POST['logout'])){
  session_start();
  session_destroy();

  header('location: http://becode.ke.online/npProject/index.html');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Walk</title>
    
    <link href="../../css/map.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/navbar.css">
    
    
</head>
<body>
    <nav>
        <!--test hamburger-->
        <button class="hamburger hamburger--collapse openbtn" type="button" onclick="openNav()">
            <span class="hamburger-box">
                <span class="hamburger-inner hamburger--arrow"></span>      
            </span>
        <div id="mySidebar" class="menu-container sidebar">
          <div class="menu">
            <a href="../../js/menu.js" class="closebtn" onclick="closeNav()"></a>
              <a href="../model/welcome.php">Home</a>
              <a href="../view/map.php">Find your trail</a>
              <a href="#">Plan your trip</a>
          </div>
        </div>
        <!--test hamburger-->
    </nav>
    <!-- START SESSION & LOG OUT-->
        <form action="../model/login.php" method="post">
          <?php if (isset($_SESSION['id']) AND isset($_SESSION['username']))
                    {
                        echo 'Welcome ' . $_SESSION['username'];
                    } 
          ?>
        </form>
        <form method="post" name="logout">
            <input type="submit" name="logout" value="log me out">
        </form>
    <!-- START SESSION & LOG OUT-->
        
        <div id="main map-container">
          <section class="left-container">
            <h1>Click on the map to find your next hike</h1>
            <h2>Or search by Region</h2>
            <div class="dropdown">
              <button class="dropbtn">Highlands</button>
              <div class="dropdown-content">
                <a href="#">AberdeenShire</a>
                <a href="#">Angus & Dundee</a>
                <a href="#">Inverness (Loch Ness & Afric)</a>
                <a href="#">Perthshire</a>
                <a href="#">Sutherland & Caithness</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Low Lands</button>
              <div class="dropdown-content">
                <a href="#">Edimbourgh & Lothan</a>
                <a href="#">Fife & Stirling</a>
                <a href="#">Galloway & Dumfries</a>
                <a href="#">Glasgow & Ayrshire</a>
                <a href="#">Scottish Borders</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Islands</button>
              <div class="dropdown-content">
                <a href="#">Outer Hebrides</a>
                <a href="#">Isle of Skye</a>
                <a href="#">Isle of Mull</a>
              </div>
            </div>
          </section>
          <!--SVG responsive map-->
          <section class="right-container">

          </section>
        </div>
    




<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script>
    var $hamburger = $(".hamburger");
    $hamburger.on("click", function(e) {
      $hamburger.toggleClass("is-active");  
    });
  </script>
    <script src="../../js/menu.js"></script>
</body>
</html>


