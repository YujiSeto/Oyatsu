<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" tyle="text/css" href="Assets/style.css">
        <title>Oyatsu</title>
    </head>
    <body>
        <div class="container">
            <div class="content-area">
                <div class="left-panel">
                    <div class="Logo">
                        <img class="logo_img_2" src="Assets/oyatsu.png">
                    </div>
                    <?php
                        include 'navigation.php';
                    ?>
                </div>
                <div class="right-panel">
                    <h3>Novo Usuário</h3><br>
                    <form class="new-user-form" method="POST" action="functions.php">
                        <input type="text" name="new_user_name" placeholder="Nome completo"><br>
                        <input type="text" name="new_user_username" placeholder="Nome de usuário"><br>
                        <input type="password" name="new_user_pass" placeholder="Senha" id="user_password1"><br>
                        <input type="password" name="new_user_pass_validation" placeholder="Repita a senha" id="user_password2"><br>
                        <input type="submit" value="Salvar" name="save_user">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>