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

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : "";
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, $_POST['direccion']) : "";
$fec_nacimiento = isset($_POST['fecha_nacimiento']) ? mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']) : "";
$claseAsignada = isset($_POST['clase_asignada']) ? mysqli_real_escape_string($conn, $_POST['clase_asignada']) : "";

$sql = "INSERT INTO maestros (NOMBRE, EMAIL, DIRECCION, FEC_NACIMIENTO, CLASE_ASIGNADA) VALUES ('$nombre', '$email', '$direccion', '$fec_nacimiento', '$claseAsignada')";

if (mysqli_query($conn, $sql)) {
    echo "Maestro agregado correctamente";
} else {
    echo "Error al agregar Maestro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
