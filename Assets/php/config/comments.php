<?php
define('server', 'localhost');
define('user_name', 'root');
define('password', '');
define('database', 'npProject');


function dbConnect()
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

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//comments 

$db = dbConnect();
function setComments($db) {
    if(isset($_POST['commentSubmit'])){
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (userid, date, comment) VALUES ('$userid', '$date','$comment')";
        $results = $conn->query($sql);

    }
}

function getComments($db){
    $sql = "SELECT * FROM comments ORDER BY date DESC LIMIT 0,10";
    $results = $conn->query($sql);
    while ($row = $results->fetch(PDO::FETCH_ASSOC))
    {
        echo"<div class='comment-box'>";
        echo $row['userid']."<br>";
        echo $row['date']."<br>";
        echo $row['comment'];
        echo"
            
            <form class='delete-form' method='POST' action='".deleteComments()."'>
                <input type='hidden' name='commentid' value='".$row['commentid']."'>
                <button class='btn' name='commentDelete' type='submit'><i class='fa fa-trash' aria-hidden='true'></i></button>
            </form>
            <form class='edit-form' method='POST' action='editComments.php'>
                <input type='hidden' name='commentid' value='".$row['commentid']."'>
                <input style='font-weigth: bold' type='hidden' name='userid' value='".$row['userid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='comment' value='".$row['comment']."'>
                <button class='btn'><i class='fas fa-edit'></i></button> 
            </form>
        </div>";
    }
}

function editComments($db) {
    if(isset($_POST['commentSubmit'])){
        $userid = $_POST['userid'];
        $commentid = $_POST['commentid'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $sql = "UPDATE comments SET comment='$comment' WHERE commentid='$commentid'";
        $results = $conn->query($sql);
        header('Location: lochness.php');
    }
}

function deleteComments($db){
    if(isset($_POST['commentDelete'])){
        $commentid = $_POST['commentid'];
        $sql = "DELETE FROM comments WHERE commentid='$commentid'";
        $results = $conn->query($sql);
        
    }
}