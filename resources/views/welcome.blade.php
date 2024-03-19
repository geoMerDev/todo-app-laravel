<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="antialiased">
    <div
        class="  sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-white dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">


        <nav class="bg-orange-100 border-gray-200 dark:bg-gray-950  ">
            <div x-data="{ isOpen: false }"
                class="max-w-screen-xl mx-auto py-3 px-6 md:flex md:justify-between md:items-center p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a href="https://geomerdev.com/" target="_blank">

                            <span
                                class="self-center text-2xl  font-semibold whitespace-nowrap text-orange-700 dark:text-orange-600">GeoMerDev</span>
                        </a>

                    </div>

                </div>

                <!-- Menu, if mobile set to hidden -->
                <div :class="isOpen ? 'show' : 'hidden'" class=" items-center md:block mt-4 md:mt-0">


                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth

                    @endif
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">


            <div class="flex justify-center justify-items-start">
                <div class="flex flex-col  justify-items-start lg:m-0 lg:w-1/2 lg:flex-row justify-center">
                    <div>
                        <h1 class="text-3xl text-black dark:text-white ">
                            Hola mi nombre es
                            <span class="text-orange-700 dark:text-orange-600">Geo</span>rge
                            <span class="text-orange-700 dark:text-orange-600">Mer</span>o Soy
                            Software
                            <span class="text-orange-700 dark:text-orange-600">Dev</span>eloper
                        </h1>
                    </div>
                    <div class="flex justify-center justify-items-start">

                        <img src={{ asset('images/project.png') }} alt="imagen del hero" class="max-w-xs h-auto" />
                    </div>

                </div>

            </div>

        </div>
        <div class="container mx-auto py-8 px-8">
            <h1 class="text-2xl font-bold mb-4">Resumen de la Aplicación Todo List</h1>

            <div class="md:flex md:flex-wrap">
                <!-- Columna 1 -->
                <div class="md:w-1/2 md:pr-4 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Características Principales:</h2>
                    <ul class="list-disc">
                        <li>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Interfaz Interactiva:</h3>
                                <p>Utiliza Laravel Livewire para crear una interfaz de usuario interactiva y dinámica,
                                    lo que permite a los usuarios gestionar sus tareas de manera intuitiva sin necesidad
                                    de recargar la página.</p>
                            </div>
                        </li>
                        <li>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Diseño Estilizado con Tailwind CSS:</h3>
                                <p>Implementa Tailwind CSS para un diseño estilizado y responsivo que se adapta a
                                    diferentes dispositivos y tamaños de pantalla, ofreciendo una experiencia visual
                                    atractiva.</p>
                            </div>
                        </li>
                        <li>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Funcionalidades de Todo List:</h3>
                                <p>Permite a los usuarios crear, leer, actualizar y eliminar tareas fácilmente, con
                                    opciones para marcar tareas como completadas o pendientes.</p>
                            </div>
                        </li>


                    </ul>
                </div>
                <!-- Columna 2 -->
                <div class="md:w-1/2 md:pl-4 mb-4">
                    <!-- Aquí podría ir algún contenido adicional para la segunda columna -->
                    <ul class="list-disc">

                        <li>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Validación de Formularios en el Cliente y el
                                    Servidor:</h3>
                                <p>Se implementa validación tanto en el lado del cliente como en el servidor para
                                    garantizar la integridad de los datos y la seguridad del sistema.</p>
                            </div>
                        </li>
                        <li>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Seguridad y Autenticación:</h3>
                                <p>Incorpora funcionalidades de autenticación de usuarios para proteger el acceso a la
                                    lista de tareas, asegurando que solo los usuarios autorizados puedan gestionarlas.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Integración de Base de Datos y ORM:</h3>
                                <p>Se integra la base de datos MySQL con el ORM Eloquent de Laravel para una gestión
                                    eficiente de los datos. Esto permite una comunicación fluida entre la aplicación y
                                    la base de datos, facilitando operaciones como consultas, inserciones,
                                    actualizaciones y eliminaciones de datos de manera estructurada y segura.</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
