<?php

if ( isset($_POST['post_edit_form']) ) {
	$post_id = _post('post_id');

	$data = [
		'post_title' => _post('post_title'),
		'post_excerpt' => _post('post_excerpt'),
		'post_content' => _post('post_content'),
		'post_date'    => date('Y-m-d H:i:s'),
		'post_author'  => _post('post_author'),
		'post_image'   => _post('post_image') ? _post('post_image') : NULL,
		'post_status'  => _post('post_status'),
		'post_type'    => _post('post_type'),
		'post_order'   => _post('post_order')
	];

	if ( $post_id ) {
		if ( wcms_db_update( 'posts' , $data , ['ID' => $post_id ] ) ) {
			wcms_assign_category($post_id, $_POST['post_categories']);
			redirect('edit_post', ['successMsg' => 'Atualizado com sucesso', 'post_id' => $post_id, 'post_type' => $data['post_type'] ]);
		} else {
			redirect('edit_post', ['errorMsg' => 'Erro ao atualizar', 'post_id' => $post_id, 'post_type' => $data['post_type'] ]);
		}
	} else { 
		$created_post = wcms_db_insert('posts', $data);
		if ( $created_post ) {
			wcms_assign_category($created_post, $_POST['post_categories']);
			redirect('edit_post', ['successMsg' => 'Criado com sucesso', 'post_id' => $created_post, 'post_type' => $data['post_type'] ]);
		} else {
			redirect('edit_post', ['errorMsg' => 'Erro ao salvar', 'post_id' => $created_post, 'post_type' => $data['post_type'] ]);
		}
	}
} else {
	redirect('posts', ['post_type' => $data['post_type'], 'errorMsg' => 'Erro']);
}