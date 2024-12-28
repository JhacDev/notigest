<?php



require "../config/Conexion.php";



class Registro
{

	/*=========================================================

	=            Implementamos nuestro constructor            =

	=========================================================*/

	function __construct() {}



	/*=====================================================

	=            Metodo para insertar registro            =

	=====================================================*/

	public function insertarNotigest($red, $microred, $cod_ipress, $ipress, $categoria, $se, $fecha_atencion, $ape_paterno, $ape_materno, $nombres, $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, $departamento, $provincia, $distrito,$centro_poblado, $altitud, $direccion, $hb_ajustado, $hb_altitud, $grupo_sanguineo, $factor_rh,$peso,$condicion_ges,$origen,$factor_riesgo, $tamizaje_vif, $eg_actual, $fecha_termino, $termino, $lugar_termino, $obs_red, $obs_diresa, $id_usuario)
	{

		$sql = "INSERT INTO tb_registro (red, microred, cod_ipress, ipress, categoria, se, fecha_atencion, ape_paterno, ape_materno, nombres, num_documento, fecha_nacimiento, edad, fum, fpp, eg_captada, cel_gestfamiliar,departamento,provincia,distrito,centro_poblado,altitud,direccion, hb_ajustado,hb_altitud, grupo_sanguineo, factor_rh,peso,condicion_ges, origen,factor_riesgo, tamizaje_vif, eg_actual, fecha_termino, termino, lugar_termino, obs_red, obs_diresa, id_usuario) VALUES ('$red','$microred','$cod_ipress','$ipress','$categoria','$se','$fecha_atencion','$ape_paterno','$ape_materno','$nombres','$num_documento','$fecha_nacimiento','$edad','$fum','$fpp','$eg_captada','$cel_gestfamiliar','$departamento','$provincia','$distrito','$centro_poblado','$altitud','$direccion','$hb_ajustado','$hb_altitud','$grupo_sanguineo','$factor_rh','$peso','$condicion_ges','$origen','$factor_riesgo','$tamizaje_vif','$eg_actual','$fecha_termino','$termino','$lugar_termino','$obs_red','$obs_diresa', '$id_usuario')";

		return ejecutarConsulta($sql);
	}



	/*===================================================

	=            Metodo para editar registro            =

	===================================================*/

	public function editarNotigest($id_registro, $red, $microred, $cod_ipress, $ipress, $categoria, $se, $fecha_atencion, $ape_paterno, $ape_materno, $nombres, $num_documento, $fecha_nacimiento, $edad, $fum, $fpp, $eg_captada, $cel_gestfamiliar, $departamento, $provincia, $distrito, $centro_poblado,$altitud, $direccion, $hb_ajustado, $hb_altitud, $grupo_sanguineo, $factor_rh,$peso,$condicion_ges,$origen, $factor_riesgo, $tamizaje_vif, $eg_actual, $fecha_termino, $termino, $lugar_termino, $obs_red, $obs_diresa)
	{

		$sql = "UPDATE tb_registro SET red = '$red', microred = '$microred', cod_ipress = '$cod_ipress', ipress = '$ipress', categoria = '$categoria', se = '$se', fecha_atencion = '$fecha_atencion', ape_paterno = '$ape_paterno', ape_materno = '$ape_materno', nombres = '$nombres', num_documento = '$num_documento', fecha_nacimiento = '$fecha_nacimiento', edad = '$edad', fum = '$fum', fpp = '$fpp', eg_captada = '$eg_captada', cel_gestfamiliar = '$cel_gestfamiliar', departamento ='$departamento', provincia ='$provincia', distrito='$distrito',centro_poblado='$centro_poblado',altitud='$altitud', direccion = '$direccion',hb_ajustado = '$hb_ajustado',hb_altitud='$hb_altitud', grupo_sanguineo = '$grupo_sanguineo', factor_rh = '$factor_rh', peso='$peso',condicion_ges='$condicion_ges',origen='$origen' ,factor_riesgo = '$factor_riesgo', tamizaje_vif = '$tamizaje_vif', eg_actual = '$eg_actual', fecha_termino = '$fecha_termino', termino = '$termino', lugar_termino = '$lugar_termino', obs_red = '$obs_red', obs_diresa = '$obs_diresa' WHERE id_registro = '$id_registro'";

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

		return ejecutarConsultaSimpleFila($sql);
	}

	public function showMicroREd($id)
	{

		$sql = "SELECT descripcion_microred FROM tb_microred WHERE id_microred = '$id'";

		return ejecutarConsultaSimpleFila($sql);
	}



	public function listarNotigestUser($numdoc_usuario)
	{

		$sql = "SELECT lr.*, u.numdoc_usuario, u.apenom_usuario, u.numtele_usuario FROM tb_registro lr

		INNER JOIN tb_usuario u ON lr.id_usuario = u.id_usuario

		WHERE u.numdoc_usuario = '$numdoc_usuario'

		ORDER BY fecha_registro DESC;";

		return ejecutarConsulta($sql);
	}



	/*============================================================

	=            Metodo para listar las redes de salud           =

	============================================================*/

	public function listarRedSalud($descripcion_red)
	{

		$sql = "SELECT * FROM tb_red

		WHERE descripcion_red = '$descripcion_red'";

		return ejecutarConsultaSimpleFila($sql);
	}

	/*============================================================

	=            Metodo para listar los departamentos  14082024        =

	============================================================*/

