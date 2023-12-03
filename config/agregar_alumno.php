<?php
include('../config/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $dni = $_POST['dni'];
  $email = $_POST['email'];
  $names = $_POST['names'];
  $surnames = $_POST['surnames'];
  $address = $_POST['address'];
  $birthdate = $_POST['birthdate'];

  
  $query = "INSERT INTO alumnos (dni, email, names, surnames, address, birthdate) VALUES ('$dni', '$email', '$names', '$surnames', '$address', '$birthdate')";
  $result = mysqli_query($conexion, $query);

  if ($result) {
    echo "Alumno agregado correctamente";
  } else {
  
    echo "Error al agregar el alumno";
  }
}
?>