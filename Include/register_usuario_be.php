<?php
// Incluir la conexion a la base de datos
include 'conexion_be.php';
// Verificar si el formulario fue enviado por el metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Asegurate de que los campos no esten vacios
    if (!empty($nombre_completo) && !empty($correo) && !empty($usuario) && !empty($contrasena)) {
        // Encriptar la contrasena antes de almacenarla
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparar la consulta SQL para insertar los datos en la base de datos
        $query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) 
                  VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena_encriptada')";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $query)) {
            // Si el registro fue exitoso
            echo "Registro insertado exitosamente.";
        } else {
            // Si hubo un error en la insercion
            echo "Error al insertar: " . mysqli_error($conexion);
        }
    } else {
        // Si alguno de los campos esta vacio
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    echo "No se recibio el formulario por el metodo POST.";
}
?>
