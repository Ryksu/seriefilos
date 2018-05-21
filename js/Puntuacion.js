$(document).ready(function(){
var id = getURLparamentro("id");
$.ajax({
  url:"../../Controlador/ObtenerPuntuacion.php",
  data:{punto:"punto",id:id},
  type:"GET"
})

  .done(function(data){
    $("#punto").html("<p>"+data+"</data>");
  });

  $("#thumbup").click(function(){
    $.ajax({
      url:"../../Controlador/ObtenerPuntuacion.php",
      data:{up:"up",id:id},
      type:"GET"
    })
    .done(function(data){
      $("#punto").html("<p>"+data+"</data>");
    })
  })
  $("#thumbdown").click(function(){
    $.ajax({
      url:"../../Controlador/ObtenerPuntuacion.php",
      data:{down:"down",id:id},
      type:"GET"
    })
    .done(function(data){
      $("#punto").html("<p>"+data+"</data>");
    })
  })


});



/** Permite obtener El paramentro de la url */
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
