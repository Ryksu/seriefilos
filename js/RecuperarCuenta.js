var hash;
$(document).ready(function(){
  var cont = 0;
  $("#enviar").click(function(ev){
    ev.preventDefault();
    var email = $("#email").val();
    $.ajax({
      url:'../../Controlador/RecuperarCuenta.php',
      cache:false,
      data:{action:"comprobar",email:email},
      type:"POST"
    })
    .done(function(data){
      if (data[0]) {
        hash = data[1];
        CargarVerificar();
        $("#verificar").click(function(ev){
          ev.preventDefault();
          var codigo = $("#codigo").val();
          var valor  = hash;
          $.ajax({
            url:'../../Controlador/RecuperarCuenta.php',
            cache:false,
            data:{action:"verificar",codigo:codigo,email:email,valor:valor},
            type:"POST"
          })
          .done(function(data){
            if (data!="FAIL") {
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
              })
              $("#cambiar").click(function(ev){
                ev.preventDefault();
                var usuario = $("#usuario").val();
                var password = $("#password").val();
                var repeat = $("#repeat").val();
                $.ajax({
                  url:"../../Controlador/RecuperarCuenta.php",
                  cache:false,
                  data:{action:"cambiar",usuario:usuario,password:password,repeat:repeat},
                  type:"POST"
                })
                .done(function(data){
                  if (data) {
                    alert("contraseña cambiada");
                    delete data;
                    location.replace("../login");
                  }
                  else{
                    alert("hubo un error con la base de datos");
                  }
                });
              });
            }
            else{
              alert("Error en el codigo");
            }
          })
        })
      }
    })
  })



});

function CargarVerificar(){
    $(".comprobar").remove();
    $(".verificar").attr("hidden",false);
    $("#enviar").attr("id","verificar");
    var fieldset = $('fieldset');
    var verificar = $('.verificar');
    var lToken = document.createElement("label");
    $(lToken).attr("for","codigo");
    lToken.append("Codigo");
    var iToken = document.createElement("input");
    $(iToken).attr("type","text");
    $(iToken).attr("name","codigo");
    $(iToken).attr("id","codigo");
    $(iToken).attr("value","");
    $(iToken).prop("required",true);
    verificar.append(lToken,iToken);
    fieldset.append(verificar);
    $("#reset").prepend(fieldset);
}

function CargarDatos(data){
    $(".verificar").remove();
    $(".cambiar").attr("hidden",false);
    $("#verificar").attr("id","cambiar");

    var cambiar = $(".cambiar");
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
      cambiar.append(cfoto,cUsuario,cPass);
      fieldset.append(cambiar);
      $("#reset").prepend(fieldset);
    }
  }
}
