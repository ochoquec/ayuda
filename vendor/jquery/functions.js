$(document).ready(function(){





	//cambar password

	$('.newPass').keyup(function(){
		//console.log($(this).val());
		validPass();
	});

	// form cambiar contraseña
	$('#frmChangePass').submit(function(e){
	    e.preventDefault();

	    var passActual = $('#txtPassUser').val();
	    var passNuevo  = $('#txtNewPassUser').val();
	    var confirmPassNuevo = $('#txtPassConfirm').val();
	    var action = "changePassword";

		if (passNuevo != confirmPassNuevo){
			$('.alertChangePass').html('<p style="color:red;">Las contraseñas no son iguales.</p>');
			$('.alertChangePass').slideDown();
			return false;
		}
		if (passNuevo.length < 6){
			$('.alertChangePass').html('<p style="color:red;">La nueva contraseña debe ser 6 caracteres como minimo.</p>');
			$('.alertChangePass').slideDown();
			return false;
		}

		$.ajax({

			url : 'ajax.php',
			type: 'POST',
			async : true,
			data: {action:action,passActual:passActual,passNuevo:passNuevo},

			success: function(response)
			{	//console.log(response);
				if (response != 'error') 
				{
					var info = JSON.parse(response);
					if (info.cod =='00') {
						$('.alertChangePass').html('<p style="color:green;">'+info.msg+'</p>');
						$('#frmChangePass')[0].reset();
					}else{
						$('.alertChangePass').html('<p style="color:red;">'+info.msg+'</p>');
					}
					$('.alertChangePass').slideDown();
			    }
			},
			error:function(error){			
			}
		});		

	});


});// fin de ready

function validPass(){  
	var passNuevo = $('#txtNewPassUser').val();
	var confirmPassNuevo = $('#txtPassConfirm').val();
	if (passNuevo != confirmPassNuevo){
		$('.alertChangePass').html('<p style="color:red;">Las contraseñas no son iguales.</p>');
		$('.alertChangePass').slideDown();
		return false;
	}
	if (passNuevo.length < 6){
		$('.alertChangePass').html('<p style="color:red;">La nueva contraseña debe ser 6 caracteres como minimo.</p>');
		$('.alertChangePass').slideDown();
		return false;
	}
	$('.alertChangePass').html('');
	$('.alertChangePass').slideUp();
		
}


//Modallll
function closeModal(){
		$('.modal').fadeOut();
}
