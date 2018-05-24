$(document).ready(function(){
  var id = getURLparamentro("id");
  $("#sincomentar").attr("hidden",true);

  $("#comment").attr("disabled",true);

  $(document).ajaxStart(function(){
    $(".fa-pulse").attr("hidden",false);
  })

  $(document).ajaxStop(function(){
    $(".fa-pulse").attr("hidden",true);
  })

    $.ajax({
    url:"../../Controlador/ObtenerComentarios.php",
    data:{action:"obtener",id:id},
    type:"GET"
  })
  .done(function(data){
    if (data.length>0) {
      CargarComentarios(data);
    }else{
      $("#sincomentar").attr("hidden",false);
    }
  })

$("#texto").keyup(function(){
  var regex = /\S+/ ;
  var  texto = $("#texto").val();

  if (regex.exec(texto)==null) {
    $("#comment").attr("disabled",true);
  }
  else{
    $("#comment").attr("disabled",false);
    }
})
$("#texto").click(function(){
  $("#texto").addClass("activa");
  $("#c-send-comment").addClass("c-enviar");
})
$("#comment").click(function(e){
  e.preventDefault();
  var  texto = $("#texto").val();
  $.ajax({
    url:"../../Controlador/ObtenerComentarios.php",
    data:{action:"insertar",id:id,texto:texto},
    type:"GET"
  })
  .done(function(data){
    $("#sincomentar").attr("hidden",true);
    $(".c-comentario").remove();
    $("#texto").val('');
    $("#comment").attr("disabled",true);
    CargarComentarios(data);
  })
})

$(".npage").on("click",function(){
  $(".c-comentario").remove();
  valor = $(this).attr("data");
  $.ajax({
    url:"../../Controlador/ObtenerComentarios.php",
    data:{action:"obtener",id:id,pg:valor},
    type:"GET"
  })
  .done(function(data){
    $(".c-comentario").remove();
    CargarComentarios(data);
  })
})

$("#cancelar").click(function(e){
  e.preventDefault();
  $("#texto").removeClass("activa");
  $("#texto").val('');
  $("#c-send-comment").removeClass("c-enviar");
})



})

function CargarComentarios(data){
  for (var valor in data) {
    if (data.hasOwnProperty(valor)) {
      var comentario = document.createElement("div");
      var foto = document.createElement("img");
      $(foto).attr("src",data[valor]['Foto']);
      $(foto).attr("alt","foto de perfil");
      var c_usuario = document.createElement("div");
      $(c_usuario).addClass("c-usuario");

      var  usuario = document.createElement("h3");
      usuario.append(data[valor]['id_usuario']);
      c_usuario.append(foto,usuario);

      var c_texto = document.createElement("div");
      $(c_texto).addClass("c-texto");

      var texto = document.createElement("p");
      texto.append(data[valor]['comentario']);

      // var num = document.createElement("p");
      // var enlace = document.createElement("a");
      // $(enlace).attr("href","#"+data[valor]['id']);
      // $(enlace).attr("id",data[valor]['id']);
      // enlace.append("#"+data[valor]['id']);
      // num.append(enlace);

      var date = document.createElement("p");
      var tiempo = formatoTiempo(data[valor]['tiempo']);
      date.append(tiempo.toLocaleString());

      c_texto.append(texto,date);

      comentario.append(c_usuario,c_texto);
      $(comentario).addClass("c-comentario");
      $(".c-comentarios").append(comentario);
     }
  }
}


function formatoTiempo(timestap){
  var tiempo = timestap.split(/[- :]/);

  var tiempoUTC = new Date(Date.UTC(tiempo[0], tiempo[1]-1,tiempo[2], tiempo[3], tiempo[4], tiempo[5]));

  return tiempoUTC;

}
