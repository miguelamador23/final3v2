<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline;
            margin-right: 10px;
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
                <h2 href="#" class="block text-white">Maestro <br>
                    Maestro Maestro</h2>
                <hr>
                <h2 class="text-center text-white">Menu Maestro</h2>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-alumnos-2')">Alumnos</a>

            </nav>
        </div>
        <div class="ml-5 inline-block p-4 h-20 mt-2 shadow-md rounded-md">
            <h2 class="text-xl font-semibold text-gray-700">Bienvenido</h2>
            <p class="text-gray-600">Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda
            </p>

            <div id="dashboard-alumnos-2" class="dashboard p-6 min-h-screen" style="display: none;">
                <h1 id="dashboard-title" class="text-xl font-semibold text-gray-700">Alumnos de la clase guarani</h1>
                <div class="ml-5 inline-block p-8 h-50 mt-2 shadow-md rounded-md">
                    <p>Alumnos de la clase guarani


                    </p>

                    <hr>
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2">
                        Copy
                    </button>
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2">
                        Excel
                    </button>
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2" onclick="generarPDF()">
                        PDF
                    </button>

                    <?php
                    include('../config/conexion.php');
                    $query = "SELECT * FROM clase1";
                    $result = $mysqli->query($query);
                    if ($result) {
                        echo "<table class='display'>";
                        echo "<tr><th class='w-1/6 text-left'>#</th><th class='w-1/6 text-left'>Nombre del alumno</th><th class='w-1/6 text-left'>Calificacion</th><th class='w-1/6 text-left'>Mensaje</th><th class='w-1/6 text-left'>Acciones</th></tr>";
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['ID'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['NOMBRE_DEL_ALUMNO'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['CALIFICACION'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['MENSAJE'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>


                </div>



                <script>
                    function toggleDashboard(dashboardId) {
                        let dashboard = document.getElementById(dashboardId);
                        if (dashboard.style.display === "none") {
                            dashboard.style.display = "block";
                        } else {
                            dashboard.style.display = "none";
                        }
                    }
                </script>
</body>

</html>