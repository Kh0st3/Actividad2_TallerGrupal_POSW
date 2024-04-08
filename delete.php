<?php
    
    /* Incluyendo el archivo de conexion a la base de datos */
    include("db.php");

    /* Verificando si se ha proporcionado un 'id' en la URL */
    if(isset($_GET['id'])) {
        /* Extrayendo el 'id' de la URL */
        $id = $_GET['id'];
        /* Se crea una consulta SQL para eliminar la tarea con el 'id' especificado */
        $query = "DELETE FROM task WHERE id = $id";
        /* Se ejecuta la consulta */
        $result = mysqli_query($conn, $query);
        /* Se verifica si la consulta fue exitosa */
        if (!$result) {
            /* Se muestra un mensaje de erro y terminado del script si la consulta falla */
            die("Query Failed");
        }

        /* Se estable un mensaje de exito en la variable de sesion para ser mostrado mas tarde */
        $_SESSION['message'] = 'Task Removed Successfully';
        /* Se establece el tipo de mensaje como 'danger' para propositos de  estilo*/
        $_SESSION['message_type'] = 'danger';
        /* Se redirecciona al usuario de regreo a la pagina index.php despues de eliminar la tarea*/
        header("Location: index.php");
    }

?>