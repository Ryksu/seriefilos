$(document).ready(function(){
  var id = getURLparamentro("id");
  $.ajax({
    url:"../../Controlador/ObtenerComentarios.php",
    data:{action:"obtener",id:id},
    type:"GET"
  })
  .done(function(data){
    if (data.length>0) {
      CargarComentarios(data);
    }else{
      $(".c-comentarios").append("<p>Sin comentarios</p>");
    }
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
