$(document).ready(function(){
  $("#Login").submit(function(e){
    e.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    var recodar = $("#recodar").val();
    $.ajax({
      url:'../Controlador/iniciarSesion.php',
      data:{usuario:usuario,password:password},
      type:"POST"
    })
    .done(function(data) {
      console.log("entro en el done");
      if (recodar === '1') {
      }
      if (data) {

       window.location.replace("page/perfil.php");

      }else {
        $("#msg").html("<p>Error en usuario y/o contraseña</p>");
      }
    })

  })

})
