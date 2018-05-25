$(document).ready(function(){

  $("#Agregar").submit(function(e){
    e.preventDefault();
    var form = new FormData(this);
    $.ajax({
      url:"../../Controlador/InsertarSerie.php",
      data:form,
      cache:false,
      contentType:"application/x-www-form-urlencoded","charset=ISO-8859-1",
      processData:false,
      type:"POST"
    })
    .done(function(data){
    })
    .always(function(data){
      if (data !='1' | data!='2') {
        alert("Serie Añadida");
        // setTimeout(function(){location.replace('catalogos.php');},1000);
      }
    })
  })
})
