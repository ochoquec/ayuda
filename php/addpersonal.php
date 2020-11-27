<?php 

include "conexion.php";

if(!empty($_POST))
{
	$pdni = $_POST['rpdni'];
	$papellidos = $_POST['rpapellidos'];
	$pnombres = $_POST['rpnombres'];
	$ptelefono = $_POST['telefono'];
	$uodenominacion = $_POST['ruodenominacion'];

	$query_insert_p=mysqli_query($conect,"INSERT INTO personal(uodenominacion, pdni, papellidos, pnombres,ptelefono ) VALUES('$uodenominacion', '$pdni','$papellidos','$pnombres','$ptelefono') ");
	if ($query_insert_p) {
		echo 'TRUE';
	}else{
		return false;
	}
}
 ?>