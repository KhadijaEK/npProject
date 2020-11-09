

       <nav>
        <div class="nav-container">
        <?php
        session_start();
        if(isset($_POST['logout'])){
          session_start();
          session_destroy();
          header('location: http://becode.ke.online/npProject/index.html');
        }
      ?>
        <!--test hamburger-->
          <a href="../../php/model/welcome.php">
            <img id="logo" src="../../images/logocolor.svg" alt="Logo">
          </a>
        <!-- START SESSION & LOG OUT-->
          <form action="../model/login.php" method="post">
            <?php include('../model/login_success.php')
            ?>
          </form> 
       <!-- START SESSION & LOG OUT-->
        </div>
       <!--Hamburger and slide bar-->
       <div class="menu-btn">
            <div class="menu-btn__hamburger"></div>
                <ul class="nav-links">
                    <li><a href="../model/welcome.php">Home</a></li>
                    <li><a href="../view/map.php">Find your trail</a></li>
                    <li><a href="https://www.tripadvisor.com/Attractions-g186485-Activities-c61-t87-Scotland.html">Plan your trip</a></li>
                    <li><a href="#">Contact us</a></li>
                    <form method="post" name="logout"><li><span class="glyphicon glyphicon-log-out"></span><input id="logout" type="submit" name="logout" value="Log me out"></li> </form>
                </ul>
        </div>
       </nav> 



