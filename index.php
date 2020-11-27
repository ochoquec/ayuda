<!DOCTYPE html>
<html lang="en">

<head>
	<title>Registro de Solicitudes</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--=============================================================================================== container-login100-->
	<script src="vendor/jquery/icons.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/jquery/jquery2.js"></script>
	<script src="vendor/jquery/jquery2.min.js"></script>


</head>
<?php 
include "php/conexion.php";
 ?>
<body>
	
	<div class="modal-dialog limiter">
		<div class="modal-dialog ">
			<div class="modal-content wrap-login100">
				<div class="modal-header">
				
					 <img style="border-radius:25px;margin-left:-30px;width:400px;" src="images/yanapay.jpg" alt="logo">		
				</div>
				
				

				<form class="login100-form validate-form" id="form_new_solicitud_personal" onsubmit="agregarReg(event)">
					
					<span class="login100-form-title">					
						Reportar Incidencias
					</span>
					<input type="text" name="pcodigo" id="idpcodigo" style="display: none;" >
					<div class="wrap-input100 validate-input" data-validate = "Tu DNI 12345678" >
						<input class="input100" type="text" name="pdni" placeholder="Nº DOC 12345678" maxlength="8" id="pdni" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="row">
						<div class="col-6">

							<input class="form-control" type="text" name="papellidos" id="papellidos" placeholder="Apellidos" readonly required>
						</div>
						<div class="col-6">

							<input class="form-control" type="text" name="pnombres" id="pnombres" placeholder="Nombres" readonly required>

						</div>

					</div>
					<br>
					<?php 
					$query_uorganica=mysqli_query($conect,"SELECT * FROM uorganica");
					//mysqli_close($conect);
					$result_uorganica=mysqli_num_rows($query_uorganica);
					
					?>
					<div class="row ">
						<div class="col-md-12">
							
						<select style="height:50px;"  class="form-control col-md-12" name="uodenominacion" id="uodenominacion" readonly required>
							<?php 
							if ($result_uorganica>0) 
							{

								while ($uorganica=mysqli_fetch_array($query_uorganica))
								{
									?>
									<option value="<?php echo $uorganica['uocodigo'];?>"><?php echo $uorganica['uodenominacion'] ?></option>														
									<?php			  
								}
							}

							?>
						</select>
						</div>
					</div>
					<br>
					<div class="wrap-input100 validate-input" data-validate = "Fundamenta su pedido o Descripción" >
						<input class="input100" type="text" name="smdescripcion" placeholder="Fundamentación del Pedido" maxlength="400" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-weixin" aria-hidden="true"></i>
						</span>
					</div>

<?php
// y si éste ha indicado en alguna cabecera la IP real del usuario.
if (getenv('HTTP_CLIENT_IP')) {
  $ip = getenv('HTTP_CLIENT_IP');
} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
  $ip = getenv('HTTP_X_FORWARDED_FOR');
} elseif (getenv('HTTP_X_FORWARDED')) {
  $ip = getenv('HTTP_X_FORWARDED');
} elseif (getenv('HTTP_FORWARDED_FOR')) {
  $ip = getenv('HTTP_FORWARDED_FOR');
} elseif (getenv('HTTP_FORWARDED')) {
  $ip = getenv('HTTP_FORWARDED');
} else {
  // Método por defecto de obtener la IP del usuario
  // Si se utiliza un proxy, esto nos daría la IP del proxy
  // y no la IP real del usuario
  $ip = $_SERVER['REMOTE_ADDR'];
  ?> 
  		<input style="display: none;" class="form-control" value="<?php echo $ip;?>"  type="text" name="dip" id="dip" placeholder="Nombres" readonly required>
<?php
echo "POR SU SEGURIDAD ESTAMOS REGISTRANDO SU IP: ".$ip;
}

