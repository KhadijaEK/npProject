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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c8661e552.js" crossorigin="anonymous"></script>
    <link href="../../css/navbar.css" rel="stylesheet">

    
</head>
   <header>


       <nav>
        <!--test hamburger-->
          <a href="../../php/model/welcome.php">
            <img id ="logo" src="../../images/logoblue.svg" alt="Logo">
          </a>
        <!-- START SESSION & LOG OUT-->
          <form action="../model/login.php" method="post">
            <?php include('../model/login_success.php')
            ?>
            </form>
             
                 
            
       <!-- START SESSION & LOG OUT-->
   
       <!--Hambuger and slide bar-->
       <nav>
         <div class="hamburger">
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
         </div>
         <ul class="nav-links">
           <li><a href="../model/welcome.php">Home</a></li>
           <li><a href="../view/map.php">Find your trail</a></li>
           <li><a href="https://www.tripadvisor.com/Attractions-g186485-Activities-c61-t87-Scotland.html">Plan your trip</a></li>
           <li><a href="#">Contact us</a></li>
           <form method="post" name="logout"><li><input id="logout" type="submit" name="logout" value="Log me out"></li> </form>
         </ul>
       </nav> 
               <!--test hamburger-->
   </header>

