<?php 
	function style_file(){
		wp_enqueue_script('main_script', get_theme_file_uri('js/scripts-bundled.js'), NULL, microtime(), true);
		wp_enqueue_style('main_style', get_stylesheet_uri(), NULL, microtime());
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('font-google', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	}
	add_action('wp_enqueue_scripts', 'style_file');

	function university_features(){
		add_theme_support('title-tag');
		/*register_nav_menu('headerMenuLocation', 'Header Menu Location');
		register_nav_menu('footerLocationOne', 'Footer Location One');
		register_nav_menu('footerLocationTwo', 'Footer Location Two');*/
	}

	add_action('after_setup_theme','university_features')
?>

