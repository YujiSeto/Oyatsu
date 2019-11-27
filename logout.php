<?php
//Deslogar do Sistema
    session_start();
    session_destroy();
    header('location: login.php');
?>