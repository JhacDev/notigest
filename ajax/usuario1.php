<?php 

session_start();

require_once "../modelos/Usuario.php";

$datos = new Usuario();

$id_usuario = isset($_POST['id_usuario']) ? limpiarCadena($_POST['id_usuario']):"";
$tipodocidentidad = isset($_POST['tipodocidentidad']) ? limpiarCadena($_POST['tipodocidentidad']):"";
$numdoc_usuario = isset($_POST['numdoc_usuario']) ? limpiarCadena($_POST['numdoc_usuario']):"";
$apenom_usuario = isset($_POST['apenom_usuario']) ? limpiarCadena($_POST['apenom_usuario']):"";
$numtele_usuario = isset($_POST['numtele_usuario']) ? limpiarCadena($_POST['numtele_usuario']):"";
$email_usuario = isset($_POST['email_usuario']) ? limpiarCadena($_POST['email_usuario']):"";
$tipousuario = isset($_POST['tipousuario']) ? limpiarCadena($_POST['tipousuario']):"";
$red = isset($_POST['red']) ? limpiarCadena($_POST['red']):"";
$usuario_sistema = isset($_POST['usuario_sistema']) ? limpiarCadena($_POST['usuario_sistema']):"";
$password_sistema = isset($_POST['password_sistema']) ? limpiarCadena($_POST['password_sistema']):"";
$estado = isset($_POST['estado']) ? limpiarCadena($_POST['estado']):"";

