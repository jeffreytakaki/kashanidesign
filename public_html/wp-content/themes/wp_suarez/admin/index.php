<?php
$theme_version = '';
$smof_output = '';


if( !defined('ADMIN_PATH') )
	define( 'ADMIN_PATH', get_template_directory() . '/admin/' );
if( !defined('ADMIN_DIR') )
	define( 'ADMIN_DIR', get_template_directory_uri() . '/admin/' );

define( 'THEMENAME', 'WP-SHOOT' );
/* Theme version, uri, and the author uri are not completely necessary, but may be helpful in adding functionality */


require_once ( ADMIN_PATH . 'ReduxCore/framework.php' );
require_once ( ADMIN_PATH . 'ThemeOptions/functions.php' );

