<?php

function wcms_fetch_all_posts( $post_type ) {
	return wcms_db_select( 'posts', ['*'] , ['post_type' => $post_type], [], ['post_date', 'DESC'] );
}

function wcms_assign_category( $post_id , $categories ) {
	if ( ! $categories ) return false;

	if ( wcms_db_delete('post_categories', ['posts_ID' => $post_id] ) ) {
		foreach($categories as $cat) {
			if ( $cat->ID == -1 ) continue;
			wcms_db_insert('post_categories', ['posts_ID' => $post_id, 'categories_ID' => $cat]);
		}

		return true;
	}

	return false;
}