// Set new default font family and font color to mimic Bootstrap's default styling

Chart.defaults.global.defaultFontFamily =

  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';

Chart.defaults.global.defaultFontColor = "#292b2c";



var tabla;



/*========================================================



=            Funcion que se ejecuta al inicio            =



========================================================*/



function init() {

  setTimeout(()=>{

    countRegisterRed();

  },2000);

  setTimeout(()=>{

    countRegisterdia();

  },2000);

  setTimeout(()=>{

    countRegisterParto();

  },2000);

  setTimeout(()=>{

    gestantesHistograma();

  },2000);

  // 

  setTimeout(() => {

    gestantesBarra();

  }, 2000);

  

  setTimeout(()=>{

    countRegisterdiaMes();

  },2000);

  setTimeout(()=>{

    gestantesHistogramaLugarParto();

  },2000);

  setTimeout(()=>{

    countTerminoParto();

  },2000);

  setTimeout(()=>{

    countTerminoAborto();

  },2000);

  

  showMicroRed();

  Listar();
  // ListarGest();

}

// FUNCION PARA CARGAR POR MICRORED Y IPRESS

const gestantesHistograma = async () => {

  const res = await fetch("../ajax/panel.php?op=cantidadGestantesHistogramaRedMicrored&" +

    new URLSearchParams({

      microred: $("#dataMicroRed").text(),

    })

  );

  // console.log(res);

  

  const data = await res.json();

  //console.log(data);



  const total = [];

  const IPRESS = [];



  data.forEach((element) => {

    total.push(element.total);

    IPRESS.push(element.ipress);

  });



  var ctx = document.getElementById("myAreaChart");

  var myLineChart = new Chart(ctx, {

    type: "line",

    data: {

      labels: IPRESS,

      datasets: [

        {

          label: "Total ",

          lineTension: 0.3,

          backgroundColor: "rgba(2,117,216,0.2)",

          borderColor: "rgba(2,117,216,1)",

          pointRadius: 5,

          pointBackgroundColor: "rgba(2,117,216,1)",

          pointBorderColor: "rgba(255,255,255,0.8)",

          pointHoverRadius: 5,

          pointHoverBackgroundColor: "rgba(2,117,216,1)",

          pointHitRadius: 50,

          pointBorderWidth: 2,

          data: total,

        },

      ],

    },

    options: {

      scales: {

        xAxes: [

          {

            time: {

              unit: "date",

            },

            gridLines: {

              display: false,

            },

            ticks: {

              maxTicksLimit: 9, // Asegúrate de que este valor cubra todas tus etiquetas.

              autoSkip: false, // Desactiva el autoSkip.

            },

          },

        ],

        yAxes: [

          {

            ticks: {

              min: 0,

              max: 500,

              maxTicksLimit: 8,

            },

            gridLines: {

              color: "rgba(0, 0, 0, .125)",

            },

          },

        ],

      },

      legend: {

        display: false,

      },

    },

  });



};



// FUNCION PARA CARGAR HISTOGRAMA

const gestantesHistogramaLugarParto = async () => {

  const res = await fetch(

    "../ajax/panel.php?op=cantidadLugarPartoHistogramaRed&" +

    new URLSearchParams({

      microred: $("#dataMicroRed").text(),

    })

  );

  // console.log(res);

  const data = await res.json();

  //console.log(data);



  const total = [];



  data.forEach((element) => {

    total.push(element.total);

  });



  var ctx = document.getElementById("myBarChartLugarParto");

  var myLineChart = new Chart(ctx, {

    type: "line",

    data: {

      labels: ["DOMICILIARIO", "INSTITUCIONAL", "PRIVADO"],

      datasets: [

        {

          label: "Total ",

          lineTension: 0.3,

          backgroundColor: "rgba(2,117,216,0.2)",

          borderColor: "rgba(2,117,216,1)",

          pointRadius: 6,

          pointBackgroundColor: "rgba(2,117,216,1)",

          pointBorderColor: "rgba(255,255,255,0.8)",

          pointHoverRadius: 5,

          pointHoverBackgroundColor: "rgba(2,117,216,1)",

          pointHitRadius: 50,

          pointBorderWidth: 2,

          data: total,

        },

      ],

    },

    options: {

      scales: {

        xAxes: [

          {

            time: {

              unit: "date",

            },

            gridLines: {

              display: false,

            },

            ticks: {

              maxTicksLimit: 9, // Asegúrate de que este valor cubra todas tus etiquetas.

              autoSkip: false, // Desactiva el autoSkip.

            },

          },

        ],

        yAxes: [

          {

            ticks: {

              min: 0,

              max: 500,

              maxTicksLimit: 6,

            },

            gridLines: {

              color: "rgba(0, 0, 0, .125)",

            },

          },

        ],

      },

      legend: {

        display: false,

      },

    },

  });

};



