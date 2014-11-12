<?php

$user_id = _get('user_id');

if ( $user_id ) {
	if ( wcms_db_delete( 'users', [ 'ID' => $user_id] ) ) {
		redirect( 'users', [ 'successMsg' => 'Usuário removido com sucesso'] );
	} else {
		redirect( 'users', [ 'errorMsg' => 'Problema na remoção'] );
	}
}