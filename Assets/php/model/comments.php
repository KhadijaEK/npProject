<?php

require('../config/dbconnect.php');

$db=dbConnect();

function setComments($db) {
    if(isset($_POST['commentSubmit'])){
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (userid, date, comment) VALUES ('$userid', '$date','$comment')";
        $results = $db->query($sql);

    }
}

function getComments($db){
    $sql = "SELECT * FROM comments ORDER BY date DESC LIMIT 0,10";
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