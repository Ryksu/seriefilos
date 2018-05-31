$(document).ready(function(){
  var action = getURLparamentro("action");
  var usuario = getURLparamentro("usuario");
  if (action === "verificar") {
    $.ajax({
      url:'../Controlador/iniciarSesion.php',
      data:{action:action,usuario:usuario},
      type: "POST"
    })
    .done(function(data){
      if (data) {
        alert("Cuenta verifica");
        location.replace("login.php");
      }
      else{
        alert("Error al verficar la cuenta");
      }
    })
  }

  $("#Login").submit(function(e){
    e.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    if ($("#recodar").prop('checked')) {
    var recodar = $("#recodar").val();
    }
    $.ajax({
      url:'../Controlador/iniciarSesion.php',
      data:{action:"iniciar",usuario:usuario,password:password,recodar:recodar},
      type:"POST"
    })
    .done(function(data) {
      if (data) {

       window.location.replace("page/perfil.php");

      }else {
        $("#msg").html("<p>Puede que su contraseña o usuario no se ha introducido correctamente o no ha verificado la cuenta</p>");
      }
    })

  })

})


function getURLparamentro(paramentro) {
  var pagURL = window.location.search.substring(1);
  var variableURL = pagURL.split('&');
  for (var i = 0; i < variableURL.length; i++) {
    var NombreParamentro = variableURL[i].split("=");
    if (NombreParamentro[0] == paramentro) {
      return NombreParamentro[1];
    }
  }
}
