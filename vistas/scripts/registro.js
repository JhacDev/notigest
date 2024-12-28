var tabla;

/*========================================================

=            Funcion que se ejecuta al inicio            =

========================================================*/

function init() {

    mostrarform(false);
    deshabilitarControles();
    Listar();
    cargarSelect();
    showMicroRed();
    showIppres();
    $("#formulario").on("submit", function (e) {
        Guardaryeditar(e);

    });

}

const showMicroRed = () => {
    $.get("../ajax/registro.php?op=showMicroRed",function(data){
        let res = JSON.parse(data)
        
        $("#dataMicroRed").text(res.descripcion_microred)
        $('#otrared').val(res.descripcion_microred)

    })
}

const showIppres = () => {
    $.post("../ajax/registro.php?op=select_listarIpresssegunMicrored", function (r) {
        
        $("#ipress").html(r);

    });
}

/*=======================================================

=            Funcion para mostrar formulario            =

=======================================================*/

function mostrarform(flag) {

    limpiar();

    if (flag) {

        $("#listadoregistros").hide();

        $("#formularioregistros").show();

        $("#btnGuardar").prop("disabled", false);

        $("#btnAgregar").hide();

        $("#num_documento").focus();



        //Mostramos la red de salud

        $.post("../ajax/registro.php?op=select_redsalud", function (data) {

            data = JSON.parse(data);

            $("#red").val(data.descripcion_red);

        });



        cargaSelectsegunRedMicrored();

        cargaSemanaEpiSegunFechaAtencion();




    } else {

        $("#listadoregistros").show();

        $("#formularioregistros").hide();

        $("#btnAgregar").show();

    }



}



/*=======================================================

=            Funcion para limpiar formulario            =

=======================================================*/

function limpiar() {

    $("#id_registro").val("");

    $("#num_documento").val("");

    $("#ape_paterno").val("");

    $("#ape_materno").val("");

    $("#nombres").val("");

    $("#fecha_nacimiento").val("");

    $("#edad").val("");

    $("#cel_gestfamiliar").val("");
    // Agregamos variables

    $('#departamento').val(null).trigger('change.select2');

    $('#provincia').val(null).trigger('change.select2');

    $('#distrito').val(null).trigger('change.select2');

    $("#alitud").val("");

    $("#direccion").val("");

    /*$("#red").val("");*/

    $('#red').val(null).trigger('change.select2');

    $('#microred').val(null).trigger('change.select2');

    $("#cod_ipress").val("");

    $('#ipress').val(null).trigger('change.select2');

    $("#categoria").val("");

    $("#fecha_atencion").val("");

    $("#fum").val("");

    $("#fpp").val("");

    $("#se").val("");

    $("#eg_captada").val("");

    $("#eg_actual").val("");

    $("#hb_ajustado").val("");

    $("#hb_altitud").val("");

    $('#grupo_sanguineo').val(null).trigger('change.select2');

    $('#factor_rh').val(null).trigger('change.select2');

    $('#condicion_ges').val(null).trigger('change.select2');

    $('#origen').val("");

    $('#factor_riesgo').val(null).trigger('change.select2');

    $('#tamizaje_vif').val(null).trigger('change.select2');

    $("#fecha_termino").val("");

    $('#termino').val(null).trigger('change.select2');

    $('#lugar_termino').val(null).trigger('change.select2');

    $("#obs_red").val("");

    $("#obs_diresa").val("");

}



/*=========================================================

=            Funcion para cancelar el registro            =

=========================================================*/

function cancelarform() {

    limpiar();

    mostrarform(false);

    deshabilitarControles();

}



/*===========================================================

=            Funcion para deshabilitar controles            =

===========================================================*/

function deshabilitarControles() {

    $("#edad").prop('readonly', true);
    // Agregamos variables

    $("#departamento").prop('readonly', true);

    $("#red").prop('readonly', true);

    $("#cod_ipress").prop('readonly', true);

    $("#categoria").prop('readonly', true);

    $("#dociden_responsable").prop('readonly', true);

    $("#apenom_responsable").prop('readonly', true);

    $("#fpp").prop('readonly', true);

    $("#eg_actual").prop('readonly', true);

    $("#se").prop('readonly', true);

}



/*==================================================

=            Funcion para cargar select            =

==================================================*/

