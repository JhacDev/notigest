<?php







require "../config/Conexion.php";







class Panel

{



    function __construct() {}



    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO POR AÑO EN CURSO

    public function countRegister()

    {



        // $sql = "SELECT COUNT(*) as total from tb_registro";

        $sql = "SELECT COUNT(*)AS total  from tb_registro where year(fecha_registro )= year(now())";



        return ejecutarConsultaSimpleFila($sql);

    }

    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO POR AÑO EN CURSO Red

    public function countRegisterRed($red, $microred='')

    {

        $variable= $microred=='' ? "red='$red'" : "red='$red' and microred='$microred'";



        $sql = "SELECT COUNT(*)AS total  from tb_registro where $variable and year(fecha_registro )= year(now())";



        return ejecutarConsultaSimpleFila($sql);

    }







    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO POR DIA ACTUAL

    public function countRegisterDia()

    {



        $sql = "SELECT count(*) as total  from tb_registro where  cast(fecha_registro as date)  = date_format(now(),'%Y-%m-%d')";





        return ejecutarConsultaSimpleFila($sql);

    }



    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO POR DIA ACTUAL POR RED

    public function countRegisterDiaRed($red,$microred='')

    {

        $variable= $microred== ''? "red='$red'":"red='$red' and microred='$microred'";

        $sql = "SELECT count(*) as total  from tb_registro where $variable and cast(fecha_registro as date)  = date_format(now(),'%Y-%m-%d')";





        return ejecutarConsultaSimpleFila($sql);

    }

    // CONSULTA PARA OBTENER LA CANTIDAD TOTAL DE GESTANTES CON FECHA DE PARTO DIA ACTUAL

    public function countRegisterParto()

    {



        $sql = "SELECT count(*) as total from tb_registro where  convert(fpp,date )  = date_format(now(),'%Y-%m-%d')";





        return ejecutarConsultaSimpleFila($sql);

    }

    // CONSULTA PARA OBTENER LA CANTIDAD TOTAL DE GESTANTES CON FECHA DE PARTO DIA ACTUAL POR RED

    public function countRegisterPartoRed($red,$microred='')

    {

        $variable= $microred== ''? "red='$red'":"red='$red' and microred='$microred'";

        $sql = "SELECT count(*) as total from tb_registro where $variable and convert(fpp,date )  = date_format(now(),'%Y-%m-%d')";





        return ejecutarConsultaSimpleFila($sql);

    }

    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO TOTAL DE GESTANTES EN EL MES CON FECHA DE PARTO

    public function countRegisterMes()

    {





        $sql = "SELECT count(*) as total  from tb_registro where month(fpp)=date_format(now(),'%m')";



        return ejecutarConsultaSimpleFila($sql);

    }



    // CONSULTA PARA OBTENER LA CANTIDAD DE REGISTRO TOTAL DE GESTANTES EN EL MES CON FECHA DE PARTO

    public function countRegisterMesRed($red,$microred='')

    {

        $variable = $microred== '' ? "red='$red'" : "red='$red' and microred='$microred'";

        $sql = "SELECT count(*) as total  from tb_registro where $variable and month(fpp)=date_format(now(),'%m')";



        return ejecutarConsultaSimpleFila($sql);

    }



    // CONSULTA PARA OBTENER LA CANTIDAD DE PARTO O CESARIA

    public function totalParto()

    {



        $sql = "SELECT count(*) as total   from tb_registro where  YEAR(fecha_termino) = YEAR(NOW()) and  MONTH(fecha_termino) = MONTH(NOW()) and termino IN ('PARTO','CESAREA');";



        return ejecutarConsultaSimpleFila($sql);

    }

    // CONSULTA PARA OBTENER LA CANTIDAD DE PARTO O CESARIA

    public function totalPartoRed($red,$microred='')

    {

        $variabale= $microred== ''? "red='$red'":"red='$red' and microred='$microred'";

        $sql = "SELECT count(*) as total   from tb_registro where $variabale and  YEAR(fecha_termino) = YEAR(NOW()) and  MONTH(fecha_termino) = MONTH(NOW()) and termino IN ('PARTO','CESAREA')";



        return ejecutarConsultaSimpleFila($sql);

    }



    // CONSULTA PARA OBTENER LA CANTIDAD DE ABORTOS EN LA REGION

    public function totalAbortos()

    {

        $sql = "SELECT count(*) as total   from tb_registro where  YEAR(fecha_termino) = YEAR(NOW())  and termino IN ('ABORTO');";

        return ejecutarConsultaSimpleFila($sql);

    }

    // CONSULTA PARA OBTENER LA CANTIDAD DE ABORTOS SEGUN RED

    public function totalAbortosRed($red,$microred= '')

    {

        $variable= $microred== ''? "red='$red'": "red='$red' and microred='$microred'";

        $sql = "SELECT count(*) as total   from tb_registro where $variable and  YEAR(fecha_termino) = YEAR(NOW())  and termino IN ('ABORTO');";

        return ejecutarConsultaSimpleFila($sql);

    }