// FUNCION PARA CARGAR BARRA

const gestantesBarra = async () => {

  const res = await fetch(

    "../ajax/panel.php?op=cantidadGestantesbarraRed&" +

      new URLSearchParams({

        microred: $("#dataMicroRed").text(),

      })

  );

  // console.log(res);

  

  const data = await res.json();



  const total = [];



  data.forEach((element) => {

    total.push(element.total);

    // console.log(total);

  });



  // Bar Chart Example

  var ctx = document.getElementById("myBarChart");

  var myLineChart = new Chart(ctx, {

    type: "bar",

    data: {

      labels: [

        "Enero",

        "Febrero",

        "Marzo",

        "Abril",

        "Mayo",

        "Junio",

        "Julio",

        "Agosto",

        "Setiembre",

        "Octubre",

        "Noviembre",

        "Diciembre",

      ],

      datasets: [

        {

          label: "Total",

          backgroundColor: "rgba(2,117,216,1)",

          borderColor: "rgba(2,117,216,1)",

          data: total,

        },

      ],

    },

    options: {

      scales: {

        xAxes: [

          {

            time: {

              unit: "month",

            },

            gridLines: {

              display: false,

            },

            ticks: {

              maxTicksLimit: 12, // Asegúrate de que este valor cubra todas tus etiquetas.

              autoSkip: false, // Desactiva el autoSkip.

            },

          },

        ],

        yAxes: [

          {

            ticks: {

              min: 0,

              max: 200,

              maxTicksLimit: 8,

            },

            gridLines: {

              display: true,

            },

          },

        ],

      },

      legend: {

        display: false,

      },

    },

  });

};



/*===========================================================



	=            caso total registro                            =



	===========================================================*/



const countRegisterRed = async () => {

  const res = await fetch("../ajax/panel.php?op=totalRegistroRed&" +

    new URLSearchParams ({

      microred:$("#dataMicroRed").text(),



    })

  );

  //console.log(res);

  



  const { total } = await res.json();



  document.getElementById("totalRegistro").innerText = total;

};



/*===========================================================



	=            caso total registro por dia                    =



	===========================================================*/

const countRegisterdia = async () => {

  const res = await fetch("../ajax/panel.php?op=totalRegistrodiaRed&" +

    new URLSearchParams ({

      microred:$("#dataMicroRed").text(),

    })



  );



  const { total } = await res.json();



  document.getElementById("totalRegistrodia").innerText = total;

};



/*===========================================================



	=   caso total gestantes con fecha de parto dia actual        =



	===========================================================*/

const countRegisterParto = async () => {

  const res = await fetch("../ajax/panel.php?op=totalRegistroPartoRed&" +

    new URLSearchParams ({

      microred:$("#dataMicroRed").text(),

    })

  );



  const { total } = await res.json();



  document.getElementById("totalProbableParto").innerText = total;

};



/*===========================================================



	=    caso total gestantes con parto o cesaria   =



	===========================================================*/

const countTerminoParto = async () => {

  const parto = await fetch("../ajax/panel.php?op=totalTerminoPartoRed&" +

    new URLSearchParams({

      microred:$("#dataMicroRed").text(),

    })

  );



  const { total } = await parto.json();

  //console.log(total);



  document.getElementById("TotalTermino").innerText = total;

};

