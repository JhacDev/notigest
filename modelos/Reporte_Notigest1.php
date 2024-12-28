<?php 

require "../config/Conexion.php";

class Reporte_Notigest{
	/*=========================================================
	=            Implementamos nuestro constructor            =
	=========================================================*/
	function __construct(){
		
	}
	
	/*===========================================================================
	=            Metodo para mostrar el reporte general del notigest            =
	===========================================================================*/
	public function listarRptGeneralNotigest(){
		$sql = "SELECT rn.id_registro, rn.red, rn.microred, rn.cod_ipress, rn.ipress, rn.categoria, rn.se, rn.fecha_atencion, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.num_documento, rn.fecha_nacimiento, rn.edad, rn.fum, rn.fpp, rn.eg_captada, rn.cel_gestfamiliar, u.numtele_usuario, u.email_usuario, rn.direccion, rn.hb_ajustado, rn.grupo_sanguineo, rn.factor_rh, rn.factor_riesgo, rn.tamizaje_vif, rn.eg_actual, IF(rn.fecha_termino <> '', rn.fecha_termino, '') AS fecha_termino, IF(rn.termino <> '', rn.termino, '') AS termino, IF(rn.lugar_termino <> '', rn.lugar_termino, '') AS lugar_termino, rn.obs_red, rn.obs_diresa, rn.fecha_registro, u.numdoc_usuario, u.apenom_usuario, numtele_usuario FROM tb_registro rn 
		INNER JOIN tb_usuario u ON rn.id_usuario = u.id_usuario
		ORDER BY rn.fecha_registro DESC;";
		return ejecutarConsulta($sql);
	}	
}

?>