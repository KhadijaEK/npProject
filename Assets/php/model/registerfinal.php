<?php
    require_once('../config/config.php');

    $user = new USER();

    if($user->is_loggedin()!="") {
        $user->redirect('welcome.php');
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
            $error[] = "Password must be atleast 8 characters!";
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

<html>
    <head>
        <meta charset="utf-8">
        <title>Register Final</title>
        <link href="assets/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Register or <a href="loginfinal.php">Login final</a></h1>
            <hr/>
            <?php
                if(isset($error)) {
                    foreach($error as $error) {
                        echo "<p class='error'>$error</p>";
                    }
                }
            ?>
            <form method="post">
                <input type="text" name="txt_uname" placeholder="Username" value="<?php if(isset($error)){echo $uname;}?>" />
                <input type="text" name="txt_umail" placeholder="Email" value="<?php if(isset($error)){echo $umail;}?>" />
                <input type="password" name="txt_upass" placeholder="Password" />
                <button type="submit" name="btn-signup">Register</button>
            </form>
        </div>
    </body>
</html>