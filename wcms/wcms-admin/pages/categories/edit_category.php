<?php 
	$cat_id 	= _get('cat_id');
	$msg 		= "Adicionar Nova Categoria";

	$cat_name 			= '';
	$cat_description  	= '';
	
	
	if ( $cat_id ) {
		$msg = "Editar Categoria";
		$cat = wcms_db_select('categories', [ '*' ], ['ID' => $cat_id] )[0];

		$cat_name 			= $cat->cat_name;
		$cat_description  	= $cat->cat_description;
	}
?>

<?php displayNotices(); ?>

<h1 class="page-header"><?= $msg; ?></h1>

<form class="form-horizontal" role="form" method="POST" action="<?= WCMS_ADMIN_URL . 'pages/categories/save.php'; ?>">

	<div class="form-group">
		<label for="cat_name" class="col-sm-1 control-label">Nome da Categoria</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="cat_name" name="cat_name" required placeholder="Nome da Categoria" value="<?= $cat_name ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="cat_description" class="col-sm-1 control-label">Descrição</label>
		<div class="col-sm-8">
		  <textarea class="form-control" id="cat_description" rows="10" name="cat_description"><?= $cat_description ?></textarea>
		</div>
	</div>

	<?php if ( $cat_id ) : ?>
		<input type="hidden" name="cat_id" value="<?= $cat_id; ?>">
	<?php endif; ?>


	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-8">
		  <button type="submit" name="categories_edit_form" class="btn btn-success">Salvar</button>
		</div>
	</div>

</form>