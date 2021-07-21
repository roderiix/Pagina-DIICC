<!DOCTYPE html>
<html lang="es">
<?php

session_start();
$file = __FILE__;
$pagetitle = "ACADEMICOS - DIICC UDA";
include_once "../config/config.php";
include_once "../include/functions.php";

if (!isset($_SESSION['usuario'])) {
    header(sprintf('Location:%s', fromroot($file, "index.php", True)));
}
include_once fromroot($file, "include/dashboard/head.php", TRUE);
?>

<body>
    <div class="container-contenido">
        <?php include_once fromroot($file, "include/dashboard/header.php", TRUE); ?>
        <div class="capa"></div>
        <!--	--------------->
        <input type="checkbox" id="btn-menu">
        <?php include_once fromroot($file, "include/dashboard/navbar.php", TRUE); ?>
        <div class="fondo">
            <img src="../img/dpto/dpto.jpg" alt="">
        </div>
        <div class="container-center rounded">
            <section class="seccion">
                <div class="container-Noticias">
                    <div class="container-boton">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                            Añadir Evento
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="text-align:center;" class="modal-title" id="exampleModalLabel">Nuevo evento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="../database/eventos/crear.php">
                                        <div class="modal-body">
                                            <div style="margin-left: 110px;" class="form-field "><br>
                                                <input name="imagen" type="file" required>
                                            </div>
                                            <div class="form-field  " style="text-align:center; margin-top: 5px;">
                                                <input style="width: 200px; text-align:center;" id="nombre" name="nombre" class="input-text js-input" placeholder="Nombre" type="text" required>
                                            </div>
                                            <div class="form-field  " style="text-align:center; margin-top: 5px;">
                                                <input style="width: 200px; text-align:center;" id="fecha" name="fecha" class="input-text js-input" placeholder="Fecha" type="date" required>

                                            </div>
                                            <div class="form-field  " style="text-align:center; margin-top: 5px;">
                                                <input style="width: 200px; text-align:center;" id="hora_inicio" name="hora_inicio" class="input-text js-input" placeholder="Hora_inicio" type="text" required>
                                            </div>
                                            <div class="form-field  " style="text-align:center; margin-top: 5px;">
                                                <input style="width: 200px; text-align:center;" id="hora_termino" name="hora_termino" class="input-text js-input" placeholder="Hora_termino" type="text" required>
                                            </div>
                                            <div class="form-field  " style="text-align:center; margin-top: 5px;">
                                                <input style="width: 200px; text-align:center;" id="lugar" name="lugar" class="input-text js-input" placeholder="lugar" type="text" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead style="background-color: steelblue;">
                            <tr style="height: 40px;">
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora de inicio</th>
                                <th scope="col">Hora de termino</th>
                                <th scope="col">Lugar</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                            $sql = "select * from eventos ORDER BY id DESC"; // mejorar query falta nombre del que subio la noticia
                            $resultado = mysqli_query($conexion, $sql);
                            while ($mostrar = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>

                                    <td>
                                        <h4 style="text-align: center;"><?php echo $mostrar['nombre']; ?> </h4>
                                    </td>
                                    <td>
                                        <p style="text-align: center;"><small class="text-muted"><?php echo $mostrar['fecha']; ?></small></p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;"><small class="text-muted"><?php echo $mostrar['hora_inicio']; ?></small></p>
                                    </td>

                                    <td>
                                        <p style="text-align: center;"><small class="text-muted"><?php echo $mostrar['hora_termino']; ?></small></p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;"><small class="text-muted"><?php echo $mostrar['lugar']; ?></small></p>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" style="text-align: center;" role="group">
                                            <a class="btn btn-secondary" style="color:seagreen;" href="../dashboard/modificarN.php?id=<?php echo $mostrar['id']; ?>"><i class="bi bi-pencil"></i></a>
                                            <a class="btn btn-danger" href="../database/noticias/eliminar.php"><i class="bi bi-x-circle"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>

<?php include_once fromroot($file, "include/dashboard/footer.php", TRUE); ?>

</html>