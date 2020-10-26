<?php
define('server', 'localhost');
define('user_name', 'root');
define('password', '');
define('database', 'npProject');


function dbconnect()
{

    try
    {
    $db = new PDO("mysql:host=".server.";dbname=". database, user_name, password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
        return $db;
    echo "Connection established successfully!";
    }
    catch (PDOException $e)
    {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}

