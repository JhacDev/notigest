/*========================================================

=            Funcion que se ejecuta al inicio            =

========================================================*/

function init() {

    ocultarControles();

    mostrarform(false);

    

}



/*======================================================

=            Funcion para ocultar controles            =

======================================================*/

function ocultarControles() { 

    $("#tablareporte").hide();

}



/*===============================================================

=            Funcion para generar el reporte general            =

===============================================================*/

function generarRptGeneral() {

    $("#tablareporte").show();

    RptGeneralNotigest();

    

}

/*=========================================================

=            Funcion para elimar registros            =

=========================================================*/

function Eliminar(id){

    bootbox.confirm({

        message: "¿Esta seguro de eliminar el registro del sistema?",

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

                $.post("../ajax/reporte_notigest.php?op=delete",{id}, function(e){

                    bootbox.alert('Eliminado Correctamente'); 

                    tabla.ajax.reload();

                });

            } else {

                bootbox.alert('Algo salio mal'); 

                tabla.ajax.reload(); 

            }

        }

    });

}



let formularioRegistro = document.getElementById('formulario')



if (formularioRegistro) {

    formularioRegistro.addEventListener('submit', e => {

    e.preventDefault()



    updateData()

})    

}



const updateData = async() =>{



    try {

        

        let formdata = new FormData(formularioRegistro)

        formdata.append('id',$('#id_registro').val())

        formdata.append('fecha_termino',$('#fecha_termino').val())

        formdata.append('termino',$('#termino').val())

        formdata.append('lugar_termino',$('#lugartermino').val())

        formdata.append('obs_diresa',$('#obs_diresa').val())

        formdata.append('obs_red',$('#obs_red').val())

        

        const response = await fetch('../ajax/reporte_notigest.php?op=editar', {

            method: 'POST',

            body: formdata,

            });

    

            if (response.ok) {

                const data = await response.json();

                console.log('Response data:', data);

                mostrarform(false);

                tabla.ajax.reload()

            }



    } catch (error) {

        console.log(error)

    }



}



/*=======================================================



=            Funcion para mostrar formulario            =



=======================================================*/



function mostrarform(flag) {



   // limpiar();



    if (flag) {



        $("#listadoregistros").hide();



        $("#formularioregistros").show();



        $("#btnGuardar").prop("disabled", false);



        //$("#btnAgregar").hide();



        $("#num_documento").focus();











    } else {



        $("#listadoregistros").show();



        $("#formularioregistros").hide();



        //$("#btnAgregar").show();



    }







}







/*=========================================================



=            Funcion para cancelar el registro            =



=========================================================*/



function cancelarform() {



    // limpiar();



    mostrarform(false);



    // deshabilitarControles();



}





    //Mostramos el termino



    $.get("../ajax/reporte_notigest.php?op=select_termino", function (r) {



        $("#termino").html(r);



    });



    //Mostramos el lugar de termino



    $.get("../ajax/reporte_notigest.php?op=select_lugartermino", function (r) {



        $("#lugartermino").html(r);



    });









/*==============================================================

=            Funcion para listar el reporte general            =

==============================================================*/

