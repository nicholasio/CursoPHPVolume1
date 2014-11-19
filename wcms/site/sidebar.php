<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
<div class="sidebar-module sidebar-module-inset">
  <h4>Sobre</h4>
    <p>Meu nome é Nícholas André, Sou <em>Desenvolvedor Web</em> especialista em WordPress. Utilizo este espaço para postar sobre tecnologia.</p>
</div>
<div class="sidebar-module">
  <h4>Categorias</h4>
  <ol class="list-unstyled">
  	<?php 
  		$cats = wcms_fetch_all_cats();
  		foreach($cats as $cat) :
  	?>
    	<li><a href="<?= get_permalink('category', ['cat_id' => $cat->ID ] ); ?>"><?= $cat->cat_name; ?></a></li>
	<?php endforeach; ?>

  </ol>
</div>
</div><!-- /.blog-sidebar -->