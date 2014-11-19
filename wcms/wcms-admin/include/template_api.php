<?php

function get_header( $suffix = '' ) {
	$_suffix = empty($suffix) ? '' : '-' . $suffix;

	include( WCMS_SITE_DIR . '/header' . $_suffix . '.php');
}

function get_footer( $suffix = '' ) {
	$_suffix = empty($suffix) ?  '' : '-' . $suffix;

	include( WCMS_SITE_DIR . '/footer' . $_suffix . '.php');
} 

function get_sidebar( $suffix = '' ) {
	$_suffix = empty($suffix) ?  '' : '-' . $suffix;

	include( WCMS_SITE_DIR . '/sidebar' . $_suffix . '.php');	
} 

function wcms_get_menu_pages( $nPages = -1 ) {
	$nPages = ($nPages == -1) ? [] : [0,$nPages];
	return wcms_db_select('posts', ['*'], ['post_type' => 'page'], $nPages, ['post_order', 'ASC'] );
}

function get_permalink($action, Array $params = null) {

	$sParams = '';

	if ( ! is_null($params) ) {
		$aParams = array_map(function($key, $value) { return $key . '=' . urlencode($value); }, array_keys($params), array_values($params));
		$sParams = '&' . implode('&', $aParams);
	}

	return WCMS_BASE_URL . '/index.php?view=' . $action . $sParams;
}

function is_menu_selected( $menu_action, Array $params = null ) {
	$active = true;

	if ( _get('view') != $menu_action ) $active = false;

	if ( ! is_null($params) ) {
		array_walk($params, 
			function($item, $key) use (&$active) {
				if ( _get($key) != $item ) {
					$active = false;
				} 
			}
		);
	}

	if ( $active || ($menu_action == 'index' && !_get('view') ) ) {
		return true;
	}

	return false;
}