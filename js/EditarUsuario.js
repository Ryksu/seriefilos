$(document).ready(function(){
  $("#Editar").click(function(){
    Cargar();
  })
})

function Cargar(){
  $("div").removeAttr("hidden");
  $("input").removeAttr("disabled");
  $("#c-enviar").addClass("c-enviar ");
  $("#c-editar").removeClass("c-editar");
  $("#c-editar").attr('hidden',true);

}
