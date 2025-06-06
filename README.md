
# Mi tienda de Cartas Pokemon: Pokegallery
## Descripción:
La idea del proyecto es desarrollar una tienda virtual centrada en la venta de productos de cartas extranjeras de Pokémon.
## Tecnologias utilizadas:
Laravel, PHP, JavaScript, MySQL, Blade, Bootstrap, CSS
## Requisitos previos:
-PHP 
-Composer
-MySQL
-Node.js y npm
## Para ejecutar el programa:
1-Clona el repositorio
2-Instala dependencias: 
composer install
3-Copia el archivo de entorno y genera la clave de la app
cp .env.example .env
php artisan key:generate
4-Configura tu base de datos en .env (si usas xampp, de base el usuario es root y la contraseña vacia. El nombre de la base de datos es poketienda)
5-Descarga el .sql e importalo por ejemplo en PHPMyAdmin (para este paso haria falta tener Xampp, pero solo nos haria falta encender MySQL)
6-Ejecuta las migraciones: 
php artisan migrate 
7-Instala dependencias para el front
npm install
8-Desde la ruta de tu proyecto, lanza:
php artisan serve
9-Luego ya abre en el navegador la ruta (http://localhost:8000)
