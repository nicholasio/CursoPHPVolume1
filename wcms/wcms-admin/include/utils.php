<?php

function do_action($action, Array $params = null) {
	$sParams = '';
	
	if ( ! is_null($params) ) {
		$aParams = array_map( 
			function($key , $value) { 
				return $key . '=' . urlencode($value);
			}, 
			array_keys($params), array_values($params) 
		);
		
		$sParams = '&' . implode('&', $aParams);
	}

	return WCMS_ADMIN_URL . '/index.php?action=' . $action . $sParams;
}

function _get( $actionName ) {
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

function menu_selected( $menu_action, Array $params = null) {
	$active = true;

	if ( _get('action') != $menu_action ) $active = false;

	if ( ! is_null($params) ) {
		array_walk($params,
			function($item, $key) use(&$active) {
				if ( _get($key) != $item )
					$active = false;
			}
		);
	}

	if ( $active || ($menu_action == 'index' && ! _get('action') ) ) {
		echo ' active ';
	}
}