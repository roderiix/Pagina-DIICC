<!DOCTYPE html>
<html lang="es">
<?php
session_start();
$file = __FILE__;
include_once "../include/functions.php";
include_once "../config/config.php";
include_once "../include/dashboard/head.php";
?>
<body>
    <div class="container-contenido">
        <?php include_once "../include/dashboard/header.php";?>
        <div class="capa"></div>
        <!--	--------------->
        <?php include_once "../include/dashboard/navbar.php";?>
        <div class="fondo">
            <img src="../img/dpto/dpto.jpg" alt="">
        </div>
        <div class="container-center rounded">
            <section class="seccion">
                <div class="container-Noticias">
                    <div class="container-boton">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcourse-modal">Añadir Noticias</button>
                    </div>
                    <table class="table">
                        <thead style="background-color: steelblue;">
                            <tr style="height: 40px;">
                                <th scope="col">Imagen</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Fecha de publicacion</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                            $sql = "select * from noticias ORDER BY id DESC"; // mejorar query falta nombre del que subio la noticia
                            $resultado = mysqli_query($conexion, $sql);
                            while ($mostrar = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><img style="width: 150px; height: 150px; padding-left:25px;" src="data:image/jpg;base64,<?php echo base64_encode($mostrar["imagen"]); ?>"></td>
                                    <td>
                                        <h4 style="text-align: center;"><?php echo $mostrar['titulo']; ?> </h4>
                                    </td>
                                    <td>
                                        <p style="text-align: center;"><small class="text-muted"><?php echo $mostrar['fecha']; ?></small></p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;"><small class="text-muted"><?php echo "Autor: ", $mostrar['correo']; ?></small></p>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" style="text-align: center;" role="group">
                                            <a class="btn btn-secondary"style="color:seagreen;" href="../dashboard/modificarN.php?id=<?php echo $mostrar['id']; ?>"><i class="bi bi-pencil"></i></a>
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

<script src=<?php echo fromroot($file, "js/vendor/jquery-1.12.0.min.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/bootstrap.min.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/jquery.meanmenu.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/jquery.magnific-popup.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/ajax-mail.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/owl.carousel.min.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/jquery.mb.YTPlayer.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/jquery.nicescroll.min.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/plugins.js"); ?>></script>
<script src=<?php echo fromroot($file, "js/main.js"); ?>></script>

</html>