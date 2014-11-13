<?php

function wcms_fetch_all_uploads() {
	return wcms_db_select( 'uploads', ['*']);
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

