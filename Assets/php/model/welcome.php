<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome To Scottish hike!</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="../../css/welcome.css?v=<?php echo time(); ?>" rel="stylesheet" >
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
                <div class="container">
                    <div id="container-top">
                    <article class="headtitle">
                        <h1>100+ of the best Scottish trails</h1>
                        <p>Ready to check out the best trails in Scotland?<br />
                        See how our community of hikers rates our website.</p>
                        <a href="../../php/view/map.php"><button class="btn findbtn" type="submit" placeholder="Sign in">Find a walk</button></a>
            
                    </article>
                    <article class="ratingBox">
                        <div class="stars-ratingBox">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star">
                            <img src="../../images/icon-star.svg" class="Rating--Star">
                            <p class="star-text">5 Stars in Reviews</p> </div>
                        <div class="stars-ratingBox space2"> 
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star">
                            <img src="../../images/icon-star.svg" class="Rating--Star">
                            <p class="star-text">5 Stars in Report Mountain</p> </div>
                        <div class="stars-ratingBox space3"> 
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star Rating--Star__active">
                            <img src="../../images/icon-star.svg" class="Rating--Star">
                            <img src="../../images/icon-star.svg" class="Rating--Star">
                            <p class="star-text">5 Stars in BestHike</p> </div>
                    </article>
                </div>
                
            </div>

                </div>
                
            </section>
        </div>
        
        <!--Code to include navbar-->
      <?php include("./../view/footer.php"); ?>

          
    <script src="../../js/navbar.js"></script>
    <script src="https://kit.fontawesome.com/1c8661e552.js" crossorigin="anonymous"></script>
    <!--MAilchimp-->
    <!--End scripts all pages-->
    </body>
</html>