/*===========================================================



	=    caso total gestantes con abortos             =



	===========================================================*/

const countTerminoAborto = async () => {

  const parto = await fetch("../ajax/panel.php?op=totalTerminoAbortoRed&" +

    new URLSearchParams({

      microred:$("#dataMicroRed").text(),

    }) 

  );



  const { total } = await parto.json();

  //console.log(total);



  document.getElementById("totalAbortoRed").innerText = total;

};

/*===========================================================



	= caso total registro por mes fecha probable de parto      =



	===========================================================*/

const countRegisterdiaMes = async () => {

  const res = await fetch("../ajax/panel.php?op=totalRegistroMesRed&" +

    new URLSearchParams ({

      microred:$("#dataMicroRed").text(),

    })

  );

  // console.log(res);

  



  const { total } = await res.json();



  document.getElementById("totalRegistromes").innerText = total;

};



/*===========================================================
	= caso nomina de gestantes año actual  red y mirocred     =
	===========================================================*/

  function ListarGest() {

    setTimeout(() => {
  
      tabla = $("#tblistado_gest")
  
        .dataTable({
  
          aProcessing: true,
  
  
  
          aServerSide: true,
  
  
  
          responsive: true,
  
  
  
          lengthChange: false,
  
  
  
          autoWidth: false,
  
  
  
          dom: "Bfrtip",
  
  
  
          buttons: [
  
            {
  
              extend: "copyHtml5",
  
  
  
              text: '<i class="far fa-copy"></i>',
  
  
  
              titleAttr: "Copiar",
  
  
  
              title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",
  
            },
  
            {
  
              extend: "excelHtml5",
  
  
  
              text: '<i class="far fa-file-excel"></i>',
  
  
  
              titleAttr: "Excel",
  
  
  
              title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",

              excelStyles: [

                // ancho de las columnas
                
                
                {cells: 'sA', width: 12},
                {cells: 'sB', width: 12},
                {cells: 'sC', width: 10},
                {cells: 'sD', width: 12},
                {cells: 'sE', width: 10},
                {cells: 'sF', width: 12},
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
                {cells: 'sV', width: 10.43},
                {cells: 'sW', width: 42.86},
                {cells: 'sX', width: 9.86 },
                {cells: 'sY', width: 8.29},
                {cells: 'sZ', width: 12},
                {cells: 'sAA', width: 12},
                {cells: 'sAB', width: 16.86},
                {cells: 'sAC', width: 9.71},
                {cells: 'sAD', width: 8},
                {cells: 'sAE', width: 12},
                {cells: 'sAF', width: 14},
                {cells: 'sAG', width: 9},
                {cells: 'sAH', width: 18},
                {cells: 'sAI', width: 20},
                {cells: 'sAJ', width: 11.71},
                {cells: 'sAK', width: 30.43},
                {cells: 'sAL', width: 12},
                {cells: 'sAM', width:  17.43},
                
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
              // Fuente de todo el documento
              cells: ["A3:"],
              style: {
                  font: { name: 'arial', size: '10', color: '000000', b: false },
                  alignment: {
                      horizontal: "left" // Alineación horizontal a la izquierda
                  }
              }
          }
          , {

                // Estilo de la edad gestacional captada               

                cells: 'sP' , 

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

                cells: 'sP' , 

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

                cells: 'sP' , 

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

                cells: 'sP' , 

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

                cells: 'sP' , 

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

                cells: 'sAD' , 

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

                cells: 'sAD' , 

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

                cells: 'sAD' , 

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

                cells: 'sAD' , 

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

                cells: "sZ",                    

                condition: { type: "expression", formula: "OR($Z3=\"A\",$Z3=\"B\",$Z3=\"AB\")" },

                style: {

                    font: { color: 'B50303', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            }, {

                cells: "sZ",                    

                condition: { type: "expression", formula: "$Z3=\"O\"" },

                style: {

                    font: { color: '375623', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'E7FED6'

                        }

                    }

                }

            },  {

                cells: "sAC",                    

                condition: { type: "expression", formula: "$AC3=\"POSITIVO\"" },

                style: {

                    font: { color: 'B50303', b: true },

                    fill: {

                        pattern: {

                            bgColor: 'FEE1E1'

                        }

                    }

                }

            },
            //  {

            //     // Estilo centrado de las columnas 

            //     cells: ["C3:Cn", "E3:En", "F3:Fn", "G3:Gn", "K3:Kn", "L3:Ln", "M3:Mn", "N3:Nn", "O3:On", "P3:Pn", "T3:Tn", "U3:Un", "V3:Vn", "X3:Xn", "Y3:Yn","X3:Xn"],

            //     style: {

            //         font: { name: 'Arial', size: '9', color: '000000', b: false },

            //         alignment: {

            //             vertical: "center",

            //             horizontal: "center",

            //             wrapText: true,

            //         }

            //     }

            // }
          ]
  
            },
  
            {
  
              extend: "csvHtml5",
  
  
  
              text: '<i class="fas fa-file-csv"></i>',
  
  
  
              titleAttr: "CSV",
  
  
  
              title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",
  
            },
  
            {
  
              extend: "pdfHtml5",
  
  
  
              exportOptions: {
  
                columns: [1, 2, 3, 4, 5, 6],
  
              },
  
  
  
              text: '<i class="far fa-file-pdf"></i>',
  
  
  
              orientation: "landscape",
  
  
  
              titleAttr: "PDF",
  
  
  
              title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",
  
            },
  
            {
  
              extend: "colvis",
  
            },
  
          ],
  
  
  
          ajax: {
  
            url: "../ajax/panel.php?op=report_red_microred",
  
            data: (d) => {
  
              d.microred = $("#dataMicroRed").text();
  
            },
  
            dataType: "json",
  
            error: function (e) {
  
              console.log(e.responseText);
  
            },
  
          },
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

        },
  
  
          bDestroy: true,
  
  
  
          iDisplayLength: 15,
  
  
  
          order: [[0, "asc"]],
  
        })
  
        .DataTable();
  
    }, 3000);
  
  }
  


