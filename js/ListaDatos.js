$(document).ready(function(){
  Cargar();

})
function Cargar(){
  Categorias();
  Estados();
}



function Estados(){
  var estado  = document.getElementById("Estado");
  var option;
  var estados = ["En Emision","Terminado","Esperando nueva temporada"];
  for (var i = 0; i < estados.length; i++) {
   option = new Option(estados[i],i+1);
   estado.add(option);
  }
}

function Categorias(){
  var categoria = document.getElementById("Categoria");
  var option;
  var categorias = [
    "Acción","Animadas","Aventura","Ciencia ficción","Comedia","Sitcom","Crimenes","Policiacas","Sobrenaturales","Eroticas","Humor negro","Fantasias","Infatiles","Drama"
];
  for (var i = 0; i < categorias.length; i++) {
       option = new Option(categorias[i],categorias[i]);
       categoria.add(option);
  }

}
