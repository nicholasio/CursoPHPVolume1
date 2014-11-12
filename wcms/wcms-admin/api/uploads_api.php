<?php

function wcms_fetch_all_uploads() {
	return wcms_db_select( 'uploads', ['*']);
}