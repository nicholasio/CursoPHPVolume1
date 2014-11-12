<?php

function do_action($action, Array $params = null) {

	$sParams = '';

	if ( ! is_null($params) ) {
		$aParams = array_map(function($key, $value) { return $key . '=' . urlencode($value); }, array_keys($params), array_values($params));
		$sParams = '&' . implode('&', $aParams);
	}

	return WCMS_ADMIN_URL . 'index.php?action=' . $action . $sParams;
}

function _get($actionName) {
	return strip_tags( filter_input(INPUT_GET, $actionName) );
}

function _post($actionName) {
	return filter_input(INPUT_POST, $actionName);	
}

function redirect( $action, $params ) {
	header("Location: " . do_action( $action, $params ) );
	die();
}

function displayErrorMessage( $msg ) {
	echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
} 

function displaySuccessMessage( $msg ) {
	echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
}

function displayNotices( ) {
   $successMsg = _get('successMsg');
   $errorMsg   = _get('errorMsg');
   if ( $errorMsg ) 
      displayErrorMessage($errorMsg);
   else if ( $successMsg )
      displaySuccessMessage($successMsg);
}

function doUpload( 	$caminho_absoluto, 
					$inputName,
					& $fileName,
					$limitar_ext = true,
				 	$extensoes_validas 	= array( '.png', '.jpg', '.jpeg', '.bmp' ), 
				 	$limitar_tamanho 	= false,
				 	$tamanho_bytes  	= "200000",
				 	$sobrescrever   	= false

				 ) {

	if ( isset($_FILES[$inputName]) ) {
		$nome_arquivo	 	= $_FILES[$inputName]['name'];
		$tamanho_arquivo 	= $_FILES[$inputName]['size'];
		$arquivo_temporario = $_FILES[$inputName]['tmp_name'];	
	}



	if (!empty ($nome_arquivo))
	{
		if ($sobrescrever && file_exists("$caminho_absoluto/$nome_arquivo") )
			return "Arquivo já existe.";

		if (($limitar_tamanho ) && ($tamanho_arquivo > $tamanho_bytes))
			return "Arquivo deve ter no máximo $tamanho_bytes bytes.";

		$ext = strrchr($nome_arquivo,'.');
		if ($limitar_ext  && ! in_array($ext,$extensoes_validas) )
			return "Extensão de arquivo inválida para upload.";

		if( move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo") )
		{
			$fileName = $nome_arquivo;
			return true;
		}
		else
			return "O arquivo não pode ser copiado para o servidor";
	}
	else
		return "Selecione o arquivo a ser enviado";
}

function menu_selected( $menu_action, Array $params = null ) {
	$active = true;

	if ( _get('action') != $menu_action ) $active = false;

	if ( ! is_null($params) ) {
		array_walk($params, 
			function($item, $key) use (&$active) {
				if ( _get($key) != $item ) {
					$active = false;
				} 
			}
		);
	}

	if ( $active ) {
		echo ' active ';
	}
}