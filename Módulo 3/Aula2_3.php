<?php 

$action = $_GET['action'];

include( 'pages/header.php' );

switch( $action ) {
	case 'home':
	 include( 'pages/index.php' );
	break;
	case 'new_product':
	 include ( 'pages/new_product.php' );
	break;
	case 'delete_product':
	 include( 'pages/delete_product.php' );
	 break;
	default:
	 include ( 'pages/404.php' );
	 break;
}
include( 'pages/footer.php' );
	
?>