<?php

function wcms_fetch_all_users() {
	return wcms_db_select('users', ['*'] );
}

function wcms_get_current_user() {
	if ( isset($_SESSION['user_data']) ) {
		return $_SESSION['user_data'];
	}
}

function wcms_get_current_user_ID() {
	return wcms_get_current_user()->ID;
}