<?php







// Si la cantidad de sessiones es menor que 1, iniciamos la sesion



if (strlen(session_id()) < 1)



    session_start();







require_once "../modelos/Panel.php";







$datos = new Panel();





$microred = isset($_GET['microred']) ? limpiarCadena($_GET['microred']) : "";





switch ($_GET['op']) {



        /*===========================================================



	=            toal de registro           =



	===========================================================*/



    case 'totalRegistro':



        $rspta = $datos->countRegister();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($rspta);





        break;



        /*===========================================================



	=            toal de registro red          =



	===========================================================*/



    case 'totalRegistroRed':



        $rspta = $datos->countRegisterRed($_SESSION['red'], $microred);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($rspta);





        break;



        /*===========================================================



	=Caso para ver el total de gestantes con fecha de parto en el mes=



	===========================================================*/



    case 'totalRegistroMes':



        $rspta = $datos->countRegisterMes();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($rspta);





        break;



        /*===========================================================

	=   

        Caso para ver el total de gestantes con fecha de parto 

        en el mes por Red

    =

	===========================================================*/



    case 'totalRegistroMesRed':



        $rspta = $datos->countRegisterMesRed($_SESSION['red'], $microred);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($rspta);





        break;



        /*===========================================================



	=            Caso para listar registro del dia            =



	===========================================================*/



    case 'totalRegistrodia':

        $rspta = $datos->countRegisterDia();

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;

        /*===========================================================



	=            Caso para listar registro del dia por red           =



	===========================================================*/



    case 'totalRegistrodiaRed':

        $rspta = $datos->countRegisterDiaRed($_SESSION['red'], $microred);

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;



        /*===========================================================



	=            Caso para listar registro del dia            =



	===========================================================*/



    case 'totalRegistroParto':

        $rspta = $datos->countRegisterParto();

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;



        /*===========================================================



	=            Caso para listar registro del dia  por red          =



	===========================================================*/



    case 'totalRegistroPartoRed':

        $rspta = $datos->countRegisterPartoRed($_SESSION['red'], $microred);

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;



        /*===========================================================



	=   Caso total segun fecha termino PARTO o CESARIA           =



	===========================================================*/



    case 'totalTerminoParto':

        $rspta = $datos->totalParto();

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;

        /*===========================================================



	=   Caso total segun fecha termino PARTO o CESARIA POR RED       =



	===========================================================*/



    case 'totalTerminoPartoRed':

        $rspta = $datos->totalPartoRed($_SESSION['red'], $microred);

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;



        /*===========================================================



	=   Caso total segun fecha termino PARTO o CESARIA           =



	===========================================================*/



    case 'totalTerminoAborto':

        $rspta = $datos->totalAbortos();

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;



        /*===========================================================



	=   Caso total segun fecha termino PARTO o CESARIA           =



	===========================================================*/



    case 'totalTerminoAbortoRed':

        $rspta = $datos->totalAbortosRed($_SESSION['red'], $microred);

        //return var_dump($rspta);

        echo json_encode($rspta);





        break;





        /*===========================================================



	=    Caso para listar total de administradores activos     =



	===========================================================*/



    case 'totalAdministrador':

        $rspta = $datos->totalAdministrador();

        //return var_dump($rspta);

        echo json_encode($rspta);

        break;



        /*===========================================================



	=    Caso para listar total de usuarios activos     =



	===========================================================*/



    case 'totalUsuarios':

        $rspta = $datos->totalUsuarios();

        //return var_dump($rspta);

        echo json_encode($rspta);

        break;



        /*===========================================================



	= Caso para listar total de usuarios en general activos     =



	===========================================================*/



    case 'totalUsuarioActivo':

        $rspta = $datos->totalUsuarioActivo();

        //return var_dump($rspta);

        echo json_encode($rspta);

        break;



        /*===========================================================



	= Caso para listar total de usuarios en general inactivo     =



	===========================================================*/



    case 'totalUsuarioInactivo':

        $rspta = $datos->totalUsuarioInactivo();

        //return var_dump($rspta);

        echo json_encode($rspta);

        break;





        /*===========================================================



	=            Caso para reporte histograma           =



	===========================================================*/



    case 'cantidadGestantesHistograma':

        $rspta = $datos->cantidadGestantesHistograma($_SESSION['red']);

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;



        /*===========================================================



	=            Caso para reporte histograma           =



	===========================================================*/



    case 'cantidadGestantesHistogramaRedMicrored':

        $rspta = $datos->cantidadGestantesHistogramaRedMicrored($_SESSION['red'], $microred);

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;

        /*===========================================================



	=            Caso para reporte histograma RED - ADMIN          =



	===========================================================*/



    case 'cantidadGestantesHistogramaDiresa':

        $rspta = $datos->cantidadGestantesHistogramaAdmin();

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;



        /*===========================================================



	=            Caso para reporte histograma   Lugar de Parto        =



	===========================================================*/



    case 'cantidadLugarPartoHistograma':

        $rspta = $datos->cantidadLugarPartoHistograma();

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;

        /*===========================================================



	=            Caso para reporte histograma   Lugar de Parto Red       =



	===========================================================*/



    case 'cantidadLugarPartoHistogramaRed':

        $rspta = $datos->cantidadLugarPartoHistogramaRed($_SESSION['red'], $microred);

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;



        /*===========================================================



	=            Caso para el reporte en barras                 =



	===========================================================*/



    case 'cantidadGestantesbarra':





        $rspta = $datos->cantidadGestantesMes();

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;

        /*===========================================================



	=            Caso para el reporte en barras por red             =



	===========================================================*/



    case 'cantidadGestantesbarraRed':





        $rspta = $datos->cantidadGestantesMesRed($_SESSION['red'], $microred);

        $data = array();



        foreach ($rspta as $value) {

            $data[] = $value;
        }



        echo json_encode($data, JSON_NUMERIC_CHECK);



        break;

        /*===========================================================



	= Caso para el reporte nomina  gestantes por region        =



	===========================================================*/



    case 'datosDelMes':



        $rspta = $datos->datosDelMes();



        $data = array();



        while ($reg = $rspta->fetch_object()) {



            $data[] = array(



                "0"    =>    $reg->red,



                "1"    =>    $reg->microred,



                "2"    =>    $reg->ipress,



                "3"    =>    $reg->num_documento,



                "4"    =>    $reg->NombreApellido,



                "5"    =>    $reg->edad,



                "6"    =>    $reg->eg_actual,



                "7"    =>    $reg->cel_gestfamiliar,



                "8"    =>    $reg->Fecha_Parto,



                "9"    =>    $reg->fecha_termino,



                "10"    =>    $reg->termino,



                "11"    =>    $reg->factor_riesgo,



                "12"    =>    $reg->lugar_termino,

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



        /*===========================================================



	=            Caso para el reporte por red                  =



	===========================================================*/

    case 'datosDelMesRed':



        if ($microred == '') {

            $rspta = $datos->datosDelMesRed($_SESSION['red']);
        } else {

            $rspta = $datos->datosDelMesRedMicrored($_SESSION['red'], $microred);
        }



        $data = array();



        while ($reg = $rspta->fetch_object()) {



            $data[] = array(



                "0"    =>    $reg->red,



                "1"    =>    $reg->microred,



                "2"    =>    $reg->ipress,



                "3"    =>    $reg->num_documento,



                "4"    =>    $reg->NombreApellido,



                "5"    =>    $reg->edad,



                "6"    =>    $reg->eg_actual,



                "7"    =>    $reg->cel_gestfamiliar,



                "8"    =>    $reg->Fecha_Parto,



                "9"    =>    $reg->fecha_termino,



                "10"    =>    $reg->termino,



                "11"    =>    $reg->factor_riesgo,



                "12"    =>    $reg->lugar_termino,

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



        /*===========================================================



	=            Caso para el reporte por red y microred                  =



	===========================================================*/



    case 'datosDelMesRedMicrored':



        $rspta = $datos->datosDelMesRedMicrored($_SESSION['red'], $microred);



        $data = array();



        while ($reg = $rspta->fetch_object()) {



            $data[] = array(



                "0"    =>    $reg->red,



                "1"    =>    $reg->microred,



                "2"    =>    $reg->ipress,



                "3"    =>    $reg->num_documento,



                "4"    =>    $reg->NombreApellido,



                "5"    =>    $reg->edad,



                "6"    =>    $reg->eg_actual,



                "7"    =>    $reg->cel_gestfamiliar,



                "8"    =>    $reg->Fecha_Parto,



                "9"    =>    $reg->fecha_termino,



                "10"    =>    $reg->termino,



                "11"    =>    $reg->factor_riesgo,



                "12"    =>    $reg->lugar_termino,

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

    /*=========================================================
	=    Caso para el reporte nominal de gestantes en el año  =
	===========================================================*/

    case 'report_red_microred':

        if ($microred == '') {

            $rspta = $datos->NominaGest_Red($_SESSION['red']);
        } else {

            $rspta = $datos->NominaGest_Red_Microred($_SESSION['red'], $microred);
        }

        $data = array();

        while ($reg = $rspta->fetch_object()) {

            $data[] = array(

                "0" =>	$reg->red,
				"1" =>	$reg->microred,
				"2" =>	$reg->cod_ipress,
				"3" =>	$reg->ipress,
				"4" =>	$reg->categoria,
				"5" =>	$reg->se,
				"6" =>	$reg->fecha_atencion,
				"7" =>	$reg->ape_paterno,
				"8" =>	$reg->ape_materno,
				"9" =>	$reg->nombres,
				"10" =>	$reg->num_documento,
				"11" =>	$reg->fecha_nacimiento,
				"12" =>	$reg->edad,
				"13" =>	$reg->fum,
				"14" =>	$reg->fpp,
				"15" =>	$reg->eg_captada,
				"16" =>	$reg->cel_gestfamiliar,
				"17" =>	$reg->departamento,
				"18" =>	$reg->provincia,
				"19" =>	$reg->distrito,
				"20" => $reg->centro_poblado,
				"21" =>	$reg->altitud,
				"22" =>	$reg->direccion,
				"23" =>	$reg->hb_ajustado,
				"24" =>	$reg->hb_altitud,
				"25" =>	$reg->grupo_sanguineo,
				"26" =>	$reg->factor_rh,
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
                "38" => $reg->fecha_registro
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
