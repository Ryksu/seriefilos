$(document).ready(function(){
  $("#usuario").keyup(function(){
    var getUsuario = $(this).val();
    $.ajax({
      url:"Controlador/ComprobarUsuario.php",
      data:{usuario:getUsuario},
      type:"POST"
    })
    .done(function(data){
      console.log("Entramos en Done");
      siExiste(data);
    })
    .fail(function(){
      console.log("Algo ha fallado");
    })
  })

  $("#password").keyup(function(){
    ComprobarPass();
  })

  $("#repeat").keyup(function(){
    ComprobarRepeat();
  })


});


/*Comprobar si exite un usuario */
function siExiste(data){
  console.log("Comprobamos si esta vacio");

  var expr = /[a-zA-z-0-9]{4,8}/g;
  var inputUsuario = document.getElementById("usuario");
  if (data.length==0)
  {
    if(expr.exec(inputUsuario.value)!=null){
      inputUsuario.style.border = "2px solid green";
    }
    else {
      inputUsuario.style.border = "2px solid red";
    }
  }
  else{
    console.log("Ya existe");
    inputUsuario.style.border = "2px solid red";
  }
}

function ComprobarPass(){
  /*
  min: 8 caracter
  max: 15 caracter
  al menos una mayuscula
  al menos una minuscula
  al menos un numero
  al menos un caracter especial
  no se acepta espacio
  */
  var expr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;
  var inputPass = document.getElementById("password");

  /*comprueba la expresion regular*/
  if (expr.exec(inputPass.value)) {
    console.log("comprueba la expresion");
    inputPass.style.border ="2px solid green";
  }
  else{
    console.log("no acepta la expresion");
    inputPass.style.border ="2px solid red";
  }
}

function ComprobarRepeat(){
  var inputPass = document.getElementById("password");
  var inputRepeat = document.getElementById("repeat");

  if (inputPass.value == inputRepeat.value) {
    console.log("Comprueba");
      inputRepeat.style.border = "2px solid green";
  }
  else{
    inputRepeat.style.border = "2px solid red";
  }

}
