<?php







// Si la cantidad de sessiones es menor que 1, iniciamos la sesion



if (strlen(session_id()) < 1)



	session_start();







require_once "../modelos/Registro.php";







$datos = new Registro();







$id_registro = isset($_POST['id_registro']) ? limpiarCadena($_POST['id_registro']) : "";



$red = isset($_POST['red']) ? limpiarCadena($_POST['red']) : "";



$microred = isset($_POST['microred']) ? limpiarCadena($_POST['microred']) : "";



$cod_ipress = isset($_POST['cod_ipress']) ? limpiarCadena($_POST['cod_ipress']) : "";



$ipress = isset($_POST['ipress']) ? limpiarCadena($_POST['ipress']) : "";



$categoria = isset($_POST['categoria']) ? limpiarCadena($_POST['categoria']) : "";



$se = isset($_POST['se']) ? limpiarCadena($_POST['se']) : "";



$fecha_atencion = isset($_POST['fecha_atencion']) ? limpiarCadena($_POST['fecha_atencion']) : "";



$ape_paterno = isset($_POST['ape_paterno']) ? limpiarCadena($_POST['ape_paterno']) : "";



$ape_materno = isset($_POST['ape_materno']) ? limpiarCadena($_POST['ape_materno']) : "";



$nombres = isset($_POST['nombres']) ? limpiarCadena($_POST['nombres']) : "";



$num_documento = isset($_POST['num_documento']) ? limpiarCadena($_POST['num_documento']) : "";



$fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? limpiarCadena($_POST['fecha_nacimiento']) : "";



$edad = isset($_POST['edad']) ? limpiarCadena($_POST['edad']) : "";



$fum = isset($_POST['fum']) ? limpiarCadena($_POST['fum']) : "";



$fpp = isset($_POST['fpp']) ? limpiarCadena($_POST['fpp']) : "";



$eg_captada = isset($_POST['eg_captada']) ? limpiarCadena($_POST['eg_captada']) : "";



$cel_gestfamiliar = isset($_POST['cel_gestfamiliar']) ? limpiarCadena($_POST['cel_gestfamiliar']) : "";



// Agregamos variables metodo get

$departamento = isset($_GET['departamento']) ? limpiarCadena($_GET['departamento']) : "";

$departamentoInsert = isset($_POST['departamentoInsert']) ? limpiarCadena($_POST['departamentoInsert']) : "";



$provincia = isset($_GET['provincia']) ? limpiarCadena($_GET['provincia']) : "";

$provinciaInsert = isset($_POST['provinciaInsert']) ? limpiarCadena($_POST['provinciaInsert']) : "";



$distrito = isset($_GET['distrito']) ? limpiarCadena($_GET['distrito']) : "";

$distritoInsert = isset($_POST['distritoInsert']) ? limpiarCadena($_POST['distritoInsert']) : "";



$centro_poblado = isset($_GET['centro_poblado']) ? limpiarCadena($_GET['centro_poblado']) : "";

$centro_poblado = isset($_POST['centro_poblado_texto']) ? limpiarCadena($_POST['centro_poblado_texto']) : "";



$altitud = isset($_POST['altitud']) ? limpiarCadena($_POST['altitud']) : "";



$id_poblado = isset($_GET['id_poblado']) ? limpiarCadena($_GET['id_poblado']) : "";



$id_dist = isset($_GET['id_dist']) ? limpiarCadena($_GET['id_dist']) : "";



$id_pro = isset($_GET['id_pro']) ? limpiarCadena($_GET['id_pro']) : "";



$id_dep = isset($_GET['id_dep']) ? limpiarCadena($_GET['id_dep']) : "";



// fin 

$direccion = isset($_POST['direccion']) ? limpiarCadena($_POST['direccion']) : "";



$hb_ajustado = isset($_POST['hb_ajustado']) ? limpiarCadena($_POST['hb_ajustado']) : "";



$hb_altitud = isset($_POST['hb_altitud']) ? limpiarCadena($_POST['hb_altitud']) : "";



$grupo_sanguineo = isset($_POST['grupo_sanguineo']) ? limpiarCadena($_POST['grupo_sanguineo']) : "";



$factor_rh = isset($_POST['factor_rh']) ? limpiarCadena($_POST['factor_rh']) : "";



$peso = isset($_POST['peso']) ? limpiarCadena($_POST['peso']):"";



$condicion_ges = isset($_POST['condicion_ges']) ? limpiarCadena($_POST['condicion_ges']) : "";



$origen = isset($_POST['origen']) ? limpiarCadena($_POST['origen']) : "";



$factor_riesgo = isset($_POST['factor_riesgo']) ? limpiarCadena($_POST['factor_riesgo']) : "";



$tamizaje_vif = isset($_POST['tamizaje_vif']) ? limpiarCadena($_POST['tamizaje_vif']) : "";



$eg_actual = isset($_POST['eg_actual']) ? limpiarCadena($_POST['eg_actual']) : "";



