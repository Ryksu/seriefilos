$(document).ready(function(){

  $("#Agregar").submit(function(e){
    e.preventDefault();
    var form = new FormData(this);
    $.ajax({
      url:"../../Controlador/InsertarSerie.php",
      data:form,
      cache:false,
      contentType:false,
      processData:false,
      type:"POST"
    })
    .done(function(data){
      switch (data) {
        case "10":
          alert("Error al añadir la serie");
        break;
        case "01":
          alert("Errror al cargar la imagen");
        break;
        case "11":
          alert("Serie Añadida e imagen cargada");
        break;
        case "00":
          alert("Error al cargar la imagen y añadir la serie ");
        break;
        case "02":
          alert("Error al carga la imagen y el enlace no es correcto");
        break;
        case "12":
          alert("El enlace no es correcto");
        break;
        case "21":
          alert("Extension no soportada");
        break;
        case "20":
          alert("Extension no soportada y error al añadir la serie");
        break;
        case "30":
          alert("Imagen muy grande y error al añadir la serie");
        case "31":
          alert("Imagen muy grande");
        break;
      }
    })
    .always(function(data){
      if (data ==="11") {
        setTimeout(function(){location.replace('catalogo');},1000);
      }
    })
  })
})
