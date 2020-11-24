<?php
require '../config/dbconnect.php';

if(!isset($_GET["code"])){
    exit("Can't find page");
}

$token = $_GET["code"];
$getEmailQuery = "SELECT email FROM password_reset_request WHERE token='$token'";
$statement = $db->prepare($getEmailQuery);
   
//Execute the statement and select the data.
$statement->execute();
$num_rows = $statement->rowCount();

    if($num_rows == 0){
        exit("Can't find page");
    }
if(isset($_POST['password'])){
    $pw = $_POST['password'];
    $new_pw = password_hash($pw, PASSWORD_DEFAULT);


    $row = $statement->fetch(PDO::FETCH_BOTH);
    $email = $row["email"];
    
    $query = "UPDATE users SET password='$new_pw' WHERE email='$email'";
    $result = $db->prepare($query);
    //Execute the statement and select the data.
    $result->execute();

    if($query) {
        $query = $db->query("DELETE FROM  password_reset_request WHERE token=$token");
        echo'<p><a href="../../php/model/loginfinal.php">Sign in</a></p>';
        header('Location: loginfinal.php');
        exit("Password updated successfully");
        
    } else {
        exit("Something went wrong");
    }      
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset password</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    </head>
    <body>
    <div class="container" style="width:500px;">  
               
        <h1>Reset password</h1>
        <form action="" method="post">
            <label for="email">Enter email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="email" required><br>
            <label for="password">New password</label>
            <input type="password" id="password"  class="form-control" name="password" placeholder="New password" required><br>
            <span class="focus-input100" data-placeholder="New Password"></span>
            <input type="submit" class="btn btn-primary" name="submit" value="Reset Password">
        </form>
            <p>Not registered yet? <a href="../../php/model/registerfinal.php">Sign up</a></p>
            <p>Already a member? <a href="../../php/model/loginfinal.php">Sign in</a></p>
    </div>


        </body>
</html>