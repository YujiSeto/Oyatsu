<?php
//Editar Produtos
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
                    <h3>Editar Produto</h3><br>
                    <form class="new-user-form" method="POST" action="functions.php">
                        <input type="text" name="new_product_name" placeholder="Nome do Produto"><br>
                        <input type="text" name="new_product_price" placeholder="Preço"><br>
                        <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                        <input type="submit" value="Editar" name="edit_product">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>