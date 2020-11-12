<?php
    require_once('../config/config.php');

    // If you are not logged, redirects to login page.
    $session = new USER();
    if(!$session->is_loggedin()) {
        $session->redirect('/index.html');
    }

    $auth_user = new USER();
    $user_id = $_SESSION['user_session'];
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

       <nav>
        <div class="nav-container">
        <!--loggedin-->
        <div class="container">
            <h1>Hello, <?php echo $userRow['username'];?>! - <a href="../model/logoutfinal.php">Logout</a></h1>
            <hr/>
            <p>This is the user area, this content is private.</p>
        </div>

        <!--test hamburger-->
          <a href="../../php/model/welcomefinal.php">
            <img id="logo" src="../../images/logocolor.png" alt="Logo">
          </a>
  
        </div>
       <!--Hamburger and slide bar-->
       <div class="menu-btn">
            <div class="menu-btn__hamburger"></div>
                <ul class="nav-links">
                    <li><a href="../model/welcome.php">Home</a></li>
                    <li><a href="../view/map.php">Find your trail</a></li>
                    <li><a href="https://www.tripadvisor.com/Attractions-g186485-Activities-c61-t87-Scotland.html">Plan your trip</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><span class="glyphicon glyphicon-log-out"></span><input id="logout" type="submit" name="logout" value="Log me out"></li>
                </ul>
        </div>
       </nav> 



