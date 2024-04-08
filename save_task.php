<?php 
/* Incluyendo la conexion de la base de datos */
include("db.php");

/*Comprobar si el formulario se ha enviado para guardar una tarea*/
if (isset($_POST['save_task'])){
    /* Recuperar el titulo y la descripcion de la tarea del formulario*/
    $title = $_POST['title'];
    $description = $_POST['description'];

    /* Creando la consulta SQL para insertar la tarea en la base de datos */
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    /* Ejecutar la consulta */
    $result = mysqli_query($conn, $query);

    /* Comprobar si la consulta fue exitosa */
    if (!$result) {
        /* Mostrar un mensaje de error y finalizar el script si la consulta falla */
        die("Query Failed");
    }

    /* Configurar un mensaje de exito en la variable de sesion para que se muestre mas tarde */
    $_SESSION['message'] = 'Task Saved Succesfully';
    /* Establecer el tipo de mensaje en 'success' para fines de estilo */
    $_SESSION['message_type'] = 'success';

    /* Redirigir al usuario a la pagina index.php despues de guardar la tarea */
    header("Location: index.php");
   

}

?>