$(document).ready(function(){
  var id = getURLparamentro("id");
  $(document).ajaxStart(function(){
    // loading.show();
    $(".fa-pulse").attr("hidden",false);
  })

  $(document).ajaxStop(function(){
    // loading.hide();
    $(".fa-pulse").attr("hidden",true);

  })

    $.ajax({
    url:"../../Controlador/ObtenerComentarios.php",
    data:{action:"obtener",id:id},
    type:"POST"
  })
  .done(function(data){
    if (data.length>0) {
      CargarComentarios(data);
    }else{
      $(".c-comentarios").append("<p>Sin comentarios</p>");
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
    type:"POST"
  })
  .done(function(data){

      $("#texto").val('');
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
      c_texto.append(texto);

      comentario.append(c_usuario,c_texto);
      $(comentario).addClass("c-comentario");
      $(".c-comentarios").append(comentario);
     }
  }
}
