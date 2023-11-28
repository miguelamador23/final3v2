<?php
try {
    $db_host = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "universidad";
    $db_port = 3306;

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name, $db_port);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

   
    $sql = "SELECT name, phone, direction FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . "<br>";
            echo "Phone: " . $row["phone"] . "<br>";
            echo "Direction: " . $row["direction"] . "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }

    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>