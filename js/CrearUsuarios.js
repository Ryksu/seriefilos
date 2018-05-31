$(document).ready(function(){

  $("#password").focus(function(){
    $("#msg").html("<ul><li>4 o 16 caracteres</li> "+
    "<li>Tiene Que llevar al menos una minuscula y mayuscula, un numero y un caracter especial(@!%*?%#.$_())</li> </ul>");
  })


  $("#usuario").keyup(function(){

    var getUsuario = $(this).val();
    $.ajax({
      url:"../../Controlador/ControladorUsuarios.php",
      data:{action:"ComprobarUsuario",usuario:getUsuario},
      type:"POST"
    })
    .done(function(data){
      ComprobarUsuario(data);
    })
  })
  $("#usuario").focus(function(){
    var getUsuario = $(this).val();
    $.ajax({
      url:"../../Controlador/ControladorUsuarios.php",
      data:{action:"ComprobarUsuario",usuario:getUsuario},
      type:"POST"
    })
    .done(function(data){
      ComprobarUsuario(data);
    })
  })

/* Comprueba que los caracteres son correctos */
  $("#password").keyup(function(){
    ComprobarPass();
  })

  /* Comprueba los caracteres del  input password */
  $("#repeat").keyup(function(){
    ComprobarRepeat();
  });

  $("#email").keyup(function(){
    expr=   /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var email;
    var getemail = document.getElementById("email");
    if (expr.exec(getemail.value)!=null) {
     email = getemail.value;
    }else{
      getemail.style.border = "2px solid red";
      document.getElementById("singup").disabled= true;
    }
    $.ajax({
      url:"../../Controlador/ControladorUsuarios.php",
      data:{action:"ComprobarEmail",email:email},
      type:"POST"
    })
    .done(function(data){
      ComprobarEmail(data);
    })
  })
  $("#email").focus(function(){
    expr=   /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var email;
    var getemail = document.getElementById("email");
    if (expr.exec(getemail.value)!=null) {
     email = getemail.value;
    }else{
      getemail.style.border = "2px solid red";
      document.getElementById("singup").disabled= true;
    }
    $.ajax({
      url:"../../Controlador/ControladorUsuarios.php",
      data:{action:"ComprobarEmail",email:email},
      type:"POST"
    })
    .done(function(data){
      ComprobarEmail(data);

    })
  })


  $("#Registrate").submit(function(ev){
    ev.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    var repeat = $("#repeat").val();
    var email = $("#email").val();

    $.ajax({
      url:"../../Controlador/ControladorUsuarios.php",
      data:{action:"Registrar",usuario:usuario,password:password,repeat:repeat,email:email},
      type:"POST"
    })
    .done(function(data){
      if (data) {
        $("#msg").html("<p>Genial ya estas registrado verifique su Email</p>");
        setTimeout(function(){location.replace("../login.php");},2000);
      }else{
        $("#msg").html("<p>Vuelve a repetir la contraseña</p>");
      }

    })
  })


});


/*Comprobar si exite un usuario */
function ComprobarUsuario(data){
  // console.log("Comprobamos si esta vacio");

  var expr = /[a-zA-z-0-9]{4,8}/g;
  var inputUsuario = document.getElementById("usuario");
  if (inputUsuario.value<0) {
    inputUsuario.style.border = "2px solid red";
    document.getElementById("singup").disabled= true;
  }
  if (data.length==0)
  {
    if(expr.exec(inputUsuario.value)!=null){
      inputUsuario.style.border = "2px solid green";
      document.getElementById("singup").disabled = false;
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
  var expr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{4,16}$/;

  var inputPass = document.getElementById("password");

  /*comprueba la expresion regular*/
  if (expr.exec(inputPass.value)) {
    // console.log("comprueba la expresion");
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
    var expr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{4,16}$/;

    if (expr.exec(inputRepeat.value)) {
      if (inputPass.value === inputRepeat.value) {
        inputRepeat.style.border = "2px solid green";

    }
  }
  else{
    inputRepeat.style.border = "2px solid red";
  }
}

function ComprobarEmail(data){
  var inputEmail = document.getElementById("email");
  var expr=   /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  console.log(data);
  if (inputEmail.value<0) {
    inputUsEmail.style.border = "2px solid red";
    document.getElementById("singup").disabled= true;
  }
  if (data.length==0){
    if(expr.exec(inputEmail.value)!=null){
      document.getElementById("singup").disabled = false;
      inputEmail.style.border = "2px solid green";
      $("#msg").empty();
    }
    else {
      inputEmail.style.border = "2px solid red";
      document.getElementById("singup").disabled= true;
    }
  }
  else{
    console.log("Ya existe");
    inputEmail.style.border = "2px solid red";
    document.getElementById("singup").disabled= true;
    for (var valor in data) {
      if (data.hasOwnProperty(valor)) {
        if (data[valor]['Email'] === inputEmail.value) {
          $("#msg").html("<p>Este email ya existe <br> puedes recuperar tu cuenta <a href='password.php'>¿Has olvidado la contraseña?</a></p>");
        }
      }
    }




  }

}
