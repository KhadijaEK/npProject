<?php
session_start();
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "npproject";  
 $message = "";  
 try  
 {  
      $db = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login-btn"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $password=$_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "SELECT * FROM users WHERE username = username AND password=password";  
                $statement = $db->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],
                          'password'     =>     $_POST["password"]
                          
                          
                         
                     )  
                );  
                
                $count = $statement->rowCount();  
                if($count > 0 && password_verify($password, $hashed_password))  
                {  
                   
                     $_SESSION["username"] = $_POST["username"];  
                     header("location: welcome.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login form</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    </head>
    <body>
    <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
        <h1>Login</h1>
        <form method="post">
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username" required><br>
            <label for="password">Password</label>
            <input type="password" id="password"  class="form-control" name="password" placeholder="Password" required><br>
            <span>Forgot?</span>
            <input type="submit" class="btn btn-info" name="login-btn" value="Login">
        </form>
            <p>Not registered yet? <a href="../../php/view/signup.php">Sign up</a></p>
    </div>
        </body>
</html>