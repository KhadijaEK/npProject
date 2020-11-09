<?php  
 //login_success.php  
 
 if(isset($_SESSION["username"]))  
 {  
      echo '<p class="session">Welcome, '.$_SESSION["username"].'</p>';  
      echo '<a href="./logout.php">Logout</a>';  
 }  
 else  
 {  
      header("Location: login.php");  
 }  
 ?>  