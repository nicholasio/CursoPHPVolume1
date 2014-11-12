<?php
include('../../bootstrap.php' ); 

if ( isset($_POST['post_edit_form']) ) {
	$post_id = _post('post_id');

	$data = [ 
			  'post_title' 		=> _post('post_title'), 
			  'post_excerpt' 	=> _post('post_excerpt'),
			  'post_content'	=> _post('post_content'),
			  'post_date'		=>  date('Y-m-d H:i:s'),
			  'post_author'		=> _post('post_author'),
			  'post_image'		=> _post('post_image') ? _post('post_image') : NULL,
			  'post_status'		=> _post('post_status'),
			  'post_type'		=> _post('post_type'),
			 ];

	if ( $post_id ) {
		if ( wcms_db_update( 'posts', $data, ['ID' => $post_id] ) ) {
			wcms_assign_category($post_id, $_POST['post_categories'] );
			redirect( 'edit_post', [ 'successMsg' => 'Post Atualizada com sucesso', 'post_id' => $post_id, 'post_type' => $data['post_type']]);
		} else {
			redirect( 'edit_post', [ 'errorMsg' => 'Erro ao atualizar Post', 'post_id' => $post_id, 'post_type' => $data['post_type']]);
		}
	}

	$created_post = wcms_db_insert( 'posts', $data);
	if (  $created_post ) {
		wcms_assign_category($created_post, $_POST['post_categories'] );
		redirect( 'posts', [ 'successMsg' => 'Categoria Cadastrada com sucesso', 'post_type' => $data['post_type'] ]);
	} else {
		redirect( 'posts', [ 'errorMsg' => 'Erro ao inserir Post', 'post_type' => $data['post_type']] );
	}
} else {
	die("Você não deveria estar aqui");
}