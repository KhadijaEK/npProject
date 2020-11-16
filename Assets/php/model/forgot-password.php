<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../config/dbconnect.php';

if(isset($_POST['email'])){
    $emailTo = $_POST['email'];

   //Create a secure token for this forgot password request.
   $token = openssl_random_pseudo_bytes(16);
   $token = bin2hex($token);
   
   //Insert the request information
   //into our password_reset_request table.
   
   //The SQL statement.
   $insertSql = "INSERT INTO password_reset_request
               (email, date_requested, token)
               VALUES
               (:email, :date_requested, :token)";
   
   //Prepare our INSERT SQL statement.
   $statement = $db->prepare($insertSql);
   
   //Execute the statement and insert the data.
   $statement->execute(array(
       "email" => $emailTo,
       "date_requested" => date("Y-m-d H:i:s"),
       "token" => $token
    ));

// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'scottishprojecthike@gmail.com';                     // SMTP username
        $mail->Password   = 'scottish2020';                               // SMTP password
        $mail->SMTPSecure = 'tsl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('scottishprojecthike@gmail.com', 'Scottish hike');
        $mail->addAddress($emailTo);     // Add a recipient
        $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
    

        // Content
        $url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset-password.php?code=$token";
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body    = '<h1>You requested a password reset</h1> 
                            Click <a href="'.$url.'">on this link</a> to do so.';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Reset password link has been sent to your email';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
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
       
            <h1>Forgot password</h1>
            <form action="" method="post" class="login-form">
                <label for="email">Enter email so we can send you an email with a link to reset your password</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="email" required><br>
                <input type="submit" class="btn btn-primary" name="sendEmail" value="Send email">
            </form>
                <p>Not registered yet? <a href="../../php/view/signup.php">Sign up</a></p>
                <p>Already a member? <a href="../../php/model/login.php">Sign in</a></p>
        </div>


    </body>
</html>