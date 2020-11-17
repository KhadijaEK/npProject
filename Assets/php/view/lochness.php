<?php
    date_default_timezone_set('Europe/London');
    require('../model/weatherapi.php');
    include('../config/comments.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inverness - Loch Ness and Afric </title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/trail.css?v=<?php echo time(); ?>">
    
    <!-- load Outdooractive Javascript API -->
    <link rel="stylesheet" href="https://labs.os.uk/public/os-api-branding/v0.2.0/os-api-branding.css" />
    <link rel="stylesheet" href="https://js.arcgis.com/4.16/esri/themes/light/main.css">
    

</head>
    <body>
        <header>
        <!--Code to include navbar-->
        <?php include("./../view/navbar.php"); ?>
        <style><?php include("../../css/navbar.css"); ?></style>
        <!--END OF Code to include navbar-->
        </header>
    
    <div id="fullpage">
        <section>
                <div class="gallery">
                    <figure class="gallery__item gallery__item--title">
                        <h1 class="gallery__img">Inverness - Loch Ness & Afric</h1>
                    </figure>
                    <figure class="gallery__item gallery__item--1">
                        <img src="../../images/matteo-badini-nZkVni3TtIE-unsplash.jpg" class="gallery__img" alt="loch Ness Castle by Connor Mollison on Unsplash">
                    </figure>
                    <figure class="gallery__item gallery__item--2">
                        <img src="../../images/ezra-winston-x6VxjXlBl1g-unsplash.jpg" class="gallery__img" alt="Image 2">
                    </figure>
                    <figure class="gallery__item gallery__item--3">
                        <img src="../../images/megan-sanford-g_ssp9teiSA-unsplash.jpg" class="gallery__img" alt="Image 3">
                    
                    </figure>
                    <figure class="gallery__item gallery__item--4">
                        <img src="../../images/roan-lavery-fIFpi7JK33c-unsplash.jpg" class="gallery__img" alt="Image 4">
                </div>
        </section>
        
        <section>
            <div class="grid">

                <figure class="grid__item grid__item--map">
                    <div id="viewDiv"></div>
                </figure>
                <figure class="grid__item grid__item--weather">
                    <h5><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $data->name; ?> Weather Status</h5>
                    <div class="report-container">
                        <div class="weather-forecast">
                            <img
                                src="http://openweathermap.org/img/wn/<?php echo $data->weather[0]->icon; ?>@2x.png"
                                class="weather-icon" /> 
                                <span class="max-temperature"><?php echo $data->main->temp_max; ?>°C - <span
                                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
                        </div>
                        <div class="time">
                            <div><?php echo ucwords($data->weather[0]->description); ?></div>
                            <div><?php echo date("jS F",$currentTime); ?></div>
                            <div><?php echo date("l g:i a", $currentTime); ?></div>
                        </div>
                        <div class="time">
                            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
                            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
                        </div>
                    </div>           
                </figure>
                <figure class="grid__item grid__item--subtitle">
                    <h3>Inverness - Loch Ness & Afric</h3>              
                </figure>
                
                <figure class="grid__item grid__item--intro">
                    <p>At 56 km2, Loch Ness is the second-largest Scottish loch by surface area after 
                        Loch Lomond, but due to its great depth, it is the largest by volume in the British Isles. 
                        Its deepest point is 230 metres making it the second deepest loch in Scotland after Loch Morar. 
                        A 2016 survey claimed to have discovered a crevice extending to a depth of 271 m, but further research determined this to be a sonar anomaly. 
                        It contains more water than all the lakes in England and Wales combined, and is the largest body 
                        of water in the Great Glen, which runs from Inverness in the north to Fort William in the south.
                    </p>           
                </figure>        
           
                <!--Comment section-->
                <figure class="grid__item grid__item--comment">
                            <div class="comment-container">
                                        <p>Comments</p>
                                            <?php
                                            echo "
                                                <form method='POST' action='".setComments($db)."'>
                                                <input type='hidden' name='userid' value='".$_SESSION["user_session"]."'>
                                                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                                                <textarea name='comment' rows='1' placeholder='Write a comment...' onfocus=''></textarea><br>
                                                <button class='write_comment_btn' type='submit' name='commentSubmit'>+ Add</button>
                                            </form>";
                                
                                            getComments($db);
                                            ?>  
                            </div>  
                </figure>
                <!--END Comment section--> 
            </div>
        

        </section>
    </div>
      

            <!--Scripts all pages-->
            
      
                <script src="../../js/navbar.js"></script>
                
                <script src="https://kit.fontawesome.com/1c8661e552.js" crossorigin="anonymous"></script>
            <!--End scripts all pages-->

            <!--scroll down-->
                <script src="//code.jquery.com/jquery-3.2.0.min.js"></script>
                <script src="../../js/jquery.fullpage.min.js"></script>
                <script type="text/javascript">
                $('#fullpage').fullpage();
                </script>
           
        
    <script src="https://labs.os.uk/public/os-api-branding/v0.2.0/os-api-branding.js" data-div="viewDiv" data-prefix="Powered by Esri"></script>
    <script src="https://js.arcgis.com/4.16/"></script>
    <script>

        var apiKey = 'M4OlLkjPZypakKhChRuOF0bzC9LU3mMN';

        var serviceUrl = 'https://api.os.uk/maps/raster/v1/zxy';

        var map, view;

        require([
            "esri/Map",
            "esri/views/MapView",
            "esri/layers/WebTileLayer",
            "esri/geometry/Extent",
            "esri/geometry/support/webMercatorUtils"
        ], function(Map, MapView, WebTileLayer, Extent, webMercatorUtils) {
            var tileLayer = new WebTileLayer({
                urlTemplate: serviceUrl + '/Outdoor_3857/{level}/{col}/{row}.png?key=' + apiKey
            });

            map = new Map({
                layers: [ tileLayer ]
            });

            view = new MapView({
                container: "viewDiv",
                map: map,
                zoom: 6,
                center: [ 57.477772, -4.224721 ],
                constraints: {
                    minZoom: 6,
                    maxZoom: 16,
                    rotationEnabled: false
                }
            });

            // Set extent to Lake District National Park.
            var maxExtent = new Extent({
                xmin: -4.0936823,
                ymin: 57.20341979,
                xmax: -4.5857319,
                ymax: 57.6033107,
                spatialReference: { wkid: 4326 }
            });

            var maxExtentWebMercator = webMercatorUtils.geographicToWebMercator(
                maxExtent
            );

            var checkExtent = true;
            view.watch('extent', function() {
                if( checkExtent )
                    limitBounds();
                else
                    checkExtent = true;
            })

            function limitBounds() {
                if( view.extent && !maxExtentWebMercator.contains(view.extent) ) {
                    var dx = 0,
                        dy = 0;
                    var newExtent = view.extent.clone();

                    if( newExtent.width > maxExtentWebMercator.width ) {
                        newExtent.xmin = maxExtentWebMercator.xmin;
                        newExtent.xmax = maxExtentWebMercator.xmax;
                    }
                    if( newExtent.height > maxExtentWebMercator.height ) {
                        newExtent.ymin = maxExtentWebMercator.ymin;
                        newExtent.ymax = maxExtentWebMercator.ymax;
                    }

                    if( newExtent.xmax > maxExtentWebMercator.xmax )
                        dx = dx - (newExtent.xmax - maxExtentWebMercator.xmax);
                    if( newExtent.xmin < maxExtentWebMercator.xmin )
                        dx = dx + (maxExtentWebMercator.xmin - newExtent.xmin);
                    if( newExtent.ymax > maxExtentWebMercator.ymax)
                        dy = dy - (newExtent.ymax - maxExtentWebMercator.ymax);
                    if( newExtent.ymin < maxExtentWebMercator.ymin)
                        dy = dy + (maxExtentWebMercator.ymin - newExtent.ymin);

                    newExtent.offset(dx, dy);
                    checkExtent = false;
                    view.extent = newExtent;
                }
            }
        });

    </script>
    <!--end map-->
    </body>

    

</html>