<?php
session_start();

if(isset($_POST['logout'])){
  session_start();
  session_destroy();

  header('location: http://becode.ke.online/npProject/index.html');
}
// Validating Session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Walk</title>
    <link href="./Assets/css/hamburgers.css" rel="stylesheet">
</head>
<body>
    <nav>
        <!--test hamburger-->
        <button class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner hamburger--arrow "></span>
            </span>
        <!--test hamburger-->
    </nav>
    <!-- START SESSION & LOG OUT-->
    <form action="../model/login.php" method="post">
    <?php if (isset($_SESSION['id']) AND isset($_SESSION['username']))
                {
                    echo 'Welcome ' . $_SESSION['username'];
                } ?>
        </form>

        
        <form method="post" name="logout">
            <input type="submit" name="logout" value="log me out">
        </form>
    <!-- START SESSION & LOG OUT-->
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
</body>
</html>


