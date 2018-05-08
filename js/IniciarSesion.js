$(document).ready(function(){
  $("#Login").submit(function(e){
    e.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    if ($("#recodar").prop('checked')) {
    var recodar = $("#recodar").val();
    }
    $.ajax({
      url:'../Controlador/iniciarSesion.php',
      data:{usuario:usuario,password:password,recodar:recodar},
      type:"POST"
    })
    .done(function(data) {
      if (data) {

       window.location.replace("page/perfil.php");

      }else {
        $("#msg").html("<p>Error en usuario y/o contraseña</p>");
      }
    })

  })

})
