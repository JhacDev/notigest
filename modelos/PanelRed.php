<?php
require "../config/Conexion.php";

class PanelRed

{

    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO POR AÑO EN CURSO
    public function countRegisteRed($red)
    {

        // $sql = "SELECT COUNT(*) as total from tb_registro";
        $sql = "SELECT COUNT(*)AS total  from tb_registro where  red = '$red' and year(fecha_registro )= year(now());";

        return ejecutarConsultaSimpleFila($sql);
    }
}
