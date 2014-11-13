<?php

include('bootstrap.php');
include(WCMS_ADMIN_DIR . '/include/template_api.php');

$page = _get('view');

switch( $page ) {
	case 'single':
		include ( WCMS_SITE_DIR . '/single.php' );
	break;
	case 'page':
		include ( WCMS_SITE_DIR . '/page.php'   );
	break;
	case 'category':
		include ( WCMS_SITE_DIR . '/category.php' );
		break;	
	default:
		include ( WCMS_SITE_DIR . '/index.php'  );
	break;
}