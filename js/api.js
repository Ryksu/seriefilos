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
        if (inputPass.value !== inputRepeat.value) {
          $("#msg").html("<p> No son iguales </p>");
      }else{
        inputRepeat.style.border = "2px solid green";
        $("#msg").empty();
      }
    }
    else{
      inputRepeat.style.border = "2px solid red";
      // $("#msg").html("<p>No acepta la expresión</p>");


    }
}

/* obtiene el id de la url */
function getId(){
  var local = window.location.href ;
  var url = local.split("/");
  var get = url.slice(-1);
  return get[0];
}
/** Permite obtener El paramentro de la url */
function getURLparamentro(paramentro) {
  var pagURL = window.location.search.substring(1);
  var variableURL = pagURL.split('&');
  for (var i = 0; i < variableURL.length; i++) {
    var NombreParamentro = variableURL[i].split("=");
    if (NombreParamentro[0] == paramentro) {
      return NombreParamentro[1];
    }
  }
}

/*obtiene el tiempo de la base de datos y la devuelve de tipo date */
function formatoTiempo(timestap){
  var tiempo = timestap.split(/[- :]/);

  var tiempoUTC = new Date(Date.UTC(tiempo[0], tiempo[1]-1,tiempo[2], tiempo[3], tiempo[4], tiempo[5]));

  return tiempoUTC;
}


function PaginacionJs(divPaginacion,paginaTotal){
  var paginacion = divPaginacion;
  paginacion.empty();
  if (paginaTotal>1) {
    for (var i = 1; i <= paginaTotal; i++) {
      var enlace = document.createElement("a");
      $(enlace).addClass("npage");
      $(enlace).attr("data",i);
      enlace.append(i);
      paginacion.append(enlace);
    }

  }
}
