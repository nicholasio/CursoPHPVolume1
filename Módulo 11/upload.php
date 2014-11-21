<?php
//Baseado no Livro PHP Para quem conhece PHP: http://www.novatec.com.br/livros/phppqc4/
header("Content-type: text/html; charset=UTF-8");
$limitar_ext = true;
$extensoes_validas = array('.pdf', '.docx');
$caminho_absoluto  = dirname(__FILE__) . '/uploads';
$limitar_tamanho = true;
$tamanho_bytes = 1;
$sobrescrever = true;

if ( isset($_FILES['arquivo']) ) {
	$nome_arquivo = $_FILES['arquivo']['name'];
	$tamanho_arquivo = $_FILES['arquivo']['size'];
	$arquivo_temporario = $_FILES['arquivo']['tmp_name']; 
}

if ( isset($nome_arquivo) ) {
	if ( !$sobrescrever && file_exists("$caminho_absoluto/$nome_arquivo") )
		die("Arquivo já existe");

	if ( $limitar_tamanho && $tamanho_arquivo > $tamanho_bytes )
		die("Arquivo deve ter no máximo $tamanho_bytes bytes");

	$ext = strrchr($nome_arquivo, '.');

	if ( $limitar_ext && ! in_array($ext, $extensoes_validas) )
		die("Extensão inválida para upload.");

	if ( move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo") ) {
		echo "<p align=center>O upload do arquivo <b>". $nome_arquivo."</b> foi concluído com sucesso.</p>";
		echo "<p align=center><a href=form_upload.php>Novo upload</a></p>";
	} else {
		echo "<p align=center>O arquivo não pode ser copiado para o servidor.</p>";
	}



} else {
	die( "Seleciona um arquivo a ser enviado ");
}