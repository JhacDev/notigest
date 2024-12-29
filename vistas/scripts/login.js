$("#logina").focus();



/*========================================================

=            Funcion para Ingresar al sistema            =

========================================================*/

function accesoSistema(){

	logina = $("#logina").val();

	clavea = $("#clavea").val();



	if ($("#logina").val() == "") {

		bootbox.alert({

			message: "Ingrese el usuario para ingresar al sistema.",

			className: 'rubberBand animated',

			onEscape: function () {

				$('.bootbox.modal').modal('hide');            

			}

		}).on('hidden.bs.modal', function(event){

			$("#logina").focus().select();

		});

	}else {

		if ($("#clavea").val() == "") {

			bootbox.alert({

				message: "Ingrese la contraseña para ingresar al sistema.",

				className: 'rubberBand animated',

				onEscape: function () {

					$('.bootbox.modal').modal('hide');            

				}

			}).on('hidden.bs.modal', function(event){

				$("#clavea").focus().select();

			});

		}else {

			bootbox.alert({

				message: "Espere un momento por favor, se empezará ha validar los datos para el ingreso al sistema...",

				className: 'rubberBand animated',

				onEscape: function () {

					$('.bootbox.modal').modal('hide');            

				}

			}).on('hidden.bs.modal', function(event){

				$("#modal_validar").modal({

					backdrop: 'static',

					keyboard: true,

					show: true

				});

				$("#logina").prop('readonly',true);

				$("#clavea").prop('readonly',true);

				validarIngreso();

			});

		}

	}

}



/*====================================================================

=            Funcion para validar el usuario y contraseña            =

====================================================================*/

function validarIngreso() {

	logina = $("#logina").val();

	clavea = $("#clavea").val();



	if ($("#logina").val() == "") {

		bootbox.alert({

			message: "Ingrese el usuario para ingresar al sistema.",

			className: 'rubberBand animated',

			onEscape: function () {

				$('.bootbox.modal').modal('hide');            

			}

		}).on('hidden.bs.modal', function(event){

			$("#logina").focus().select();

		});

	}else {

		if ($("#clavea").val() == "") {

			bootbox.alert({

				message: "Ingrese la contraseña para ingresar al sistema.",

				className: 'rubberBand animated',

				onEscape: function () {

					$('.bootbox.modal').modal('hide');            

				}

			}).on('hidden.bs.modal', function(event){

				$("#clavea").focus().select();

			});

		}else {

			$.post("../ajax/usuario.php?op=verificarUserAdministrador", {"logina" : logina,"clavea" : clavea}, function(data) {

				if (data != "null") {



					bootbox.alert({

						message: "Bienvenido al sistema NOTIGEST - ADMINISTRADOR.",

						className: 'rubberBand animated',

						onEscape: function () {

							$('.bootbox.modal').modal('hide');    							      

						}

					}).on('hidden.bs.modal', function(event){

						$(location).attr("href", "frm_principaladminpanel.php");

					});

				}else {

					$.post("../ajax/usuario.php?op=verificarUserRed", {"logina" : logina,"clavea" : clavea}, function(data) {

						if (data != "null") {



							bootbox.alert({

								message: "Bienvenido al sistema NOTIGEST - REDES.",

								className: 'rubberBand animated',

								onEscape: function () {

									$('.bootbox.modal').modal('hide');    							      

								}

							}).on('hidden.bs.modal', function(event){

								$(location).attr("href", "frm_principalred.php");

							});

						

						}else {

							$.post("../ajax/usuario.php?op=verificarUserUsuario", {"logina" : logina,"clavea" : clavea}, function(data) {

								if (data != "null") {

		

									bootbox.alert({

										message: "Bienvenido al sistema NOTIGEST - USUARIO.",

										className: 'rubberBand animated',

										onEscape: function () {

											$('.bootbox.modal').modal('hide');    							      

										}

									}).on('hidden.bs.modal', function(event){

										$(location).attr("href", "frm_principaluser.php");

									});





								}else {

									bootbox.alert({

										message: "Usuario y/o Password incorrectos",

										className: 'rubberBand animated',

										onEscape: function () {

											$('.bootbox.modal').modal('hide');    							      

										}

									}).on('hidden.bs.modal', function(event){

										$("#logina").prop('readonly',false);

										$("#clavea").prop('readonly',false);

										$("#barra_progreso").hide();

										$("#texto_validado").show();

										$('.progress-bar').css('width','0%');

										$('.progress-bar').text('0%');

										$("#modal_validar").modal("hide");

										$("#logina").val("");

										$("#clavea").val("");

										$("#logina").focus().select();

									});	

								}				

					}); }	});

				}				

			});

		}

	}

}



/*=============================================================================================

=            Funcion para validar el boton enter despues de escribir la contraseña            =

=============================================================================================*/

function validarEnter(e) {

	if (e.keyCode === 13 && !e.shiftKey) {

		e.preventDefault();

		accesoSistema();

	}

}
