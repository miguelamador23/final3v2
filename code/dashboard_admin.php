<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">

    <style>
        .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline;
            margin-right: 10px;
        }

        .boton1 {
            width: 100px;
            height: 30px;
            font-size: 60%;
            margin-left: 750px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal {
            display: none;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        .material-icons-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            display: inline-block;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-somoothing: grayscale;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row ">
        <div class="bg-white md:w-64 min-h-screen shadow bg-blue-800">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-white"> <img src="../assets/logo.jpg" alt="" class="logo">Universidad
                    </div>
                    <hr>
                </div>
            </div>
            <nav class="p-6 space-y-4">
                <hr>
                <h2 href="#" class="block text-white">admin <br>
                    Administrador</h2>
                <hr>
                <h2 class="text-center text-white">Menu Administrador</h2>
                <a href="#" class="block text-white">Permisos</a>
                <a href="#" class="block text-white">Maestros</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-alumnos')">Alumnos</a>
                <a href="#" class="block text-white">Clases</a>
            </nav>
        </div>
        <div class="ml-5 inline-block p-4 h-20 mt-2 shadow-md rounded-md">
            <h2 class="text-xl font-semibold text-gray-700">Bienvenido</h2>
            <p class="text-gray-600">Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda
            </p>

            <div id="dashboard-alumnos" class="p-6 min-h-screen" style="display: none;">
                <h1 id="dashboard-title" class="text-xl font-semibold text-gray-700">Lista de alumnos</h1>
                <div class="ml-5 inline-block p-8 h-50 mt-2 shadow-md rounded-md">

                    <p>Informacion de alumnos
                        <button class="boton1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded" onclick="toggleModal('modal')">
                            Agregar Alumno
                        </button>
                    </p>

                    <div class="fixed z-10 inset-0 overflow-y-auto modal" x-show="modal" x-cloak>
                        <div class="flex items-end justify-center min-h-screen">
                            <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full" @click.away="modal = false">
                                <h2 class="text-2xl font-bold mb-8">Agregar Alumno</h2>
                                <form action="">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="dni">
                                            DNI
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dni" type="text" placeholder="DNI">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                            Correo Electronico
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="names">
                                            Nombre(s)
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="names" type="text" placeholder="Nombre(s)">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="surnames">
                                            Apellido(s)
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="surnames" type="text" placeholder="Apellido(s)">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                            Dirección
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" type="text" placeholder="Dirección">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="birthdate">
                                            Fecha de nacimiento
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birthdate" type="date" placeholder="Fecha de nacimiento">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                            Guardar cambios
                                        </button>
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="modal = false">
                                            Cerrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2">
                        Copy
                    </button>
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2">
                        Excel
                    </button>
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2">
                        PDF
                    </button>


                    <?php
                    include('../config/conexion.php');
                    $query = "SELECT * FROM alumnos";
                    $result = $mysqli->query($query);
                    if ($result) {
                        echo "<table class='display'>";
                        echo "<tr><th class='w-1/5 text-left'>Dni</th><th class='w-1/5 text-left'>Nombre</th><th class='w-1/5 text-left'>Correo</th><th class='w-1/5 text-left'>Direccion</th><th class='w-1/5 text-left'>Fec. Nacimiento</th><th class='w-1/5 text-left'>Acciones</th></tr>";
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                            echo "<td class='w-1/5 text-left py-2'>" . $row['DNI'] . "</td>";
                            echo "<td class='w-1/5 text-left py-2'>" . $row['NOMBRE'] . "</td>";
                            echo "<td class='w-1/5 text-left py-2'>" . $row['CORREO'] . "</td>";
                            echo "<td class='w-1/5 text-left py-2'>" . $row['DIRECCION'] . "</td>";
                            echo "<td class='w-1/5 text-left py-2'>" . $row['FEC_NACIMIENTO'] . "</td>";
                            echo "<td class='w-1/5 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        function toggleDashboard(dashboardId) {
            var dashboard = document.getElementById(dashboardId);

            if (dashboard.style.display === "none") {
                dashboard.style.display = "block";
            } else {
                dashboard.style.display = "none";
            }
        }

        function toggleModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = modal.style.display === "none" ? "flex" : "none";
        }

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>