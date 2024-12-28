<?php 

// Si la cantidad de sessiones es menor que 1, iniciamos la sesion
if (strlen(session_id()) < 1) 
	session_start();

require_once "../modelos/Registro.php";

$datos = new Registro();

$id_registro = isset($_POST['id_registro']) ? limpiarCadena($_POST['id_registro']):"";
$red = isset($_POST['red']) ? limpiarCadena($_POST['red']):"";
$microred = isset($_POST['microred']) ? limpiarCadena($_POST['microred']):"";
$cod_ipress = isset($_POST['cod_ipress']) ? limpiarCadena($_POST['cod_ipress']):"";
$ipress = isset($_POST['ipress']) ? limpiarCadena($_POST['ipress']):"";
$categoria = isset($_POST['categoria']) ? limpiarCadena($_POST['categoria']):"";
$se = isset($_POST['se']) ? limpiarCadena($_POST['se']):"";
$fecha_atencion = isset($_POST['fecha_atencion']) ? limpiarCadena($_POST['fecha_atencion']):"";
$ape_paterno = isset($_POST['ape_paterno']) ? limpiarCadena($_POST['ape_paterno']):"";
$ape_materno = isset($_POST['ape_materno']) ? limpiarCadena($_POST['ape_materno']):"";
$nombres = isset($_POST['nombres']) ? limpiarCadena($_POST['nombres']):"";
$num_documento = isset($_POST['num_documento']) ? limpiarCadena($_POST['num_documento']):"";
$fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? limpiarCadena($_POST['fecha_nacimiento']):"";
$edad = isset($_POST['edad']) ? limpiarCadena($_POST['edad']):"";
$fum = isset($_POST['fum']) ? limpiarCadena($_POST['fum']):"";
$fpp = isset($_POST['fpp']) ? limpiarCadena($_POST['fpp']):"";
$eg_captada = isset($_POST['eg_captada']) ? limpiarCadena($_POST['eg_captada']):"";
$cel_gestfamiliar = isset($_POST['cel_gestfamiliar']) ? limpiarCadena($_POST['cel_gestfamiliar']):"";
$direccion = isset($_POST['direccion']) ? limpiarCadena($_POST['direccion']):"";
$hb_ajustado = isset($_POST['hb_ajustado']) ? limpiarCadena($_POST['hb_ajustado']):"";
$grupo_sanguineo = isset($_POST['grupo_sanguineo']) ? limpiarCadena($_POST['grupo_sanguineo']):"";
$factor_rh = isset($_POST['factor_rh']) ? limpiarCadena($_POST['factor_rh']):"";
$factor_riesgo = isset($_POST['factor_riesgo']) ? limpiarCadena($_POST['factor_riesgo']):"";
$tamizaje_vif = isset($_POST['tamizaje_vif']) ? limpiarCadena($_POST['tamizaje_vif']):"";
$eg_actual = isset($_POST['eg_actual']) ? limpiarCadena($_POST['eg_actual']):"";
$fecha_termino = isset($_POST['fecha_termino']) ? limpiarCadena($_POST['fecha_termino']):"";
$termino = isset($_POST['termino']) ? limpiarCadena($_POST['termino']):"";
$lugar_termino = isset($_POST['lugar_termino']) ? limpiarCadena($_POST['lugar_termino']):"";
$obs_red = isset($_POST['obs_red']) ? limpiarCadena($_POST['obs_red']):"";
$obs_diresa = isset($_POST['obs_diresa']) ? limpiarCadena($_POST['obs_diresa']):"";
$responsable_atencion = isset($_POST['responsable_atencion']) ? limpiarCadena($_POST['responsable_atencion']):"";

$numdoc_usuario = $_SESSION['numdoc_usuario'];
$descripcion_red = $_SESSION['red'];
$id_usuario = $_SESSION['id_usuario'];

