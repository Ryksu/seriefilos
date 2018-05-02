

$(document).ready(function(){
  $("#asunto").change(function(){
    switch ($("#asunto").val()) {
      case "serie":
      $("#serie").removeClass("disable").addClass($(this).val());
      $("#consulta").removeClass("consulta").addClass("disable");
        break;
      case "consulta":
      $("#consulta").removeClass("disable").addClass($(this).val());
      $("#serie").removeClass("serie").addClass("disable");


        break;
      default:
      $("#serie").removeClass("serie").addClass("disable");
      $("#consulta").removeClass("consulta").addClass("disable");

    }


  });

})
