<?php

require "../config/Conexion.php";

class Reporte_Notigest
{
	/*=========================================================
	=            Implementamos nuestro constructor            =
	=========================================================*/
	function __construct() {}

	/*===========================================================================
	=            Metodo para mostrar el reporte general del notigest            =
	===========================================================================*/
	public function listarRptGeneralNotigestDiresa()
	{
		$sql = "SELECT rn.id_registro, rn.red, rn.microred, rn.cod_ipress, rn.ipress, rn.categoria, rn.se, rn.fecha_atencion, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.num_documento, rn.fecha_nacimiento, rn.edad, rn.fum, rn.fpp, rn.eg_captada, rn.cel_gestfamiliar,rn.departamento,rn.provincia,rn.distrito,rn.centro_poblado,rn.altitud, rn.direccion, rn.hb_ajustado,rn.hb_altitud, rn.grupo_sanguineo, rn.factor_rh, rn.factor_riesgo, rn.tamizaje_vif, rn.eg_actual, IF(rn.fecha_termino <> '', rn.fecha_termino, '') AS fecha_termino, IF(rn.termino <> '', rn.termino, '') AS termino, IF(rn.lugar_termino <> '', rn.lugar_termino, '') AS lugar_termino, rn.obs_red, rn.obs_diresa,  u.numdoc_usuario, u.apenom_usuario, numtele_usuario FROM tb_registro rn 
		INNER JOIN tb_usuario u ON rn.id_usuario = u.id_usuario
		ORDER BY rn.fecha_registro DESC;";
		return ejecutarConsulta($sql);
	}

	/*===========================================================================
	=            Metodo para mostrar el reporte notigest por Red de Salud        =
	===========================================================================*/
	public function listarRptNotigestRed($descripcion_red)
	{
		$sql = "SELECT rn.id_registro, rn.red, rn.microred, rn.cod_ipress, rn.ipress, rn.categoria, rn.se, rn.fecha_atencion, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.num_documento, rn.fecha_nacimiento, rn.edad, rn.fum, rn.fpp, rn.eg_captada, rn.cel_gestfamiliar, u.numtele_usuario, u.email_usuario,rn.departamento,rn.provincia,rn.distrito,rn.centro_poblado,rn.altitud, rn.direccion, rn.hb_ajustado,rn.hb_altitud, rn.grupo_sanguineo, rn.factor_rh, rn.factor_riesgo, rn.tamizaje_vif, rn.eg_actual, IF(rn.fecha_termino <> '', rn.fecha_termino, '') AS fecha_termino, IF(rn.termino <> '', rn.termino, '') AS termino, IF(rn.lugar_termino <> '', rn.lugar_termino, '') AS lugar_termino, rn.obs_red, rn.obs_diresa, rn.fecha_registro, u.numdoc_usuario, u.apenom_usuario, numtele_usuario FROM tb_registro rn 
		INNER JOIN tb_usuario u ON rn.id_usuario = u.id_usuario
		where u.red='$descripcion_red'
		ORDER BY rn.fecha_registro DESC;";
		return ejecutarConsulta($sql);
	}

	/*===================================================================================

	=            Metodo para eliminar registro         =

	===================================================================================*/

	public function EliminarRegistro($id)
	{

		$sql = "DELETE  from tb_registro where id_registro='$id';";

		return ejecutarConsulta($sql);
	}

	/*===================================================

	=            Metodo para editar registro            =

	===================================================*/

	public function editarNotigestRed($id_registro,  $fecha_termino, $termino, $lugar_termino, $obs_red, $obs_diresa)
	{

		$sql = "UPDATE tb_registro SET  fecha_termino = '$fecha_termino', termino = '$termino', lugar_termino = '$lugar_termino', obs_red = '$obs_red', obs_diresa = '$obs_diresa' WHERE id_registro = '$id_registro'";

		return ejecutarConsulta($sql);
	}

	/*================================================================================

	=            Metodo para mostrar los datos de un registro a modificar            =

	================================================================================*/



	public function mostrarNotigest($id_registro)
	{

		$sql = "SELECT rn.*, m.* FROM tb_registro rn

		INNER JOIN tb_microred m ON rn.microred = m.descripcion_microred

		WHERE rn.id_registro = '$id_registro'";

		// $sql = "SELECT * FROM tb_registro WHERE id_registro = '$id_registro';  ";

		return ejecutarConsultaSimpleFila($sql);
	}
}
