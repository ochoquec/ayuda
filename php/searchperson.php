<?php 

include "conexion.php";
$id = $_POST['pdni'];
$query  =mysqli_query($conect, "SELECT * FROM personal WHERE pdni='$id' ");
$result =mysqli_fetch_array($query);

if ($result) {
	

$datos = array(

	0=>$result['papellidos'],
	1=>$result['pnombres'],
	2=>$result['uodenominacion'],
	3=>$result['pcodigo'],
);

echo json_encode($datos);
}else {
	return false;
}
 ?>