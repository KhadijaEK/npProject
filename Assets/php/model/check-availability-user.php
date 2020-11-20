<?php

require_once("../config/dbconnect.php");
// Code for checking Email-ID availabilty
// Code for checking email availabilty
if(isset($_POST["email"])) {

    $email= $_POST["email"];
    $sql ="SELECT COUNT(*) AS count FROM users WHERE email=':email'";
    $query= $db -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
    echo "<span style='color:red'>Email-id already exists.</span>";
    } else{
    echo "<span style='color:green'>Email-id available for Registration.</span>";
    }
    }
