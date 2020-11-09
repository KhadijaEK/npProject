<?php
require'../config/dbconnect.php';


if(isset($_POST['sendEmail'])){
    $db = dbconnect();
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
        $verifyScript = 'http://becode.ke.online/npProject/Assets/php/model/reset-password.php';
        
        //The link that we will send the user via email.
        $linkToSend = $verifyScript . '?uid=' . $userId . '&id=' . $passwordRequestId . '&t=' . $token;
        
        //Print out the email for the sake of this tutorial.
        echo $linkToSend;

        //The user's id, which should be present in the GET variable "uid"
$userId = isset($_GET['uid']) ? trim($_GET['uid']) : '';
//The token for the request, which should be present in the GET variable "t"
$token = isset($_GET['t']) ? trim($_GET['t']) : '';
//The id for the request, which should be present in the GET variable "id"
$passwordRequestId = isset($_GET['id']) ? trim($_GET['id']) : '';
 
 
//Now, we need to query our password_reset_request table and
//make sure that the GET variables we received belong to
//a valid forgot password request.
 
$sql = "
      SELECT id, user_id, date_requested 
      FROM password_reset_request
      WHERE 
        user_id = :user_id AND 
        token = :token AND 
        id = :id
";
 
//Prepare our statement.
$statement = $db->prepare($sql);
 
//Execute the statement using the variables we received.
$statement->execute(array(
    "user_id" => $userId,
    "id" => $passwordRequestId,
    "token" => $token
));
 
//Fetch our result as an associative array.
$requestInfo = $statement->fetch(PDO::FETCH_ASSOC);
 
//If $requestInfo is empty, it means that this
//is not a valid forgot password request. i.e. Somebody could be
//changing GET values and trying to hack our
//forgot password system.
if(empty($requestInfo)){
    echo 'Invalid request!';
    exit;
}
 
//The request is valid, so give them a session variable
//that gives them access to the reset password form.
$_SESSION['user_id_reset_pass'] = $userId;
 
//Redirect them to your reset password form.
header('Location: reset-password.php');
exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot password?</title>
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
            <input type="submit" class="btn btn-primary" name="sendEmail" value="Send an email">
        </form>
            <p>Not registered yet? <a href="../../php/view/signup.php">Sign up</a></p>
            <p>Already a member? <a href="../../php/model/login.php">Sign in</a></p>

        
    </div>


        </body>
</html>