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

  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM usuarios WHERE name, phone, direction FROM usuarios WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "Ingreso correcto";
  } else {
    echo "Credenciales inválidas. Por favor, inténtalo nuevamente.";
  }

  $conn->close();
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>