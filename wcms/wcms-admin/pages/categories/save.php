<?php

if ( isset($_POST['categories_edit_form']) ) {
	$cat_id = _post('cat_id');

	$data = ['cat_name' => _post('cat_name'), 'cat_description' => _post('cat_description') ];

	if ( $cat_id ) {
		if ( wcms_db_update('categories', $data, ['ID' => $cat_id]) ) {
			redirect('edit_category', ['successMsg' => 'Cateoria Salva com sucesso', 'cat_id' => $cat_id]);
		}else {
			redirect('edit_category', ['errorMsg' => 'Erro ao atualizar categoria'] );
		}
	} else {
		if ( wcms_db_insert('categories', $data) ) {
			redirect('categories', ['successMsg' => 'Categoria Inserida com sucesso']);
		} else {
			redirect('categories', ['errorMsg' => 'Erro ao inserir categoria'] );
		}
	}
} else {
	redirect('categorias', ['errormsg' => 'Formulário não submetido']);
}