	public function listarDepartamentos()
	{

		$sql = "SELECT * FROM tb_departamento ORDER BY departamento ASC";

		return ejecutarConsulta($sql);
	}

	/*============================================================

	=            Metodo para listar los provincia  14082024        =

	============================================================*/

	public function listarProvincias($departamento)
	{

		$sql = "SELECT * FROM `tb_povincia` where id_dep='$departamento' ORDER by provincia;";

		return ejecutarConsulta($sql);
	}
	/*============================================================

	=            Metodo para listar los distritos  14082024        =

	============================================================*/
	public function listarDistritos($departamento, $provincia)
	{

		//$sql = "SELECT * FROM `tb_distrito` where id_pro='$provincia' ORDER by Distrito;";

		$sql = "SELECT * FROM `tb_distrito_act` where id_dep='$departamento' and id_pro='$provincia' ORDER by distrito;";

		return ejecutarConsulta($sql);
	}

	/*============================================================

	=            Metodo para listar los centro poblado   230824        =

	============================================================*/

	public function listarCentroPobaldo($departamento, $provincia, $distrito)
	{

		//$sql = "SELECT * FROM `tb_distrito` where id_pro='$provincia' ORDER by Distrito;";

		$sql = "SELECT p.id,p.Centro_poblado,p.Altitud FROM tb_distrito_act d INNER JOIN tb_centro_poblado_act p on p.Id_ubigueo=d.id_ubigueo
				where d.id_dep='$departamento' and d.id_pro='$provincia' and d.id_dist='$distrito' ORDER by p.Centro_poblado;";
		//echo($sql);
		return ejecutarConsulta($sql);
	}




	/*============================================================

	=            Metodo para listar los altitud  14082024        =

	============================================================*/
	public function listarAltitud($id_poblado,$id_dep,$id_pro,$id_dist)
	{

		//$sql = "SELECT * FROM `tb_distrito` where id_pro='$provincia' ORDER by Distrito;";

		$sql = "SELECT Altitud  FROM `tb_centro_poblado_act` p
			INNER JOIN tb_distrito_act d on d.id_ubigueo=p.Id_ubigueo
			where Id='$id_poblado'and id_dep='$id_dep'  and id_pro='$id_pro' and id_dist='$id_dist';";
		//echo($sql);
		return ejecutarConsultaSimpleFila($sql);
	}


	/*===================================================================================

	=            Metodo para buscar el documento de identidad de la paciente            =

	===================================================================================*/

	public function buscarPaciente($num_documento)
	{

		$sql = "SELECT rn.id_registro, rn.num_documento, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.fecha_nacimiento, rn.edad, rn.cel_gestfamiliar, rn.direccion,rn.red,rn.microred,rn.ipress FROM tb_registro rn WHERE rn.num_documento = '$num_documento' and (rn.termino ='0' or rn.termino = '');";

		return ejecutarConsulta($sql);
	}



	public function busquedaPaciente($num_documento): bool|mysqli_result|PDOStatement
	{

		$sql = "SELECT rn.id_registro, rn.num_documento, rn.ape_paterno, rn.ape_materno, rn.nombres, rn.fecha_nacimiento, rn.edad, rn.cel_gestfamiliar, rn.direccion FROM tb_registro rn

		WHERE rn.num_documento = '$num_documento';";

		return ejecutarConsulta($sql);
	}



	/*=============================================================================================

	=            Metodo para listar todas las microredes de salud segun redes de salud            =

	=============================================================================================*/

	public function listarMicroredsegunRedes($red)
	{

		$sql = "SELECT m.id_microred, m.descripcion_microred, r.id_red, r.descripcion_red FROM tb_microred m

		INNER JOIN tb_red r ON m.id_red = r.id_red

		WHERE r.descripcion_red = '$red'

		ORDER BY r.descripcion_red ASC;";

		return ejecutarConsulta($sql);
	}



	/*=====================================================================================

	=            Metodo para listar todas las ipress segun microredes de salud            =

	=====================================================================================*/

	public function listarIpresssegunMicrored($microred)
	{

		$sql = "SELECT i.id_ipress, i.cod_ipress, i.descripcion_ipress, i.categoria_ipress, i.id_microred, m.descripcion_microred FROM tb_ipress i

		INNER JOIN tb_microred m ON i.id_microred = m.id_microred

		WHERE m.descripcion_microred = '$microred'

		ORDER BY i.descripcion_ipress ASC;";

		return ejecutarConsulta($sql);
	}

	public function listarMicroRedId($id)
	{

		$sql = "SELECT * FROM tb_ipress WHERE id_microred = '$id' ORDER BY descripcion_ipress ASC;";

		return ejecutarConsulta($sql);
	}



	/*========================================================================================================

	=            Metodo para listar el codigo renaes y la cateegoria segun la ipress seleccionada            =

	========================================================================================================*/

	public function listarCodRenaesCategoriasegunIpress($ipress)
	{

		$sql = "SELECT i.id_ipress, i.cod_ipress, i.descripcion_ipress, i.categoria_ipress FROM tb_ipress i

		WHERE i.descripcion_ipress = '$ipress';";

		return ejecutarConsultaSimpleFila($sql);
	}



	/*===================================================================================

	=            Metodo para buscar la fecha de la semana epidemiologica            =

	===================================================================================*/

	public function buscarFechaSemana($fecha_atencion)
	{

		$sql = "SELECT se.semana, se.dia, se.fecha FROM tb_semanas se

		WHERE se.fecha = '$fecha_atencion';";

		return ejecutarConsulta($sql);
	}

	
}
