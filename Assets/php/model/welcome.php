<?php

/**
 * Start the session.
 */
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
    <title>Logged in</title>
</head>
<body>
    <form action="../model/login.php" method="post">
    <?php if (isset($_SESSION['id']) AND isset($_SESSION['username']))
                {
                    echo 'Welcome ' . $_SESSION['username'];
                } ?>
        </form>
        
        
        <form method="post" name="logout">
            <input type="submit" name="logout" value="log me out">
        </form>
        <a href="../view/map.php">Find a walk</a>
    </body>
</html>