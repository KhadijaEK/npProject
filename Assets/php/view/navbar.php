<?php
    require_once('../config/config.php');

    // If you are not logged, redirects to login page.
    $session = new USER();
    if(!$session->is_loggedin()) {
        $session->redirect('loginfinal.php');
    }

    $auth_user = new USER();
    $user_id = $_SESSION['user_session'];
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

       <nav>
        <div class="nav-container">
                <!--test hamburger-->
            <a href="../../php/model/welcome.php">
                <img id="logo" src="../../images/logocolor.png" alt="Logo">
            </a>
            <!--loggedin-->
                <h2 class="welcomeuser">Welcome, <?php echo $user_id;?>!</h2>
        </div>
        <!--Dropdownn menu-->
            <div class="navdropdown">
                    <button class="navdropbtn">Highlands</button>
                    <div class="navdropdown-content">
                        <a href="#">AberdeenShire</a>
                        <a href="#">Angus & Dundee</a>
                        <a href="../view/lochness.php">Inverness - Loch Ness & Afric</a>
                        <a href="#">Perthshire</a>
                        <a href="#">Sutherland & Caithness</a>
                    </div>
                    </div>
                    <div class="navdropdown">
                    <button class="navdropbtn">Low Lands</i></button>
                    <div class="navdropdown-content">
                        <a href="#">Edimbourgh & Lothan</a>
                        <a href="#">Fife & Stirling</a>
                        <a href="#">Galloway & Dumfries</a>
                        <a href="#">Glasgow & Ayrshire</a>
                        <a href="#">Scottish Borders</a>
                    </div>
                    </div>
                    <div class="navdropdown">
                    <button class="navdropbtn">Islands</button>
                    <div class="navdropdown-content">
                        <a href="#">Outer Hebrides</a>
                        <a href="#">Isle of Skye</a>
                        <a href="#">Isle of Mull</a>
                    </div>
                    </div>

       <!--Hamburger and slide bar-->
        <div class="menu-btn">
            <div class="menu-btn__hamburger"></div>
                <ul class="nav-links">
                    <li><i class="fas fa-home"></i><a href="../model/welcome.php">Home</a></li>
                    <li><i class="fas fa-search-location"></i><a href="../view/map.php">Find a walk</a></li>
                    <li><i class="fas fa-plane"></i><a href="https://www.tripadvisor.com/Attractions-g186485-Activities-c61-t87-Scotland.html">Plan your trip</a></li>
                    <li><i class="far fa-envelope"></i><a href="#">Contact us</a></li>
                    <li><i class="fas fa-sign-out-alt"></i><a href="../model/logoutfinal.php"></span><input id="logout" type="submit" name="logout" value="Log me out"></a></li>
                </ul>
        </div>
       </nav> 



