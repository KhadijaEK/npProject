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
            <h1>Inverness</h1>
            <div id="output"></div>

            <div class="trail-right-container">
                <!-- TRAILFORKS WIDGET MAP START -->
            <div class="TrailforksWidgetMap" data-w="400px" data-h="200px" data-rid="6505" data-activitytype="6" data-maptype="trailforks" data-trailstyle="difficulty" data-controls="1" data-list="0" data-dml="1" data-layers="labels,poi,polygon,directory,region" data-z="" data-lat="" data-lon="" data-hideunsanctioned="0"></div>
            <a href="https://www.trailforks.com/region/inverness/">Inverness</a> on <a href="https://www.trailforks.com/">Trailforks.com</a>
            </div>
        </div>


        <!--Comment section-->
        <div class="comment-container">

            <?php
            echo  "<form method='POST' action='".setComments($db)."'>
                <input type='hidden' name='userid' value='".$_SESSION["username"]."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='comment'  cols='30' rows='10'></textarea><br>
                <button type='submit' name='commentSubmit' >Comment</button>
            </form>";

            getComments($db);
            ?>

        </div>   
        <!--END Comment section-->


        <!--Scripts-->

            <script src="../../js/menu.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>


            <!-- TRAILFORKS WIDGET TABLE END -->

            <script type="text/javascript">
            var script = document.createElement("script"); script.setAttribute("src", "https://es.pinkbike.org/ttl-86400/sprt/j/trailforks/widget.js"); document.getElementsByTagName("head")[0].appendChild(script); var widgetCheck = false;
            </script>
            <!-- TRAILFORKS WIDGET MAP END -->

    </body>
</html>