<?php if (!empty($publicacion)): ?>
  <?php foreach($publicacion as $row):?>
    <a href="/series/<?php echo $row['id']?>">
      <article class="serie">
        <img src="<?php echo $row['Poster'];?>" alt="<?php echo $row['Titulo']?>">

        <h1><?php echo $row['Titulo']?></h1>
      </article>

    </a>
  <?php endforeach;  ?>
<?php else: ?>
  <?php echo "<p>Sin publicaciones</p>" ?>
<?php endif; ?>
