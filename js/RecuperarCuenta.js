$(document).ready(function(){
  $(".recuperar").submit(function(ev){
    ev.preventDefault();
    var email = $("#email").val();
    $.ajax({
      url:'../../Controlador/RecuperarCuenta.php',
      data:{action:"comprobar",email:email},
      type:"POST"
    })
    .done(function(data){
      if (data[0]) {
        CargarVerificar();
        $(".recuperar").submit(function(ev){
          ev.preventDefault();
          var codigo = $("#codigo").val();
          var valor  = data[1];
          $.ajax({
            url:'../../Controlador/RecuperarCuenta.php',
            data:{action:"verificar",codigo:codigo,email:email,valor:valor},
            type:"POST"
          })
          .done(function(data){

            if (data.length>0) {
                CargarDatos(data);
                $("#password").keyup(function(){
                  ComprobarPass();
                })
                $("#password").focus(function(){
                  ComprobarPass();
                });
                $("#repeat").keyup(function(){
                  ComprobarRepeat();
                })
                $("#repeat").focus(function(){
                  ComprobarRepeat();

              });

              $("#reset").submit(function(ev){
                ev.preventDefault();
                var usuario = $("#usuario").val();
                var password = $("#password").val();
                var repeat = $("#repeat").val();
                $.ajax({
                  url:"../../Controlador/RecuperarCuenta.php",
                  data:{action:"cambiar",usuario:usuario,password:password,repeat:repeat},
                  type:"POST"
                })
                .done(function(data){
                  if (data) {
                    alert("contraseña cambiada");
                    location.replace("../login");
                  }
                  else{
                    alert("hubo un error con la base de datos");
                  }
                })

              })
            }
          })

        })
      }
      else{
        alert("Este email no se encuentra en la base de datos");
      }
    });
  })

})

function CargarVerificar(){
    $("#reset").find("label,input").remove();
    var fieldset = $('fieldset');
    var lToken = document.createElement("label");
    $(lToken).attr("for","codigo");
    lToken.append("Codigo");
    var iToken = document.createElement("input");
    $(iToken).attr("type","text");
    $(iToken).attr("name","codigo");
    $(iToken).attr("id","codigo");
    $(iToken).attr("value","");
    $(iToken).prop("required",true);
    fieldset.append(lToken,iToken);
    $("#reset").prepend(fieldset);




}

function CargarDatos(data){
    $("#reset").find("label,input,img").remove();
    var fieldset = $("fieldset");

    for (var valor in data) {
    if (data.hasOwnProperty(valor)) {
      var cfoto = document.createElement("div");
      $(cfoto).addClass("c-foto");

      var foto = document.createElement("img");
      $(foto).attr("src",data[valor]['foto']);
      $(foto).attr("alt","Foto de perfil del usuario: "+ data[valor]['usuario']);
      cfoto.append(foto);

      var cUsuario = document.createElement("div");

      var lUsuario = document.createElement("label");
      $(lUsuario).attr("for","usuario");
      lUsuario.append("Usuario");
      var iUsuario = document.createElement("input");
      $(iUsuario).attr("type","text");
      $(iUsuario).attr("name","usuario");
      $(iUsuario).attr("id","usuario");
      $(iUsuario).attr("value",data[valor]['usuario']);
      $(iUsuario).attr("disabled",true);

      var lEmail = document.createElement("label");
      $(lEmail).attr("for","email");
      lEmail.append("Email");

      var iEmail = document.createElement("input");
      $(iEmail).attr("type","email");
      $(iEmail).attr("name","email");
      $(iEmail).attr("id","email");
      $(iEmail).attr("value",data[valor]['email']);
      $(iEmail).attr('disabled',true);
      cUsuario.append(lUsuario,iUsuario,lEmail,iEmail);

      var cPass = document.createElement("div");
      $(cPass).addClass("password");

      var lPass = document.createElement("label");
      $(lPass).attr("for","password");
      lPass.append("Nueva contraseña");
      iPass = document.createElement("input");
      $(iPass).attr("type","password");
      $(iPass).attr("name","password");
      $(iPass).attr("value","");
      $(iPass).attr("id","password");
      $(iPass).prop("required",true);

      var lRepeat = document.createElement("label");
      $(lRepeat).attr("for","repeat");
      lRepeat.append("Repetir la nueva contraseña");
      iRepeat = document.createElement("input");
      $(iRepeat).attr("type","password");
      $(iRepeat).attr("name","repeat");
      $(iRepeat).attr("value","");
      $(iRepeat).attr("id","repeat");
      $(iRepeat).prop("required",true);

      cPass.append(lPass,iPass,lRepeat,iRepeat);

      fieldset.append(cfoto,cUsuario,cPass);
      $("#reset").prepend(fieldset);
    }
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
