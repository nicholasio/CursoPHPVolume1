<?php 

$action = strip_tags( filter_input(INPUT_GET, 'action') );

include('../bootstrap.php' ); 

include (WCMS_ADMIN_DIR . '/pages/login/check_login.php');

include (WCMS_ADMIN_DIR . '/pages/header.php');

switch ($action) {
	case 'edit_post':
    include (WCMS_ADMIN_DIR . '/pages/post/edit_post.php');
	break;
  case 'posts':
    include (WCMS_ADMIN_DIR . '/pages/post/posts.php');
  break;
  case 'delete_post':
    include (WCMS_ADMIN_DIR . '/pages/post/delete_post.php');
  break;
  case 'categories':
    include (WCMS_ADMIN_DIR . '/pages/categories/categories.php');
  break;
  case 'edit_category':
    include (WCMS_ADMIN_DIR . '/pages/categories/edit_category.php');
  break;
  case 'delete_category' :
    include (WCMS_ADMIN_DIR . '/pages/categories/delete_category.php');
    break;
  break;
  case 'edit_user':
    include (WCMS_ADMIN_DIR . '/pages/users/edit_user.php');
  break;
  case 'users':
    include (WCMS_ADMIN_DIR . '/pages/users/users.php');
  break;
  case  'delete_user':
    include (WCMS_ADMIN_DIR . '/pages/users/delete_user.php');
  break;
  case 'media':
    include (WCMS_ADMIN_DIR . '/pages/media/media.php');
  break;
  case 'edit_media':
    include (WCMS_ADMIN_DIR . '/pages/media/edit_media.php');
    break;
  break;
  case 'delete_media':
    include (WCMS_ADMIN_DIR . '/pages/media/delete_media.php');
  break;
  case 'logout':
    include(WCMS_ADMIN_DIR . '/pages/login/logout.php');
  break;
	default:
		include (WCMS_ADMIN_DIR . '/pages/index/index.php');
		break;
}

include (WCMS_ADMIN_DIR . '/pages/footer.php');


?>

