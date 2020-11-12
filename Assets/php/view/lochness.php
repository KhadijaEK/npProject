<?php
    date_default_timezone_set('Europe/London');
    
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
    <!--Mapbox-->
    <link rel="stylesheet" href="https://labs.os.uk/public/os-api-branding/v0.2.0/os-api-branding.css" />
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" />
    
    <!-- load Outdooractive Javascript API -->
    <script>
        
    </script>
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
                        <img src="../../images/connor-mollison-3rkosR_Dgfg-unsplash.jpg" class="gallery__img" alt="loch Ness Castle by Connor Mollison on Unsplash">
                    </figure>
                    <figure class="gallery__item gallery__item--2">
                        <img src="../../images/danka-peter-iBFBdFHVxeY-unsplash.jpg" class="gallery__img" alt="Image 2">
                    </figure>
                    <figure class="gallery__item gallery__item--3">
                        <img src="../../images/jennifer-bonauer-Z8dtTatMVMw-unsplash.jpg" class="gallery__img" alt="Image 3">
                    
                    </figure>
                    <figure class="gallery__item gallery__item--4">
                        <img src="../../images/connor-mollison-3rkosR_Dgfg-unsplash.jpg" class="gallery__img" alt="Image 4">
                    
                </div>
        </section>
        
        <section>
        <div class="gallery">
                    <figure class="gallery__item gallery__item--title">
                        
                    </figure>
                    <figure class="gallery__item gallery__item--1">
                        
                    </figure>
                    <figure class="gallery__item gallery__item--2">
                        
                    </figure>
                    <figure class="gallery__item gallery__item--3">
                    <div id="map"></div>
                    
                    </figure>
                    <figure class="gallery__item gallery__item--4">
                        
                    <figure class="gallery__item gallery__item--intro"> 
                            <p class="gallery__img">At 56 km2, Loch Ness is the second-largest Scottish loch by surface area after 
                                Loch Lomond, but due to its great depth, it is the largest by volume in the British Isles. 
                                Its deepest point is 230 metres making it the second deepest loch in Scotland after Loch Morar. 
                                A 2016 survey claimed to have discovered a crevice extending to a depth of 271 m, but further research determined this to be a sonar anomaly. 
                                It contains more water than all the lakes in England and Wales combined, and is the largest body 
                                of water in the Great Glen, which runs from Inverness in the north to Fort William in the south.
                            </p>
                        </div>
                    </figure>
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


      <!--MAP-->
      <script src="https://labs.os.uk/public/os-api-branding/v0.2.0/os-api-branding.js"></script>
        <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
      <script>

            let apiKey = 'M4OlLkjPZypakKhChRuOF0bzC9LU3mMN';

            var serviceUrl = 'https://api.os.uk/maps/raster/v1/zxy';

            // Set bounds to Lake District National Park.
            var bounds = [
                [ -3.4936823, 54.19341979 ], // Southwest coordinates.
                [ -2.5857319, 54.76331078 ] // Northeast coordinates.
            ];

            // Create a map style object using the ZXY service.
            var style = {
                "version": 8,
                "sources": {
                    "raster-tiles": {
                        "type": "raster",
                        "tiles": [ serviceUrl + "/Outdoor_3857/{z}/{x}/{y}.png?key=" + apiKey ],
                        "tileSize": 256,
                        "maxzoom": 20
                    }
                },
                "layers": [{
                    "id": "os-maps-zxy",
                    "type": "raster",
                    "source": "raster-tiles"
                }]
            };

            // Initialize the map object.
            var map = new mapboxgl.Map({
                container: 'map',
                minZoom: 6,
                maxZoom: 15,
                style: style,
                maxBounds: bounds,
                center: [ -2.968, 54.425 ],
                zoom: 13
            });

            map.dragRotate.disable(); // Disable map rotation using right click + drag.
            map.touchZoomRotate.disableRotation(); // Disable map rotation using touch rotation gesture.

            // Add navigation control (excluding compass button) to the map.
            map.addControl(new mapboxgl.NavigationControl({
                showCompass: false
            }));

            </script>
    </body>

    

</html>