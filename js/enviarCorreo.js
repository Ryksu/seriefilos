$(document).ready(function(){
  $("#contacto").on("submit",function(ev){
    ev.preventDefault();
    var nombre = $("#nombre").val();
    var email = $("#correo").val();
    var asunto = $("#asunto").val();
    var comentario = $("#comentario").val();
    var key = grecaptcha.getResponse();
    // console.log(key);

    $.ajax({
      url:'../../Controlador/enviarCorreo.php',
      data:{nombre:nombre,email:email,asunto:asunto,comentario:comentario,captcha:key},
      type:"POST"
    })
    .done(function(data){
      if (data =="OK") {
        alert("Mensaje enviado");
        location.reload();
      }
      if (data =="FAIL") {
        alert("Error no hacido comprobado su identidad");
      }
    })
  })
})
