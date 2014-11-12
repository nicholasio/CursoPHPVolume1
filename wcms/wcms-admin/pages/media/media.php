<?php 
   $successMsg = _get('successMsg');
   $errorMsg   = _get('errorMsg');
   if ( $errorMsg ) 
      displayErrorMessage($errorMsg);
   else if ( $successMsg )
      displaySuccessMessage($successMsg);
?>
<h1 class="page-header">Mídia <a href="<?= do_action('edit_media'); ?>" class="btn btn-primary">Adicionar Novo</a></h1>

<table class="table table-bordered wcms-table">
  <thead>
   	<tr>
   		<th>#</th>
   		<th>Nome</th>
   		<th>Arquivo de Upload</th>
   		<th>Ações</th>
   	</tr>
 </thead>
 <tbody>
   	<?php 
   		$uploads = wcms_fetch_all_uploads();
   		foreach($uploads as $upload) :
   	?>
   		<tr>
   			<td><?= $upload->ID; ?></td>
   			<td><?= $upload->upload_name; ?></td>
   			<td><a href="<?= WCMS_UPLOAD_URL . '/' . $upload->upload_file_name; ?>"><?= $upload->upload_file_name; ?></a></td>
   			 <td> <a href="<?= do_action('edit_media', ['media_id' => $upload->ID ] ); ?>" class="btn btn-info" >Editar</a>
                  <a href="<?= do_action('delete_media', [ 'media_id' => $upload->ID ]); ?>" class="btn btn-danger">Remover</a>
            </td>
   		</tr>
	<?php endforeach; ?>
</tbody>
</table>