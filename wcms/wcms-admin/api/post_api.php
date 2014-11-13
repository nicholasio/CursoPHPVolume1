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

function get_page() {
	return get_post();
}

function get_post() {
	$page = _get('post_id');

	if ( $page ) {
		$page = wcms_db_select('posts', ['*'], ['ID' => $page]);
		if ( $page ) {
			return $page[0];
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function get_posts($postsPerPage = 5, $post_type = 'post', $cat_id = null) {
	$paged  	= _get('paged');

	

	$offset = 0;
	if ( $paged ) {
		$offset = ( $paged - 1) * $postsPerPage;
	}

	$posts = null;

	$totalPosts = 0;

	if ( is_null($cat_id) ) {
		$totalPosts = wcms_db_select('posts', ['count(ID) as total'], ['post_type' => $post_type])[0]->total;
		$posts = wcms_db_select('posts',['*'], ['post_type' => $post_type], [$offset, $postsPerPage], ['post_date', 'DESC'] );
	} else {
		$totalPosts = wcms_db_select('posts', ['count(ID) as total'], ['post_type' => $post_type, ''])[0]->total;
		$conn = getConnection();

		$stmt = $conn->prepare("SELECT count(*) as total FROM posts, post_categories WHERE posts.post_type = 'post' 
								 AND posts.ID = post_categories.posts_ID
								 AND post_categories.categories_ID = :cat_id");
		
		$stmt->bindValue(':cat_id', $cat_id);

		if ( $stmt->execute() ) {
			$totalPosts = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->total;

			$stmt = $conn->prepare("SELECT *  FROM posts, post_categories WHERE posts.post_type = 'post' 
								 	AND posts.ID = post_categories.posts_ID
								 	AND post_categories.categories_ID = :cat_id ORDER BY post_date DESC LIMIT {$offset}, {$postsPerPage}");
		
			$stmt->bindValue(':cat_id', $cat_id);
			$stmt->execute();

			$posts = $stmt->fetchAll(PDO::FETCH_OBJ);
		} 
	}

	if ( $posts ) {
		$posts[0]->total_posts = $totalPosts;
		$posts[0]->posts_per_page = $postsPerPage;
		return $posts;
	} 

	return false;
}

function get_post_author( $post ) {
	$author = wcms_db_select('users', ['*'], ['ID' => $post->post_author]);

	if ( $author ) {
		$author = $author[0];
		return $author->user_first_name . ' ' . $author->user_last_name;
	} else {
		return '';
	}
}

/*
 * Paginação
 */
function next_posts_link( $posts ) {
	if ( ! $posts ) return;

	$paged = _get('paged') ? _get('paged') : 1;

	if ( $paged - 1  >= 1 )  {
		return ($paged-1);
	}

	return false;
}

function previous_posts_link( $posts ) {
	if ( ! $posts ) return;
	$paged = _get('paged') ? _get('paged') : 1;

	$nextPage = $paged * $posts[0]->posts_per_page;
	if (  $nextPage < $posts[0]->total_posts ) {
		return ($paged+1);
	}

	return false;
}

