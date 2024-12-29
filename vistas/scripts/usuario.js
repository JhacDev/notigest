var tabla;

/*========================================================

=            Funcion que se ejecuta al inicio            =

========================================================*/

function init(){    

    mostrarform(false);

    Listar();

    cargarSelect();



    $("#formulario").on("submit",function(e){ 

        Guardaryeditar(e);

    });

}



/*=======================================================

=            Funcion para mostrar formulario            =

=======================================================*/

function mostrarform(flag){

    limpiar();

    if (flag) {

        $("#listadoregistros").hide();

        $("#formularioregistros").show();

        $("#btnGuardar").prop("disabled", false);

        $("#btnAgregar").hide();

        $("#tipodocidentidad").focus();

    }else {

        $("#listadoregistros").show();

        $("#formularioregistros").hide();

        $("#btnAgregar").show();

    }

}



/*=======================================================

=            Funcion para limpiar formulario            =

=======================================================*/

function limpiar(){

    $("#id_usuario").val("");

    $('#tipodocidentidad').val(null).trigger('change.select2');

    $("#numdoc_usuario").val("");

    $("#apenom_usuario").val("");

    $("#numtele_usuario").val("");

    $("#email_usuario").val("");

    $('#tipousuario').val(null).trigger('change.select2');

    $('#red').val(null).trigger('change.select2');

    $("#usuario_sistema").val("");

    $("#password_sistema").val("");

}



/*=========================================================

=            Funcion para cancelar el registro            =

=========================================================*/

function cancelarform(){

    limpiar();

    mostrarform(false);

}



/*==================================================

=            Funcion para cargar select            =

==================================================*/

function cargarSelect(){

    $('.select2').select2();

    //Mostramos el tipo de documento de identidad

    $.post("../ajax/usuario.php?op=select_tipodoc",function(r){

        $("#tipodocidentidad").html(r);

    });

    //Mostramos el tipo de usuario

    $.post("../ajax/usuario.php?op=select_tipousu",function(r){

        $("#tipousuario").html(r);

    });

    //Mostramos las redes de salud

    $.post("../ajax/usuario.php?op=select_redsalud",function(r){

        $("#red").html(r);

    });

}



/*===========================================

=            Funcion para listar            =

===========================================*/

function Listar(){



    tabla = $("#tblistado").dataTable({

        "aProcessing": true, 

        "aServerSide": true, 

        "responsive": true,

        "lengthChange": false, 

        "autoWidth": false,

        dom: 'Bfrtip', 

        buttons: [ {

            extend:    'copyHtml5',

            text:      '<i class="far fa-copy"></i>',

            titleAttr: 'Copiar',

            title: 'Listado de los usuarios del sistema'

        }, {

            extend:    'excelHtml5',

            text:      '<i class="far fa-file-excel"></i>',

            titleAttr: 'Excel',

            title: 'Listado de los usuarios del sistema'

        }, {

            extend:    'csvHtml5',

            text:      '<i class="fas fa-file-csv"></i>',

            titleAttr: 'CSV',

            title: 'Listado de los usuarios del sistema'

        }, {

            extend:    'pdfHtml5',

            text:      '<i class="far fa-file-pdf"></i>',

            titleAttr: 'PDF',

            title: 'Listado de los usuarios del sistema'

        }],

        "ajax": {

            url: '../ajax/usuario.php?op=listar',

            type: "get",

            dataType: "json",

            error: function(e) {

                console.log(e.responseText);

            }

        },

        "bDestroy": true,

        "iDisplayLength": 15, 

        "order": [[0,"asc"]]

    }).DataTable();

}



/*=====================================================

=            Funcion para guardar y editar            =

=====================================================*/

