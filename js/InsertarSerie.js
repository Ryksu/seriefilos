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
      if (data==="10") {
        alert("Error al añadir la serie");
      }
      if (data==="01") {
        alert("Errror al cargar la imagen");
      }
      if (data==="11") {
        alert("Serie Añadida e imagen cargada");
      }
      if (data==="00") {
        alert("Error al cargar la imagen y añadir la serie ");
      }
      if (data==="21") {
        alert("Extension no soportada");
      }
      if (data==="20") {
        alert("Extension no soportada y error al añadir la serie");
      }
      if (data==="30") {
        alert("Imagen muy grande y error al añadir la serie");
      }
      if (data==="31") {
        alert("Imagen muy grande");
      }
    })
    .always(function(data){
      if (data ==="11") {
        setTimeout(function(){location.replace('catalogos.php');},1000);
      }
    })
  })
})
