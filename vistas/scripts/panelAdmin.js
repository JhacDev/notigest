// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

var tabla;

/*========================================================

=            Funcion que se ejecuta al inicio            =

========================================================*/

function init() {

  countRegister();
  countRegisterdia();
  countRegisterParto();
  gestantesHistograma();
  gestantesBarra();
  countRegisterdiaMes();
  gestantesHistogramaLugarParto();
  countTerminoParto();
  countTerminoAborto();
  Listar();
}
// FUNCION PARA CARGAR HISTOGRAMA
const gestantesHistograma = async () => {
  const res = await fetch("../ajax/panel.php?op=cantidadGestantesHistogramaDiresa");

  const data = await res.json();
  //console.log(data);
  
  const total = [];

  data.forEach((element) => {
    total.push(element.total);
  });

  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: [
        "AZANGARO",
        "CARABAYA",
        "CHUCUITO",
        "COLLAO",
        "HUANCANE",
        "LAMPA",
        "MELGAR",
        "PUNO",
        "SAN ROMAN",
        "SANDIA",
        "YUNGUYO",
      ],
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
              maxTicksLimit: 9,  // Asegúrate de que este valor cubra todas tus etiquetas.
              autoSkip: false,    // Desactiva el autoSkip.
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              min: 0,
              max: 4000,
              maxTicksLimit: 5,
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

  

  // document.getElementById('totalRegistro').innerText = total
};


// FUNCION PARA CARGAR HISTOGRAMA
const gestantesHistogramaLugarParto = async () => {
  const res = await fetch("../ajax/panel.php?op=cantidadLugarPartoHistograma");

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
      labels: [
        "DOMICILIARIO",
        "INSTITUCIONAL",
        "PRIVADO",
       

      ],
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
              maxTicksLimit: 9,  // Asegúrate de que este valor cubra todas tus etiquetas.
              autoSkip: false,    // Desactiva el autoSkip.
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              min: 0,
              max: 2500,
              maxTicksLimit: 5,
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
const gestantesBarra = async () => {
  const res = await fetch("../ajax/panel.php?op=cantidadGestantesbarra");

  const data = await res.json();
  //console.log(data);
  
  const total = [];

  data.forEach((element) => {
    total.push(element.total);
   // console.log(total);
    
  });

  // Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"],
    datasets: [{
      label: "Total",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: total,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 12,  // Asegúrate de que este valor cubra todas tus etiquetas.
          autoSkip: false,    // Desactiva el autoSkip.
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1500,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

}


  /*===========================================================

	=            caso total registro                            =

	===========================================================*/

const countRegister = async () => {
  const res = await fetch("../ajax/panel.php?op=totalRegistro");

  const { total } = await res.json();

  document.getElementById("totalRegistro").innerText = total;
};

  /*===========================================================

	=            caso total registro por dia                    =

	===========================================================*/
  const countRegisterdia = async () => {
    const res = await fetch("../ajax/panel.php?op=totalRegistrodia");
  
    const { total } = await res.json();
  
    
    document.getElementById("totalRegistrodia").innerText = total;
  };

    /*===========================================================

	=   caso total gestantes con fecha de parto dia actual        =

	===========================================================*/
  const countRegisterParto = async () => {
    const res = await fetch("../ajax/panel.php?op=totalRegistroParto");
  
    const { total } = await res.json();
  
    
    document.getElementById("totalRegistroParto").innerText = total;
  };

  /*===========================================================

	=    caso total gestantes con parto o cesaria   =

	===========================================================*/
  const countTerminoParto = async () => {
    const parto = await fetch("../ajax/panel.php?op=totalTerminoParto");
    
    
    const { total } = await parto.json();
    //console.log(total);
    
    document.getElementById("TotalTermino").innerText = total;
  };
    /*===========================================================

	=    caso total gestantes con abortos             =

	===========================================================*/
  const countTerminoAborto = async () => {
    const parto = await fetch("../ajax/panel.php?op=totalTerminoAborto");
    
    
    const { total } = await parto.json();
    //console.log(total);
    
    document.getElementById("totalRegistroAborto").innerText = total;
  };
  /*===========================================================

	=            caso total registro por mes fecha probable de parto                           =

	===========================================================*/
  const countRegisterdiaMes = async () => {
    const res = await fetch("../ajax/panel.php?op=totalRegistroMes");
  
    const { total } = await res.json();
  
    
    document.getElementById("totalRegistromes").innerText = total;
  };


function Listar() {
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

          title: "Notificación de Gestantes - NOTIGEST",
        },
        {
          extend: "excelHtml5",

          text: '<i class="far fa-file-excel"></i>',

          titleAttr: "Excel",

          title: "Notificación de Gestantes - NOTIGEST",
        },
        {
          extend: "csvHtml5",

          text: '<i class="fas fa-file-csv"></i>',

          titleAttr: "CSV",

          title: "Notificación de Gestantes - NOTIGEST",
        },
        {
          extend: "pdfHtml5",

          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6],
          },

          text: '<i class="far fa-file-pdf"></i>',

          orientation: "landscape",

          titleAttr: "PDF",

          title: "Notificación de Gestantes - NOTIGEST",
        },
        {
          extend: "colvis",
        },
      ],

      ajax: {
        url: "../ajax/panel.php?op=datosDelMes",

        type: "get",

        //data: {id_usuario : id_usuario}

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
}





init();
