<?php
$post_id = _get('post_id');
$post_type = _get('post_type');

if ( $post_id ) {
	if ( wcms_db_delete('post_categories', ['posts_ID' => $post_id]) && wcms_db_delete('posts', ['ID'=> $post_id]) ) {
				
		redirect('posts', ['successMsg' => 'Post Removido com sucesso', 'post_type' => $post_type] );
	} else {
		redirect('posts', ['errorMsg' => 'Problema na remoção', 'post_type' => $post_type ]);
	}
}