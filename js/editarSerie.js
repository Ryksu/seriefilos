$(document).ready(function(){
  var id = getId();
  $("#Editar").submit(function(ev){
    ev.preventDefault();
    var form = new FormData(this);
    form.append("id",id);
    $.ajax({
      url:'../../Controlador/editarSerie.php',
      data:form,
      cache:false,
      contentType:false,
      processData:false,
      type:"POST"
    })
    .done(function(data){
      if (data == "1111111") {
        alert("serie e imagen actulizada");
        location.replace("/perfil");

      }
      if(data==="111111"){
        alert("Serie Actulizada");
        location.replace("/perfil");
      }
      if(data==="111112"){
        alert("Hubo un error al insertar el video");
      }

    })
  });


  $("#volver").click(function(ev){
    ev.preventDefault();
    window.history.back();
    })
})

function getId(){
  var local = window.location.href ;
  var url = local.split("/");
  var get = url.slice(-1);
  return get[0];
}

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