function cargarSelect() {

    $('.select2').select2();

    //Mostramos departamento
    $.post("../ajax/registro.php?op=select_ListarDepartamentos", function (r) {

        $("#departamento").html(r);

    });

    //Mostramos la categoria de la ipress

    $.post("../ajax/registro.php?op=select_categoriaipress", function (r) {

        $("#categoria").html(r);

    });

    //Mostramos el tamizaje de VIF

    $.post("../ajax/registro.php?op=select_tamizajevif", function (r) {

        $("#tamizaje_vif").html(r);

    });

        //Mostramos el tamizaje de VIF

    $.get("../ajax/registro.php?op=select_condiciongestante", function (r) {
        //console.log(r);
        
        $("#condicion_ges").html(r);

    });

    //Mostramos el grupo sanguineo

    $.post("../ajax/registro.php?op=select_gruposanguineo", function (r) {

        $("#grupo_sanguineo").html(r);

    });

    //Mostramos el factor RH

    $.post("../ajax/registro.php?op=select_factorrh", function (r) {

        $("#factor_rh").html(r);

    });

    //Mostramos el factor de riesgo

    $.post("../ajax/registro.php?op=select_factorriesgo", function (r) {

        $("#factor_riesgo").html(r);

    });

    //Mostramos el termino

    $.post("../ajax/registro.php?op=select_termino", function (r) {

        $("#termino").html(r);

    });

    //Mostramos el lugar de termino

    $.post("../ajax/registro.php?op=select_lugartermino", function (r) {

        $("#lugar_termino").html(r);

    });

}



/*================================================================================

=            Funcion para cargar Microred e Ipress segun red de salud            =

================================================================================*/

function cargaSelectsegunRedMicrored() {

    //Mostramos la microred de salud segun red

    $("#num_documento").change(function () {

        var red = $("#red").val();

        $.post("../ajax/registro.php?op=select_listarMicroredsegunRedes", { red: red }, function (r) {

            $("#microred").html(r);



        });

    });

    //Mostramos la ipress segun microred

    mostrarCodRenaesCat();

}
/*================================================================================

=            Funcion para cargar Semana Epidemiologica segun fecha de atencion  =

================================================================================*/

function cargaSemanaEpiSegunFechaAtencion() {

    //Mostramos semana epidemiologica segun fecha de atencion

    $("#fecha_atencion").change(function () {

        var fecha_atencion = $("#fecha_atencion").val();

        $.post("../ajax/registro.php?op=buscar_fechacaptacion", { fecha_atencion: fecha_atencion }, function (r) {

            $("#se").html(r);

        });

    });

    mostrarSemanaEpi();

}

/*=========================================================================================

=            Funcion para mostrar el codigo renaes y la categoria de la ipress            =

=========================================================================================*/

function mostrarCodRenaesCat() {

    //Mostramos el codigo renaes y la categoria segun ipress

    $("#ipress").change(function () {

        var ipress = $("#ipress").val();

        $.post("../ajax/registro.php?op=select_listarCodRenaesCategoriasegunIpress", { ipress: ipress }, function (data) {

            data = JSON.parse(data);

            $("#cod_ipress").val(data.cod_ipress);

            $("#categoria").val(data.categoria_ipress);

        });

    });

}



/*=========================================================================================

=            Funcion para mostrar la semana epidemiologica            =

=========================================================================================*/

function mostrarSemanaEpi() {

    //Mostramos la semana epidemiologica

    $("#fecha_atencion").change(function () {

        var fecha_atencion = $("#fecha_atencion").val();

        $.post("../ajax/registro.php?op=buscar_fechacaptacion", { fecha_atencion: fecha_atencion }, function (data) {

            data = JSON.parse(data);

            $("#se").val(data.semana);

            //$("#categoria").val(data.categoria_ipress);

        });

    });

}
/*=======================================================

=            Funcion para cargar provincias          =

=======================================================*/
function cargar_provincias() {

    let departamento = $("#departamento").val();

    if (departamento == "00") {
        $("#provincia").html("");
    } else {
        //Mostramos departamento
        $.post("../ajax/registro.php?op=select_ListarProvincia&departamento=" + departamento, function (r) {
            $("#provincia").html(r);
        });

    }

}

/*=======================================================

=            Funcion para cargar distritos          =

=======================================================*/
function carga_distritos() {

    let departamento = $("#departamento").val();
    let provincia = $("#provincia").val();

    if (   provincia == "00" ) {
        $("#distrito").html("");
    } 
    else {
    //Mostramos departamento
    $.post("../ajax/registro.php?op=listarDistritos&departamento=" + departamento + "&provincia="+ provincia, function (r) {
    $("#distrito").html(r);
    }); 
    }
}