?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							GENERAR TICKET
						</button>
					</div>

					<div class="modal-body text-center p-t-12">
						<span class="#">
							Gobierno Regional Pasco
						</span>
						<a class="#" href="#" data-toggle="modal" data-target="#myModal">
							| Registrarse
						</a>
					</div>

					
				</form>
				<div id="mensaje">

				</div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/jquery/icons.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/jquery/jquery2.js"></script>
	<script src="vendor/jquery/jquery2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Nuevo Registro</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<form class="validate-form" id="form_new_personal" onsubmit="agregarnewy(event)">
				<div class="modal-body">
					
					<div class="wrap-input100 validate-input" data-validate = "Tu DNI 12345678" >
						<input class="input100 validate-input" type="text" name="rpdni" placeholder="Nº DOC 12345678" maxlength="8" id="rpdni">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>
					<div class="row">
						<div class="col-6">

							<input class="form-control" type="text" name="rpapellidos" id="rpapellidos" placeholder="Apellidos"  required>
						</div>
						<div class="col-6">

							<input class="form-control" type="text" name="rpnombres" id="rpnombres" placeholder="Nombres"  required>

						</div>

					</div>

					<div class="row m-t-20" >
						<div class="col-6">
 
							<input class="form-control" maxlength="9" type="text" name="telefono" id="telefono" placeholder="Celular"  required>
						</div>


					</div>
					<br>
					<?php 
					$query_uorganica=mysqli_query($conect,"SELECT * FROM uorganica");
					mysqli_close($conect);
					$result_uorganica=mysqli_num_rows($query_uorganica);
					
					?>
					<div class="row ">
						<div class="col-md-12">
							
						<select style="height:50px;" class="form-control col-md-12" name="ruodenominacion" id="ruodenominacion" readonly required>
							<option value="">-- Seleccione---</option>
							<?php 
							if ($result_uorganica>0) 
							{

								while ($uorganica=mysqli_fetch_array($query_uorganica))
								{
									?>
									<option value="<?php echo $uorganica['uocodigo'];?>"><?php echo $uorganica['uodenominacion'] ?></option>														
									<?php			  
								}
							}

							?>
						</select>
						</div>
						<div id="mensajepersonla"></div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success" >Guardar</button>
				</div>
			</form>

			</div>
		</div>
	</div>

	<script type="text/javascript">

	$("#pdni").on('keypress',function(e) {
	    if(e.which == 13) {
	    	e.preventDefault();
	    	var pdni = $("#pdni").val();
	    	if (pdni.length == 8 ) {
	    		var url = 'php/searchperson.php';
	    		$.ajax({
					type:'POST',
					url:url,
					data:'pdni='+pdni,
					success: function(valores){
						if (valores) {

						var datos = eval(valores);
	    				$("#idpcodigo").val(datos[3])
	    				$("#papellidos").val(datos[0])
	    				$("#pnombres").val(datos[1])
	    				$("#uodenominacion").val(Number(datos[2]))
						}else{
							alert("El personal no esta en muestra Base de Datos")
						}
					}
				});
	    	}else{
	    		alert("DNI erroneo tiene 3 intentos")
	    	}
	    	
	    }
	});


	function agregarReg(e){
		console.log('entro')
		e.preventDefault();
	var url = 'php/addsolicitude.php';
	// var datosform=$('#formulario').serialize();
	var formData = new FormData($('#form_new_solicitud_personal')[0])
	$.ajax({
		type:'POST',
		url:url,
		data:formData,
		cache:false,
		contentType: false,
	    processData: false,
		success: function(registro){

			$('#form_new_solicitud_personal')[0].reset();
			$('#form_new_solicitud_personal').hide(800).delay(3500).show(200);
			$('#mensaje').html('<i class="fas fa-check-circle fa-lg" aria-hidden="true" style="font-size: 30px; color:green"></i><b>Solicitud Enviada!<br>TICKET   N° T00'+registro+'</b>').show(800).delay(3500).hide(200);

			return false;

		}
	});
	return false;
	}

	

	function agregarnewy(e){
		console.log('entro')
		e.preventDefault();
		var url = 'php/addpersonal.php';
	// var datosform=$('#formulario').serialize();
		var formData = new FormData($('#form_new_personal')[0])
		$.ajax({
			type:'POST',
			url:url,
			data:formData,
			cache:false,
			contentType: false,
			processData: false,
			success: function(registro){

				if (registro) {

				$('#form_new_personal')[0].reset();
				
				$('#mensajepersonla').html('<i class="fas fa-check-circle fa-lg" aria-hidden="true" style="font-size: 30px; color:green"></i><b>Se Registro Correctamente!</b>').show(7000).delay(4500).hide(1500);
				 $('#myModal').modal('hide');
				 console.log("ko")
				return false;
				}else{
					alert("Error")
				}

			}
		});
		return false;
	}

	</script>

</body>
<script>
	function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];

}
</script>
</html>