<?php 

require "../config/Conexion.php";

class Registro{
	/*=========================================================
	=            Implementamos nuestro constructor            =
	=========================================================*/
	function __construct(){
		
	}
	
	/*=====================================================
	=            Metodo para insertar registro            =
	=====================================================*/
	public function insertarNotigest($red, $microred, $cod_ipress, $ipress, $categoria, $se, $fecha_atencion, $ape_paterno, $ape_materno, $nombres, $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, $direccion, $hb_ajustado, $grupo_sanguineo, $factor_rh, $factor_riesgo, $tamizaje_vif, $eg_actual, $fecha_termino, $termino, $lugar_termino, $obs_red, $obs_diresa, $id_usuario){
		$sql = "INSERT INTO tb_registro (red, microred, cod_ipress, ipress, categoria, se, fecha_atencion, ape_paterno, ape_materno, nombres, num_documento, fecha_nacimiento, edad, fum, fpp, eg_captada, cel_gestfamiliar, direccion, hb_ajustado, grupo_sanguineo, factor_rh, factor_riesgo, tamizaje_vif, eg_actual, fecha_termino, termino, lugar_termino, obs_red, obs_diresa, id_usuario) VALUES ('$red','$microred','$cod_ipress','$ipress','$categoria','$se','$fecha_atencion','$ape_paterno','$ape_materno','$nombres','$num_documento','$fecha_nacimiento','$edad','$fum','$fpp','$eg_captada','$cel_gestfamiliar','$direccion','$hb_ajustado','$grupo_sanguineo','$factor_rh','$factor_riesgo','$tamizaje_vif','$eg_actual','$fecha_termino','$termino','$lugar_termino','$obs_red','$obs_diresa', '$id_usuario')";
		return ejecutarConsulta($sql);
	}

	/*===================================================
	=            Metodo para editar registro            =
	===================================================*/
	public function editarNotigest($id_registro, $red, $microred, $cod_ipress, $ipress, $categoria, $se, $fecha_atencion, $ape_paterno, $ape_materno, $nombres, $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, $direccion, $hb_ajustado, $grupo_sanguineo, $factor_rh, $factor_riesgo, $tamizaje_vif, $eg_actual, $fecha_termino, $termino, $lugar_termino, $obs_red, $obs_diresa){
		$sql = "UPDATE tb_registro SET red = '$red', microred = '$microred', cod_ipress = '$cod_ipress', ipress = '$ipress', categoria = '$categoria', se = '$se', fecha_atencion = '$fecha_atencion', ape_paterno = '$ape_paterno', ape_materno = '$ape_materno', nombres = '$nombres', num_documento = '$num_documento', fecha_nacimiento = '$fecha_nacimiento', edad = '$edad', fum = '$fum', fpp = '$fpp', eg_captada = '$eg_captada', cel_gestfamiliar = '$cel_gestfamiliar', direccion = '$direccion', hb_ajustado = '$hb_ajustado', grupo_sanguineo = '$grupo_sanguineo', factor_rh = '$factor_rh', factor_riesgo = '$factor_riesgo', tamizaje_vif = '$tamizaje_vif', eg_actual = '$eg_actual', fecha_termino = '$fecha_termino', termino = '$termino', lugar_termino = '$lugar_termino', obs_red = '$obs_red', obs_diresa = '$obs_diresa' WHERE id_registro = '$id_registro'";
		return ejecutarConsulta($sql);
	}	

	/*================================================================================
	=            Metodo para mostrar los datos de un registro a modificar            =
	================================================================================*/
	
	public function mostrarNotigest($id_registro){
		$sql = "SELECT rn.*, m.* FROM tb_registro rn
		INNER JOIN tb_microred m ON rn.microred = m.descripcion_microred
		WHERE rn.id_registro = '$id_registro'";
		return ejecutarConsultaSimpleFila($sql);
	}


	/*========================================================
	=            Metodo para listar los registros            =
	========================================================*/
	/*
	public function listarNotigest($descripcion_red){
		$sql = "SELECT lr.*, u.numdoc_usuario, u.apenom_usuario, u.numtele_usuario FROM tb_registro lr
		INNER JOIN tb_usuario u ON lr.id_usuario = u.id_usuario
		WHERE lr.red = '$descripcion_red'
		ORDER BY fecha_registro DESC;";
		return ejecutarConsulta($sql);
	}
	*/
	public function listarNotigestUser($numdoc_usuario){
		$sql = "SELECT lr.*, u.numdoc_usuario, u.apenom_usuario, u.numtele_usuario FROM tb_registro lr
		INNER JOIN tb_usuario u ON lr.id_usuario = u.id_usuario
		WHERE u.numdoc_usuario = '$numdoc_usuario'
		ORDER BY fecha_registro DESC;";
		return ejecutarConsulta($sql);
	}

	/*============================================================
	=            Metodo para listar las redes de salud           =
	============================================================*/
	public function listarRedSalud($descripcion_red){
		$sql = "SELECT * FROM tb_red
		WHERE descripcion_red = '$descripcion_red'";
		return ejecutarConsultaSimpleFila($sql);
	}

	/*===================================================================================
	=            Metodo para buscar el documento de identidad de la paciente            =
	===================================================================================*/
	public function buscarPaciente($num_documento){
		$sql = "SELECT rn.id_registro, rn.num_documento, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.fecha_nacimiento, rn.edad, rn.cel_gestfamiliar, rn.direccion FROM tb_registro rn
		WHERE rn.num_documento = '$num_documento';";
		return ejecutarConsulta($sql);
	}

	public function busquedaPaciente($num_documento){
		$sql = "SELECT rn.id_registro, rn.num_documento, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.fecha_nacimiento, rn.edad, rn.cel_gestfamiliar, rn.direccion FROM tb_registro rn
		WHERE rn.num_documento = '$num_documento';";
		return ejecutarConsulta($sql);
	}

	/*=============================================================================================
	=            Metodo para listar todas las microredes de salud segun redes de salud            =
	=============================================================================================*/
	public function listarMicroredsegunRedes($red) {
		$sql = "SELECT m.id_microred, m.descripcion_microred, r.id_red, r.descripcion_red FROM tb_microred m
		INNER JOIN tb_red r ON m.id_red = r.id_red
		WHERE r.descripcion_red = '$red'
		ORDER BY r.descripcion_red ASC;";
		return ejecutarConsulta($sql);
	}

	/*=====================================================================================
	=            Metodo para listar todas las ipress segun microredes de salud            =
	=====================================================================================*/
	public function listarIpresssegunMicrored($microred) {
		$sql = "SELECT i.id_ipress, i.cod_ipress, i.descripcion_ipress, i.categoria_ipress, i.id_microred, m.descripcion_microred FROM tb_ipress i
		INNER JOIN tb_microred m ON i.id_microred = m.id_microred
		WHERE m.descripcion_microred = '$microred'
		ORDER BY i.descripcion_ipress ASC;";
		return ejecutarConsulta($sql);
	}

	/*========================================================================================================
	=            Metodo para listar el codigo renaes y la cateegoria segun la ipress seleccionada            =
	========================================================================================================*/
	public function listarCodRenaesCategoriasegunIpress($ipress) {
		$sql = "SELECT i.id_ipress, i.cod_ipress, i.descripcion_ipress, i.categoria_ipress FROM tb_ipress i
		WHERE i.descripcion_ipress = '$ipress';";
		return ejecutarConsultaSimpleFila($sql);
	}
	
}

?>