<?php
session_start();

ini_set( 'default_charset', 'utf-8');

define( 'WCMS_BASE_DIR' , __DIR__ );
define( 'WCMS_SITE_DIR', WCMS_BASE_DIR  . '/site');
define( 'WCMS_ADMIN_DIR', WCMS_BASE_DIR  . '/wcms-admin');
define( 'WCMS_UPLOAD_DIR', WCMS_SITE_DIR . '/site/uploads');

define( 'WCMS_BASE_URL', 'http://scotchbox/cursophpvolume1/wcms');
define( 'WCMS_SITE_URL', WCMS_BASE_URL . '/site');
define( 'WCMS_ADMIN_URL',  WCMS_BASE_URL . '/wcms-admin/' );
define( 'WCMS_UPLOAD_URL', WCMS_BASE_URL . '/site/uploads');

define( 'WCMS_PROJECT_NAME', 'Super Blog');

//Incluindo API's
include ( WCMS_ADMIN_DIR . '/api/database_api.php' );
include ( WCMS_ADMIN_DIR . '/api/users_api.php');
include ( WCMS_ADMIN_DIR . '/api/post_api.php');
include ( WCMS_ADMIN_DIR . '/api/category_api.php');
include ( WCMS_ADMIN_DIR . '/api/uploads_api.php');

//Conexão com o banco de dados
include ( WCMS_ADMIN_DIR . '/database/conn.php' );

include ( WCMS_ADMIN_DIR . '/include/utils.php' );