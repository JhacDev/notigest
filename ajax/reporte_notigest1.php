<?php 

session_start();

require_once "../modelos/Reporte_Notigest.php";

$datos = new Reporte_Notigest();

switch ($_GET['op']) {
	/*========================================================================
	=            Caso para listar el reporte general del notigest            =
	========================================================================*/
	case 'rptgeneralnotigest':
	$rspta = $datos->listarRptGeneralNotigest();
	$data = Array();

	while ($reg = $rspta->fetch_object()) {
		$data[] = array(
			"0"	=>	$reg->red,
			"1"	=>	$reg->microred,
			"2"	=>	$reg->cod_ipress,
			"3"	=>	$reg->ipress,
			"4"	=>	$reg->categoria,
			"5"	=>	$reg->se,
			"6"	=>	$reg->fecha_atencion,
			"7"	=>	$reg->ape_paterno,
			"8"	=>	$reg->ape_materno,
			"9"	=>	$reg->nombres,
			"10" =>	$reg->num_documento,
			"11" =>	$reg->fecha_nacimiento,
			"12" =>	$reg->edad,
			"13" =>	$reg->fum,
			"14" =>	$reg->fpp,
			"15" =>	$reg->eg_captada,
			"16" =>	$reg->cel_gestfamiliar,
			"17" =>	$reg->numtele_usuario,
			"18" =>	$reg->direccion,
			"19" =>	$reg->hb_ajustado,
			"20" =>	$reg->grupo_sanguineo,
			"21" =>	$reg->factor_rh,
			"22" =>	$reg->factor_riesgo,
			"23" =>	$reg->tamizaje_vif,
			"24" =>	$reg->eg_actual,
			"25" =>	$reg->fecha_termino,
			"26" =>	$reg->termino,
			"27" =>	$reg->lugar_termino,
			"28" =>	$reg->obs_red,
			"29" =>	$reg->obs_diresa,
			"30" =>	$reg->numdoc_usuario,
			"31" =>	$reg->apenom_usuario,
			"32" =>	$reg->numtele_usuario

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
}

?>