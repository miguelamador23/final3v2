<?php
require_once('../config/conexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM usuarios WHERE email = ? AND password = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
        exit();
    }

    $stmt->bind_param("ss", $email, $password);
    $result = $stmt->execute();

    if ($result) {
        $stmt->bind_result($el_id_del_usuario);
        $stmt->fetch();
        $stmt->close();

        if ($email === 'admin@admin' && $password === 'admin') {
            $_SESSION['user_id'] = $el_id_del_usuario;
            header("Location: ../code/dashboard_admin.php");
            exit();
        } elseif ($email === 'maestro@maestro' && $password === 'maestro') {
            $_SESSION['user_id'] = $el_id_del_usuario;
            header("Location: ../code/dashboard_maestros.php");
            exit();
        } elseif ($email === 'alumno@alumno' && $password === 'alumno') {
            $_SESSION['user_id'] = $el_id_del_usuario;
            header("Location: ../code/dashboard_alumnos.php");
            exit();
        } else {
            echo "Error de usuario incorrecto. Por favor, verifica tus credenciales.";
            exit();
        }
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(255, 245, 210, 255);
        }

        .container {
            position: relative;
        }

        .image {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            height: 350px;
            z-index: -1;
        }
    </style>
</head>

<body>
    <img src="../assets/logo.jpg" alt="" class="image">
    <div class="container">
        <div class="flex justify-center items-center h-screen">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl mb-4">Bienvenido ingresa con tu cuenta</h2>
                <form id="loginForm" method="post" action="index.php">
                    <div class="mb-4">
                        <input type="email"  name="email" id="email" class="border border-gray-300 rounded-md p-2 w-full"
                            placeholder="Correo" required />
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" id="password" class="border border-gray-300 rounded-md p-2 w-full"
                            placeholder="Contraseña" required />
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>

   
</body>

</html>