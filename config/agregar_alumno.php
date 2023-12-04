<?php
$db_host = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name = "universidad";
$db_port = 3306;

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name, $db_port);
if (!$conn) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$fec_nacimiento = $_POST['fec_nacimiento'];

$sql = "INSERT INTO alumnos (DNI, NOMBRE, CORREO, DIRECCION, FEC_NACIMIENTO) VALUES ('$dni', '$nombre', '$correo', '$direccion', '$fec_nacimiento')";
if (mysqli_query($conn, $sql)) {
    echo "Alumno agregado correctamente";
} else {
    echo "Error al agregar alumno: " . mysqli_error($conn);
}

mysqli_close($conn);
?>