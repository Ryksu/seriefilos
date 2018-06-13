$(document).ready(function(){
  $("#Editar").click(function(){
    Cargar();
    var usuario= document.getElementById('usuario').value;
  })
  $("#password").keyup(function(){
    ComprobarPass();
  })

  $("#repeat").keyup(function(){
    ComprobarRepeat();
  })

  $("#perfil").submit(function(e){
    e.preventDefault();
    var form = new FormData(this);
    // var foto_data = $("#foto").prop("files")[0];
    // form.append("foto",foto_data);

    $.ajax({
      url:"../../Controlador/EditarUsuario.php",
      data:form,
      cache:false,
      contentType:false,
      processData:false,
      type:"POST"
    })
    .done(function(data){
      if (data === "0") {
        alert("Error al cargar en la base de datos");
      }
      if (data === "1") {
        alert("La imagen se cargado correctamente");
      }
      if (data === "2") {
        alert("Lo siento aun no tenemos soporte para esta extension prueba con jpg, png o gif");
      }
      if (data === "3") {
        console.log(data);
        alert("La imagen es muy pesada imagen menos de 1MB");

      }
      if (data === "e0") {
        alert("El correo ya esta en uso");
      }
      if (data == "i0") {
        alert("Correo incorrecto");
      }

    })
    .always(function(data){
      if (data != "2" || data !="3" || data != "e0") {
        location.reload();
      }
    })
  })

})

function Cargar(){
  $("div").removeAttr("hidden");
  $("input").removeAttr("disabled");
  $("textarea").removeAttr("disabled");
  $("#usuario").attr('disabled',true);
  $("#c-enviar").addClass("c-enviar ");
  $("#c-editar").removeClass("c-editar");
  $("#c-editar").attr('hidden',true);

}
