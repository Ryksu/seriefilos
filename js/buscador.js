$(document).ready(function(){
  $("#button_search").click (function(){
    $("ul").toggleClass("none");
    $("#buscador").toggleClass("enable");
    $(".c-buscador").toggleClass("toggle");


  });


  $(".hamburger").click(function(){
    $("span").toggleClass("fa-times");
    $(".c-buscador").toggleClass("c-buscador_enable");
  });

})
