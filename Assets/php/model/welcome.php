
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to hike in Scotland!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../../css/welcome.css" rel="stylesheet" >
  
   
</head>

<body>
    <header>
      <!--Code to include navbar-->
      <?php include("./../view/navbar.php"); ?>
      <style><?php include("../../css/navbar.css"); ?></style>
      <!--END OF Code to include navbar-->
    </header>
        <!--Start of content-->
  <div id="fullpage">
    <section>
      <div class="container">
        <div id="container-top">
          <article class="headtitle">
            <h1>100+ of the best Scottish trails</h1>
            <p>Ready to check out the best trails in Scotland?<br />
              See how our community of hikers rates our website.</p>
              <a href="../../php/view/map.php"><button class="btn findbtn" type="submit" placeholder="Sign in">Find a Walk</button></a>
      
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
        <div id="container-bottom">
            <div class="comment-mainbox"> 
              <div class="comment-wrap level1">
                  <img class="profile-picture" src="../../images/image-colton.jpg" alt="Colton Smith picture">
                  <h4 class="comment-title">Colton Smith</h4>
                  <h5>Verified Hiker</h5>
                  <p class="comment-text"> "Lovely trail, not too difficult and not too many people.
                    Just make sure you take the full loop as halfway you could easily take the path 
                    back to the starting point."</p>
              </div>
              <div class="comment-wrap level2">
                  <img class="profile-picture" src="../../images/image-irene.jpg" alt="Irene Roberts picture">
                  <h4 class="comment-title">Irene Roberts</h4>
                  <h5>Verified Hiker</h5>
                  <p class="comment-text">  "Customer service is always excellent and very quick turn around. Completely
                    delighted with the simplicity of the purchase and the speed of delivery."</p>
              </div>
              <div class="comment-wrap level3">
                  <img class="profile-picture" src="../../images/image-anne.jpg" alt="Anne Wallace picture">
                  <h4 class="comment-title">Anne Wallace</h4>
                  <h5>Verified Hiker</h5>
                  <p class="comment-text"> "Put an order with this company and can only praise them for the very high
                    standard. Will definitely use them again and recommend them to everyone!"
                </p>
              </div>
            </div>       
        </div>
      </div>
    </section>

    <section><h1>Section2</h1>
  
    </section>
  </div>
  


   
    
    <script src="../../js/navbar.js"></script>
    <script src="https://kit.fontawesome.com/1c8661e552.js" crossorigin="anonymous"></script>
    <!--End scripts all pages-->
    

  
  
  
    <script src="//code.jquery.com/jquery-3.2.0.min.js"></script>
    <script src='./../../js/jquery.fullpage.min.js'></script>
    <script type="text/javascript">
      $('#fullpage').fullpage();
    </script>
    

  </body>
</html>

