<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

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
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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

        .boton1 {
            width: 100px;
            height: 30px;
            font-size: 55%;
            margin-left: 750px;
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
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-permisos')">Permisos</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-maestros')">Maestros</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-alumnos')">Alumnos</a>
                <a href="#" class="block text-white" onclick="toggleDashboard('dashboard-clases')">Clases</a>
                <a href="#" class="block text-white" onclick="cerrarSesion()">Cerrar sesión</a>
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

                        <button id="openModalBtn" class="boton1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            Agregar Alumnos</button>

                    </p>

                    <div id="myModal" class="modal">
                        <div class="modal-content flex items-end justify-center min-h-screen">
                            <div class="bg-white rounded-lg p-4 m-4 max-w-md w-full">
                                <h2 class="text-2xl font-bold mb-8">Agregar Alumno</h2>
                                <form action="../config/agregar_alumno.php" method="POST">
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
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Guardar cambios</button>
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal()">
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
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2" onclick="generarPDF()">
                        PDF
                    </button>


                    <?php
                    include('../config/conexion.php');
                    $query = "SELECT * FROM alumnos";
                    $result = $mysqli->query($query);
                    if ($result) {
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
                    }
                    ?>
                </div>
            </div>

            <div id="dashboard-maestros" class="dashboard p-6 min-h-screen" style="display: none;">
                <h1 id="dashboard-title" class="text-xl font-semibold text-gray-700">Lista de maestros</h1>
                <div class="ml-5 inline-block p-8 h-50 mt-2 shadow-md rounded-md">
                    <p>Informacion de maestros
                        <button id="openModalBtnMaestro" class="boton1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            Agregar Maestros
                        </button>
                    </p>

                    <div id="myModalMaestro" class="modal">
                        <div class="modal-content flex items-end justify-center min-h-screen">
                            <div class="bg-white rounded-lg p-4 m-4 max-w-md w-full">
                                <h2 class="text-2xl font-bold mb-8">Agregar Maestro</h2>
                                <form action="../config/agregar_maestro.php" method="POST">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Nombre">
                                            Nombre
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dni" type="text" placeholder="Nombre">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Email">
                                            Email
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dni" type="text" placeholder="Email">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Direccion">
                                            Direccion
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dni" type="text" placeholder="Direccion">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Fec. Nacimiento">
                                            Fec. Nacimiento
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dni" type="text" placeholder=" Fec. Nacimiento">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Clase Asignada">
                                            Clase Asignada
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dni" type="text" placeholder=" Clase Asignada">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Guardar cambios</button>
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal()">
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
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded mt-2" onclick="generarPDF()">
                        PDF
                    </button>
                    <?php
                    include('../config/conexion.php');
                    $query = "SELECT * FROM maestros";
                    $result = $mysqli->query($query);
                    if ($result) {
                        echo "<table class='display'>";
                        echo "<tr><th class='w-1/6 text-left'>Nombre</th><th class='w-1/6 text-left'>Email</th><th class='w-1/6 text-left'>Direccion</th><th class='w-1/6 text-left'>Fec. Nacimiento</th><th class='w-1/6 text-left'>Clase Asignada</th><th class='w-1/6 text-left'>Acciones</th></tr>";
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['NOMBRE'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['EMAIL'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['DIRECCION'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['FEC_NACIMIENTO'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['CLASE_ASIGNADA'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>

                </div>
            </div>

            <div id="dashboard-clases" class="dashboard p-6 min-h-screen" style="display: none;">
                <h1 id="dashboard-title" class="text-xl font-semibold text-gray-700">Lista de clases</h1>
                <div class="ml-5 inline-block p-8 h-50 mt-2 shadow-md rounded-md">
                    <p>Información de clases
                        <button id="openModalBtn" class="boton1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            Agregar clases
                        </button>
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
                    $query = "SELECT * FROM clases";
                    $result = $mysqli->query($query);
                    if ($result) {
                        echo "<table class='display'>";
                        echo "<tr><th class='w-1/6 text-left'>#</th><th class='w-1/6 text-left'>Clase</th><th class='w-1/6 text-left'>Maestro</th><th class='w-1/6 text-left'>Alumnos Inscritos</th><th class='w-1/6 text-left'>Acciones</th></tr>";
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['ID'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['CLASE'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['MAESTRO'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['ALUMNOS_INSCRITOS'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>

                </div>
            </div>

            <div id="dashboard-permisos" class="dashboard p-6 min-h-screen" style="display: none;">
                <h1 id="dashboard-title" class="text-xl font-semibold text-gray-700">Lista de permisos</h1>
                <div class="ml-5 inline-block p-8 h-50 mt-2 shadow-md rounded-md">
                    <p>Información de permisos
                        <button id="openModalBtn" class="boton1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            Agregar permisos
                        </button>
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
                    $query = "SELECT * FROM permisos";
                    $result = $mysqli->query($query);
                    if ($result) {
                        echo "<table class='display'>";
                        echo "<tr><th class='w-1/6 text-left'>#</th><th class='w-1/6 text-left'>Email/User</th><th class='w-1/6 text-left'>Permiso</th><th class='w-1/6 text-left'>Estado</th><th class='w-1/6 text-left'>Acciones</th></tr>";
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            $count++;
                            echo "<tr class='border-t border-b border-gray-300 mb-2'>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['ID'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['EMAIL'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['PERMISO'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'>" . $row['ESTADO'] . "</td>";
                            echo "<td class='w-1/6 text-left py-2'><button class='btn-editar'><i class='material-icons-outlined'>edit</i></button> <button class='btn-borrar'><i class='material-icons-outlined'>delete</i></button></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>

                </div>
            </div>

        </div>

    </div>

    <script>
        function toggleDashboard(dashboardId) {
            let dashboard = document.getElementById(dashboardId);
            let dashboards = document.querySelectorAll('.dashboard');


            dashboards.forEach((dashboard) => {
                dashboard.style.display = "none";
            });


            if (dashboard.style.display === "none") {
                dashboard.style.display = "block";
            } else {
                dashboard.style.display = "none";
            }
        }

        $(document).ready(function() {

            let modal = $("#myModal");
            let btn = $("#openModalBtn");
            let closeBtn = $(".close");

            btn.click(function() {
                modal.css("display", "block");

                // Close any open dashboards when modal is opened
                let dashboards = document.querySelectorAll('.dashboard');
                dashboards.forEach((dashboard) => {
                    dashboard.style.display = "none";
                });
            });

            closeBtn.click(function() {
                modal.css("display", "none");
            });
        });
        $(document).ready(function() {
            $('#myTable').DataTable();
        });


        function closeModal() {
            let modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function closeModal() {
            let modal = document.getElementById("myModalMaestro");
            modal.style.display = "none";
        }

        function generarPDF() {
            let doc = new jsPDF();

            let tablaAlumnos = document.getElementById("alumnos");

            doc.autoTable({
                html: tablaAlumnos,
                startY: 10,
                theme: 'grid',
            });

            doc.save("alumnos.pdf");
        }

        function cerrarSesion() {
            $.ajax({
                url: '../code/index.php',
                method: 'POST',
                success: function(response) {
                    window.location.href = '../code/index.php';
                }
            });
        }

        const guardarCambiosBtn = document.querySelector('.modal-content button[type="submit"]');

        guardarCambiosBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const dni = document.getElementById('dni').value;
            const email = document.getElementById('email').value;
            const names = document.getElementById('names').value;
            const address = document.getElementById('address').value;
            const birthdate = document.getElementById('birthdate').value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../config/agregar_alumno.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const xhr2 = new XMLHttpRequest();
                    xhr2.open('GET', '../config/obtener_alumnos.php', true);
                    xhr2.onreadystatechange = function() {
                        if (xhr2.readyState === 4 && xhr2.status === 200) {
                            const tablaAlumnos = document.querySelector('.display');
                            tablaAlumnos.innerHTML = xhr2.responseText;
                        }
                    };
                    xhr2.send();
                }
            };
            xhr.send('dni=' + dni + '&nombre=' + names + '&correo=' + email + '&direccion=' + address + '&fec_nacimiento=' + birthdate);
        });

        $(document).ready(function() {
            function openModal(modalId) {
                let modal = $("#" + modalId);
                modal.css("display", "block");
            }

            const btnAgregarMaestros = $("#openModalBtn");
            btnAgregarMaestros.on("click", function() {
                openModal("myModalAlumno");
            });

            const btnAgregarMaestro = $("#openModalBtnMaestro");
            btnAgregarMaestro.on("click", function() {
                openModal("myModalMaestro");
            });
        });
    </script>
</body>

</html>