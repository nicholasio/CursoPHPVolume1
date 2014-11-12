<?php  displayNotices(); ?>

<h1 class="page-header">Categorias <a href="<?= do_action('edit_category'); ?>" class="btn btn-primary">Adicionar Nova</a></h1>

<table class="table table-bordered wcms-table">
  <thead>
   	<tr>
   		<th>#</th>
   		<th>Nome</th>
   		<th>Descrição</th>
   		<th>Ações</th>
   	</tr>
 </thead>
 <tbody>
   	<?php 
   		$cats = wcms_fetch_all_cats();
   		foreach($cats as $cat) :
   	?>
   		<tr>
   			<td><?= $cat->ID; ?></td>
   			<td><?= $cat->cat_name; ?></td>
   			<td><?= $cat->cat_description; ?></td>
   			<td>
            <a href="<?= do_action('edit_category', [ 'cat_id' => $cat->ID ] ); ?>" class="btn btn-info" >Editar</a>
            <a href="<?= do_action('delete_category',   [ 'cat_id' => $cat->ID ]); ?>" class="btn btn-danger">Remover</a>
                
            </td>
   		</tr>
	<?php endforeach; ?>
</tbody>
</table>