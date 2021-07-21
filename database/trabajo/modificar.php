<?php
session_start();
$file = __FILE__;
include_once "../../include/functions.php";
include_once "../../config/config.php";


$id = $_POST['id'];

if (!empty($_FILES['img'])){
	$errors = array();
	$file_name = $_FILES['img']['name'];
	$file_size = $_FILES['img']['size'];
	$file_tmp = $_FILES['img']['tmp_name'];
	$file_type = $_FILES['img']['type'];
	$file_ext = strtolower(end(explode('.', $_FILES['img']['name'])));
	$file_path = wp_normalize_path($_SESSION['root']."/img/upload/trabajos/").$file_name;

	$extensions = array("jpeg", "jpg", "png");

	if (in_array($file_ext, $extensions) === false) {
		$errors[] = "extension not allowed, please choose a JPEG or PNG file.";
	}

	if (empty($errors) == true) {
		copy($file_tmp, $file_path);
		$image = "img/upload/trabajos/" . $file_name;
		$sql = "UPDATE `trabajos` SET `img_path` = '{$image}' WHERE `trabajos`.`id` = {$id};";
		$result = $conexion->query($sql);
	} else {
		$errors[] = "No se pudo subir la imagen";
	}
	
}

$sql = 'UPDATE trabajos SET cargo = \'%s\', empresa =  \'%s\',descripcion =\'%s\',ciudad =\'%s\' WHERE id = %s';
$sql = sprintf($sql, $_POST['cargo'], $_POST['empresa'],$_POST['descripcion'],$_POST['ciudad'], $id);
$result = $conexion->query($sql);

header(sprintf('Location:%s', fromroot($file, "dashboard/AdminGestorBT.php", True)));
?>