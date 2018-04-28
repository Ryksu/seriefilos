window.addEventListener('load',Cargar);

function Cargar(){
  Categorias();
}


function Categorias(){
  var categoria = document.getElementById("Categoria");
  var option;
  var categorias = [
    "Acción","Animadas","Aventura","Ciencia ficción","Comedia","Sitcom","Crimenes","Policias","Sobrenaturales","Eroticas","Humor negro","Fantasias","Infatiles","Drama"
];
  for (var i = 0; i < categorias.length; i++) {
       option = new Option(categorias[i],categorias[i]);
       categoria.add(option);
  }

}
