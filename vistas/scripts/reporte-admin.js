
var tabla;

/*========================================================

=            Funcion que se ejecuta al inicio            =

========================================================*/

function init() {


  totalAdministrador();
  totalUsuario();
  totalUsuariosActivos();
  totaluserinactivo();

}

/*===========================================================

	= Caso para listar total de administradores activos        =

	===========================================================*/

  const totalAdministrador = async () => {
    const res = await fetch("../ajax/panel.php?op=totalAdministrador");
  
    const { total } = await res.json();
    //console.log(total);
    
    document.getElementById("totalAdmin").innerText = total;
  }

  const totalUsuario = async ()=>{

    const user = await fetch ("../ajax/panel.php?op=totalUsuarios");

    const { total } = await user.json();

    document.getElementById("totalUser").innerText = total;
  }


  const totalUsuariosActivos = async ()=> {
    const usertotal = await fetch ("../ajax/panel.php?op=totalUsuarioActivo");

    const { total } = await usertotal.json();
    document.getElementById("totaluseractivo").innerText=total;
  }

  const totaluserinactivo = async ()=>
  {
    const userinactivo = await fetch("../ajax/panel.php?op=totalUsuarioInactivo");

    const {total} = await userinactivo.json();
    document.getElementById ("totalInactivo").innerText=total;
    }

    /*=========================================================
=            Funcion para desactivar registros            =
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
              $.post("../ajax/registro.php?op==Eliminar",{id : id}, function(e){
                  bootbox.alert(e); 
                  tabla.ajax.reload(); 
              });
          } else {
              tabla.ajax.reload(); 
          }
      }
  });
}



init();
