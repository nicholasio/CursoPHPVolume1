<?php 
	$post_id 	= _get('post_id');
	$post_type = _get('post_type');
	if ( ! $post_type ) $post_type = 'post';

	$msg = $post_type == 'page' ? 'Adicionar Nova Página' : 'Adicionar Novo Post';

	$post_title 	 = '';
	$post_content    = '';
	$post_excerpt	 = '';
	$post_status     = '';
	$post_author     = '';
	$post_image      = '';
	$post_order      = 0; 
	

	if ( $post_id ) {
		$msg  = $post_type == 'page' ? 'Editar Página' : 'Adicionar Editar Post';
		$post = wcms_db_select('posts', [ '*' ], ['ID' => $post_id] )[0];

		$post_title 	 = $post->post_title;
		$post_content    = $post->post_content;
		$post_excerpt	 = $post->post_excerpt;
		$post_status     = $post->post_status;
		$post_author     = $post->post_author;
		$post_image      = $post->post_image;
		$post_order      = $post->post_order;

		$posts_categories = wcms_db_select( 'post_categories', ['*'], ['posts_ID' => $post_id]);
		if ( $posts_categories )
			$posts_categories = array_map(function($cat) {return $cat->categories_ID; }, $posts_categories);
		else 
			$posts_categories = [];

	} else {
		$posts_categories = [];
	}
?>

<?php displayNotices(); ?>

<h1 class="page-header"><?= $msg; ?></h1>

<form class="form-horizontal" role="form" method="POST" action="<?= WCMS_ADMIN_URL . 'pages/post/save.php'; ?>">

	<div class="form-group">
		<label for="post_title" class="col-sm-1 control-label">Título</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="post_title" name="post_title" required value="<?= $post_title ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="post_content" class="col-sm-1 control-label">Conteúdo</label>
		<div class="col-sm-8">
		  <textarea class="ckeditor" name="post_content"><?= $post_content; ?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="post_excerpt" class="col-sm-1 control-label">Resumo</label>
		<div class="col-sm-8">
		  <textarea class="form-control" name="post_excerpt"><?= $post_excerpt; ?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="post_status" class="col-sm-1 control-label">Status</label>
		<div class="col-sm-8">
		  	<select name="post_status" class="form-contro">
		  		<option value="pb" <?php if ( $post_status == 'pb' ) echo 'selected'; ?> >Publicado</option>
		  		<option value="pd" <?php if ( $post_status == 'pd' ) echo 'selected'; ?>>Pendente</option>
		  	</select>
		</div>
	</div>

	<div class="form-group">
		<label for="post_author" class="col-sm-1 control-label">Autor</label>
		<div class="col-sm-8">
		  	<select name="post_author" class="form-contro">
		  		<?php 
		  			$user = wcms_fetch_all_users(); 
		  			foreach($user as $user):
		  		?>
		  			<option <?php if ( (! $post_id && wcms_get_current_user_ID() == $user->ID)  || ($post_author == $user->ID) ) 
		  						echo 'selected'; 
		  					?>
		  			 value="<?= $user->ID; ?>"><?= $user->user_first_name . ' ' . $user->user_last_name; ?></option>
		  		<?php endforeach; ?>
		  	</select>
		</div>
	</div>

	<?php if ( $post_type == 'post' ) : ?>
		<div class="form-group">
			<label for="post_image" class="col-sm-1 control-label">Imagem Descada</label>
			<div class="col-sm-8">
			  	<select name="post_image" class="form-contro">
			  		<option value="0">Sem Imagem Destacada</option>
			  		<?php 
			  			$uploads = wcms_fetch_all_uploads();
			  			foreach( $uploads as $upload ) :
			  		?>
			  			<option <?php if ( $post_image == $upload->ID ) echo 'selected'; ?> value="<?= $upload->ID; ?>"><?= $upload->upload_name; ?></option>
			  		<?php endforeach; ?>
			  	</select>
			</div>
		</div>

		<div class="form-group">
			<label for="post_categories" class="col-sm-1 control-label">Categorias</label>
			<div class="col-sm-8">
				<?php 
					$categories = wcms_fetch_all_cats();
					if ( $categories ) : ?>
						<select multiple class="form-control" name="post_categories[]">
							<option value="-1">Sem Categoria</option>
							<?php foreach( $categories as $cat ) : ?>
								<option <?php if ( in_array($cat->ID, $posts_categories) ) echo 'selected'; ?> value="<?= $cat->ID; ?>"><?= $cat->cat_name; ?></option>    
							<?php endforeach; ?>
						</select>
					<?php else: ?>
						<p>Sem categorias,<a target="_blank" href="<?= do_action('edit_category'); ?>">Adicione uma categoria</a></p>
					<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $post_type == 'page') : ?>
		<div class="form-group">
			<label for="post_order" class="col-sm-1 control-label">Ordem de Página</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="post_order" name="post_order" required value="<?= $post_order ?>">
			</div>
		</div>
	<?php else: ?>
		<input type="hidden" name="post_order" value="<?= $post_order; ?>">
	<?php endif; ?>

	<?php if ( $post_id ) : ?>
		<input type="hidden" name="post_id" value="<?= $post_id; ?>">
	<?php endif; ?>

	<input type="hidden" name="post_type" value="<?= $post_type; ?>">


	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-8">
		  <button type="submit" name="post_edit_form" class="btn btn-success">Salvar</button>
		</div>
	</div>

</form>