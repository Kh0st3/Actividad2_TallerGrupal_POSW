<?php

/* Se incluye el archivo de conexion a la BD */
include("db.php");

/* Comprobacion si el parametro 'id' esta presente en la URL */
if (isset($_GET['id'])){
    /* Extrayendo el 'id' de la URL */
    $id = $_GET['id'];
    /* Creacion de una consulta SQL para recuperar la tarea con el 'id' especificado */
    $query = "SELECT * FROM task WHERE id = $id";

    /* Ejecucion de la consulta */
    $result = mysqli_query($conn, $query);

    /* Comprobando si la consulta devolvio exactamente una fila */
    if (mysqli_num_rows($result) == 1) {
        /* Obteniendo la fila como una matriz asociativa */
        $row = mysqli_fetch_array($result);
        /* Se extrae el titulo y descripcion de la fila */
        $title = $row['title'];
        $description = $row['description'];
    }
}

/* Se comprueba si se ha enviado el formulario para actualizar la tarea */
if (isset($_POST['update'])) {
    /* Se extrae el 'id' de la URL */
    $id = $_GET['id'];
    /* Se extrae el titulo y descripcion del formulario */
    $title = $_POST['title'];
    $description = $_POST['description'];

    /* Crear una consulta SQL para actualizar la tarea con el 'id' especificado */
    $query  = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    /* Se ejecuta la consulta */
    mysqli_query($conn, $query);
    /* Redirigiendo al usuario a la pagina index.php despues de actualizar la tarea */
    header("Location: index.php");
}

?>

<!--Incluyendo el archivo de header-->
<?php include("includes/header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <!--Campo de entrada para actualizar el titulo de la tarea-->
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
                        </div>
                        <!--Textare para actualizar la descripcion de la tarea-->
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description; ?></textarea>
                        </div>
                        <!-- Boton para enviar el formulario para actualizar la tarea -->
                        <button class="btn btn-success" name="update">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Incluyendo el archivo footer-->
<?php include("includes/footer.php") ?>