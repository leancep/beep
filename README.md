-Beep Challenge-

Pasos para levantar el proyecto:
1- Ejecutar: composer install
2- Ejecutar: npm install
3- Renombrar el archivo .env.example a .env
4- Ejecutar: php artisan key:generate 
5- Setear en el .env las variables de entorno para conectarse a una base de datos sql (DB_CONNECTION , DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
6- Ejecutar: php artisan migrate
7- Ejecutar: php artisan db:seed  (Esto carga la DB con 10 productos y 20 ordenes con sus "lines")
8- Ejecutar: npm run dev
9- Ejecutar: php artisan serve (si desea levantar un servidor local para probar la app)


Es importante que en el .env la variable de entorno QUEUE_CONNECTION, tenga como valor 'database' para poder ejecutar el job en queue. 
Para ejecutar el JOB asincrono ejecutar:
-php artisan queue:work     (Dejar activo para tener un worker escuchando los jobs que esten la queue)
-php artisan total:cost     (Ejecuta el Job que hace el calculo del "cost" de todas las ordenes en DB, una a una, brindando la información en la Terminal y finalmente imprimiendo el valor total).

La app consta de un servicio de Login/Registro de usuarios.
- Dashboard con registros de las ventas segun el valor de cada una.
- ABM de Productos
- ABM de Ordenes donde en la vista se muestran una tabla con los datos: order_ref, customer_name, total, total qty. 


