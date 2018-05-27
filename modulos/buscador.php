<?php

 ?>
   <form class="form_search" method="get" >
     <div class="b-buscador">
       <button id="button_search" type="submit" class="m-buscador">     <span class="fa fa-search"></span>
       </button>
       <input type="search" id="buscador" name="buscador" value="" placeholder="Buscar...">
     </div>
     <div class="c-year">
       <label for="año">Año</label>
       <input type="number" name="año"  id="año" min="1900" max="2020" value="">
     </div>
     <div class="c-temporada">
       <label for="temporada">Temporada</label>
       <input type="number" name="temporada" id="temporada" value="">
   </div>
   <div class="c-categorias">
     <label for="Categoria">Categorias</label>
     <select class="categorias" name="Categoria" id="Categoria">
       <option value="">Todos</option>
     </select>
   </div>
   <div class="c-estados">
     <label for="Estado">Estado</label>
     <select class="estados" name="Estado" id="Estado">
     </select>
   </div>
     <div class="c-enviar">
       <button type="reset" name="Deshacer">
       <span class="fas fa-redo-alt"></span>
       Deshacer
     </button>
       <button type="submit" name="Enviar">
       <span class="far fa-paper-plane"></span>
       Enviar
     </button>
   </div>
   </form>
