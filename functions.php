<?php 
add_action('wp_enqueue_scripts', 'style_theme');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_action('after_setup_theme', 'theme_register_nav_menu');
add_filter( 'upload_mimes', 'svg_upload_allow' );
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

function theme_register_nav_menu() {
	register_nav_menu('top', 'Основное меню');
}

function style_theme() {
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('fonts-DM', 'https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500');
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
}

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

?>
