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
                    <h3>Novo Funcionário</h3><br>
                    <form class="new-user-form" method="POST" action="functions.php">
                        <input type="text" name="new_employee_name" placeholder="Nome Funcionário"><br>
                        <input type="number" name="new_employee_cpf" placeholder="CPF" maxlength = "11"><br>
                        <input type="text" name="new_employee_email" placeholder="Email"><br>
                        <input type="text" name="new_employee_telefone" placeholder="Telefone"><br>
                        <input type="submit" value="Salvar" name="save_employee">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>