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
                    <a href="new-product.php"><div class="new-user-button">Novo</div></a>
                    <table class="users-table">
                        <tr>
                            <th>Produtos</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                        <?php
                            $con = mysqli_connect('localhost','root');
                            mysqli_select_db($con, 'oyatsu');
                            $sql = "SELECT id, name, price FROM products";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    <td>" . $row["name"]. "</td>
                                    <td>" . $row["price"] . "</td>
                                    <td><a href='edit-functions.php?edit=" . $row["id"] . "'>Editar</a> | 
                                    <a href='functions.php?delete_product=" . $row["id"] . "'>Excluir</a>
                                    </tr>";
                                }
                            }
                            mysqli_close($con);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>