/*==========================================
	= caso gestantes con fpp en el mes actual=
	==========================================*/

function Listar() {

  setTimeout(() => {

    tabla = $("#tblistado")

      .dataTable({

        aProcessing: true,



        aServerSide: true,



        responsive: true,



        lengthChange: false,



        autoWidth: false,



        dom: "Bfrtip",



        buttons: [

          {

            extend: "copyHtml5",



            text: '<i class="far fa-copy"></i>',



            titleAttr: "Copiar",



            title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",

          },

          {

            extend: "excelHtml5",



            text: '<i class="far fa-file-excel"></i>',



            titleAttr: "Excel",



            title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",

          },

          {

            extend: "csvHtml5",



            text: '<i class="fas fa-file-csv"></i>',



            titleAttr: "CSV",



            title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",

          },

          {

            extend: "pdfHtml5",



            exportOptions: {

              columns: [1, 2, 3, 4, 5, 6],

            },



            text: '<i class="far fa-file-pdf"></i>',



            orientation: "landscape",



            titleAttr: "PDF",



            title: "PADRON DE GESTANTES - NOTIGEST - REPORTE POR MICRORED",

          },

          {

            extend: "colvis",

          },

        ],



        ajax: {

          url: "../ajax/panel.php?op=datosDelMesRed",

          data: (d) => {

            d.microred = $("#dataMicroRed").text();

          },

          dataType: "json",

          error: function (e) {

            console.log(e.responseText);

          },

        },



        bDestroy: true,



        iDisplayLength: 15,



        order: [[0, "asc"]],

      })

      .DataTable();

  }, 3000);

}

/*===========================================================



	= caso listar microred                =



	===========================================================*/



const showMicroRed = () => {

  $.get("../ajax/registro.php?op=showMicroRed", function (data) {

    let res = JSON.parse(data);



    $("#dataMicroRed").text(res.descripcion_microred);

    $("#otrared").val(res.descripcion_microred);

  });

};



init();

