$(document).ready(function(){
  var id = getId();
  var selectCategorias = document.getElementById("Categoria");
  var selectEstados = document.getElementById("Estado");
  OptionsRepetidas(selectCategorias);
  OptionsRepetidas(selectEstados);

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
