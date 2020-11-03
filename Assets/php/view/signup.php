<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  


</head>
<body>

        <section id="cover2" class="min-vh-100">
            <div id="cover-caption">
                <div class="container" style="width:700px;">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mx-auto text-center form p-4">
                            <h1 class="title">Register</h1>
                           
                                <div class="px-2 signupform">
                                    <form action="../../php/model/register.php" method="POST" class="needs-validation" novalidate="" onfocus="this.value=' '">
                                        <div class="form-group">
                                            <input class="form-control mb-3" type="text" name="username" placeholder="John" onfocus="this.value=' '" required pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$">
                                           
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control mb-3" type="email" name="email" placeholder="jdoe@gmail.com" onfocus="this.value=' '" required pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" onchange="checkEmailAvailability();">        
                                            <span id="email-availability-status" style="font-size:12px;"></span>
                                        </div>
                                        
                                        <div class="form-group was-validated">
                                            <input id="password" class="form-control mb-3" type="password" name="password" placeholder="Enter password" required pattern=".{8,}" required title="8 characters minimum"  >
                                                
                                        </div>
                                        <div class="form-group">
                                            <input id="confirm_password" class="form-control mb-3" type="password" name="confirm_pw" placeholder="Confirm password" required onChange="checkPasswordMatch();">
                                            <div id="checkmatch"></div>
                                        </div>
                                        <button type="submit" name="signup" class="btn btn-danger gobtn"><b>Register<i class="fa fa-paw animate__animated animate__fadeIn" aria-hidden="true"></i></b></button>
                                    </form>
                                    <p>Already have an account? <a href="../../php/view/signin.php">Log in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    
        <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ALL PLUGINS -->

<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/custom.js"></script>



        <!--check matching password-->
        <script>
                    function checkPasswordMatch() {
                            let password = $("#password").val();
                            let confirmPassword = $("#confirm_password").val();

                            if (password != confirmPassword)
                            $("#checkmatch").html("<span style='color:red'>Passwords do not match!</span>");

                            else
                                $("#checkmatch").html("<span style='color:green'>Passwords match.</span>");
                        }

                        $(document).ready(function () {
                        $("#confirm_password").keyup(checkPasswordMatch);
                        });
                        
        </script>
        </script>
        <!--Javascript for check email availability-->
        <script>
                function checkEmailAvailability() {
                    $("#loaderIcon").show();
                    jQuery.ajax({
                        url: "/Assets/php/model/check-availability-user.php",
                        data:'email='+$("#email").val(),
                        type: "POST",
                    success:function(data){
                    $("#email-availability-status").html(data);
                    $("#loaderIcon").hide();
                    },
                        error:function (){
                        event.preventDefault();
                        }
                    });
                }
        </script>
</body>

</html>
