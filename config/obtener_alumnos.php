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

$sql = "SELECT * FROM alumnos";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='display'>";
    echo "<tr><th class='w-1/6 text-left'>Dni</th><th class='w-1/6 text-left'>Nombre</th><th class='w-1/6 text-left'>Correo</th><th class='w-1/6 text-left'>Direccion</th><th class='w-1/6 text-left'>Fec. Nacimiento</th><th class='w-1/6 text-left'>Acciones</th></tr>";
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $count++;
        echo "<tr class='border-t border-b border-gray-300 mb-2'>";
        echo "<td class='w-1/6 text-left py-2'>" . $row['DNI'] . "</td>";
        echo "<td class='w-1/6 text-left py-2'>" . $row['NOMBRE'] . "</td>";
        echo "<td class='w-1/6 text-left py-2'>" . $row['CORREO'] . "</td>";
        echo "<td class='w-1/6 text-left py-2'>" . $row['DIRECCION'] . "</td>";
        echo "<td class='w-1/6 text-left py-2'>" . $row['FEC_NACIMIENTO'] . "</td>";
        echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo 'No se encontraron alumnos';
}

mysqli_close($conn);
