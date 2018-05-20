$(document).ready(function(){
  $("#Agregar").submit(function(e){
    e.preventDefault();
    var form = new FormData(this);
    $.ajax({
      url:"../../Controlador/InsertarSeries.php",
      data:form,
      cache:false,
      contentType:false,
      processData:false,
      type:"POST"
    })
    .done(function(data){
    })
    .always(function(data){
      if (data !='2' | data!='2') {
        location.replace('catalogos.php');
      }
    })
  })
})
