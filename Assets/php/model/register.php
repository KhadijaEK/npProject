<?php
session_start();
require_once('../config/dbconnect.php');


$db = dbconnect();
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['signup'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Here we create a variable that calls the prepare() method of the database object
    // The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
    $my_Insert_Statement = $db->prepare("INSERT INTO users ( email, password, username) VALUES (:email, :upassword, :username)");
    // Now we tell the script which variable each placeholder actually refers to using the bindParam() method
    // First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
    $my_Insert_Statement->bindParam(':username', $username);
    $my_Insert_Statement->bindParam(':email', $email);
    $my_Insert_Statement->bindParam(':upassword', $password);
    // Execute the query using the data we just defined
    // The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
    if ($my_Insert_Statement->execute()) {
    
      header('Location: welcome.php');
      exit;
    } else {
      echo "Something went wrong.Please try again";
    }
   
}