<!--Incluyendo la base de el archivo de conexion de la base de datos-->
<?php include("db.php") ?>

<!--Incluyendo el archivo de header-->
<?php include("includes/header.php")?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!-- Mostrar un mensaje si se establece la variable de sesion 'message'-->
                <?php if(isset($_SESSION['message'])) {?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <!--Boton para cerrar la alerta-->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <!--Campo de entrada para el 'title' de la tarea -->
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                        </div>
                        <!--Textarea para la descripcion de la tarea -->
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                        </div>
                        <!-- Boton para guardar la tarea -->
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                    </form>
                </div>          
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        /* Seleccionar todas la tareas de la base de datos */
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);

                        /* Recorriendo los resultados y mostrando cada tarea */
                        while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <!-- Invocacion en plantalla de los elementos title, description, created_at -->
                                <th><?php echo $row['title'] ?></th>
                                <th><?php echo $row['description'] ?></th>
                                <th><?php echo $row['created_at'] ?></th>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Incluyendo el archivo footer-->
<?php include("includes/footer.php")?>