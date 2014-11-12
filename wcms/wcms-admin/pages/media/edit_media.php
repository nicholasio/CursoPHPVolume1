<?php 
	$media_id 	= _get('media_id');
	$msg 		= "Adicionar Nova Mídia";

	$upload_name 		= '';
	$upload_file_name  	= '';
	
	
	if ( $media_id ) {
		$msg = "Editar Mídia";
		$upload = wcms_db_select('uploads', [ '*' ], ['ID' => $media_id] )[0];

		$upload_name     	= $upload->upload_name;
		$upload_file_name  	= $upload->upload_file_name;
	}
?>

<?php displayNotices(); ?>

<h1 class="page-header"><?= $msg; ?></h1>

<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="<?= WCMS_ADMIN_URL . 'pages/media/save.php'; ?>">

	<div class="form-group">
		<label for="upload_name" class="col-sm-1 control-label">Nome</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="upload_name" name="upload_name" required placeholder="Nome do Upload" value="<?= $upload_name ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="upload_file_name" class="col-sm-1 control-label">Arquivo</label>
		<div class="col-sm-8">
		  <input type="file" class="" id="upload_file_name" name="upload_file_name" >
		</div>
	</div>

	<?php if ($media_id) : ?>
		<p>Baixar arquivo atual: <a href="<?php echo WCMS_UPLOAD_URL .'/' . $upload_file_name; ?>">Baixar</a> </p>
	<?php endif; ?>

	<?php if ( $media_id ) : ?>
		<input type="hidden" name="media_id" value="<?= $media_id; ?>">
	<?php endif; ?>

	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-8">
		  <button type="submit" name="media_edit_form" class="btn btn-success">Salvar</button>
		</div>
	</div>

</form>