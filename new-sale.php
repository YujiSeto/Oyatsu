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
                    <h3>Nova Venda</h3><br>
                    <form class="new-user-form" method="POST" action="functions.php">
                        <select name="new_sale_product_name">
                            <option value="" disabled selected>Selecione o produto</option>
                            <?php
                                $con = mysqli_connect('localhost','root');
                                mysqli_select_db($con, 'oyatsu');
                                $sql = "SELECT name FROM products";
                                $result = $con->query($sql);
                                while($rows = $result->fetch_assoc()){
                                    $name = $rows['name'];
                                    echo "<option value='$name'>$name</option>";
                                }
                            ?>
                        </select><br>
                        <!--<input type="text" name="price" value=>-->
                        <input type="number" name="quantity_product" placeholder="Quantidade">
                        <br>
                        <input type="submit" value="Salvar" name="save_sale">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>