function Guardaryeditar(e) {

    e.preventDefault();

    if($("#tipodocidentidad option:selected").text() == "SELECCIONE" || $("#tipodocidentidad option:selected").text() == "") {

        bootbox.alert({

            message: "Seleccione el tipo de documento de identidad.",

            className: 'rubberBand animated',

            onEscape: function () {

                $('.bootbox.modal').modal('hide');            

            }

        }).on('hidden.bs.modal', function(event){

            $("#tipodocidentidad").focus().select();

        });

    }else {

        if($("#numdoc_usuario").val() == "") {

            bootbox.alert({

                message: "Ingrese el número de documento de identidad.",

                className: 'rubberBand animated',

                onEscape: function () {

                    $('.bootbox.modal').modal('hide');            

                }

            }).on('hidden.bs.modal', function(event){

                $("#numdoc_usuario").focus().select();

            });            

        }

        else {

            if($("#apenom_usuario").val() == "") {

                bootbox.alert({

                    message: "Ingrese los apellidos y nombres completos.",

                    className: 'rubberBand animated',

                    onEscape: function () {

                        $('.bootbox.modal').modal('hide');            

                    }

                }).on('hidden.bs.modal', function(event){

                    $("#apenom_usuario").focus().select();

                });            

            }

            else {

                if($("#numtele_usuario").val() == "") {

                    bootbox.alert({

                        message: "Ingrese el número telefonico.",

                        className: 'rubberBand animated',

                        onEscape: function () {

                            $('.bootbox.modal').modal('hide');            

                        }

                    }).on('hidden.bs.modal', function(event){

                        $("#numtele_usuario").focus().select();

                    });            

                }

                else {

                    if($("#email_usuario").val() == "") {

                        bootbox.alert({

                            message: "Ingrese el correo electrónico.",

                            className: 'rubberBand animated',

                            onEscape: function () {

                                $('.bootbox.modal').modal('hide');            

                            }

                        }).on('hidden.bs.modal', function(event){

                            $("#email_usuario").focus().select();

                        });            

                    }

                    else {

                        if($("#tipousuario option:selected").text() == "SELECCIONE" || $("#tipousuario option:selected").text() == "") {

                            bootbox.alert({

                                message: "Seleccione el tipo de usuario.",

                                className: 'rubberBand animated',

                                onEscape: function () {

                                    $('.bootbox.modal').modal('hide');            

                                }

                            }).on('hidden.bs.modal', function(event){

                                $("#tipousuario").focus().select();

                            });            

                        }

                        else {

                            if($("#red option:selected").text() == "SELECCIONE" || $("#red option:selected").text() == "") {

                                bootbox.alert({

                                    message: "Seleccione la red de salud.",

                                    className: 'rubberBand animated',

                                    onEscape: function () {

                                        $('.bootbox.modal').modal('hide');            

                                    }

                                }).on('hidden.bs.modal', function(event){

                                    $("#red").focus().select();

                                });            

                            }

                            else {

                                if($("#usuario_sistema").val() == "") {

                                    bootbox.alert({

                                        message: "Ingrese el usuario al sistema.",

                                        className: 'rubberBand animated',

                                        onEscape: function () {

                                            $('.bootbox.modal').modal('hide');            

                                        }

                                    }).on('hidden.bs.modal', function(event){

                                        $("#usuario_sistema").focus().select();

                                    });            

                                }

                                else {

                                    if($("#password_sistema").val() == "") {

                                        bootbox.alert({

                                            message: "Ingrese el password al sistema.",

                                            className: 'rubberBand animated',

                                            onEscape: function () {

                                                $('.bootbox.modal').modal('hide');            

                                            }

                                        }).on('hidden.bs.modal', function(event){

                                            $("#password_sistema").focus().select();

                                        });            

                                    }

                                    else {

                                        $("#btnGuardar").prop("disabled", true);                                                    

                                        var formData = new FormData($("#formulario")[0]);

                                        $.ajax({

                                            url: "../ajax/usuario.php?op=guardaryeditar",

                                            type: "POST",

                                            data: formData,

                                            contentType: false,

                                            processData: false,



                                            success: function(datos){

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



/*======================================================

=            Funcion para mostrar los datos            =

======================================================*/

function Mostrar(id_usuario){                

    $.post("../ajax/usuario.php?op=mostrar",{id_usuario : id_usuario}, function(data, status){

        data = JSON.parse(data);

        mostrarform(true);

        $("#id_usuario").val(data.id_usuario);

        $('#tipodocidentidad').val(data.tipodocidentidad).trigger('change.select2');

        $("#numdoc_usuario").val(data.numdoc_usuario);

        $("#apenom_usuario").val(data.apenom_usuario);

        $("#numtele_usuario").val(data.numtele_usuario);

        $("#email_usuario").val(data.email_usuario);

        $('#tipousuario').val(data.tipousuario).trigger('change.select2');

        $('#red').val(data.red).trigger('change.select2');

        $("#usuario_sistema").val(data.usuario_sistema);

        $("#password_sistema").val(data.password_sistema);

    });

}



/*=========================================================

// FUNCION PARA OBNETER UNA MICRO RED EN BASE AL TIPO DE USUARIO

=========================================================*/



$('#tipousuario').on( "change", function(e) {

    let usertype = e.target.value

    let dataHtml = document.getElementById('addHtml')



    if(usertype == 'USUARIO')

        {

            dataHtml.classList.add('form-group')

        dataHtml.innerHTML = `<label for="red">MicroRed</label>

								<select class="form-control select2" id="microRed" name="microRed" data-placeholder="SELECCIONE UNA MICRORED" style="width: 100%;"></select>

								`

        $('#microRed').select2()

    }else{

        dataHtml.innerHTML = ''

    }



})



$('#red').on( "change", function(e) {



    $.get("../ajax/usuario.php?op=selectMicrored",{redMicro : e.target.value}, function(data){



        $('#microRed').html(data)



    })



})



/*=========================================================

// FIN DE LA  FUNCION PARA OBNETER UNA MICRO RED EN BASE AL TIPO DE USUARIO

=========================================================*/





/*=========================================================

=            Funcion para desactivar registros            =

=========================================================*/

function Desactivar(id_usuario){

    bootbox.confirm({

        message: "¿Esta seguro de desactivar el usuario del sistema?",

        buttons: {

            confirm: {

                label: '<i class="fa fa-check"></i> Si',

                className: 'btn btn-primary'

            },

            cancel: {

                label: '<i class="fa fa-times"></i> No',

                className: 'btn btn-danger'

            }

        },

        callback: function (result) {

            if (result === true) {

                $.post("../ajax/usuario.php?op=desactivar",{id_usuario : id_usuario}, function(e){

                    bootbox.alert(e); 

                    tabla.ajax.reload(); 

                });

            } else {

                tabla.ajax.reload(); 

            }

        }

    });

}



/*======================================================

=            Funcion para activar registros            =

======================================================*/

function Activar(id_usuario){

    bootbox.confirm({

        message: "¿Esta seguro de activar el usuario del sistema?",

        buttons: {

            confirm: {

                label: '<i class="fa fa-check"></i> Si',

                className: 'btn btn-primary'

            },

            cancel: {

                label: '<i class="fa fa-times"></i> No',

                className: 'btn btn-danger'

            }

        },

        callback: function (result) {

            if (result === true) {

                $.post("../ajax/usuario.php?op=activar",{id_usuario : id_usuario}, function(e){

                    bootbox.alert(e); 

                    tabla.ajax.reload(); 

                });

            } else {

                tabla.ajax.reload(); 

            }

        }

    });

}



/*=============================================================

=            Autocompletar o pegar email a usuario            =

=============================================================*/

function copiarEmail(e) {  

    var value = $("#email_usuario").val();         

    $("#usuario_sistema").val(value);     

}



/*==============================================================================

=            Funcion para buscar el número de documento del usuario            =

==============================================================================*/

function buscarDniUsuario() {



    var tipodocidentidad = $("#tipodocidentidad").val();

    var textoBusqueda = $("#numdoc_usuario").val();



    if (textoBusqueda != "") {

        $.post("../ajax/usuario.php?op=buscar_dni_usuario", {tipodocidentidad: tipodocidentidad, numdoc_usuario: textoBusqueda}, function(data, status){

            bootbox.alert({

                message: "Se esta verificando el número de documento que ingreso, espere por favor...",

                className: 'rubberBand animated',

                onEscape: function () {

                    $('.bootbox.modal').modal('hide');            

                }

            }).on('hidden.bs.modal', function(event){

                if(data.length == 0){

                    buscaquedaDniUsuario();

                }else if(data.length > 0){

                    bootbox.alert({

                        message: "El número de documento ya fue registrado, ingrese otro número de documento.",

                        className: 'rubberBand animated',

                        onEscape: function () {

                            $('.bootbox.modal').modal('hide');            

                        }

                    }).on('hidden.bs.modal', function(event){

                        $("#numdoc_usuario").val("");

                        $("#numdoc_usuario").focus();

                    });

                }

            });

        });

    }

}



/*=======================================================================================

=            Funcion para ver si encontro el número de documento del usuario            =

=======================================================================================*/

function buscaquedaDniUsuario() {



    var tipodocidentidad = $("#tipodocidentidad").val();

    var textoBusqueda = $("#numdoc_usuario").val();



    if (textoBusqueda != "") {

        $.post("../ajax/usuario.php?op=busqueda_dni_usuario", {tipodocidentidad: tipodocidentidad, numdoc_usuario: textoBusqueda}, function(data, status) {

            if(data.length == 0){

                bootbox.alert({

                    message: "No se encuentra el número de documento ingresado.<br> Puede proceder a registrarlo",

                    className: 'rubberBand animated',

                    onEscape: function () {

                        $('.bootbox.modal').modal('hide');  

                    }          

                }).on('hidden.bs.modal', function(event){

                    $("#apenom_usuario").focus();

                });

            }else if(data.length > 0){

                data = JSON.parse(data);

                //console.log(data);

            }

        });

    }

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

    var especiales = [8,27,37,39,46];

    var tecla_especial = false;



    for(var i in especiales){

        if(key == especiales[i]){

            tecla_especial = false;

            break;

        }

    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){

        return false;

    }

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

    var especiales = [8,27,37,39,46];

    var tecla_especial = false;



    for(var i in especiales){

        if(key == especiales[i]){

            tecla_especial = false;

            break;

        }

    }

    if(numeros.indexOf(tecla) == -1 && !tecla_especial){

        return false;

    }

}





init();