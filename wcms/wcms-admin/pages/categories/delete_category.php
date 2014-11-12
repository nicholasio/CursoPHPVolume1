<?php

$cat_id = _get('cat_id');

if ( $cat_id ) {

	if ( wcms_db_delete( 'categories', [ 'ID' => $cat_id] ) ) {
		redirect( 'categories', [ 'successMsg' => 'Categoria removida com sucesso'] );
	} else {
		redirect( 'categories', [ 'errorMsg' => 'Problema na remoção'] );
	}
}