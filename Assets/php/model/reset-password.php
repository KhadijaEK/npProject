<?php
// Update the details below with your MySQL details
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'npproject';
try {
    $db = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error
    exit('Failed to connect to database!');
}


if(isset($_POST['resetPassword'])){
    
    //Get the name that is being searched for.
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
 
//The simple SQL query that we will be running.
$sql = "SELECT `id`, `email` FROM `users` WHERE `email` = :email";
 
//Prepare our SELECT statement.
$statement = $db->prepare($sql);
 
//Bind the $name variable to our :name parameter.
$statement->bindValue(':email', $email);
 
//Execute the SQL statement.
$statement->execute();
 
//Fetch our result as an associative array.
$userInfo = $statement->fetch(PDO::FETCH_ASSOC);
 
//If $userInfo is empty, it means that the submitted email
//address has not been found in our users table.
if(empty($userInfo)){
    echo 'That email address was not found in our system!';
    exit;
}
 
        //The user's email address and id.
        $userEmail = $userInfo['email'];
        $userId = $userInfo['id'];
        
        //Create a secure token for this forgot password request.
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        
        //Insert the request information
        //into our password_reset_request table.
        
        //The SQL statement.
        $insertSql = "INSERT INTO password_reset_request
                    (user_id, date_requested, token)
                    VALUES
                    (:user_id, :date_requested, :token)";
        
        //Prepare our INSERT SQL statement.
        $statement = $db->prepare($insertSql);
        
        //Execute the statement and insert the data.
        $statement->execute(array(
            "user_id" => $userId,
            "date_requested" => date("Y-m-d H:i:s"),
            "token" => $token
        ));
        
        //Get the ID of the row we just inserted.
        $passwordRequestId = $db->lastInsertId();
        
        
        //Create a link to the URL that will verify the
        //forgot password request and allow the user to change their
        //password.
        $verifyScript = 'https://your-website.com/forgot-password.php';
        
        //The link that we will send the user via email.
        $linkToSend = $verifyScript . '?uid=' . $userId . '&id=' . $passwordRequestId . '&t=' . $token;
        
        //Print out the email for the sake of this tutorial.
        echo $linkToSend;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot password</title>
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
        <h1>Forgot password</h1>
        <form action="" method="post">
            <label for="email">Enter email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="email" required><br>
            <label for="password">New password</label>
            <input type="password" id="password"  class="form-control" name="password" placeholder="New password" required><br>
            <span class="focus-input100" data-placeholder="New Password"></span>
            <input type="submit" class="btn btn-primary" name="resetPassword" value="Reset Password">
        </form>
            <p>Not registered yet? <a href="../../php/model/registerfinal.php">Sign up</a></p>
            <p>Already a member? <a href="../../php/model/loginfinal.php">Sign in</a></p>
    </div>


        </body>
</html>