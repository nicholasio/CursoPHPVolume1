<?php

include('../../../bootstrap.php' ); 

if ( isset($_POST['user_edit_form']) ) {
	$user_id = _post('user_id');

	$user_first_name 	= _post('user_first_name');
	$user_last_name  	= _post('user_last_name');
	$user_email		 	= _post('user_email');
	$user_pass 		 	= _post('user_pass');
	$user_confirm_pass 	= _post('user_confirm_pass');

	$errorMsg = '';

	if ( empty($user_first_name) )
		$errorMsg = "Primeiro nome não pode ser vazio";

	if ( ! filter_var($user_email, FILTER_VALIDATE_EMAIL) )
		$errorMsg = "Insira um email válido";

	if ( ! $user_id && ( empty($user_pass) || empty($user_confirm_pass) ) )
		$errorMsg = "Senhas não podem estar em branco";

	if ( $user_pass != $user_confirm_pass )
		$errorMsg = "Senhas não conferem";
	
	$userData = [ 	'user_first_name' => $user_first_name, 
					'user_last_name' => $user_last_name, 
					'user_email' => $user_email, 
					'user_pass' => sha1($user_pass) 
				];

	$successMsg  = "Usuário Salvo com sucesso";

	if ( empty($errorMsg) ) {
		if ( $user_id ) { //UPDATE

			if ( empty($user_pass) && empty($user_confirm_pass) ) {
				unset($userData['user_pass']);
			}

			if ( wcms_db_update( 'users', $userData, ['ID' => $user_id]) ) {
				$_SESSION['user_data'] = wcms_db_select( 'users', ['*'], ['ID' => $user_id])[0];
				redirect( 'edit_user', [ 'successMsg' => $successMsg, 'user_id' => $user_id ] );
			} else {
				redirect( 'edit_user', [ 'errorMsg' => 'Erro ao atualizar o usuário', 'user_id' => $user_id]);
			}

		} else { //INSERT

			if ( wcms_db_select('users', ['*'], [ 'user_email' => $user_email]) )
				$errorMsg = "Já existe um usuário com esse email";
			else {
				if ( wcms_db_insert('users', $userData) ) {
					redirect( 'users', [ 'successMsg' => $successMsg ] );
				} else {
					$errorMsg = "Erro ao salvar registro no banco de dados";
				}
			}
			redirect( 'users', [ 'errorMsg' => $errorMsg ] );

		}
	} else {
		redirect( 'users', [ 'errorMsg' => $errorMsg ] );
	}
} else {
	die("Você não deveria estar aqui");
}