<?php

include('../../../bootstrap.php' ); 

if ( isset($_POST['media_edit_form']) ) {
	$media_id = _post('media_id');

	$fileName = '';
	$upload = doUpload( WCMS_UPLOAD_DIR, 'upload_file_name', $fileName, true, ['.jpg', '.png', '.jpeg', '.docx', '.doc', '.pdf'] );
	if ( $upload === true) {
		$upload_data = [ 'upload_name' => _post('upload_name'), 'upload_file_name' => $fileName];

		if ( $media_id ) {
			$old_data = wcms_db_select( 'uploads', ['*'], ['ID' => $media_id] )[0];
			@unlink( WCMS_UPLOAD_DIR . '/' . $old_data->upload_file_name);

			if ( wcms_db_update( 'uploads', $upload_data, ['ID' => $media_id] ) ) {
				redirect( 'edit_media', [ 'successMsg' => 'Mídia Atualizada com sucesso', 'media_id' => $media_id]);
				die();
			} else {
				redirect( 'edit_media', [ 'errorMsg' => 'Erro ao atualizar mídia', 'media_id' => $media_id]);
			}
		}

		if ( wcms_db_insert( 'uploads', $upload_data) ) {
			redirect( 'media', [ 'successMsg' => 'Mídia Cadastrada com sucesso']);
		} else {
			redirect( 'media', [ 'errorMsg' => 'Erro ao inserir mídia'] );
			die();
		}


	} else {
		redirect( 'media', ['errorMsg' => $upload]);
		die();
	}
} else {
	die("Você não deveria estar aqui");
}