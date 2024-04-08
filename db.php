<?php
/* Se da inicio a la sesion para poder usar las variables de la misma */
session_start();

/* Se establece la conexion con la base de datos en mysql */
$conn = mysqli_connect(
    
    'localhost', 
    'root',
    '',
    'task_php_mysql'
);

/* Codigo para comprobar conexion
if (isset($conn)) {
    echo 'DB is connected';
}
*/




?>