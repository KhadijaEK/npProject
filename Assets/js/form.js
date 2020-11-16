//input masks phone number input form
//launch jQuery function($) pour ne pas créer de conflits avec d'autres library


//!Form validation


//tell the doc we work in jquery
$(document).ready(function(){
let $confirmPassword = $('#confirmPassword'); //égal au premier 
let $password = $('#password'); //minimum 8 chars 
let $champ = $('form-control');
let $erreur = $('#error');


        //confirmation password validation
        $confirmPassword.keyup(function(){
            if( $(this).val() == $password.val()) {
                
                $(this).css({
                    color : 'rgb(2, 177, 40)',
                    background: 'rgb(236, 234, 234)',
                    
                });
            } else {
                $(this).css({
                   borderColor: 'red',
                    color : 'red',
                    background: 'rgba(255, 99, 71, 0.4)'
                });
            }
        });

        $champ.change(function(){
            if($(this).val() == "") {
                $erreur.css('display', 'block'); //on affiche le message d'erreur
                $(this).css({
                    color : 'red',
                    background: 'rgba(255, 99, 71, 0.4)'
                 });
            } else {
                $(this).css({
                    background: 'rgb(236, 234, 234)'
                });
            }
        });

});


//show/hide password
function showPassword(){
    let show = document.getElementById('password');
    if(show.type === "password") {
        show.type = "text";
    } else {
        show.type = "password"; 
    }
}


//toggle eye show password<script>
$("body").on('click','.toggle-password',function(){
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#password").attr("type");

    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
