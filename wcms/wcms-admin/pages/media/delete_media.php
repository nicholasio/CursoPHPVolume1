<?php

$media_id = _get('media_id');

if ( $media_id ) {
	$upload_data = wcms_db_select( 'uploads', ['*'], ['ID' => $media_id])[0];

	if ( wcms_db_delete( 'uploads', [ 'ID' => $media_id] ) ) {
		@unlink( WCMS_UPLOAD_DIR . '/' . $upload_data->upload_file_name);
		redirect( 'media', [ 'successMsg' => 'Mídia removido com sucesso'] );
	} else {
		redirect( 'media', [ 'errorMsg' => 'Problema na remoção'] );
	}
}