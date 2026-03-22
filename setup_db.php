<?php
require_once __DIR__ . '/db.php';

echo "<h2>🔧 Setup do Banco de Dados (TiDB/Local)</h2>";

$queries = [
    "employee" => "CREATE TABLE IF NOT EXISTS `employee` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `cpf` varchar(50) NOT NULL,
      `email` varchar(255) NOT NULL,
      `telefone` varchar(50) NOT NULL,
      PRIMARY KEY (`id`)
    )",
    "products" => "CREATE TABLE IF NOT EXISTS `products` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `price` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    )",
    "sales" => "CREATE TABLE IF NOT EXISTS `sales` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `product` varchar(255) NOT NULL,
      `price` varchar(255) NOT NULL,
      `quantity` int(11) NOT NULL,
      `totalprice` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    )",
    "supplier" => "CREATE TABLE IF NOT EXISTS `supplier` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `cnpj` varchar(50) NOT NULL,
      `email` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    )",
    "users" => "CREATE TABLE IF NOT EXISTS `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `username` varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    )"
];

foreach ($queries as $table => $sql) {
    if (mysqli_query($con, $sql)) {
        echo "<p style='color:green;'>✅ Tabela <b>$table</b> verificada/criada com sucesso.</p>";
    } else {
        echo "<p style='color:red;'>❌ Erro na tabela <b>$table</b>: " . mysqli_error($con) . "</p>";
    }
}

// Inserir Admin inicial se a tabela estiver vazia
$check_admin = mysqli_query($con, "SELECT * FROM users WHERE username = 'admin'");
if ($check_admin && mysqli_num_rows($check_admin) == 0) {
    $insert_admin = "INSERT INTO `users` (`name`, `username`, `password`) VALUES ('Administrador', 'admin', 'admin')";
    if (mysqli_query($con, $insert_admin)) {
        echo "<p style='color:blue;'>👤 Usuário 'admin' criado (senha: admin).</p>";
    }
} else {
    echo "<p style='color:blue;'>👤 Usuário 'admin' já existe no banco.</p>";
}

echo "<hr><p>▶️ Setup finalizado! <a href='login.php'>Ir para o Login</a></p>";

mysqli_close($con);
?>
