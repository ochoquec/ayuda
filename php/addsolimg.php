<?php 

include "conexion.php";

if(!empty($_POST))
{

	$pdni = $_POST['pdni'];
	$pcodigo = $_POST['pcodigo'];
	$uodenominacion = $_POST['uodenominacion'];
	$smdescripcion = $_POST['smdescripcion'];
	$dip = $_POST['dip'];
	$img = $_POST['imagen'];

	$query_insert=mysqli_query($conect,"INSERT INTO solicitudmantenimiento(pcodigo, smdescripcion, img, estatus) VALUES('$pcodigo','$smdescripcion', $img ,'1') ");
	if ($query_insert) {
		$id=mysqli_insert_id($conect);
		echo $id;
	}
	$query_insert_p=mysqli_query($conect,"INSERT INTO ip(pdni, dip) VALUES('$pdni','$dip') ");
	if ($query_insert_p) {
		echo " ";
	}
}


