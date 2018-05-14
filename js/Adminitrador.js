$(document).ready(function(){
  $("#mostrar").click(function(){
    $("#c-Todo").toggleClass("c-Todo");
  })
  $(".eliminar").click(function(e){
    var valor = $(this).val();
    e.preventDefault();
    $(this).closest('tr').remove();
    $.ajax({
      url:"../../Controlador/BorrarUsuario.php",
      data:{usuario:valor},
      type:"post"
    })
    .done(function(e){
      console.log(e);
    })
  })
})
