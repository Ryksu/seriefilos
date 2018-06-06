$(document).ready(function(){

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

$("#password").focus(function(){
  ComprobarPass();

})
$("#repeat").focus(function(){
  ComprobarRepeat();
});
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
        setTimeout(function(){location.replace("../login");},2000);
      }else{
        $("#msg").html("<p>Vuelve a repetir la contraseña</p>");
      }

    })
  })


});


/*Comprobar si exite un usuario */
function ComprobarUsuario(data){
  // console.log("Comprobamos si esta vacio");

  var expr = /[a-zA-z-0-9]\S{4,8}/;
  var inputUsuario = document.getElementById("usuario");
  if (inputUsuario.value<0) {
    inputUsuario.style.border = "2px solid red";
    document.getElementById("singup").disabled= true;
  }
  if (data.length==0)
  {

    if(expr.exec(inputUsuario.value)!=null){
      if (inputUsuario.value.length<=8) {
        document.getElementById("singup").disabled = false;
        inputUsuario.style.border = "2px solid green";
        $("#msg").empty();

      }else{
          inputUsuario.style.border = "2px solid red";
          document.getElementById("singup").disabled= true;
          $("#msg").html("<p>La cuenta no es valida</p>");

    }
  }
    else {
      inputUsuario.style.border = "2px solid red";
      document.getElementById("singup").disabled= true;
      $("#msg").html("<p>La cuenta no es valida</p>");

    }
  }
  else{
    inputUsuario.style.border = "2px solid red";
    document.getElementById("singup").disabled= true;
    $("#msg").html("<p>Esta cuenta ya existe puedes recuperar tu cuenta en: <a href='reset.php'>¿Has olvidado la contraseña?</a></p>");

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
  $("#msg").html("<ul><li>4 o 16 caracteres</li> "+
  "<li>Tiene Que llevar al menos una minuscula y mayuscula, un numero y un caracter especial(@!%*?%#.$_())</li> </ul>");

  /*comprueba la expresion regular*/
  if (expr.exec(inputPass.value)) {
    // console.log("comprueba la expresion");
    inputPass.style.border ="2px solid green";
    $("#msg").empty();

  }
  else{
    inputPass.style.border ="2px solid red";
    // $("#msg").html("<p>No acepta la expresión</p>");
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
          $("#msg").empty();

      }else{

        $("#msg").html("<p> No son iguales </p>");
      }
    }
    else{
      inputRepeat.style.border = "2px solid red";
      // $("#msg").html("<p>No acepta la expresión</p>");


    }
}

function ComprobarEmail(data){
  var inputEmail = document.getElementById("email");
  var expr=   /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
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
          $("#msg").html("<p>Esta email ya existe puedes recuperar tu cuenta en: <a href='reset.php'>¿Has olvidado la contraseña?</a></p>");
        }
      }
    }




  }

}