function RptGeneralNotigest() {

    tabla = $("#tblistado_notigest").dataTable({

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

            title: 'Notificación de Gestantes - NOTIGEST'

        }, {

            extend:    'excelHtml5',

            text:      '<i class="far fa-file-excel"></i>',

            titleAttr: 'Excel',

            title: 'Notificación de Gestantes - NOTIGEST',

            excelStyles: [

                // ancho de las columnas
                
                
                {cells: 'sA', width: 5},
                {cells: 'sB', width: 12},
                {cells: 'sC', width: 30},
                {cells: 'sD', width: 12},
                {cells: 'sE', width: 10},
                {cells: 'sF', width: 5},
                {cells: 'sG', width: 12},
                {cells: 'sH', width: 18},
                {cells: 'sI', width: 18},
                {cells: 'sJ', width: 20},
                {cells: 'sK', width: 17},
                {cells: 'sL', width: 12},
                {cells: 'sM', width: 10},
                {cells: 'sN', width: 12},
                {cells: 'sO', width: 12},
                {cells: 'sP', width: 12},
                {cells: 'sQ', width: 11},
                {cells: 'sR', width: 11},
                {cells: 'sS', width: 14},
                {cells: 'sT', width: 20},
                {cells: 'sU', width: 20},
                {cells: 'sV', width: 35},
                {cells: 'sW', width: 9},
                {cells: 'sX', width: 35},
                {cells: 'sY', width: 12},
                {cells: 'sZ', width: 12},
                {cells: 'sAA', width: 12},
                {cells: 'sAB', width: 8},
                {cells: 'sAC', width: 30},
                {cells: 'sAD', width: 11},
                {cells: 'sAE', width: 12},
                {cells: 'sAF', width: 14},
                {cells: 'sAG', width: 9},
                {cells: 'sAH', width: 18},
                {cells: 'sAI', width: 20},
                {cells: 'sAJ', width: 22},
                {cells: 'sAK', width: 11},
                {cells: 'sAL', width: 26},
                {cells: 'sAM', width: 15},
                
                {

                // Estilo de la fila 2 (Cabecera),

                cells: '2', 

                style: {

                    font: { name: 'Arial', size: '10', color: 'FFFFFF', b: true },

                    fill: {

                        pattern: { color: '175B27' }

                    },

                    alignment: { vertical: "center", horizontal: "center", wrapText: true },

                    border: { 

                        top: { style: "thin", color: "FFFFFF" },

                        bottom: { style: "thin", color: "FFFFFF" },

                        left: { style: "thin", color: "FFFFFF" },

                        right: { style: "thin", color: "FFFFFF" }

                    }                    

                }

            }, {

                // Fuentede todo el documento

                cells: ["A3:"],

                style: {

                    font: { name: 'Cambria', size: '10', color: '000000', b: false },

                }

            }, {

                // Estilo de la edad gestacional captada               

                cells: 'sAE' , 

                condition: { type: 'cellIs', operator: 'between', formula: [1,14] },

                style: { 

                    font: { color: '375623', b: true },

                    fill: {

                        pattern: {                                

                            bgColor: 'E7FED6'

                        }

                    }

                }

            }, {               

                cells: 'sAE' , 

                condition: { type: 'cellIs', operator: 'between', formula: [15,27] },

                style: {

                    font: { color: 'B45501', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FFEDDA'

                        }

                    }

                }

            }, {               

                cells: 'sAE' , 

                condition: { type: 'cellIs', operator: 'between', formula: [28,40] },

                style: {

                    font: { color: 'B50303', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            }, 
            {               

                cells: 'sZ' , 

                condition: { type: 'cellIs', operator: 'between', formula: [5,11] },

                style: {

                    font: { color: 'B50303', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            },
            {               

                cells: 'sAE' , 

                condition: { type: 'cellIs', operator: 'greaterThan', formula: 40 },

                style: {

                    font: { color: '000000', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FFFFFF'

                        }

                    }

                }

            }, {  

                // Estilo de la edad gestacional actual              

                cells: 'sQ' , 

                condition: { type: 'cellIs', operator: 'between', formula: [1,29] },

                style: {

                    font: { color: '375623', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'E7FED6'

                        }

                    }

                }

            }, {               

                cells: 'sQ' , 

                condition: { type: 'cellIs', operator: 'between', formula: [30,36] },

                style: {

                    font: { color: 'C39000', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FFF1C7'

                        }

                    }

                }

            }, {               

                cells: 'sQ' , 

                condition: { type: 'cellIs', operator: 'between', formula: [37,41] },

                style: {

                    font: { color: 'B45501', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FFEDDA'

                        }

                    }

                }

            }, {               

                cells: 'sQ' , 

                condition: { type: 'cellIs', operator: 'greaterThan', formula: 41 },

                style: {

                    font: { color: 'FEE1E1', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            }, {

                // Estilo del grupo sanguíneo 

                cells: "sAA",                    

                condition: { type: "expression", formula: "OR($AA3=\"A\",$AA3=\"B\",$AA3=\"AB\")" },

                style: {

                    font: { color: 'B50303', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            }, {

                cells: "sAA",                    

                condition: { type: "expression", formula: "$AA3=\"O\"" },

                style: {

                    font: { color: '375623', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'E7FED6'

                        }

                    }

                }

            }, {

                // Estilo del tamizaje VIF 

                cells: "sAD",                    

                condition: { type: "expression", formula: "$AD3=\"NEGATIVO\"" },

                style: {

                    font: { color: '09477E', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'DEEFFF'

                            // width:'10px'

                        }

                    }

                }

            }, {

                cells: "sAD",                    

                condition: { type: "expression", formula: "$AD3=\"POSITIVO\"" },

                style: {

                    font: { color: 'B50303', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            }, {

                // Estilo centrado de las columnas 

                cells: ["C3:Cn", "E3:En", "F3:Fn", "G3:Gn", "K3:Kn", "L3:Ln", "M3:Mn", "N3:Nn", "O3:On", "P3:Pn", "T3:Tn", "U3:Un", "V3:Vn", "X3:Xn", "Y3:Yn"],

                style: {

                    font: { name: 'Arial', size: '9', color: '000000', b: false },

                    alignment: {

                        vertical: "center",

                        horizontal: "center",

                        wrapText: true,

                    }

                }

            }]            

        }, {

            extend:    'csvHtml5',

            text:      '<i class="fas fa-file-csv"></i>',

            titleAttr: 'CSV',

            title: 'Notificación de Gestantes - NOTIGEST'

        }],

        "ajax": {

            url: '../ajax/reporte_notigest.php?op=rptgeneralnotigest',

            type: "get",

            dataType: "json",

            error: function(e) {

                console.log(e.responseText);

            }

        },

        "bDestroy": true,

        "iDisplayLength": 15, 

        "ordering": false,

        //"order": [[0,"desc"]],

        rowCallback: function(row, data, index) {

            // Estilo para la edad gestacioanl captada

            if(data["15"] >= 1 && data["15"] <= 14) {

                $('td', row).eq(15).css({

                    'background-color': '#E7FED6', 'color': '#375623', 'font-weight': 'bold'

                });

            } else if(data["15"] >= 15 && data["15"] <= 27) {

                $('td', row).eq(15).css({

                    'background-color': '#FFEDDA', 'color': '#B45501', 'font-weight': 'bold'

                });

            } else if(data["15"] >= 28 && data["15"] <= 40) {

                $('td', row).eq(15).css({

                    'background-color': '#FEE1E1', 'color': '#B50303', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(15).css({

                    'background-color': '#FFFFFF', 'color': '#000000', 'font-weight': 'bold'

                });

            }

            // Estilo para la edad gestacional actual

            if(data["24"] >= 1 && data["24"] <= 29) {

                $('td', row).eq(24).css({

                    'background-color': '#E7FED6', 'color': '#375623', 'font-weight': 'bold'

                });

            } else if(data["24"] >= 30 && data["24"] <= 36) {

                $('td', row).eq(24).css({

                    'background-color': '#FFF1C7', 'color': '#C39000', 'font-weight': 'bold'

                });

            } else if(data["24"] >= 37 && data["24"] <= 41) {

                $('td', row).eq(24).css({

                    'background-color': '#FFEDDA', 'color': '#B45501', 'font-weight': 'bold'

                });

            } else if(data["24"] >= 42) {

                $('td', row).eq(24).css({

                    'background-color': '#FEE1E1', 'color': '#FEE1E1', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(24).css({

                    'background-color': '#FFFFFF', 'color': '#000000', 'font-weight': 'bold'

                });

            }

            // Estilo para el grupo sanguíneo

            if(data["20"] == "A" || data["20"] == "B" || data["20"] == "AB") {

                $('td', row).eq(20).css({

                    'background-color': '#FEE1E1', 'color': '#B50303', 'font-weight': 'bold'

                });

            } else if(data["20"] == "O") {

                $('td', row).eq(20).css({

                    'background-color': '#E7FED6', 'color': '#375623', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(20).css({

                    'background-color': '#FFFFFF', 'color': '#3B3B3B', 'font-weight': 'bold'

                });

            }

            // Estilo para el grupo sanguíneo

            if(data["23"] == "POSITIVO") {

                $('td', row).eq(23).css({

                    'background-color': '#FEE1E1', 'color': '#B50303', 'font-weight': 'bold'

                });

            } else if(data["23"] == "NEGATIVO") {

                $('td', row).eq(23).css({

                    'background-color': '#DEEFFF', 'color': '#09477E', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(23).css({

                    'background-color': '#FFFFFF', 'color': '#3B3B3B', 'font-weight': 'bold'

                });

            }

        }

    }).DataTable();

}



/*===============================================================

=            Funcion para generar el reporte Notigest por Red           =

===============================================================*/

function generarRptRed() {

    $("#tablareporte").show();

    RptNotigestRed();

}



/*==============================================================

=            Funcion para listar el reporte Notigest por Red           =

==============================================================*/

function RptNotigestRed() {

    tabla = $("#tblistado_notigest").dataTable({

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

            title: 'Notificación de Gestantes - NOTIGEST'

        }, {

            extend:    'excelHtml5',

            text:      '<i class="far fa-file-excel"></i>',

            titleAttr: 'Excel',

            title: 'Consolidado de Gestantes por Red - NOTIGEST',

            excelStyles: [

                // ancho de las columnas
                {cells: 'sA', width: 5},
                {cells: 'sB', width: 12},
                {cells: 'sC', width: 30},
                {cells: 'sD', width: 12},
                {cells: 'sE', width: 10},
                {cells: 'sF', width: 5},
                {cells: 'sG', width: 12},
                {cells: 'sH', width: 18},
                {cells: 'sI', width: 18},
                {cells: 'sJ', width: 20},
                {cells: 'sK', width: 17},
                {cells: 'sL', width: 12},
                {cells: 'sM', width: 10},
                {cells: 'sN', width: 12},
                {cells: 'sO', width: 12},
                {cells: 'sP', width: 12},
                {cells: 'sQ', width: 11},
                {cells: 'sR', width: 11},
                {cells: 'sS', width: 14},
                {cells: 'sT', width: 20},
                {cells: 'sU', width: 20},
                {cells: 'sV', width: 35},
                {cells: 'sW', width: 9},
                {cells: 'sX', width: 35},
                {cells: 'sY', width: 12},
                {cells: 'sZ', width: 12},
                {cells: 'sAA', width: 12},
                {cells: 'sAB', width: 8},
                {cells: 'sAC', width: 30},
                {cells: 'sAD', width: 11},
                {cells: 'sAE', width: 12},
                {cells: 'sAF', width: 14},
                {cells: 'sAG', width: 9},
                {cells: 'sAH', width: 18},
                {cells: 'sAI', width: 20},
                {cells: 'sAJ', width: 22},
                {cells: 'sAK', width: 11},
                {cells: 'sAL', width: 26},
                {cells: 'sAM', width: 15},

                {

                    // Estilo de la fila 2 (Cabecera),
    
                    cells: '2', 
    
                    style: {
    
                        font: { name: 'Arial', size: '10', color: 'FFFFFF', b: true },
    
                        fill: {
    
                            pattern: { color: '175B27' }
    
                        },
    
                        alignment: { vertical: "center", horizontal: "center", wrapText: true },
    
                        border: { 
    
                            top: { style: "thin", color: "FFFFFF" },
    
                            bottom: { style: "thin", color: "FFFFFF" },
    
                            left: { style: "thin", color: "FFFFFF" },
    
                            right: { style: "thin", color: "FFFFFF" }
    
                        }                    
    
                    }
    
                }, {
    
                    // Fuentede todo el documento
    
                    cells: ["A3:"],
    
                    style: {
    
                        font: { name: 'Cambria', size: '10', color: '000000', b: false },
    
                    }
    
                }, {
    
                    // Estilo de la edad gestacional captada               
    
                    cells: 'sAE' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [1,14] },
    
                    style: { 
    
                        font: { color: '375623', b: true },
    
                        fill: {
    
                            pattern: {                                
    
                                bgColor: 'E7FED6'
    
                            }
    
                        }
    
                    }
    
                }, {               
    
                    cells: 'sAE' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [15,27] },
    
                    style: {
    
                        font: { color: 'B45501', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FFEDDA'
    
                            }
    
                        }
    
                    }
    
                }, {               
    
                    cells: 'sAE' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [28,40] },
    
                    style: {
    
                        font: { color: 'B50303', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FEE1E1'
    
                            }
    
                        }
    
                    }
    
                }, 
                {               
    
                    cells: 'sZ' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [5,11] },
    
                    style: {
    
                        font: { color: 'B50303', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FEE1E1'
    
                            }
    
                        }
    
                    }
    
                },
                {               
    
                    cells: 'sAE' , 
    
                    condition: { type: 'cellIs', operator: 'greaterThan', formula: 40 },
    
                    style: {
    
                        font: { color: '000000', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FFFFFF'
    
                            }
    
                        }
    
                    }
    
                }, {  
    
                    // Estilo de la edad gestacional actual              
    
                    cells: 'sQ' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [1,29] },
    
                    style: {
    
                        font: { color: '375623', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'E7FED6'
    
                            }
    
                        }
    
                    }
    
                }, {               
    
                    cells: 'sQ' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [30,36] },
    
                    style: {
    
                        font: { color: 'C39000', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FFF1C7'
    
                            }
    
                        }
    
                    }
    
                }, {               
    
                    cells: 'sQ' , 
    
                    condition: { type: 'cellIs', operator: 'between', formula: [37,41] },
    
                    style: {
    
                        font: { color: 'B45501', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FFEDDA'
    
                            }
    
                        }
    
                    }
    
                }, {               
    
                    cells: 'sQ' , 
    
                    condition: { type: 'cellIs', operator: 'greaterThan', formula: 41 },
    
                    style: {
    
                        font: { color: 'FEE1E1', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FEE1E1'
    
                            }
    
                        }
    
                    }
    
                }, {
    
                    // Estilo del grupo sanguíneo 
    
                    cells: "sAA",                    
    
                    condition: { type: "expression", formula: "OR($AA3=\"A\",$AA3=\"B\",$AA3=\"AB\")" },
    
                    style: {
    
                        font: { color: 'B50303', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FEE1E1'
    
                            }
    
                        }
    
                    }
    
                }, {
    
                    cells: "sAA",                    
    
                    condition: { type: "expression", formula: "$AA3=\"O\"" },
    
                    style: {
    
                        font: { color: '375623', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'E7FED6'
    
                            }
    
                        }
    
                    }
    
                }, {
    
                    // Estilo del tamizaje VIF 
    
                    cells: "sAD",                    
    
                    condition: { type: "expression", formula: "$AD3=\"NEGATIVO\"" },
    
                    style: {
    
                        font: { color: '09477E', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'DEEFFF'
    
                                // width:'10px'
    
                            }
    
                        }
    
                    }
    
                }, {
    
                    cells: "sAD",                    
    
                    condition: { type: "expression", formula: "$AD3=\"POSITIVO\"" },
    
                    style: {
    
                        font: { color: 'B50303', b: true },
    
                        fill: {
    
                            pattern: {
    
                                bgColor: 'FEE1E1'
    
                            }
    
                        }
    
                    }
    
                }, {

                // Estilo centrado de las columnas 

                cells: ["C3:Cn", "E3:En", "F3:Fn", "G3:Gn", "K3:Kn", "L3:Ln", "M3:Mn", "N3:Nn", "O3:On", "P3:Pn", "T3:Tn", "U3:Un", "V3:Vn", "X3:Xn", "Y3:Yn"],

                style: {

                    font: { name: 'Arial', size: '9', color: '000000', b: false },

                    alignment: {

                        vertical: "center",

                        horizontal: "center",

                        wrapText: true,

                    }

                }

            }]            

        }, {

            extend:    'csvHtml5',

            text:      '<i class="fas fa-file-csv"></i>',

            titleAttr: 'CSV',

            title: 'Consolidado de Gestantes por Red - NOTIGEST'

        }],

        "ajax": {

            url: '../ajax/reporte_notigest.php?op=rptnotigestred',

            type: "get",

            dataType: "json",

            error: function(e) {

                console.log(e.responseText);

            }

        },

        "bDestroy": true,

        "iDisplayLength": 15, 

        "ordering": false,

        //"order": [[0,"desc"]],

        rowCallback: function(row, data, index) {

            // Estilo para la edad gestacioanl captada

            if(data["15"] >= 1 && data["15"] <= 14) {

                $('td', row).eq(15).css({

                    'background-color': '#E7FED6', 'color': '#375623', 'font-weight': 'bold'

                });

            } else if(data["15"] >= 15 && data["15"] <= 27) {

                $('td', row).eq(15).css({

                    'background-color': '#FFEDDA', 'color': '#B45501', 'font-weight': 'bold'

                });

            } else if(data["15"] >= 28 && data["15"] <= 40) {

                $('td', row).eq(15).css({

                    'background-color': '#FEE1E1', 'color': '#B50303', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(15).css({

                    'background-color': '#FFFFFF', 'color': '#000000', 'font-weight': 'bold'

                });

            }

            // Estilo para la edad gestacional actual

            if(data["24"] >= 1 && data["24"] <= 29) {

                $('td', row).eq(24).css({

                    'background-color': '#E7FED6', 'color': '#375623', 'font-weight': 'bold'

                });

            } else if(data["24"] >= 30 && data["24"] <= 36) {

                $('td', row).eq(24).css({

                    'background-color': '#FFF1C7', 'color': '#C39000', 'font-weight': 'bold'

                });

            } else if(data["24"] >= 37 && data["24"] <= 41) {

                $('td', row).eq(24).css({

                    'background-color': '#FFEDDA', 'color': '#B45501', 'font-weight': 'bold'

                });

            } else if(data["24"] >= 42) {

                $('td', row).eq(24).css({

                    'background-color': '#FEE1E1', 'color': '#FEE1E1', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(24).css({

                    'background-color': '#FFFFFF', 'color': '#000000', 'font-weight': 'bold'

                });

            }

            // Estilo para el grupo sanguíneo

            if(data["20"] == "A" || data["20"] == "B" || data["20"] == "AB") {

                $('td', row).eq(20).css({

                    'background-color': '#FEE1E1', 'color': '#B50303', 'font-weight': 'bold'

                });

            } else if(data["20"] == "O") {

                $('td', row).eq(20).css({

                    'background-color': '#E7FED6', 'color': '#375623', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(20).css({

                    'background-color': '#FFFFFF', 'color': '#3B3B3B', 'font-weight': 'bold'

                });

            }

            // Estilo para el grupo sanguíneo

            if(data["23"] == "POSITIVO") {

                $('td', row).eq(23).css({

                    'background-color': '#FEE1E1', 'color': '#B50303', 'font-weight': 'bold'

                });

            } else if(data["23"] == "NEGATIVO") {

                $('td', row).eq(23).css({

                    'background-color': '#DEEFFF', 'color': '#09477E', 'font-weight': 'bold'

                });

            } else {

                $('td', row).eq(23).css({

                    'background-color': '#FFFFFF', 'color': '#3B3B3B', 'font-weight': 'bold'

                });

            }

        }

    }).DataTable();

}



/*======================================================



=            Funcion para mostrar los datos            =



======================================================*/



function Mostrar(id_registro) {



    $.get("../ajax/reporte_notigest.php?op=mostrarRed", { id_registro }, function (data) {



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



        $("#fecha_termino").val(data.fecha_termino);



        $('#termino').val(`${ data.termino == '' ? 0 : data.termino }`).trigger('change.select2');



        $('#lugartermino').val(`${ data.lugar_termino == '' ? 0 : data.lugar_termino }`).trigger('change.select2');



        $("#obs_red").val(data.obs_red);



        $("#obs_diresa").val(data.obs_diresa);



        $("#numdoc_usuario").val(data.numdoc_usuario);



        $("#apenom_usuario").val(data.apenom_usuario);



    });



}



init();