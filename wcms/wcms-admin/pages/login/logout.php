<?php

if ( isset($_SESSION['user_data']) ) {
	unset($_SESSION['user_data']);
}

header("Location: " . WCMS_ADMIN_URL . "/login.php");