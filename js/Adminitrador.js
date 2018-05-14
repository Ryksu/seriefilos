$(document).ready(function(){
  $("#Usuarios").click(function(){
    $("#c-Usuarios").toggleClass("c-Todo");
  })
  $("#Series").click(function(){
    $("#c-series").toggleClass("c-Todo");
  })

  $(".eliminarUsuarios").click(function(e){
    var valor = $(this).val();
    e.preventDefault();
    $(this).closest('tr').remove();
    $.ajax({
      url:"../../Controlador/BorrarUsuario.php",
      data:{usuario:valor},
      type:"post"
    })
    .done(function(e){
      alert("Eliminado");
    })
  })

  $(".eliminarSeries").click(function(e){
    var valor = $(this).val();
    e.preventDefault();
    $(this).closest('tr').remove();
    $.ajax({
      url:"../../Controlador/BorrarSerie.php",
      data:{serie:valor},
      type:"post"
    })
    .done(function(){
      alert("Eliminado");
    })
  })
})
