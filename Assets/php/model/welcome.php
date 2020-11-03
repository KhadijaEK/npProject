
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to hike in Scotland!</title>
    <link rel="stylesheet" href="../../css/welcome.css">


</head>
<body>
    
    <?php include('../view/navbar.php') ?>

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
                  <p class="comment-text"> "We needed the same printed design as the one we had ordered a week prior.
                    Not only did they find the original order, but we also received it in time.
                    Excellent!"</p>
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

    <section><h1>Section2</h1></section>
  </div>


    <!--Scripts-->
    <script src="../../js/menu.js" async="false"></script>

    <!--Scroll down jquery plugin-->
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js" integrity="sha512-qH+R6YL4/40iiIrnN5aNZ1sEeEalNAdnzP9jfsxFPBdIslTkwUddkSazjVWhJ3f/3Y26QF6aql0xeneuVw0h/Q==" crossorigin="anonymous"></script>
    <script src="../../js/jquery.fullpage.min.js"></script>
    <script type="text/javascript">
        FastClick.attach(document.body);
        $('#fullpage').fullpage();
    </script>

  </body>
</html>

