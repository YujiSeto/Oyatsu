<?php
    $con = mysqli_connect('localhost','root'); // Conectar ao banco de dados
    mysqli_select_db($con, 'oyatsu'); // Acessar o banco de dados

//Adicionar Venda
if (isset($_POST['save_sale'])){
    $product_name = $_POST['new_sale_product_name'];
    echo $product_name;
    $sql = "SELECT * FROM products WHERE name = '$product_name'";
    $result = $con->query($sql);
    $row = $result->fetch_array();
    $price = $row['price'];
    $quantity_product = $_POST['quantity_product'];
    $totalprice = $price * $quantity_product;
    
    $sql = "INSERT INTO sales (product,price,quantity,totalprice) VALUES ('$product_name','$price','$quantity_product','$totalprice')";
    mysqli_query($con, $sql);
    header('location: menu-sales.php');
}

//Deletar Venda
if (isset($_GET['delete_sale'])){
    $id = $_GET['delete_sale'];
    $sql = "DELETE FROM sales WHERE id='$id'";
    mysqli_query($con, $sql);
    header('location: menu-sales.php');
}

//Editar Venda
if (isset($_GET['edit_sale'])){
    $id = $_GET['edit_sale'];
    header('location: edit-sale.php?id='.$id);
}
if (isset($_POST['edit_sale'])){
    $product_name = $_POST['new_sale_product_name'];
    echo $product_name;
    $sql = "SELECT * FROM products WHERE name = '$product_name'";
    $result = $con->query($sql);
    $row = $result->fetch_array();
    $price = $row['price'];
    $quantity_product = $_POST['quantity_product'];
    $totalprice = $price * $quantity_product;

    $sql = "UPDATE sales SET product = '$product', price = '$price', quantity = '$quantity', totalprice = '$totalprice' WHERE id = '$id'";
    mysqli_query($con, $sql);
    header('location: menu-sales.php');  
}

//Adicionar Produto
if (isset($_POST['save_product'])){
    $name = $_POST['new_product_name'];
    $price = $_POST['new_product_price'];

    $sql = "INSERT INTO products (name, price) VALUES ('$name','$price')";
    mysqli_query($con, $sql);
    header('location: menu-products.php');
}

//Deletar Produto
if (isset($_GET['delete_product'])){
    $id = $_GET['delete_product'];

    $sql = "DELETE FROM products WHERE id='$id'";
    mysqli_query($con, $sql);
    header('location: menu-products.php');
}

//Editar Produto
if (isset($_GET['edit_product'])){
    $id = $_GET['edit_product'];
    header('location: edit-product.php?id='.$id);
}
if (isset($_POST['edit_product'])){
    $name = $_POST['new_product_name'];
    $price = $_POST['new_product_price'];
    $id = $_POST['id'];

    $sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'";
    mysqli_query($con, $sql);
    header('location: menu-products.php');  
}

//Adicionar Fornecedor
if (isset($_POST['save_supplier'])){
    $name = $_POST['new_supplier_name'];
    $cnpj = $_POST['new_supplier_cnpj'];
    $email = $_POST['new_supplier_email'];

    $sql = "INSERT INTO supplier (name, cnpj, email) VALUES ('$name','$cnpj','$email')";
    mysqli_query($con, $sql);
    header('location: menu-supplier.php');
}

//Deletar Fornecedor
if (isset($_GET['delete_supplier'])){
    $id = $_GET['delete_supplier'];

    $sql = "DELETE FROM supplier WHERE id='$id'";
    mysqli_query($con, $sql);
    header('location: menu-supplier.php');
}

//Editar Fornecedor
if (isset($_GET['edit_supplier'])){
    $id = $_GET['edit_supplier'];
    header('location: edit-supplier.php?id='.$id);
}
if (isset($_POST['edit_supplier'])){
    $name = $_POST['new_supplier_name'];
    $cnpj = $_POST['new_supplier_cnpj'];
    $email = $_POST['new_supplier_email'];
    $id = $_POST['id'];
    $sql = "UPDATE supplier SET name = '$name', cnpj = '$cnpj', email = '$email' WHERE id = '$id'";
    mysqli_query($con, $sql);
    header('location: menu-supplier.php');
}

//Adicionar Funcionário
if (isset($_POST['save_employee'])){
    $name = $_POST['new_employee_name'];
    $cpf = $_POST['new_employee_cpf'];
    $email = $_POST['new_employee_email'];
    $telefone = $_POST['new_employee_telefone'];

    $sql = "INSERT INTO employee (name, cpf, email,telefone) VALUES ('$name','$cpf','$email','$telefone')";
    mysqli_query($con, $sql);
    header('location: menu-employee.php');
}

//Deletar Funcionário
if (isset($_GET['delete_employee'])){
    $id = $_GET['delete_employee'];

    $sql = "DELETE FROM employee WHERE id='$id'";
    mysqli_query($con, $sql);
    header('location: menu-employee.php');
}

//Editar Funcionário
if (isset($_GET['edit_employee'])){
    $id = $_GET['edit_employee'];
    header('location: edit-employee.php?id='.$id);
}
if (isset($_POST['edit_employee'])){
    $name = $_POST['new_employee_name'];
    $cpf = $_POST['new_employee_cpf'];
    $email = $_POST['new_employee_email'];
    $telefone = $_POST['new_employee_telefone'];
    $id = $_POST['id'];

    $sql = "UPDATE employee SET name = '$name', cpf = '$cpf', email = '$email', telefone = '$telefone' WHERE id = '$id'";
    mysqli_query($con, $sql);
    header('location: menu-employee.php');  
}

//Adicionar Usuário
if (isset($_POST['save_user'])){
    $name = $_POST['new_user_name'];
    $user = $_POST['new_user_username'];
    $pass = $_POST['new_user_pass'];
    $sql = "INSERT INTO users (name, username, password) VALUES ('$name','$user','$pass')";
    mysqli_query($con, $sql);
    header('location: menu-users.php');
}

//Deletar Usuário
if (isset($_GET['delete_user'])){
    $id = $_GET['delete_user'];
    $sql = "DELETE FROM users WHERE id='$id'";
    mysqli_query($con, $sql);
    header('location: menu-users.php');
}

//Editar Usuário
if (isset($_GET['edit_user'])){
    $id = $_GET['edit_user'];
    header('location: edit-user.php?id='.$id);
}
if (isset($_POST['edit_user'])){
    $name = $_POST['new_user_name'];
    $user = $_POST['new_user_username'];
    $pass = $_POST['new_user_pass'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET name = '$name', username = '$user', password = '$pass' WHERE id = '$id'";
    mysqli_query($con, $sql);
    header('location: menu-users.php');  
}

mysqli_close($con); //Fechar o acesso ao Banco
?>