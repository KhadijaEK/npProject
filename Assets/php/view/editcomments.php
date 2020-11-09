<?php
    date_default_timezone_set('Europe/London');
    include '../model/comments.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inverness (Loch NEss and Afric) </title>
    <link rel="stylesheet" href="../../css/trail.css">
    <link rel="stylesheet" href="../../css/comments.css">
    
    <!-- load Outdooractive Javascript API -->
    <script type="text/javascript" 
    src="//www.outdooractive.com/alpportal/oa_head.js?proj=api-dev-oa&amp;key=yourtest-outdoora-ctiveapi&amp;lang=en&leaflet_gshim=1"></script>

</head>
    <body>
        <header>
            <?php include('../view/navbar.php')?>
        </header>

        <div class="main-container-trail">
            <h1>Edit comment</h1>
        </div>

        <!--Comment section-->
        <div class="comment-container">

            <?php
            $userid = $_POST['userid'];
            $commentid = $_POST['commentid'];
            $date = $_POST['date'];
            $comment = $_POST['comment'];

            echo  "<form method='POST' action='".editComments($db)."'>
                <input type='hidden' name='commentid' value='".$commentid."'>
                <input type='hidden' name='userid' value='".$userid."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='comment'  cols='30' rows='10'>".$comment."</textarea><br>
                <button type='submit' name='commentSubmit' >Edit</button>
                </form>";

            ?>

        </div>   
        <!--END Comment section-->



            

    </body>
</html>