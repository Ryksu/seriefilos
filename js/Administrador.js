$(document).ready(function(){
  $("#Usuarios").click(function(){
    $("#c-Usuarios").toggleClass("c-Todo");
    $.ajax({
      url:"../../Controlador/ControladorAdmin.php",
      data:{action:"ObtenerUsuarios"},
      type:'POST'
    })
    .done(function(data){
      CargarUsuarios(data);
      $(".eliminarUsuarios").click(function(e){
        e.preventDefault();
        var valor = $(this).val();
        $(this).closest('tr').remove();
        $.ajax({
          url:"../../Controlador/ControladorAdmin.php",
          data:{action:"BorrarUsuario",usuario:valor},
          type:"POST"
        })
        .done(function(data){
          if (data) {
            alert("Eliminado");
          }
        })
      });
    })
  });
  $("#Series").click(function(){
    $("#c-series").toggleClass("c-Todo");

    $.ajax({
      url:"../../Controlador/ControladorAdmin.php",
      data:{action:"ObtenerSeries"},
      type:"POST"
    })
    .done(function(data){

      var paginaTotal = data['paginaTotal'];
      var pagina = data['pagina'];


      CargarSeries(data);
      paginacionSeries = $(".paginacionSeries");
        PaginacionJs(paginacionSeries,paginaTotal);
        $(".npage[data="+pagina+"]").addClass("activo");



      $(".eliminarSeries").click(function(e){
        e.preventDefault();
        var valor = $(this).val();
        $(this).closest('tr').remove();
        $.ajax({
          url:"../../Controlador/ControladorAdmin.php",
          data:{action:"BorrarSerie",serie:valor},
          type:"POST"
        })
        .done(function(data){
          if (data) {
            alert("Borrado");
          }
        })
      })
      $(".editarSeries").click(function(e){
        e.preventDefault();
        var valor = $(this).val();
        location.href ="editar.php?id="+valor;
      })
      $(".npage").on("click",function(ev){
        ev.preventDefault();
        valor = $(this).attr("data");
        $.ajax({
          url:"../../Controlador/ControladorAdmin.php",
          data:{action:"ObtenerSeries",pg:valor},
          type:"POST"
        })
        .done(function(data){
          pagina = data['pagina'];
          if (valor === pagina) {
            $(".npage").removeClass("activo");
            $(".npage[data="+valor+"]").addClass("activo");
          }

          CargarSeries(data);

          $(".eliminarSeries").click(function(e){
            e.preventDefault();
            var valor = $(this).val();
            $(this).closest('tr').remove();
            $.ajax({
              url:"../../Controlador/ControladorAdmin.php",
              data:{action:"BorrarSerie",serie:valor},
              type:"POST"
            })

            .done(function(data){
              if (data) {
                alert("Borrado");
              }
            })
          })
          $(".editarSeries").click(function(e){
            e.preventDefault();
            var valor = $(this).val();
            location.href ="editar.php?id="+valor;
          })
        })
      })
    });
  });







})
/* Coge los usuarios de la base de datos luego los transforma */

function CargarUsuarios(data){
  $("#users-table").find("tr:not(:nth-child(1))").remove();
  for (var valor in data) {
    var usuario = document.createElement('td');
    usuario.append(data[valor]['usuario']);

    var email = document.createElement('td');
    email.append(data[valor]['email']);

    var nombre = document.createElement('td');
    if (data[valor]['nombre']===null) {
      nombre.append('Sin especificar');
    }
    else{
    nombre.append(data[valor]['nombre']);
    }

    var apellidos = document.createElement('td');
    if (data[valor]['apellidos']===null) {
      apellidos.append('Sin especificar');

    }else{
      apellidos.append(data[valor]['apellidos']);

    }

    var cumple = document.createElement('td');
    if (data[valor]['cumple']===null) {
      cumple.append('Sin especificar');

    }else {
      cumple.append(data[valor]['cumple']);
    }

    var emailVerficado = document.createElement('td');
    if (data[valor]['email_verificado']==1) {
      emailVerficado.append("verificado");
    }else{
      emailVerficado.append("sin verificar");
    }


    var eliminar = document.createElement("td");

    $(eliminar).addClass('delete');
    $(eliminar).html("<button type='button'  class='eliminarUsuarios' value='"+data[valor]['usuario']+"' name='eliminar'> <span class='fas fa-trash-alt'></span></button>");
    var tr = document.createElement('tr');
    tr.append(usuario,email,nombre,apellidos,cumple,emailVerficado,eliminar);
    $('#users-table').append(tr);
  }
}

/* Carga de la serie obtenida de la bdta, los datos en formato del DOM */

function CargarSeries(data){
  $("#serie-table").find("tr:not(:nth-child(1))").remove();
  /* Eliminamos los datos que no necesitamos */
  delete data['pagina'];
  delete data['paginaTotal'];

  for (var valor in data) {

      var id = document.createElement('td');
      id.append(data[valor]['id']);

      var titulo = document.createElement('td');
      titulo.append(data[valor]['Titulo']);

      var texto = document.createElement('td');
      if (data[valor]['Texto'].length>0) {
        texto.append('Si');
      }else{
        texto.append('No');
      }
      var categorias = document.createElement('td');
      categorias.append(data[valor]['Categoria']);

      var year = document.createElement('td');
      year.append(data[valor]['Year']);
      var temporada = document.createElement('td');
      temporada.append(data[valor]['Temporada']);

      var estado = document.createElement('td');
      switch (data[valor]['Estado']) {
        case '1':
            estado.append('En emisión');
          break;
        case '2':
          estado.append('Terminado');
          break;
        case '3':
          estado.append('Esperando nueva temporada');
          break;

      }

      var trailer = document.createElement('td');
      if (data[valor]['Trailer'].length>0) {
        trailer.append('Si');
      }else {
        trailer.append('No');
      }

      var poster = document.createElement('td');
      if (data[valor]['Poster'].length>0) {
        poster.append('Si');
      }else{
        poster.append('No');
      }
      var idusuario = document.createElement('td');
      idusuario.append(data[valor]['id_Usuarios']);

      var puntuacion = document.createElement('td');
      if (data[valor]['Puntuacion']==null) {
        puntuacion.append("0");
      }else{
        puntuacion.append(data[valor]['Puntuacion']);
      }


      var eliminar = document.createElement("td");
      $(eliminar).addClass('delete');
      $(eliminar).html("<button type='button'  class='eliminarSeries' value='"+data[valor]['id']+"' name='eliminar'> <span class='fas fa-trash-alt'></span></button>");

      var editar = document.createElement("td");
      $(editar).addClass('edit');
      $(editar).html("<button type='button' class='editarSeries' value='"+data[valor]['id']+"' name='editar'> <span class='fas fa-trash-alt'></span> </button>");

      var tr = document.createElement('tr');
      tr.append(id,titulo,texto,categorias,year,temporada,estado,trailer,poster,idusuario,puntuacion,eliminar,editar);

    $("#serie-table").append(tr);
  }
}

/* Funcion permite introducir el numero de pagina totales en un div ya creado*/
function PaginacionJs(divPaginacion,paginaTotal){
  var paginacion = divPaginacion;
  paginacion.empty();

  for (var i = 1; i <= paginaTotal; i++) {
      var enlace = document.createElement("a");
      $(enlace).addClass("npage");
      $(enlace).attr("data",i);
      enlace.append(i);
      paginacion.append(enlace);
  }
}
