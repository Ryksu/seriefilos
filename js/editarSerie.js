$(document).ready(function(){
  var id = getId();
  var selectCategorias = document.getElementById("Categoria");
  for (var i = 3; i < selectCategorias.options.length; i++) {
    if ((selectCategorias.options[1].text === selectCategorias.options[i].text) ||(selectCategorias.options[2].text=== selectCategorias.options[i].text) ) {
      selectCategorias.options[i].remove();
    }
  }
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
      switch (data) {
        case "11c0111":
        alert("Error solo puede a ver maxima dos categorias");
          break;
        case "1111111":
        alert("serie e imagen actulizada");
        break;
        default:

        case "111111":
        alert("Serie actulizada");
        break;

        case "111112":
        alert("Hubo un error al insertar el video");
        break;
      }
    })
    .always(function(data){
      if (data == "1111111" | data == "111111") {
        location.replace("/perfil");
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
