<?php
    require_once('../config/config.php');
    $login = new USER();

    if($login->is_loggedin()!="") {
        $login->redirect('loginfinal.php');
    }

    if(isset($_POST['login-btn'])) {
        $uname = strip_tags($_POST['txt_uname_email']);
        $umail = strip_tags($_POST['txt_uname_email']);
        $upass = strip_tags($_POST['txt_password']);

        if($login->doLogin($uname,$umail,$upass)) {
            $login->redirect('welcome.php');
        }
        else {
            $error = "Wrong Details!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login form</title>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="../../css/styles.css?v=<?php echo time(); ?>" rel="stylesheet">
          
</head>

    <body>
       <div class="row">
        <div class="column left">
            <img id="logo" src="../../images/logocolor.png" alt="logo">
            </div>
            <div class="login-container column right">
                    <div class="error">
                        <?php
                            if(isset($error)) {
                                echo "<p class='error'>$error</p>";
                            }
                            if(isset($_GET['joined'])) {
                                echo "<p class='success'>Successfully registered please login</p>";
                            }
                        ?>
                    </div>
                <form method="post" class="signup-form">
                <h2 class="login-title">Login</h2>
                    <label for="text">Username</label>
                    <input type="text" name="txt_uname_email" placeholder="Username or Email" tabindex="1" />
                    <label for="password">Password <a class="forgot-pwd" href="forgot-password.php"> Forgot your password?</a></label>
                    <input id="password" type="password" name="txt_password" placeholder="Password" tabindex="2" />
                    <!-- An element to toggle between password visibility -->
                    <span toggle="password-field" class="fa fa-fw fa-eye fa-1x field_icon toggle-password" onclick="showPassword()"></span>
                    <button type="submit" class="btn btn-info" name="login-btn" tabindex="3">Login</button>
                    
                
                    <label>Not registered yet? <a href="registerfinal.php">Sign up</a></label>
                </form>
            </div>
       
       </div>
        

        

         <!--dans l'ordre les scripts-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
     <script src="../../js/form.js"></script>
    </body>
</html>