/*=======================================================

=            Funcion para cargar centro poblado         =

=======================================================*/
function carga_centropoblados() {

    let departamento = $("#departamento").val();
    let provincia = $("#provincia").val();
    let distrito = $("#distrito").val();

    if (   provincia == "00" ) {
        $("#centro_poblado").html("");
    } 
    else {
    //Mostramos departamento
    $.post("../ajax/registro.php?op=listarCentroPoblado&departamento=" + departamento + "&provincia="+ provincia +"&distrito=" + distrito, function (r) {
    $("#centro_poblado").html(r);
    }); 
    }
}


/*=======================================================

=            Funcion para cargar altitud          =

=======================================================*/
const formulaHBC = () =>{
    // ROUND((CONVERT(decimal,NTN.Hemoglobina)-(CONVERT(int,MR.ALTITUD)*3.3)/1000*-0.032+0.022*(CONVERT(INT,MR.ALTITUD)*3.3)/1000),4)

    let hemoglobina = parseFloat(document.getElementById('hb_ajustado').value)
    let altitud = parseInt(document.getElementById('altitud').value)

    
let hb;
switch (true) {
    case (altitud >= 1 && altitud <= 499):
        hb = hemoglobina - 0;
        break;
    case (altitud >= 500 && altitud <= 999):
        hb = hemoglobina - 0.4;
        break;
    case (altitud >= 1000 && altitud <= 1499):
        hb = hemoglobina - 0.8;
        break;
    case (altitud >= 1500 && altitud <= 1999):
        hb = hemoglobina - 1.1;
        break;
    case (altitud >= 2000 && altitud <= 2499):
        hb = hemoglobina - 1.4;
        break;
    case (altitud >= 2500 && altitud <= 2999):
        hb = hemoglobina - 1.8;
        break;
    case (altitud >= 3000 && altitud <= 3499):
        hb = hemoglobina - 2.1;
        break;
    case (altitud >= 3500 && altitud <= 3999):
        hb = hemoglobina - 2.5;
        break;
    case (altitud >= 4000 && altitud <= 4499):
        hb = hemoglobina - 2.9;
        break;
    case (altitud >= 4500 && altitud <= 4999):
        hb = hemoglobina - 3.3;
        break;
    case (altitud >= 4500 && altitud <= 4999):
        hb = hemoglobina - 3.3;
        break;
        case (altitud >= 5000):
        hb = hemoglobina - 3.3;
        break;
}
document.getElementById('hb_altitud').value = hb.toFixed(2);

}


    $("#centro_poblado").change(function () {

        $.get("../ajax/registro.php?op=select_listaAltitud", { 
            id_poblado:$('#centro_poblado').val()
            ,id_dep:$('#departamento').val()
            ,id_pro:$('#provincia').val()
            ,id_dist:$('#distrito').val()  
        
        }, function (data) {

            data = JSON.parse(data);
            $("#altitud").val(data.Altitud);

        });

    });

/*===========================================

=            Funcion para listar            =

===========================================*/

function Listar() {



    tabla = $("#tblistado").dataTable({

        "aProcessing": true,

        "aServerSide": true,

        "responsive": true,

        "lengthChange": false,

        "autoWidth": false,

        dom: 'Bfrtip',

        buttons: [{

            extend: 'copyHtml5',

            text: '<i class="far fa-copy"></i>',

            titleAttr: 'Copiar',

            title: 'Notificación de Gestantes - NOTIGEST',

        }, {

            extend: 'excelHtml5',

            text: '<i class="far fa-file-excel"></i>',

            titleAttr: 'Excel',

            title: 'Notificación de Gestantes - NOTIGEST',

        }, {

            extend: 'csvHtml5',

            text: '<i class="fas fa-file-csv"></i>',

            titleAttr: 'CSV',

            title: 'Notificación de Gestantes - NOTIGEST'

        }, {

            extend: 'pdfHtml5',

            exportOptions: {

                columns: [1, 2, 3, 4, 5, 6]

            },

            text: '<i class="far fa-file-pdf"></i>',

            orientation: 'landscape',

            titleAttr: 'PDF',

            title: 'Notificación de Gestantes - NOTIGEST'

        }, {

            extend: 'colvis'

        }],

        "ajax": {

            url: '../ajax/registro.php?op=listar',

            type: "get",

            //data: {id_usuario : id_usuario}

            dataType: "json",

            error: function (e) {

                console.log(e.responseText); // revisar 

            }

        },

        "bDestroy": true,

        "iDisplayLength": 15,

        "order": [[0, "asc"]]

    }).DataTable();

}