switch ($_GET['op']) {
	/*===========================================================
	=            Caso para guardar o editar registro            =
	===========================================================*/	
	case 'guardaryeditar':
	if (empty($id_usuario)){
		$rspta = $datos->insertarUsuario($tipodocidentidad, $numdoc_usuario, strtoupper($apenom_usuario), $numtele_usuario, $email_usuario, $tipousuario, $red, $usuario_sistema, $password_sistema);
		echo $rspta ? "Usuario al sistema registrado correctamente." : "Usuario al sistema no se pudo registrar";
	}else {
		$rspta = $datos->editarUsuario($id_usuario, $tipodocidentidad, $numdoc_usuario, strtoupper($apenom_usuario), $numtele_usuario, $email_usuario, $tipousuario, $red, $usuario_sistema, $password_sistema);
		echo $rspta ? "Usuario al sistema actualizado correctamente" : "Usuario al sistema no se pudo actualizar";
	}
	break;

	/*=====================================================
	=            Caso para desactivar registro            =
	=====================================================*/	
	case 'modificarpassword':
	$rspta = $datos->modificarUsuario($id_usuario, $password_nueva);
	echo $rspta ? "Contraseña modificado correctamente" : "Contraseña no se pudo modificar";
	break;

	/*=====================================================
	=            Caso para desactivar registro            =
	=====================================================*/	
	case 'desactivar':
	$rspta = $datos->desactivarUsuario($id_usuario);
	echo $rspta ? "Usuario al sistema desactivado correctamente" : "Usuario al sistema no se pudo desactivar";
	break;

	/*==================================================
	=            Caso para activar registro            =
	==================================================*/
	case 'activar':
	$rspta = $datos->activarUsuario($id_usuario);
	echo $rspta ? "Usuario al sistema activado correctamente." : "Usuario al sistema no se pudo activar.";
	break;

	/*==================================================
	=            Caso para mostrar registro            =
	==================================================*/	
	case 'mostrar':
	$rspta = $datos->mostrarUsuario($id_usuario);
	echo json_encode($rspta);
	break;

	/*==================================================
	=            Caso para listar registros            =
	==================================================*/
	case 'listar':
	$rspta = $datos->listarUsuario();
	$data = Array();

	while ($reg = $rspta->fetch_object()) {
		$data[] = array(
			"0"	=>	($reg->estado) ? '<button class="btn btn-success btn-xs" onclick="Mostrar('.$reg->id_usuario.')"><i class="fas fa-pencil-alt"></i></button>'.' <button class="btn btn-primary btn-xs" onclick="Activar('.$reg->id_usuario.')"><i class="fas fa-check"></i></button>'
			:
			'<button class="btn btn-success btn-xs" onclick="Mostrar('.$reg->id_usuario.')"><i class="fas fa-pencil-alt"></i></button>'.' <button class="btn btn-danger btn-xs" onclick="Desactivar('.$reg->id_usuario.')"><i class="fas fa-window-close"></i></button>',
			"1"	=>	$reg->tipodocidentidad,
			"2"	=>	$reg->numdoc_usuario,
			"3"	=>	$reg->apenom_usuario,
			"4"	=>	$reg->red,
			"5"	=>	$reg->tipousuario,
			"6"	=>	$reg->usuario_sistema,
			"7"	=>	($reg->estado) ? '<span class="badge bg-danger">Desactivado</span>' : '<span class="badge bg-success">Activado</span>'
		);
	}
	$results = array(
		"sEcho" => 1,
		"iTotalRecords" => count($data),
		"iTotalDisplayRecords" => count($data),
		"aaData" => $data
	);

	echo json_encode($results);
	break;

	/*================================================================================
	=            Caso para selecccionar el tipo de documento de identidad            =
	================================================================================*/
	case 'select_tipodoc':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "DNI">DNI</option>
	<option value = "CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>';
	break;

	/*=================================================================
	=            Caso para selecccionar el tipo de usuario            =
	=================================================================*/
	case 'select_tipousu':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "ADMINISTRADOR">ADMINISTRADOR</option>
	<option value = "REDES">REDES</option>
	<option value = "USUARIO">USUARIO</option>';
	break;

	/*=================================================================
	=            Caso para selecccionar las redes de salud            =
	=================================================================*/
	case 'select_redsalud':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "AZANGARO">AZANGARO</option>
	<option value = "CARABAYA">CARABAYA</option>
	<option value = "CHUCUITO">CHUCUITO</option>
	<option value = "HUANCANE">HUANCANE</option>
	<option value = "ILAVE">ILAVE</option>
	<option value = "LAMPA">LAMPA</option>
	<option value = "MELGAR">MELGAR</option>
	<option value = "PUNO">PUNO</option>
	<option value = "SAN ROMAN">SAN ROMAN</option>
	<option value = "SANDIA">SANDIA</option>
	<option value = "YUNGUYO">YUNGUYO</option>
	<option value = "TODOS">TODOS</option>';
	break;

	/*=============================================================================
	=            Caso para buscar el documento de identidad de usuario            =
	=============================================================================*/	
	case 'buscar_dni_usuario':
	$rspta = $datos->buscarUsuario($tipodocidentidad, $numdoc_usuario);
	$data = Array();

	while($reg = $rspta->fetch_object()){
		echo json_encode($reg);
	}
	break;

	case 'busqueda_dni_usuario':
	$rspta = $datos->busquedaUsuario($tipodocidentidad, $numdoc_usuario);
	$data = Array();

	while($reg = $rspta->fetch_object()){
		echo json_encode($reg);
	}
	break;

	/*========================================================================
	=            Caso para verificar el ingreso del Administrador            =
	========================================================================*/
	case 'verificarUserAdministrador':
	$logina = $_POST['logina'];
	$clavea = $_POST['clavea'];
	$tipousuario = 'ADMINISTRADOR';

	$rspta = $datos->verificarUserAdministrador($logina, $clavea, $tipousuario);
	$fetch = $rspta->fetch_object();

	if (isset($fetch)) {
		$_SESSION['id_usuario'] = $fetch->id_usuario;
		$_SESSION['tipodocidentidad'] = $fetch->tipodocidentidad;
		$_SESSION['numdoc_usuario'] = $fetch->numdoc_usuario;
		$_SESSION['apenom_usuario'] = $fetch->apenom_usuario;
		$_SESSION['numtele_usuario'] = $fetch->numtele_usuario;
		$_SESSION['email_usuario'] = $fetch->email_usuario;
		$_SESSION['tipousuario'] = $fetch->tipousuario;
		$_SESSION['red'] = $fetch->red;
		$_SESSION['usuario_sistema'] = $fetch->usuario_sistema;
		$_SESSION['estado_usuario'] = $fetch->estado_usuario;
	}

	echo json_encode($fetch);
	break;

	/*========================================================================
	=            Caso para verificar el ingreso del Usuario Red            =
	========================================================================*/
	case 'verificarUserRed':
		$logina = $_POST['logina'];
		$clavea = $_POST['clavea'];
		$tipousuario = 'REDES';
	
		$rspta = $datos->verificarUserRed($logina, $clavea, $tipousuario);
		$fetch = $rspta->fetch_object();
	
		if (isset($fetch)) {
			$_SESSION['id_usuario'] = $fetch->id_usuario;
			$_SESSION['tipodocidentidad'] = $fetch->tipodocidentidad;
			$_SESSION['numdoc_usuario'] = $fetch->numdoc_usuario;
			$_SESSION['apenom_usuario'] = $fetch->apenom_usuario;
			$_SESSION['numtele_usuario'] = $fetch->numtele_usuario;
			$_SESSION['email_usuario'] = $fetch->email_usuario;
			$_SESSION['tipousuario'] = $fetch->tipousuario;
			$_SESSION['red'] = $fetch->red;
			$_SESSION['usuario_sistema'] = $fetch->usuario_sistema;
			$_SESSION['estado_usuario'] = $fetch->estado_usuario;
		}
	
		echo json_encode($fetch);
		break;
	

	/*==================================================================
	=            Caso para verificar el ingreso del Usuario            =
	==================================================================*/
	case 'verificarUserUsuario':
	$logina = $_POST['logina'];
	$clavea = $_POST['clavea'];
	$tipousuario = 'USUARIO';

	$rspta = $datos->verificarUserUsuario($logina, $clavea, $tipousuario);
	$fetch = $rspta->fetch_object();

	if (isset($fetch)) {
		$_SESSION['id_usuario'] = $fetch->id_usuario;
		$_SESSION['tipodocidentidad'] = $fetch->tipodocidentidad;
		$_SESSION['numdoc_usuario'] = $fetch->numdoc_usuario;
		$_SESSION['apenom_usuario'] = $fetch->apenom_usuario;
		$_SESSION['numtele_usuario'] = $fetch->numtele_usuario;
		$_SESSION['email_usuario'] = $fetch->email_usuario;
		$_SESSION['tipousuario'] = $fetch->tipousuario;
		$_SESSION['red'] = $fetch->red;
		$_SESSION['usuario_sistema'] = $fetch->usuario_sistema;
		$_SESSION['estado_usuario'] = $fetch->estado_usuario;
	}

	echo json_encode($fetch);
	break;
	
	/*===============================================
	=            Caso para cerrar sesión            =
	===============================================*/
	case 'cerrarSesion':
	// Limpiampos las variables de sesión
	session_unset();
	// Destruimos la sesión
	session_destroy();
	// Redireccionamos a index
	header("Location: ../index.php");
	break;

}

?>