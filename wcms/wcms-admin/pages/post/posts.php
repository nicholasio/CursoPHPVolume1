<?php displayNotices(); ?>

<?php 
	$post_type = _get('post_type');
	if ( ! $post_type ) $post_type = 'post';

	$title = 'Posts';
	if ($post_type == 'page' ) 
		$title = 'Páginas'
?>
<h1 class="page-header"><?= $title; ?> <a href="<?= do_action('edit_post', ['post_type' => $post_type]); ?>" class="btn btn-primary">Adicionar Novo</a></h1>

<table class="table table-bordered wcms-table">
  <thead>
   	<tr>
   		<th>#</th>
   		<th>Título</th>
   		<th>Resumo</th>
   		<th>Data</th>
   		<th>Status</th>
   		<th>Ações</th>
   	</tr>
 </thead>
 <tbody>
   	<?php 
   		$posts = wcms_fetch_all_posts( $post_type );
   		foreach($posts as $post) :
   	?>
   		<tr>
   			<td><?= $post->ID; ?></td>
   			<td><?= $post->post_title; ?></td>
   			<td><?= $post->post_excerpt; ?></td>
   			<td><?= date('d/m/Y H:i:s', strtotime($post->post_date) ); ?></td>
   			<td>
               <?php 
                  if ( $post->post_status == 'pb' )
                     echo 'Publicado';
                  else if ( $post->post_status == 'pd' )
                     echo 'Pendente';
               ?>
               </td>
   			<td>
            <a href="<?= do_action('edit_post',   ['post_id' => $post->ID, 'post_type' => $post_type ] ); ?>" class="btn btn-info" >Editar</a>
            <a href="<?= do_action('delete_post', ['post_id' => $post->ID, 'post_type' => $post_type ]); ?>" class="btn btn-danger">Remover</a>
            </td>
   		</tr>
	<?php endforeach; ?>
</tbody>
</table>