<?php   
 //logout.php  
 session_start();  
 if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    header('location: http://becode.ke.online/npProject/index.html');
  }
 
 ?> 