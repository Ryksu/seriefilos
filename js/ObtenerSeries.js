$(document).ready(function(){
  $(".npage").on("click",function(){
    valor = $(this).attr("data");
    console.log(valor);
    $.ajax({
      url:"../../Controlador/ObtenerCatalogo.php",
      data:{pg:valor},
      type:"GET"
    })
    .done(function(data){
      console.log(data);
    })
  })
})
