<?php 

require "../config/Conexion.php";

class Usuario{
	/*=========================================================
	=            Implementamos nuestro constructor            =
	=========================================================*/
	function __construct(){
		
	}
	
	/*=====================================================
	=            Metodo para insertar registro            =
	=====================================================*/
	public function insertarUsuario($tipodocidentidad, $numdoc_usuario, $apenom_usuario, $numtele_usuario, $email_usuario, $tipousuario, $red, $usuario_sistema, $password_sistema){
		$sql = "INSERT INTO tb_usuario (tipodocidentidad, numdoc_usuario, apenom_usuario, numtele_usuario, email_usuario, tipousuario, red, usuario_sistema, password_sistema, estado)
		VALUES ('$tipodocidentidad', '$numdoc_usuario', '$apenom_usuario', '$numtele_usuario', '$email_usuario', '$tipousuario', '$red', '$usuario_sistema', '$password_sistema', '0')";
		return ejecutarConsulta($sql);
	}

	/*===================================================
	=            Metodo para editar registro            =
	===================================================*/
	public function editarUsuario($id_usuario, $tipodocidentidad, $numdoc_usuario, $apenom_usuario, $numtele_usuario, $email_usuario, $tipousuario, $red, $usuario_sistema, $password_sistema){
		$sql = "UPDATE tb_usuario SET tipodocidentidad = '$tipodocidentidad', numdoc_usuario = '$numdoc_usuario', apenom_usuario = '$apenom_usuario', numtele_usuario = '$numtele_usuario', email_usuario = '$email_usuario', tipousuario = '$tipousuario', red = '$red', usuario_sistema = '$usuario_sistema', password_sistema = '$password_sistema' WHERE id_usuario = '$id_usuario'";
		return ejecutarConsulta($sql);
	}

	/*=======================================================
	=            Metodo para desactivar registro            =
	=======================================================*/
	public function desactivarUsuario($id_usuario){
		$sql = "UPDATE tb_usuario SET estado = '1' WHERE id_usuario = '$id_usuario'";
		return ejecutarConsulta($sql);
	}

	/*====================================================
	=            Metodo para activar registro            =
	====================================================*/
	public function activarUsuario($id_usuario){
		$sql = "UPDATE tb_usuario SET estado = '0' WHERE id_usuario = '$id_usuario'";
		return ejecutarConsulta($sql);
	}

	/*=========================================================================
	=            para mostrar los datos de un registro a modificar            =
	=========================================================================*/
	public function mostrarUsuario($id_usuario){
		$sql = "SELECT u.* FROM tb_usuario u
		WHERE u.id_usuario = '$id_usuario';";
		return ejecutarConsultaSimpleFila($sql);
	}

	/*========================================================
	=            Metodo para listar los registros            =
	========================================================*/
	public function listarUsuario(){
		$sql = "SELECT u.* FROM tb_usuario u
		ORDER BY u.id_usuario DESC;";
		return ejecutarConsulta($sql);
	}

	/*=================================================================
	=            Metodo para mostrar registro en un select            =
	=================================================================*/
	public function selectUsuario(){
		$sql = "SELECT * FROM tb_usuario WHERE estado = 0";
		return ejecutarConsulta($sql);
	}	

	/*===============================================================================
	=            Metodo para buscar el documento de identidad de usuario            =
	===============================================================================*/
	public function buscarUsuario($tipodocidentidad, $numdoc_usuario){
		$sql = "SELECT u.id_usuario, u.tipodocidentidad, u.numdoc_usuario FROM tb_usuario u
		WHERE u.tipodocidentidad = '$tipodocidentidad' AND u.numdoc_usuario = '$numdoc_usuario'";
		return ejecutarConsulta($sql);
	}

	public function busquedaUsuario($tipodocidentidad, $numdoc_usuario){
		$sql = "SELECT u.id_usuario, u.tipodocidentidad, u.numdoc_usuario FROM tb_usuario u
		WHERE u.tipodocidentidad = '$tipodocidentidad' AND u.numdoc_usuario = '$numdoc_usuario'";
		return ejecutarConsulta($sql);
	}

	/*==========================================================================
	=            Metodo para verificar el ingreso del Administrador            =
	==========================================================================*/
	public function verificarUserAdministrador($usuario, $password, $tipousuario){
		$sql = "SELECT u.* FROM tb_usuario u
		WHERE u.usuario_sistema = '$usuario' AND u.password_sistema = '$password' AND u.tipousuario = '$tipousuario' AND u.estado = '0';";
		return ejecutarConsulta($sql);
	}

	/*====================================================================
	=            Metodo para verificar el ingreso del Usuario            =
	====================================================================*/
	public function verificarUserUsuario($usuario, $password, $tipousuario){
		$sql = "SELECT u.* FROM tb_usuario u
		WHERE u.usuario_sistema = '$usuario' AND u.password_sistema = '$password' AND u.tipousuario = '$tipousuario' AND u.estado = '0';";
		return ejecutarConsulta($sql);
	}
}

?>