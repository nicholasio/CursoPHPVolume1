<?php 

if ( !empty($_POST) && isset($_POST['_login_form']) ) {
	$where = ['user_email' => $_POST['user_email'], 
			  'user_pass' => sha1($_POST['user_pass'])
		     ];

    $result = wcms_db_select('users', ['*'], $where);
    if ( $result ) {
    	$_SESSION['user_data'] = $result[0];
    	header("Location: " . WCMS_ADMIN_URL . '/index.php');
    } else {
    	header("Location: " . WCMS_ADMIN_URL . '/login.php');
    }

}