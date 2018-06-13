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
