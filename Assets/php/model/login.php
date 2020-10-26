<?php
 
//login.php
 
/**
 * Start the session.
 */

 
require_once('../config/dbconnect.php');
include('../../php/view/signin.php');


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.

if(isset($_POST["login-btn"]))  
{  
    $db=dbConnect();
    $username = $_POST['username'];

        //  Récupération de l'utilisateur et de son pass hashé
        $req = $db->prepare('SELECT id, password FROM users WHERE username = :username');
        $req->execute(array(
            'username' => $username));
        $resultat = $req->fetch();
        
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
        
        if (!$resultat)
        {
            echo 'Wrong Username or Password!';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['username'] = $username;
                header('location: welcome.php');
                echo 'You are connected!';
            }
            else {
                echo 'Wrong Username or Password!';
            }
        }
      }    
?>
