$(document).ready(function(){

  $("#password").click(function(){
    $("#msg").html("<ul><li>8 o 15 caracteres</li><li>Al menos una minusculas y/o mayuscula, numeros y/o caracteres especiales</li></ul>");
  })


  $("#usuario").keyup(function(){
    var getUsuario = $(this).val();
    $.ajax({
      url:"../../Controlador/ComprobarUsuario.php",
      data:{usuario:getUsuario},
      type:"POST"
    })
    .done(function(data){
      // console.log("Entramos en Done");
      siExiste(data);
    })
    .fail(function(){
      // console.log("Algo ha fallado");
    })
  })

  $("#password").keyup(function(){
    ComprobarPass();
  })


  $("#repeat").keyup(function(){
    ComprobarRepeat();
  })

  $("#Registrate").submit(function(ev){
    ev.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    var repeat = $("#repeat").val();
    var email = $("#email").val();

    $.ajax({
      url:"../../Controlador/CrearUsuario.php",
      data:{usuario:usuario,password:password,repeat:repeat,email:email},
      type:"POST"
    })
    .done(function(data){
      if (data) {
        $("#msg").html("<p>Genial ya estas registrado</p>");
      }else{
        $("#msg").html("<p>vuelve a repetir la contraseña</p>");
      }

    })
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
      document.getElementById("singup").disabled = false;
      inputUsuario.style.border = "2px solid green";
    }
    else {
      inputUsuario.style.border = "2px solid red";
      document.getElementById("singup").disabled= true;
    }
  }
  else{
    console.log("Ya existe");
    inputUsuario.style.border = "2px solid red";
    document.getElementById("singup").disabled= true;

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

  if (expr.exec(inputRepeat.value)) {
    if (inputPass.value === inputRepeat.value) {
      inputRepeat.style.border = "2px solid green";

  }

}
else{
  inputRepeat.style.border = "2px solid red";
}
}