$fecha_termino = isset($_POST['fecha_termino']) ? limpiarCadena($_POST['fecha_termino']) : "";



$termino = isset($_POST['termino']) ? limpiarCadena($_POST['termino']) : "";



$lugar_termino = isset($_POST['lugar_termino']) ? limpiarCadena($_POST['lugar_termino']) : "";



$obs_red = isset($_POST['obs_red']) ? limpiarCadena($_POST['obs_red']) : "";



$obs_diresa = isset($_POST['obs_diresa']) ? limpiarCadena($_POST['obs_diresa']) : "";



$responsable_atencion = isset($_POST['responsable_atencion']) ? limpiarCadena($_POST['responsable_atencion']) : "";







$numdoc_usuario = $_SESSION['numdoc_usuario'];



$descripcion_red = $_SESSION['red'];



$id_usuario = $_SESSION['id_usuario'];



$microredSession = $_SESSION['id_microred'];







switch ($_GET['op']) {



		/*===========================================================



	=            Caso para guardar o editar registro            =



	===========================================================*/



	case 'guardaryeditar':

		//return var_dump($microred);

		if (empty($id_registro)) {



			$rspta = $datos->insertarNotigest(strtoupper($red), strtoupper($microred), $cod_ipress, strtoupper($ipress), $categoria, $se, $fecha_atencion, strtoupper($ape_paterno), strtoupper($ape_materno), strtoupper($nombres), $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, $departamentoInsert, $provinciaInsert, $distritoInsert, $centro_poblado, $altitud, strtoupper($direccion), $hb_ajustado, $hb_altitud, $grupo_sanguineo, $factor_rh,$peso,$condicion_ges,strtoupper($origen), $factor_riesgo, strtoupper($tamizaje_vif), $eg_actual, $fecha_termino, $termino, $lugar_termino, strtoupper($obs_red), strtoupper($obs_diresa), $id_usuario);



			echo $rspta ? "Los datos se registraron correctamente." : "Los datos no se pudieron registrar";

		} else {



			$rspta = $datos->editarNotigest($id_registro, strtoupper($red), strtoupper($microred), $cod_ipress, strtoupper($ipress), $categoria, $se, $fecha_atencion, strtoupper($ape_paterno), strtoupper($ape_materno), strtoupper($nombres), $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, $departamentoInsert, $provinciaInsert, $distritoInsert, $centro_poblado, $altitud, strtoupper($direccion), $hb_ajustado, $hb_altitud, $grupo_sanguineo, $factor_rh,$peso,$condicion_ges, strtoupper($origen),$factor_riesgo, strtoupper($tamizaje_vif), $eg_actual, $fecha_termino, $termino, $lugar_termino, strtoupper($obs_red), strtoupper($obs_diresa), $id_usuario);



			echo $rspta ? "Los datos se actualizaron correctamente" : "Los datos no se pudieron actualizar";

		}



		break;



		/*==================================================

// CASO PARA OBTENER LA MICRORED

==================================================*/

	case 'showMicroRed':

		$rspta = $datos->showMicroREd($microredSession);



		echo json_encode($rspta);

		break;



/*==================================================

// FIN DEL CASO PARA OBTENER LA MICRORED

==================================================*/



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



		$data = array();







		while ($reg = $rspta->fetch_object()) {



			$data[] = array(



				"0"	=>	'<button class="btn btn-success btn-xs" onclick="Mostrar(' . $reg->id_registro . ')"><i class="fas fa-pencil-alt"></i></button>',



				"1"	=>	$reg->red,



				"2"	=>	$reg->microred,



				"3"	=>	$reg->cod_ipress . ' - ' . $reg->ipress . ' "' . $reg->categoria . '"',



				"4"	=>	$reg->se,



				"5"	=>	$reg->fecha_atencion,



				"6"	=>	$reg->ape_paterno . ' ' . $reg->ape_materno . ' ' . $reg->nombres,



				"7"	=>	$reg->num_documento,



				"8"	=>	$reg->fecha_nacimiento,



				"9"	=>	$reg->edad,



				"10" =>	$reg->fum,



				"11" =>	$reg->fpp,



				"12" =>	$reg->eg_captada,



				"13" =>	$reg->cel_gestfamiliar,



				// agregamos variables



				"14" =>	$reg->departamento,



				"15" =>	$reg->provincia,



				"16" =>	$reg->distrito,



				"17" =>	$reg->centro_poblado,



				"18" =>	$reg->altitud,

				// fin



				"19" =>	$reg->direccion,



				"20" =>	$reg->hb_ajustado,



				"21" =>	$reg->hb_altitud,



				"22" =>	$reg->grupo_sanguineo,



				"23" =>	$reg->factor_rh,



				"24" =>	$reg->peso,



				"25" =>	$reg->condicion_ges,



				"26" =>	$reg->origen,



				"27" =>	$reg->factor_riesgo,



				"28" =>	$reg->tamizaje_vif,



				"29" =>	$reg->eg_actual,



				"30" =>	$reg->fecha_termino,



				"31" =>	$reg->termino,



				"32" =>	$reg->lugar_termino,



				"33" =>	$reg->obs_red,



				"34" =>	$reg->obs_diresa,



				"35" =>	$reg->numdoc_usuario,



				"36" =>	$reg->apenom_usuario,



				"37" =>	$reg->numtele_usuario,







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





		$rspta = $datos->listarRedSalud($descripcion_red);



		echo json_encode($rspta);



		break;



		/*===========================================================



	=            Caso para selecccionar departamentos           =



	===========================================================*/



	case 'select_ListarDepartamentos':





		$rspta = $datos->listarDepartamentos(); // es el resultado de tu consulta



		$data = array();

		$contenido_select = "<option value='00'>SELECCIONE</option>";

		while ($reg = $rspta->fetch_object()) {

			$contenido_select = $contenido_select . "<option value='" . $reg->id_dep . "'>" . $reg->departamento . "</option>";

			// $data[] = array(

			// 	"id" => $reg->id_dep,

			// 	"nombre" => $reg->Departamento,

			// );

		}



		// echo json_encode($data);



		echo $contenido_select;



		break;



		/*===========================================================



	=            Caso para selecccionar provincias           =



	===========================================================*/



	case 'select_ListarProvincia':







		$rspta = $datos->listarProvincias($departamento); // es el resultado de tu consulta



		$data = array();

		$contenido_select = "<option value='00'>SELECCIONE</option>";

		while ($reg = $rspta->fetch_object()) {

			$contenido_select = $contenido_select . "<option value='" . $reg->id_pro . "'>" . $reg->provincia . "</option>";

		}



		echo $contenido_select;



		break;



		/*===========================================================



	=            Caso para selecccionar distritos           =



	===========================================================*/



	case 'listarDistritos':



		$rspta = $datos->listarDistritos($departamento, $provincia); // es el resultado de tu consulta

		$data = array();

		$contenido_select = "<option value='00'>SELECCIONE</option>";

		while ($reg = $rspta->fetch_object()) {

			$contenido_select = $contenido_select . "<option value='" . $reg->id_dist . "'>" . $reg->distrito . "</option>";

		}

		// echo json_encode($data);

		echo $contenido_select;



		break;







		/*===========================================================



	=            Caso para selecccionar centro poblado           =



	===========================================================*/



	case 'listarCentroPoblado':



		$rspta = $datos->listarCentroPobaldo($departamento, $provincia, $distrito); // es el resultado de tu consulta

		$data = array();



		$contenido_select = "<option value='00'>SELECCIONE</option>";

		while ($reg = $rspta->fetch_object()) {

			$contenido_select = $contenido_select . "<option value='" . $reg->id . "'>" . $reg->Centro_poblado . "</option>";

			//return var_dump($contenido_select);

		}

		// echo json_encode($data);

		echo $contenido_select;



		break;



		/*======================================================================================================



	=            Caso para listar el codigo alitud        =



	======================================================================================================*/



	case 'select_listaAltitud':



		$rspta = $datos->listarAltitud($id_poblado, $id_dep, $id_pro, $id_dist);

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



	=            Caso para selecccionar la condicion de la gestante   =



	=================================================================*/



	case 'select_condiciongestante':



		echo '<option value = 0>SELECCIONE</option>



	<option value = "RESIDENTE">RESIDENTE</option>



	<option value = "TRANSEÚNTE">TRANSEÚNTE</option>';



		

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



			echo '<option value="' . $reg->descripcion_microred . '">' . $reg->descripcion_microred . '</option>';

		}



		break;







		/*==================================================================================



	=            Caso para listar todas las ipress segun microred de salud            =



	==================================================================================*/



	case 'select_listarIpresssegunMicrored':



		$rspta = $datos->listarMicroRedId($microredSession);



		echo '<option value=0>SELECCIONE</option>';



		while ($reg = $rspta->fetch_object()) {



			echo '<option value="' . $reg->descripcion_ipress . '">' . $reg->descripcion_ipress . '</option>';

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



		$data = array();







		while ($reg = $rspta->fetch_object()) {



			echo json_encode($reg);

		}



		break;







	case 'busqueda_numdocumento':

		$rspta = $datos->busquedaPaciente($num_documento);

		$data = array();

		while ($reg = $rspta->fetch_object()) {



			echo json_encode($reg);

		}



		break;



		/*=================================================================================



	=            Caso para buscar la Semana Epidemiologica de Captacion de Gestante          =



	=================================================================================*/



	case 'buscar_fechacaptacion':



		$rspta = $datos->buscarFechaSemana($fecha_atencion);

		$data = array();

		while ($reg = $rspta->fetch_object()) {

			echo json_encode($reg);

		}



		break;

}