    // CONSULTA PARA OBTENER DATOS GESTANTE CON FECHA DE PARTO EN EL MES 

    public function datosDelMes(): bool|mysqli_result|PDOStatement

    {

        return ejecutarConsulta("SELECT red,microred,ipress,num_documento, CONCAT(ape_paterno, ' ', ape_materno,' ',nombres) AS NombreApellido,edad,eg_actual,cel_gestfamiliar, fpp AS Fecha_Parto,

            fecha_termino,termino,factor_riesgo,lugar_termino FROM tb_registro WHERE MONTH(fpp) = MONTH(NOW()) AND YEAR(fpp) = YEAR(NOW()) ORDER BY fpp DESC,  red asc,microred asc,ipress asc; ");

    }
    // CONSULTA PARA OBTENER DATOS DE GESTANTE POR AÑO ACTUAL POR RED

    public function NominaGest_Red($red)

    {
    
        return ejecutarConsulta("SELECT  rn.red, rn.microred, rn.cod_ipress, rn.ipress, rn.categoria, rn.se, rn.fecha_atencion,rn.ape_paterno, rn.ape_materno,rn.nombres, rn.num_documento, rn.fecha_nacimiento, rn.edad, rn.fum, rn.fpp, rn.eg_captada, rn.cel_gestfamiliar, u.numtele_usuario, u.email_usuario,rn.departamento,rn.provincia,rn.distrito,rn.centro_poblado,rn.altitud, rn.direccion, rn.hb_ajustado,rn.hb_altitud, rn.grupo_sanguineo, rn.factor_rh, rn.factor_riesgo, rn.tamizaje_vif, rn.eg_actual, IF(rn.fecha_termino <> '', rn.fecha_termino, '') AS fecha_termino, IF(rn.termino <> '', rn.termino, '') AS termino, IF(rn.lugar_termino <> '', rn.lugar_termino, '') AS lugar_termino, rn.obs_red, rn.obs_diresa, rn.fecha_registro, u.numdoc_usuario, u.apenom_usuario, numtele_usuario FROM tb_registro rn 
INNER JOIN tb_usuario u ON rn.id_usuario = u.id_usuario where rn.red='$red'
ORDER BY rn.fecha_registro DESC;");
    }
        // CONSULTA PARA OBTENER DATOS DE GESTANTE POR AÑO ACTUAL POR RED

    public function NominaGest_Red_Microred($red,$microred)

    {
    
        return ejecutarConsulta("SELECT  rn.red, rn.microred, rn.cod_ipress, rn.ipress, rn.categoria, rn.se, rn.fecha_atencion,rn.ape_paterno, rn.ape_materno,rn.nombres, rn.num_documento, rn.fecha_nacimiento, rn.edad, rn.fum, rn.fpp, rn.eg_captada, rn.cel_gestfamiliar, u.numtele_usuario, u.email_usuario,rn.departamento,rn.provincia,rn.distrito,rn.centro_poblado,rn.altitud, rn.direccion, rn.hb_ajustado,rn.hb_altitud, rn.grupo_sanguineo, rn.factor_rh, rn.factor_riesgo, rn.tamizaje_vif, rn.eg_actual, IF(rn.fecha_termino <> '', rn.fecha_termino, '') AS fecha_termino, IF(rn.termino <> '', rn.termino, '') AS termino, IF(rn.lugar_termino <> '', rn.lugar_termino, '') AS lugar_termino, rn.obs_red, rn.obs_diresa, rn.fecha_registro, u.numdoc_usuario, u.apenom_usuario, numtele_usuario FROM tb_registro rn 
INNER JOIN tb_usuario u ON rn.id_usuario = u.id_usuario where rn.red='$red' AND rn.microred='$microred' AND  YEAR(rn.fecha_atencion) = YEAR(CURDATE())
ORDER BY rn.fecha_registro DESC;");
    }

    // CONSULTA PARA OBTENER DATOS GESTANTE CON FECHA DE PARTO EN EL MES RED

    public function datosDelMesRed($red)

    {

        return ejecutarConsulta("SELECT red,microred,ipress,num_documento, CONCAT(ape_paterno, ' ', ape_materno,' ',nombres) AS NombreApellido,edad,eg_actual,cel_gestfamiliar, fpp AS Fecha_Parto,

                fecha_termino,termino,factor_riesgo,lugar_termino FROM tb_registro WHERE red='$red' and MONTH(fpp) = MONTH(NOW()) AND YEAR(fpp) = YEAR(NOW()) ORDER BY fpp DESC,  red asc,microred asc,ipress asc; ");

    }
    

    // CONSULTA PARA OBTENER DATOS GESTANTE CON FECHA DE PARTO EN EL MES RED Y MICRORED

    public function datosDelMesRedMicrored($red, $microred)

    {

        return ejecutarConsulta("SELECT red,microred,ipress,num_documento, CONCAT(ape_paterno, ' ', ape_materno,' ',nombres) AS NombreApellido,edad,eg_actual,cel_gestfamiliar, fpp AS Fecha_Parto,

        fecha_termino,termino,factor_riesgo,lugar_termino FROM tb_registro WHERE red='$red' and microred='$microred' and MONTH(fpp) = MONTH(NOW()) AND YEAR(fpp) = YEAR(NOW()) ORDER BY fpp DESC,  red asc,microred asc,ipress asc; ");

    }

    // CONSULTA PARA OBTENER LA CANTIDAD PARA EL HISTOGRAMA POR MICRORED Y IPRESS

    public function cantidadGestantesHistograma($red)

    {

        return ejecutarConsulta("SELECT microred,count(microred) as total from tb_registro where year(fecha_registro )= date_format(now(),'%Y') and red='$red' group by microred;");

    }

        // CONSULTA PARA OBTENER LA CANTIDAD PARA EL HISTOGRAMA POR MICRORED Y IPRESS

    public function cantidadGestantesHistogramaRedMicrored($red, $microred)

    {

        return ejecutarConsulta("SELECT ipress,count(ipress) as total from tb_registro where year(fecha_registro )= date_format(now(),'%Y') and red like '$red' and microred ='$microred' group by ipress order by ipress; ");

    }

      // CONSULTA PARA OBTENER LA CANTIDAD PARA EL HISTOGRAMA PARA ADMINISTRADOR

    public function cantidadGestantesHistogramaAdmin()

    {

        //return ejecutarConsulta("SELECT count(*) AS total from tb_registro group by red");

        return ejecutarConsulta("SELECT count(*) total FROM tb_registro 

        WHERE   year(fecha_registro )= date_format(now(),'%Y')

        group by red;");

    }



    // CONSULTA PARA OBTENER LA CANTIDAD PARA EL HISTOGRAMA

    public function cantidadLugarPartoHistograma()

    {

        $sql = "SELECT count(*) AS total from tb_registro where  year(fecha_registro )= date_format(now(),'%Y') and lugar_termino in ('DOMICILIARIO','INSTITUCIONAL','PRIVADO')  group by lugar_termino ORDER BY lugar_termino asc;";

        return ejecutarConsulta($sql);

    }



    // CONSULTA PARA OBTENER LA CANTIDAD PARA EL HISTOGRAMA RED

    public function cantidadLugarPartoHistogramaRed($red,$microred='')

    {

        $variable= $microred=='' ? "red='$red'" : "red='$red' and microred='$microred'";



        $sql = "SELECT count(*) AS total from tb_registro where $variable and year(fecha_registro )= date_format(now(),'%Y') and lugar_termino in ('DOMICILIARIO','INSTITUCIONAL','PRIVADO')  group by lugar_termino ORDER BY lugar_termino asc;";

        return ejecutarConsulta($sql);

    }

    // CONSULTA PARA OBTENER LOS REGISTROS TOTALES POR MES



    public function cantidadGestantesMes()

    {

        $sql = "SELECT count(*) as total from tb_registro where year(fecha_atencion )= date_format(now(),'%Y')

                group by monthname(fecha_atencion)  order by month(fecha_atencion);";

        return ejecutarConsulta($sql);

    }



    // CONSULTA PARA OBTENER LOS REGISTROS TOTALES POR MES RED Y MICRORED



    public function cantidadGestantesMesRed($red, $microred = '')

    {

        $extracto = $microred == '' ? "red='$red'" : "red='$red' and microred='$microred'";



        $sql = "SELECT count(*) as total from tb_registro where year(fecha_atencion )= date_format(now(),'%Y') and $extracto

                    group by monthname(fecha_atencion)  order by month(fecha_atencion);";



        return ejecutarConsulta($sql);

    }



    // -- FILTRO TOTAL DE ADMINISTRADORES  EN EL SISTEMA ACTIVOS



    public function totalAdministrador()

    {

        $sql = "SELECT count(*) as total from tb_usuario WHERE tipousuario = 'ADMINISTRADOR' and estado=0 ;";

        return ejecutarConsultaSimpleFila($sql);

    }

    // -- FILTRO TOTAL DE USUARIOS  EN EL SISTEMA ACTIVOS

    public function totalUsuarios()

    {

        $sql = "SELECT count(*) as total from tb_usuario WHERE tipousuario != 'ADMINISTRADOR' and estado=0;";

        return ejecutarConsultaSimpleFila($sql);

    }

    // -- FILTRO TOTAL DE USUARIOS EN GENERAL ACTIVOS

    public function totalUsuarioActivo()

    {

        $sql = "SELECT count(*) as total from tb_usuario WHERE estado=0 ;";

        return ejecutarConsultaSimpleFila($sql);

    }

    // -- FILTRO TOTAL DE USUARIOS EN GENERAL ACTIVOS

    public function totalUsuarioInactivo()

    {

        $sql = "SELECT count(*) as total from tb_usuario WHERE estado=1 ;";

        return ejecutarConsultaSimpleFila($sql);

    }

}

