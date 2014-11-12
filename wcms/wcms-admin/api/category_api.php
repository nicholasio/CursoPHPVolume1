<?php

function wcms_fetch_all_cats() {
	return wcms_db_select('categories', ['*']);
}