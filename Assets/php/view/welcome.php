<?php $currentpage = 'welcome'; ?>
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
      <?php $page="welcome"; include("./../model/navbar.php"); ?>
      <style><?php include("../../css/navbar.css"); ?></style>
      <!--END OF Code to include navbar-->
    </header>
        
        <div id="fullpage">
            <section>
                <div class="container">
                    <div class="welcome-container">
                        <article class="welcome-container__head">
                            <h1>100+ of the best Scottish trails</h1>
                            <p>Ready to check out the best trails in Scotland?<br />
                            See how our community of hikers rates our website.</p>
                            <a href="../view/map.php"><button class="learn-more">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Find a walk</span>
                            </button></a>

                        </article>
                        <article class="ratingBox">
                            <div class="ratingBox__stars">
                                <img src="../../images/icon-star.svg">
                                <img src="../../images/icon-star.svg">
                                <img src="../../images/icon-star.svg">
                                <img src="../../images/icon-star.svg">
                                <img src="../../images/icon-star.svg" >
                                <p class="ratingBox__text">5 Stars in Reviews</p> </div>
                            <div class="ratingBox__stars ratingBox__stars--space2"> 
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <p class="ratingBox__text">5 Stars in Report Mountain</p> </div>
                            <div class="ratingBox__stars ratingBox__stars--space3"> 
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <img src="../../images/icon-star.svg" >
                                <p class="ratingBox__text">5 Stars in BestHike</p> </div>
                        </article>
                </div>  
            </div> 
            </section>
        </div>
        
        <!--Code to include footer-->
      <?php include("./../model/footer.php"); ?>

          
    <script src="../../js/navbar.js"></script>
    <script src="https://kit.fontawesome.com/1c8661e552.js" crossorigin="anonymous"></script>
    <!--MAilchimp-->
    <!--End scripts all pages-->
    </body>
</html>