/*=====================================================

=            Funcion para guardar y editar            =

=====================================================*/

function Guardaryeditar(e) {

    e.preventDefault();

    if ($("#num_documento").val() == "") {

        bootbox.alert({

            message: "Ingrese el número de documento de identidad.",

            className: 'rubberBand animated',

            onEscape: function () {

                $('.bootbox.modal').modal('hide');

            }

        }).on('hidden.bs.modal', function (event) {

            $("#num_documento").focus().select();

        });

    } else {

        if ($("#ape_paterno").val() == "") {

            bootbox.alert({

                message: "Ingrese el apellidos paterno.",

                className: 'rubberBand animated',

                onEscape: function () {

                    $('.bootbox.modal').modal('hide');

                }

            }).on('hidden.bs.modal', function (event) {

                $("#ape_paterno").focus().select();

            });

        } else {

            if ($("#ape_materno").val() == "") {

                bootbox.alert({

                    message: "Ingrese el apellidos materno.",

                    className: 'rubberBand animated',

                    onEscape: function () {

                        $('.bootbox.modal').modal('hide');

                    }

                }).on('hidden.bs.modal', function (event) {

                    $("#ape_materno").focus().select();

                });

            } else {

                if ($("#nombres").val() == "") {

                    bootbox.alert({

                        message: "Ingrese el nombre.",

                        className: 'rubberBand animated',

                        onEscape: function () {

                            $('.bootbox.modal').modal('hide');

                        }

                    }).on('hidden.bs.modal', function (event) {

                        $("#nombres").focus().select();

                    });

                } else {

                    if ($("#fecha_nacimiento").val() == "") {

                        bootbox.alert({

                            message: "Ingrese la fecha de nacimiento.",

                            className: 'rubberBand animated',

                            onEscape: function () {

                                $('.bootbox.modal').modal('hide');

                            }

                        }).on('hidden.bs.modal', function (event) {

                            $("#fecha_nacimiento").focus().select();

                        });

                    } else {

                        if ($("#edad").val() == "") {

                            bootbox.alert({

                                message: "Ingrese la edad actual.",

                                className: 'rubberBand animated',

                                onEscape: function () {

                                    $('.bootbox.modal').modal('hide');

                                }

                            }).on('hidden.bs.modal', function (event) {

                                $("#edad").focus().select();

                            });

                        } else {

                            if ($("#cel_gestfamiliar").val() == "") {

                                bootbox.alert({

                                    message: "Ingrese el número de celular.",

                                    className: 'rubberBand animated',

                                    onEscape: function () {

                                        $('.bootbox.modal').modal('hide');

                                    }

                                }).on('hidden.bs.modal', function (event) {

                                    $("#cel_gestfamiliar").focus().select();

                                });

                            } else {

                                if ($("#direccion").val() == "") {

                                    bootbox.alert({

                                        message: "Ingrese la dirección de su domicilio.",

                                        className: 'rubberBand animated',

                                        onEscape: function () {

                                            $('.bootbox.modal').modal('hide');

                                        }

                                    }).on('hidden.bs.modal', function (event) {

                                        $("#direccion").focus().select();

                                    });

                                } else {

                                    if ($("#red").val() == "") {

                                        bootbox.alert({

                                            message: "Ingrese la red de salud.",

                                            className: 'rubberBand animated',

                                            onEscape: function () {

                                                $('.bootbox.modal').modal('hide');

                                            }

                                        }).on('hidden.bs.modal', function (event) {

                                            $("#red").focus().select();

                                        });

                                    } else {

                                            if ($("#cod_ipress").val() == "") {

                                                bootbox.alert({

                                                    message: "Ingrese el código renaes de la ipress.",

                                                    className: 'rubberBand animated',

                                                    onEscape: function () {

                                                        $('.bootbox.modal').modal('hide');

                                                    }

                                                }).on('hidden.bs.modal', function (event) {

                                                    $("#cod_ipress").focus().select();

                                                });

                                            } else {

                                                if ($("#ipress option:selected").text() == "SELECCIONE" || $("#ipress option:selected").text() == "") {

                                                    bootbox.alert({

                                                        message: "Seleccione la ipress.",

                                                        className: 'rubberBand animated',

                                                        onEscape: function () {

                                                            $('.bootbox.modal').modal('hide');

                                                        }

                                                    }).on('hidden.bs.modal', function (event) {

                                                        $("#ipress").focus().select();

                                                    });

                                                } else {

                                                    if ($("#categoria").val() == "") {

                                                        bootbox.alert({

                                                            message: "ingrese la categoria de la ipress.",

                                                            className: 'rubberBand animated',

                                                            onEscape: function () {

                                                                $('.bootbox.modal').modal('hide');

                                                            }

                                                        }).on('hidden.bs.modal', function (event) {

                                                            $("#categoria").focus().select();

                                                        });

                                                    } else {

                                                        if ($("#fecha_atencion").val() == "") {

                                                            bootbox.alert({

                                                                message: "Ingrese la primera fecha de atención.",

                                                                className: 'rubberBand animated',

                                                                onEscape: function () {

                                                                    $('.bootbox.modal').modal('hide');

                                                                }

                                                            }).on('hidden.bs.modal', function (event) {

                                                                $("#fecha_atencion").focus().select();

                                                            });

                                                        } else {

                                                            if ($("#fum").val() == "") {

                                                                bootbox.alert({

                                                                    message: "Ingrese la fecha ultima de mestruación.",

                                                                    className: 'rubberBand animated',

                                                                    onEscape: function () {

                                                                        $('.bootbox.modal').modal('hide');

                                                                    }

                                                                }).on('hidden.bs.modal', function (event) {

                                                                    $("#fum").focus().select();

                                                                });

                                                            } else {

                                                                if ($("#fpp").val() == "") {

                                                                    bootbox.alert({

                                                                        message: "Ingrese la fecha probable de parto.",

                                                                        className: 'rubberBand animated',

                                                                        onEscape: function () {

                                                                            $('.bootbox.modal').modal('hide');

                                                                        }

                                                                    }).on('hidden.bs.modal', function (event) {

                                                                        $("#fpp").focus().select();

                                                                    });

                                                                } else {

                                                                    if ($("#se").val() == "") {

                                                                        bootbox.alert({

                                                                            message: "Ingrese la semana epidemiológica.",

                                                                            className: 'rubberBand animated',

                                                                            onEscape: function () {

                                                                                $('.bootbox.modal').modal('hide');

                                                                            }

                                                                        }).on('hidden.bs.modal', function (event) {

                                                                            $("#se").focus().select();

                                                                        });

                                                                    } else {

                                                                        if ($("#eg_captada").val() == "") {

                                                                            bootbox.alert({

                                                                                message: "Ingrese la edad gestacional captada.",

                                                                                className: 'rubberBand animated',

                                                                                onEscape: function () {

                                                                                    $('.bootbox.modal').modal('hide');

                                                                                }

                                                                            }).on('hidden.bs.modal', function (event) {

                                                                                $("#eg_captada").focus().select();

                                                                            });

                                                                        } else {

                                                                            if ($("#eg_actual").val() == "") {

                                                                                bootbox.alert({

                                                                                    message: "Ingrese la edad gestacional actual.",

                                                                                    className: 'rubberBand animated',

                                                                                    onEscape: function () {

                                                                                        $('.bootbox.modal').modal('hide');

                                                                                    }

                                                                                }).on('hidden.bs.modal', function (event) {

                                                                                    $("#eg_actual").focus().select();

                                                                                });

                                                                            } else {

                                                                                if ($("#hb_ajustado").val() == "") {

                                                                                    bootbox.alert({

                                                                                        message: "Ingrese el valor ajustado de la hemoglobina.",

                                                                                        className: 'rubberBand animated',

                                                                                        onEscape: function () {

                                                                                            $('.bootbox.modal').modal('hide');

                                                                                        }

                                                                                    }).on('hidden.bs.modal', function (event) {

                                                                                        $("#hb_ajustado").focus().select();

                                                                                    });

                                                                                } else {

                                                                                    if ($("#factor_riesgo option:selected").text() == "SELECCIONE" || $("#factor_riesgo option:selected").text() == "") {

                                                                                        bootbox.alert({

                                                                                            message: "Seleccione el factor de riesgo.",

                                                                                            className: 'rubberBand animated',

                                                                                            onEscape: function () {

                                                                                                $('.bootbox.modal').modal('hide');

                                                                                            }

                                                                                        }).on('hidden.bs.modal', function (event) {

                                                                                            $("#factor_riesgo").focus().select();

                                                                                        });

                                                                                    } else {

                                                                                        if ($("#tamizaje_vif option:selected").text() == "SELECCIONE" || $("#tamizaje_vif option:selected").text() == "") {

                                                                                            bootbox.alert({

                                                                                                message: "Seleccione el tamizaje VIF.",

                                                                                                className: 'rubberBand animated',

                                                                                                onEscape: function () {

                                                                                                    $('.bootbox.modal').modal('hide');

                                                                                                }

                                                                                            }).on('hidden.bs.modal', function (event) {

                                                                                                $("#tamizaje_vif").focus().select();

                                                                                            });

                                                                                        } else {

                                                                                            if ($("#obs_red").val() == "") {

                                                                                                bootbox.alert({

                                                                                                    message: "Ingrese alguna observación.",

                                                                                                    className: 'rubberBand animated',

                                                                                                    onEscape: function () {

                                                                                                        $('.bootbox.modal').modal('hide');

                                                                                                    }

                                                                                                }).on('hidden.bs.modal', function (event) {

                                                                                                    $("#obs_red").focus().select();

                                                                                                });

                                                                                            } else {

                                                                                                //alert("guardar");

                                                                                                $("#btnGuardar").prop("disabled", true);

                                                                                                let formData = new FormData($("#formulario")[0]);
                                                                                                formData.append('departamentoInsert',$("#departamento option:selected").text())
                                                                                                formData.append('provinciaInsert',$("#provincia option:selected").text())
                                                                                                formData.append('distritoInsert',$("#distrito option:selected").text())
                                                                                                formData.append('centro_poblado_texto',$("#centro_poblado option:selected").text())
                                                                                                formData.append('altitud',$("#altitud").val())
                                                                                                formData.append('hb_altitud',$("#hb_altitud").val())
                                                                                                formData.append('microred',$("#otrared").val())
                                                                                                formData.append('peso',$("#peso").val())
                                                                                                formData.append('condicion_ges',$("#condicion_ges").val())
                                                                                                formData.append('origen',$("#origen").val())

                                                                                                $.ajax({

                                                                                                    url: "../ajax/registro.php?op=guardaryeditar",

                                                                                                    // desavilitando el tipo de metodo 15082024

                                                                                                    type: "POST",

                                                                                                    data: formData,

                                                                                                    contentType: false,

                                                                                                    processData: false,



                                                                                                    success: function (datos) {

                                                                                                        bootbox.alert(datos);

                                                                                                        mostrarform(false);

                                                                                                        tabla.ajax.reload();

                                                                                                    }

                                                                                                });

                                                                                                limpiar();

                                                                                            }

                                                                                        }

                                                                                    }

                                                                                }





                                                                            }

                                                                        }

                                                                    }

                                                                }

                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

    }

}



/*======================================================

=            Funcion para mostrar los datos            =

======================================================*/

function Mostrar(id_registro) {

    $.post("../ajax/registro.php?op=mostrar", { id_registro: id_registro }, function (data, status) {

        data = JSON.parse(data);
        
        mostrarform(true);

        $("#id_registro").val(data.id_registro);

        $("#num_documento").val(data.num_documento);

        $("#ape_paterno").val(data.ape_paterno);

        $("#ape_materno").val(data.ape_materno);

        $("#nombres").val(data.nombres);

        $("#fecha_nacimiento").val(data.fecha_nacimiento);

        $("#edad").val(data.edad);

        $("#cel_gestfamiliar").val(data.cel_gestfamiliar);

        // agregamos variables
        $("#departamento").val(data.departamento).trigger('change.select2');

        $("#provincia").val(data.provincia).trigger('change.select2');

        $("#distrito").val(data.distrito).trigger('change.select2');
        
        $("#centro_poblado").val(data.centro_poblado).trigger('change.select2');

        $("#altitud").val(data.altitud);

        $("#direccion").val(data.direccion);
        //fin
        var red = data.red;

        $.post("../ajax/registro.php?op=select_listarMicroredsegunRedes", { red: red }, function (r) {

            $("#microred").html(r);

            $('#microred').val(data.microred);

        });

        var microred = data.microred;

        $.post("../ajax/registro.php?op=select_listarIpresssegunMicrored", { microred: microred }, function (r) {

            $("#ipress").html(r);

            $('#ipress').val(data.ipress);

        });

        $("#cod_ipress").val(data.cod_ipress);

        $("#categoria").val(data.categoria);

        $("#fecha_atencion").val(data.fecha_atencion);

        $("#fum").val(data.fum);

        $("#fpp").val(data.fpp);

        $("#se").val(data.se);

        $("#eg_captada").val(data.eg_captada);

        $("#eg_actual").val(data.eg_actual);

        $("#hb_ajustado").val(data.hb_ajustado);

        $('#grupo_sanguineo').val(data.grupo_sanguineo).trigger('change.select2');

        $('#factor_rh').val(data.factor_rh).trigger('change.select2');

        $("#peso").val(data.peso);

        $("#condicion_ges").val(data.condicion_ges).trigger('change.select2');

        $("#origen").val(data.origen);

        $('#factor_riesgo').val(data.factor_riesgo).trigger('change.select2');

        $('#tamizaje_vif').val(data.tamizaje_vif).trigger('change.select2');

        $("#fecha_termino").val(data.fecha_termino);

        $('#termino').val(data.termino).trigger('change.select2');

        $('#lugar_termino').val(data.lugar_termino).trigger('change.select2');

        $("#obs_red").val(data.obs_red);

        $("#obs_diresa").val(data.obs_diresa);

        $("#numdoc_usuario").val(data.numdoc_usuario);

        $("#apenom_usuario").val(data.apenom_usuario);

    });

}

/*===============================================================================

=            Funcion para buscar el número de documento del paciente            =

===============================================================================*/

function buscarNumDocumento() {

    var textoBusqueda = $("#num_documento").val();

    if (textoBusqueda != "") {

        $.post("../ajax/registro.php?op=buscar_numdocumento", { num_documento: textoBusqueda }, function (data, status) {
             // Verificamos que data tenga contenido y parseamos el JSON si es necesario
            let red = JSON.parse(data);  // Si data es un JSON string, parseamos, de lo contrario, accedemos directamente


            bootbox.alert({

                message: "Se esta verificando el número de documento que ingreso, espere por favor...",

                className: 'rubberBand animated',

                onEscape: function () {

                    $('.bootbox.modal').modal('hide');

                }

            }).on('hidden.bs.modal', function (event) {

                if (data.length == 0) {

                    busquedaNumPaciente();

                } else if (data.length > 0) {



                    bootbox.alert({

                        message: "El número de documento " + textoBusqueda + " de la Gestante ya está registrada en la Base de Datos, " + " Red: " + red.red + " Microred: " + red.microred + " Ipress: " + red.ipress + " no es posible registrar",

                        className: 'rubberBand animated',

                        onEscape: function () {

                            $('.bootbox.modal').modal('hide');

                        }

                    }).on('hidden.bs.modal', function (event) {

                        limpiar();

                        $("#num_documento").focus();



                        // $.post("../ajax/registro.php?op=select_redsalud", function (data) {

                        //     data = JSON.parse(data);

                        //     $("#red").val(data.descripcion_red);

                        // });


                    });

                }

            });

        });

    }

}



/*========================================================================================

=            Funcion para ver si encontro el número de documento del paciente            =

========================================================================================*/

function busquedaNumPaciente() {



    var textoBusqueda = $("#num_documento").val();



    if (textoBusqueda != "") {

        $.post("../ajax/registro.php?op=busqueda_numdocumento", { num_documento: textoBusqueda }, function (data, status) {

            if (data.length == 0) {

                bootbox.alert({

                    message: "No se encuentra el número de documento ingresado.<br> Puede registrar los datos de la Gestante",

                    className: 'rubberBand animated',

                    onEscape: function () {

                        $('.bootbox.modal').modal('hide');

                    }

                }).on('hidden.bs.modal', function (event) {

                    $("#ape_paterno").focus();

                });

            } else if (data.length > 0) {

                data = JSON.parse(data);



            }

        });

    }

}



/*============================================================================

=            Funcion para completar ceros con codigo de la ipress            =

============================================================================*/

function rellenarCodIpress(cadena, valor) {

    var data = document.getElementById('cod_ipress').value;

    $("#cod_ipress").val(data.padStart(cadena, valor));

}



/*==========================================================================

=            Funcion para validar el codigo renaes de la ipress            =

==========================================================================*/

function validarCodRenaes() {

    rellenarCodIpress(8, 0);

}



/*=====================================================

=            Funcion para calcular la edad            =

=====================================================*/

function calcularEdad() {

    fecha = $('#fecha_nacimiento').val();

    var hoy = new Date();

    var cumpleanos = new Date(fecha);

    var edad = hoy.getFullYear() - cumpleanos.getFullYear();

    var m = hoy.getMonth() - cumpleanos.getMonth();



    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {

        edad--;

    }

    $('#edad').val(edad);

}



/*======================================================

=            Funcion que admite solo letras            =

======================================================*/

function soloLetras(e) {

    // KeyCode which para los eventos de muose o teclado, indica la tecla o un boton especifico que se presionó

    var key = e.keyCode || e.which;

    //fromCharCode convierte un numero unicode en un caracter

    var tecla = String.fromCharCode(key);

    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

    var especiales = [8, 27, 37, 39, 46];

    var tecla_especial = false;



    for (var i in especiales) {

        if (key == especiales[i]) {

            tecla_especial = false;

            break;

        }

    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {

        return false;

    }

}



/*========================================================================

=            Funcion para calcular la fecha probable de parto            =

========================================================================*/

function obtenerFPP() {

    var fecha_um = document.getElementById('fum');

    var fecha_pp = document.getElementById('fpp');

    var mes_inc = -3;

    var dia_inc = 7;

    var fechaProbableParto = new Date(fecha_um.value);

    fechaProbableParto.setDate(fechaProbableParto.getDate() + (dia_inc) + 1) + fechaProbableParto.setMonth(fechaProbableParto.getMonth() + (mes_inc)) + fechaProbableParto.setFullYear(fechaProbableParto.getFullYear() + 1);

    fecha_pp.value = setFormato(fechaProbableParto);



    obtenerEGActual();

}

function setFormato(fechaProbableParto) {

    var dia_formato = ("0" + fechaProbableParto.getDate()).slice(-2);

    var mes_fomato = ("0" + (fechaProbableParto.getMonth() + 1)).slice(-2);

    var fecha_formato = fechaProbableParto.getFullYear() + "-" + (mes_fomato) + "-" + (dia_formato);

    return fecha_formato;

}

/*========================================================================

=            Funcion para calcular la edad gestacional actual            =

========================================================================*/

function obtenerEGActual() {

    var valor_egactual = document.getElementById('eg_actual');

    var fecha_um = new Date(document.getElementById('fum').value);

    var fecha_actual = new Date();



    var valor_inicial = fecha_um.getTime();

    var valor_final = fecha_actual.getTime();



    var diferencia = valor_final - valor_inicial;



    var resultado = Math.round(Math.round((diferencia) / (1000 * 60 * 60 * 24)) / 7);

    valor_egactual.value = resultado;

}



/*=======================================================

=            Funcion que admite solo numeros            =

=======================================================*/

function soloNumeros(e) {

    // KeyCode which para los eventos de muose o teclado, indica la tecla o un boton especifico que se presionó

    var key = e.keyCode || e.which;

    //fromCharCode convierte un numero unicode en un caracter

    var tecla = String.fromCharCode(key);

    var numeros = "0123456789";

    var especiales = [8, 27, 37, 39, 46];

    var tecla_especial = false;



    for (var i in especiales) {

        if (key == especiales[i]) {

            tecla_especial = false;

            break;

        }

    }

    if (numeros.indexOf(tecla) == -1 && !tecla_especial) {

        return false;

    }

}



/*================================================================

=            Funcion que admite valores con decimales            =

================================================================*/

function soloDecimales(e) {

    // KeyCode which para los eventos de muose o teclado, indica la tecla o un boton especifico que se presionó

    var key = e.keyCode || e.which;

    //fromCharCode convierte un numero unicode en un caracter

    var tecla = String.fromCharCode(key);

    var numeros = "0123456789.";

    var especiales = [8, 27, 37, 39, 46];

    var tecla_especial = false;



    for (var i in especiales) {

        if (key == especiales[i]) {

            tecla_especial = false;

            break;

        }

    }

    if (numeros.indexOf(tecla) == -1 && !tecla_especial) {

        return false;

    }

}



init();