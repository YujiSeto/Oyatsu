<?php
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$name = getenv('DB_NAME') ?: 'oyatsu';
$port = getenv('DB_PORT') ?: 3306;

$con = mysqli_init();

if (getenv('DB_HOST')) {
    // Ambiente Cloud (TiDB Requires SSL)
    mysqli_ssl_set($con, NULL, NULL, __DIR__ . "/isrgrootx1.pem", NULL, NULL);
    mysqli_real_connect($con, $host, $user, $pass, $name, $port, MYSQLI_CLIENT_SSL);
} else {
    // Fallback Local
    mysqli_real_connect($con, $host, $user, $pass, $name, $port);
}

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
