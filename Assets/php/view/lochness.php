<?php
    date_default_timezone_set('Europe/London');
    include '../model/comments.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inverness - Loch NEss and Afric </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/trail.css?v=<?php echo time(); ?>">
    <!--Mapbox-->
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    
    <!-- load Outdooractive Javascript API -->
    <script type="text/javascript" 
    src="//www.outdooractive.com/alpportal/oa_head.js?proj=api-dev-oa&amp;key=yourtest-outdoora-ctiveapi&amp;lang=en&leaflet_gshim=1"></script>

</head>
    <body>
    <header>
      <!--Code to include navbar-->
      <?php include("./../view/navbar.php"); ?>
      <style><?php include("../../css/navbar.css"); ?></style>
      <!--END OF Code to include navbar-->
    </header>

        <div id="main-container-trail">
            <section class="trail-left-container">
                    <img class="trail-picture" src="../../images/connor-mollison-3rkosR_Dgfg-unsplash.jpg" alt="loch Ness Castle by Connor Mollison on Unsplash">
                    <h1>Inverness - Loch Ness & Afric</h1>

                    <!--Comment section-->
                
            </section>
            <section class="trail-right-container">
            <div id='map' style='width: 400px; height: 300px;'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoia2FkMzY5IiwiYSI6ImNraGFqYnVoNDBqZHQzMXBqNDc1ZTBkMTIifQ.-0gjRBHPyBcELD_yo4sh7g';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
center: [57.445, -4.361], // starting position [lng, lat]
zoom: 9 // starting zoom
});
</script>
            </section>
            <!--END Comment section-->
        </div>
        
        <section>
        <div class="comment-container">
                    <p>Comments</p>
                        <?php
                        echo "
                            <form method='POST' action='".setComments($db)."'>
                            <input type='hidden' name='userid' value='".$_SESSION["username"]."'>
                            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                            <textarea name='comment' rows='1' placeholder='Write a comment...' onfocus=''></textarea><br>
                            <button class='write_comment_btn' type='submit' name='commentSubmit'>+ Add</button>
                        </form>";
            
                        getComments($db);
                        ?>  
                </div>   
        </section>
        <section>

        </section>



            <!--Scripts all pages-->
            <script src="../../js/navbar.js"></script>
           
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/1c8661e552.js" crossorigin="anonymous"></script>
            <!--End scripts all pages-->

            <!-- TRAILFORKS WIDGET TABLE END -->

            <script type="text/javascript">
            var script = document.createElement("script"); script.setAttribute("src", "https://es.pinkbike.org/ttl-86400/sprt/j/trailforks/widget.js"); document.getElementsByTagName("head")[0].appendChild(script); var widgetCheck = false;
            </script>
            <!-- TRAILFORKS WIDGET MAP END -->

    </body>
</html>