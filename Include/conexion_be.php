<?php
$serverName = "BusterProyect.mssql.somee.com";
$database = "BusterProyect";
$username = "Juls17_SQLLogin_1";
$password = "mxcrpfzswh"; 

try {
    $conexion = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado exitosamente a la base de datos";
} catch (PDOException $e) {
    echo "No se pudo conectar a la base de datos: " . $e->getMessage();
}
?>