switch ($_GET['op']) {
	/*===========================================================
	=            Caso para guardar o editar registro            =
	===========================================================*/	
	case 'guardaryeditar':
	if (empty($id_registro)){
		$rspta = $datos->insertarNotigest(strtoupper($red), strtoupper($microred), $cod_ipress, strtoupper($ipress), $categoria, $se, $fecha_atencion, strtoupper($ape_paterno), strtoupper($ape_materno), strtoupper($nombres), $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, strtoupper($direccion), $hb_ajustado, $grupo_sanguineo, $factor_rh, $factor_riesgo, strtoupper($tamizaje_vif), $eg_actual, $fecha_termino, $termino, $lugar_termino, strtoupper($obs_red), strtoupper($obs_diresa), $id_usuario);
		echo $rspta ? "Los datos se registraron correctamente." : "Los datos no se pudieron registrar";
	}else {
		$rspta = $datos->editarNotigest($id_registro, strtoupper($red), strtoupper($microred), $cod_ipress, strtoupper($ipress), $categoria, $se, $fecha_atencion, strtoupper($ape_paterno), strtoupper($ape_materno), strtoupper($nombres), $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, strtoupper($direccion), $hb_ajustado, $grupo_sanguineo, $factor_rh, $factor_riesgo, strtoupper($tamizaje_vif), $eg_actual, $fecha_termino, $termino, $lugar_termino, strtoupper($obs_red), strtoupper($obs_diresa));
		echo $rspta ? "Los datos se actualizaron correctamente" : "Los datos no se pudieron actualizar";
	}
	break;

	/*==================================================
	=            Caso para mostrar registro            =
	==================================================*/	
	case 'mostrar':
	$rspta = $datos->mostrarNotigest($id_registro);
	echo json_encode($rspta);
	break;

	/*=======================================================
	=            Caso para listar registros Por Usuario    =
	========================================================*/
	case 'listar':
	
	$rspta = $datos->listarNotigestUser($numdoc_usuario);
	$data = Array();

	while ($reg = $rspta->fetch_object()) {
		$data[] = array(
			"0"	=>	'<button class="btn btn-success btn-xs" onclick="Mostrar('.$reg->id_registro.')"><i class="fas fa-pencil-alt"></i></button>',
			"1"	=>	$reg->red,
			"2"	=>	$reg->microred,
			"3"	=>	$reg->cod_ipress.' - '.$reg->ipress.' "'.$reg->categoria.'"',
			"4"	=>	$reg->se,
			"5"	=>	$reg->fecha_atencion,
			"6"	=>	$reg->ape_paterno.' '.$reg->ape_materno.' '.$reg->nombres,
			"7"	=>	$reg->num_documento,
			"8"	=>	$reg->fecha_nacimiento,
			"9"	=>	$reg->edad,
			"10"=>	$reg->fum,
			"11"=>	$reg->fpp,
			"12" =>	$reg->eg_captada,
			"13" =>	$reg->cel_gestfamiliar,
			"14" =>	$reg->direccion,
			"15" =>	$reg->hb_ajustado,
			"16" =>	$reg->grupo_sanguineo,
			"17" =>	$reg->factor_rh,
			"18" =>	$reg->factor_riesgo,
			"19" =>	$reg->tamizaje_vif,
			"20" =>	$reg->eg_actual,
			"21" =>	$reg->fecha_termino,
			"22" =>	$reg->termino,
			"23" =>	$reg->lugar_termino,
			"24" =>	$reg->obs_red,
			"25" =>	$reg->obs_diresa,
			"26" =>	$reg->numdoc_usuario,
			"27" =>	$reg->apenom_usuario,
			"28" =>	$reg->numtele_usuario,
			
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

	/*==============================================================
	=            Caso para selecccionar la red de salud            =
	==============================================================*/
	case 'select_redsalud':
	/*
	$rspta = $datos->listarRedSalud($descripcion_red);
	//echo '<option value=0>SELECCIONE</option>';
	while ($reg = $rspta->fetch_object()) {
		echo '<option value="'.$reg->id_red.'">'.$reg->descripcion_red.'</option>';
	}
	break;
	*/
	$rspta = $datos->listarRedSalud($descripcion_red);
	echo json_encode($rspta);
	break;

	/*===========================================================
	=            Caso para selecccionar la categoria            =
	===========================================================*/
	case 'select_categoriaipress':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "NO TIENE">NO TIENE</option>
	<option value = "I-1">I-1</option>
	<option value = "I-2">I-2</option>
	<option value = "I-3">I-3</option>
	<option value = "I-4">I-4</option>
	<option value = "II-1">II-1</option>
	<option value = "II-2">II-2</option>
	<option value = "II-3">II-3</option>
	<option value = "III-1">III-1</option>
	<option value = "III-2">III-2</option>';
	break;

	/*=================================================================
	=            Caso para selecccionar el tamizaje de VIF            =
	=================================================================*/
	case 'select_tamizajevif':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "NEGATIVO">NEGATIVO</option>
	<option value = "POSITIVO">POSITIVO</option>';
	break;

	/*=================================================================
	=            Caso para selecccionar el grupo sanguineo            =
	=================================================================*/
	case 'select_gruposanguineo':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "A">A</option>
	<option value = "B">B</option>
	<option value = "AB">AB</option>
	<option value = "O">O</option>';
	break;

	/*===========================================================
	=            Caso para selecccionar el factor RH            =
	===========================================================*/
	case 'select_factorrh':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "+">+</option>
	<option value = "-">-</option>';
	break;

	/*=========================================================
	=            Caso para selecccionar el termino            =
	=========================================================*/
	case 'select_termino':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "ABORTO">ABORTO</option>
	<option value = "PARTO">PARTO</option>
	<option value = "CESAREA">CESAREA</option>';
	break;

	/*==================================================================
	=            Caso para selecccionar el lugar de termino            =
	==================================================================*/
	case 'select_lugartermino':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "INSTITUCIONAL">INSTITUCIONAL</option>
	<option value = "DOMICILIARIO">DOMICILIARIO</option>
	<option value = "PRIVADO">PRIVADO</option>';
	break;

	/*==================================================================
	=            Caso para selecccionar el factor de riesgo            =
	==================================================================*/
	case 'select_factorriesgo':
	echo '<option value = 0>SELECCIONE</option>
	<option value = "ABORTO">ABORTO</option>
	<option value = "DIABETES">DIABETES</option>
	<option value = "HIPERTENSION">HIPERTENSION</option>
	<option value = "ANTECEDENTES PREECLAMPSIA">ANTECEDENTES PREECLAMPSIA</option>
	<option value = "ANEMIA">ANEMIA</option>
	<option value = "MULTIPARIDAD">MULTIPARIDAD</option>
	<option value = "CESAREAS ANTERIORES">CESAREAS ANTERIORES</option>
	<option value = "PLACENTA PREVIA">PLACENTA PREVIA</option>
	<option value = "PERIODO INTERGENESICO CORTO">PERIODO INTERGENESICO CORTO</option>
	<option value = "PERIODO INTERGENESICO LARGO">PERIODO INTERGENESICO LARGO</option>
	<option value = "EMBARAZO MULTIPLE">EMBARAZO MULTIPLE</option>
	<option value = "TALLA BAJA">TALLA BAJA</option>
	<option value = "OBESIDAD">OBESIDAD</option>
	<option value = "INFECCION DE TRACTO URINARIO">INFECCION DE TRACTO URINARIO</option>
	<option value = "TRANSTORNO MENTAL">TRANSTORNO MENTAL</option>
	<option value = "ALGUN TIPO DE PATOLOGIA">ALGUN TIPO DE PATOLOGIA</option>
	<option value = "INFECCION DE TRANSMISION SEXUAL">INFECCION DE TRANSMISION SEXUAL</option>
	<option value = "NINGUNA">NINGUNA</option>';
	break;

	/*================================================================================
	=            Caso para listar todas las microredes segun red de salud            =
	================================================================================*/
	case 'select_listarMicroredsegunRedes':
	$rspta = $datos->listarMicroredsegunRedes($red);
	echo '<option value=0>SELECCIONE</option>';
	while ($reg = $rspta->fetch_object()) {
		echo '<option value="'.$reg->descripcion_microred.'">'.$reg->descripcion_microred.'</option>';
	}
	break;

	/*==================================================================================
	=            Caso para listar todas las ipress segun microred de salud            =
	==================================================================================*/
	case 'select_listarIpresssegunMicrored':
	$rspta = $datos->listarIpresssegunMicrored($microred);
	echo '<option value=0>SELECCIONE</option>';
	while ($reg = $rspta->fetch_object()) {
		echo '<option value="'.$reg->descripcion_ipress.'">'.$reg->descripcion_ipress.'</option>';
	}
	break;

	/*======================================================================================================
	=            Caso para listar el codigo renaes y la cateegoria segun la ipress seleccionada            =
	======================================================================================================*/
	case 'select_listarCodRenaesCategoriasegunIpress':
	$rspta = $datos->listarCodRenaesCategoriasegunIpress($ipress);
	echo json_encode($rspta);
	break;
	
	/*=================================================================================
	=            Caso para buscar el documento de identidad de la paciente            =
	=================================================================================*/	
	case 'buscar_numdocumento':
	$rspta = $datos->buscarPaciente($num_documento);
	$data = Array();

	while($reg = $rspta->fetch_object()){
		echo json_encode($reg);
	}
	break;

	case 'busqueda_numdocumento':
	$rspta = $datos->busquedaPaciente($num_documento);
	$data = Array();

	while($reg = $rspta->fetch_object()){
		echo json_encode($reg);
	}
	break;

	/*=================================================================================
	=            Caso para buscar la Semana Epidemiologica de Captacion de Gestante          =
	=================================================================================*/	
	case 'buscar_fechacaptacion':
		$rspta = $datos->buscarFechaSemana($fecha_atencion);
		$data = Array();
	
		while($reg = $rspta->fetch_object()){
			echo json_encode($reg);
		}
		break;

}

?>