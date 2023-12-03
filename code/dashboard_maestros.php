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
                <a href="#" class="block text-white">Alumnos</a>

            </nav>
        </div>
        <div class="ml-5 inline-block p-4 h-20 mt-2 shadow-md rounded-md">
            <h2 class="text-xl font-semibold text-gray-700">Bienvenido</h2>
            <p class="text-gray-600">Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda
            </p>
        </div>
</body>
</html>