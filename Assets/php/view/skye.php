<?php
    date_default_timezone_set('Europe/London');
    
    $apiKey = "f4d347e0017ab263e995fb7edf8ab545";
    $cityId = "2640006";
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    
    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();

    include('../config/comments.php');
    $currentpage = 'islands';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isle of Skye</title>
    
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
        <?php include("./../model/navbar.php"); ?>
        <style><?php include("../../css/navbar.css"); ?></style>
        <!--END OF Code to include navbar-->
        </header>
    
    <div id="fullpage">
        <section>
            <?php if($currentpage == 'islands') {echo '<span class="breadcrumb">Islands</span>';} ?>
                <div class="gallery">
                    <figure class="gallery__item gallery__item--title">
                        <h1 class="gallery__img">Isle of Skye</h1>
                    </figure>
                    <figure class="gallery__item gallery__item--1">
                        <img src="../../images/aj-wallace-1H64_-WVjWs-unsplash.jpg" class="gallery__img" alt="Photo by AJ Wallace">
                        <figcaption>Photo by AJ Wallace</figcaption>
                    </figure>
                    <figure class="gallery__item gallery__item--2">
                        <img src="../../images/quentin-grignet-BOVWWaf-VYU-unsplash.jpg" class="gallery__img" alt="Photo by Quentin Grignet">
                        <figcaption>Photo by Quentin Grignet</figcaption>
                    </figure>
                    <figure class="gallery__item gallery__item--3">
                        <img src="../../images/alex-gorham-jqrWv4jQw88-unsplash.jpg" class="gallery__img" alt="Photo by Alex Gorham">
                        <figcaption>Photo by Alex Gorham (All pictures from Unsplash)s</figcaption>
                    </figure>
                    <figure class="gallery__item gallery__item--4">
                        <img src="../../images/joachim-lesne-8XyXR2jhFJg-unsplash.jpg" class="gallery__img" alt="Photo by Joachim Lesne">
                        <figcaption>Photo by Joachim Lesne</figcaption>
                </div>
        </section>
        
        <section>
            <div class="grid">

                <figure class="grid__item grid__item--map">
                    <!--<div id="viewDiv"></div>-->
                    <iframe id="viewDiv" class="alltrails" src="https://www.alltrails.com/widget/map/mon-23-nov-2020-10-36-ac0071f?u=m" width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="AllTrails: Trail Guides and Maps for Hiking, Camping, and Running"></iframe>
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
                    <h3>Isle of Skye</h3>              
                </figure>
                <figure class="grid__item grid__item--intro">
                    <p>Skye is the largest and most northerly island in the Inner Hebrides of Scotland. More than 9000 people live there, and half of the people speak Gaelic. 
                        The main settlement is Portree, known for its picturesque harbour.
                        The island has been occupied since the mesolithic period and has a colourful history. 
                        It was rule by the Norse for 400 years, then dominated by Clan MacLeod and Clan Donald. 
                        The main industries are tourism, agriculture, fishing and whisky-distilling.
                    </p>           
                </figure>        
           
                <!--Comment section-->
                <figure class="grid__item grid__item--comment">
                        <h5>Comments</h5>
                            <div class="comment-container">
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
           

    <!--Code to include footer-->
    <?php include("./../model/footer.php"); ?>
        <!--End code to include footer-->
    </body>

    

</html>