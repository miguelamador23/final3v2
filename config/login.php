<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];


  login($email, $password);
}

function login($email, $password) {



  if ($email === "usuario@example.com" && $password === "contraseña") {
    echo "Inicio de sesión correcto";
  } else {
    echo "Credenciales incorrectas";
  }
}
?>