$(document).ready(function(){
var id = getId();
$.ajax({
  url:"../../Controlador/ObtenerPuntuacion.php",
  data:{action:"serie",thumb:"get",id:id},
  type:"GET"
})

  .done(function(data){
    $("#punto").html("<p>"+data+"</data>");
  });

  $("#thumbup").click(function(){
    $.ajax({
      url:"../../Controlador/ObtenerPuntuacion.php",
      data:{action:"serie",thumb:"up",id:id},
      type:"GET"
    })
    .done(function(data){
      $("#punto").html("<p>"+data+"</data>");
    })
  })
  $("#thumbdown").click(function(){
    $.ajax({
      url:"../../Controlador/ObtenerPuntuacion.php",
      data:{action:"serie",thumb:"down",id:id},
      type:"GET"
    })
    .done(function(data){
      $("#punto").html("<p>"+data+"</data>");
    })
  })


});

function getId(){
  var local = window.location.href ;
  var url = local.split("/");
  var get = url.slice(-1);
  return get[0];
}


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
