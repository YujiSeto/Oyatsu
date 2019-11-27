<?php
//Editar Funcionários
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
                    <a href="new-employee.php"><div class="new-user-button">Novo</div></a>
                    <table class="users-table">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        <?php
                            $con = mysqli_connect('localhost','root');
                            mysqli_select_db($con, 'oyatsu');
                            $sql = "SELECT id, name, cpf, email, telefone FROM employee";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    <td>" . $row["name"]. "</td>
                                    <td>" . $row["cpf"]. "</td>
                                    <td>" . $row["email"]. "</td>
                                    <td>" . $row["telefone"]. "</td>
                                    <td><a href='functions.php?edit_employee=" . $row["id"] . "'>Editar</a> | 
                                    <a href='functions.php?delete_employee=" . $row["id"] . "'>Excluir</a>
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