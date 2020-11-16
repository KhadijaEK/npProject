<?php

// Update the details below with your MySQL details
require '../config/dbconnect.php';

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

function setComments($db) {
    if(isset($_POST['commentSubmit'])){
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $sql = ("INSERT INTO comments (userid, date, comment) VALUES ('$userid', '$date','$comment')");
        $results = $db->query($sql);
       
        
    }
}

function getComments($db){
    $sql = "SELECT * FROM comments";
    $results = $db->query($sql);
    while ($row = $results->fetch(PDO::FETCH_ASSOC))
    {
        echo"<div class='comment-box'>";
        echo $row['userid']."<br>";
        echo $row['date']."<br>";
        echo $row['comment'];
        echo"
            
            <form class='delete-form' method='POST' action='".deleteComments($db)."'>
                <input type='hidden' name='commentid' value='".$row['commentid']."'>
                <button class='btn' name='commentDelete' type='submit'><i class='fa fa-trash' aria-hidden='true'></i></button>
            </form>
            <form class='edit-form' method='POST' action='editcomments.php'>
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
        $results = $db->query($sql);
        header('Location: lochness.php');
    }
}

function deleteComments($db){
    if(isset($_POST['commentDelete'])){
        $commentid = $_POST['commentid'];
        $sql = "DELETE FROM comments WHERE commentid='$commentid'";
        $results = $db->query($sql);
        
    }
}