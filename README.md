Todo App Laravel  (George Mero)

1.  Abre tu terminal o línea de comandos.

2.  Navega al directorio donde deseas clonar el proyecto.

3.  Ejecuta el siguiente comando para clonar el repositorio del proyecto desde GitHub:

    ```
    git clone https://github.com/geoMerDev/todo-app-laravel
    ```


    Accede al directorio del proyecto clonado utilizando el siguiente comando:

    ```
    cd todo-app-laravel
    ```

4.  Copia el archivo de ejemplo `.env.example` y renómbralo como `.env` ejecutando el siguiente comando:

    ```
    cp .env.example .env
    ```

5.  genere la llave

    ```
    php artisan key:generate
    ```
6. Ejecuta las migraciones con los seeder:

    ```
    php artisan migrate --seed
    ```

7. Instala dependecias npm:

    ```
    npm install
    ```

8. Compile los diseños :

    ```
    npm run build
    ```

9. puedes acceder a tu aplicación Laravel en tu navegador web visitando `http://localhost`.

10. Registrese en la aplicacion `http://localhost/register` con un correo y contraseña para poder usarla:



¡Eso es todo! Gracias por clonar el repo Si tienes alguna pregunta, no dudes en preguntar.
