<?php
    require_once('../config/config.php');

    $user_logout = new USER();
    $user_logout->doLogout();
    $user_logout->redirect('/index.html');
?>