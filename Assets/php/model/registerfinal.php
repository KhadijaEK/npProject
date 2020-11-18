<?php
    require_once('../config/config.php');

    $user = new USER();

    if($user->is_loggedin()!="") {
        $user->redirect('../view/welcome.php');
    }

    if(isset($_POST['btn-signup'])) {
        $uname = strip_tags($_POST['txt_uname']);
        $umail = strip_tags($_POST['txt_umail']);
        $upass = strip_tags($_POST['txt_upass']);

        if($uname=="") {
            $error[] = "Provide username!";
        }
        else if($umail=="") {
            $error[] = "Provide email!";
        }
        else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Please enter a valid email address!';
        }
        else if($upass == "") {
            $error[] = "Provide password!";
        }
        else if(strlen($upass) < 8){
            $error[] = "Password must be at least 8 characters!";
        }
        else {
            try {
                $stmt = $user->runQuery("SELECT username, email FROM users WHERE username=:uname OR email=:umail");
                $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($row['username'] == $uname) {
                    $error[] = "Sorry username already taken!";
                }
                else if($row['email'] == $umail) {
                    $error[] = "Sorry email id already taken!";
                }
                else {
                    if($user->register($uname, $umail, $upass)){
                        $user->redirect('loginfinal.php?joined');
                    }
                }
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register form</title>
        
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="../../css/styles.css?v=<?php echo time(); ?>" rel="stylesheet">
          
</head>


    <body>
        
        <div class="row">
            <div id="signupage" class="column left">
                <img id="logo" src="../../images/logocolor.png" class="responsive" alt="logo">
            </div>
            
            
        <div class="login-container column right"> 
                <?php
                    if(isset($error)) {
                        foreach($error as $error) {
                            echo "<p class='error'>$error</p>";
                        }
                    }
                ?>
                <form method="post" class="login-form">
                <h2 class="login-title">Register</h2>
                    <input type="text" name="txt_uname" placeholder="Username" value="<?php if(isset($error)){echo $uname;}?>" />
                    <input type="text" name="txt_umail" placeholder="Email" value="<?php if(isset($error)){echo $umail;}?>" />
                    <div class="input-icons">
                        <input id="password" type="password" name="txt_upass" placeholder="Password" />
                    
                        <!-- An element to toggle between password visibility -->
                        <span toggle="signuptoggle" class="fa fa-fw fa-eye fa-1x field_icon toggle-password " onclick="showPassword()"></span>
                    </div>
                    <input id="confirm_password" class="form-control " type="password" name="confirm_pw" placeholder="Confirm password" required onChange="checkPasswordMatch();">
                    <div id="checkmatch"></div>
                    

                    <button  class="btn btn-info" type="submit" name="btn-signup">Register</button>
                    <label>Already registered? <a href="loginfinal.php">Sign in</a></Label>
                </form>
            </div>
        </div>

        <!-- ALL JS FILES -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ALL PLUGINS -->
 <!--dans l'ordre les scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../../js/form.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>



        <!--check matching password-->
        <script>
                    function checkPasswordMatch() {
                            let password = $("#password").val();
                            let confirmPassword = $("#confirm_password").val();

                            if (password != confirmPassword)
                            $("#checkmatch").html("<span style='color:red'>Passwords do not match!</span>");

                            else
                                $("#checkmatch").html("<span style='color:green'>Passwords match.</span>");
                        }

                        $(document).ready(function () {
                        $("#confirm_password").keyup(checkPasswordMatch);
                        });
                        
        </script>
        </script>
        <!--Javascript for check email availability-->
        <script>
                function checkEmailAvailability() {
                    $("#loaderIcon").show();
                    jQuery.ajax({
                        url: "/Assets/php/model/check-availability-user.php",
                        data:'email='+$("#email").val(),
                        type: "POST",
                    success:function(data){
                    $("#email-availability-status").html(data);
                    $("#loaderIcon").hide();
                    },
                        error:function (){
                        event.preventDefault();
                        }
                    });
                }
        </script>
    </body>
</html>