<?php  
 //login_success.php  
 
 if(isset($_SESSION["username"]))  
 {  
      echo '<p>Welcome - '.$_SESSION["username"].'</p>';  
      echo '<br /><form method="POST" name="logout"><a href="./logout.php">Logout</a><span class="glyphicon glyphicon-log-out"></span></form>';  
 }  
 else  
 {  
      header("Location: login.php");  
 }  
 ?>  