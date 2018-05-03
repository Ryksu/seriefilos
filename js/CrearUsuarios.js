$(document).ready(function(){
  console.log("iniciamos");
  $("#usuario").keypress(function(){
    $.ajax({
      url:"Controlador/ComprobarUsuario.php",
      type:"POST",
      data:{usuario:usuario}
    })
    .done(function(data){
      console.log('Dentro de done');
      var usuarioInput = document.getElementById("usuario");
      if (usuario['usuario'].lenght<16) {
        usuarioInput.style.borderColor = "red";
      }
      if (data['usuario'] == usuarioInput.value) {
        usuarioInput.style.borderColor = "green";
      }
    });
  })
});
