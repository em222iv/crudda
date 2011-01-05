<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
	
	// remove version info from head and feeds
	function complete_version_removal() {
		return '';
	}
	add_filter('the_generator', 'complete_version_removal');
	
	// custom excerpt.
	function improved_trim_excerpt($text) {
		global $post;
		if ( '' == $text ) {
			$text = get_the_content('');
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			if (stristr($text,"<style")) { //get rid of CSS.
				$text1 = explode("<style", $text);
				$text2 = explode("</style>", $text);
				$text = $text1[0] . $text2[1]; //this might work
			}
			$text = strip_tags($text, '<strong>'); //ALLOWED tags (will be rendered) - could add more
												   //They count against the word count below, though
			$excerpt_length = 55; //default excerpt is 55 words
			$words = explode(' ', $text, $excerpt_length + 1);
			
			if (count($words)> $excerpt_length) {
				array_pop($words);
				array_push($words, '...'); //indicates "read more..."
				$text = implode(' ', $words);
			}
		}
		return $text;
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'improved_trim_excerpt');
	
	//Support for Featured Images for posts or pages
	add_theme_support( 'post-thumbnails' );
	
	//Support for (two) WP3 menus
    function register_my_menus() {
		register_nav_menus(
			array( 'nav-menu' => __( 'Nav Menu' ), 'extra-menu' => __( 'Extra Menu' ))
		);
	}
	add_action( 'init', 'register_my_menus' );

	// custom excerpt ellipses for 2.9+ - replace the [...] stuff
	function custom_excerpt_more($more) {
		return '[...]';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	
	// add custom content after each post
	function add_post_content($content) {
		if(!is_feed() && !is_home()) {
			//$content .= '<p>This article is copyright &copy; '.date('Y').'&nbsp;'.bloginfo('name').'</p>';
			$content .= '';
		}
		return $content;
	}
	add_filter('the_content', 'add_post_content');
	
	// sidebars / widget areas: I have one in the header, nav, sidebar, and footer
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		//'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		//'after_widget'  => '</div>',
			'before_widget' => '',
			'after_widget' => '',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }
	
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Nav Widget Area',
    		'id'   => 'nav-widget-area',
    		'description'   => 'These are widgets for the Navigation area (use a menu!).',
    		'before_widget' => '',
    		'after_widget'  => '',
    		'before_title'  => '',
    		'after_title'   => ''
    	));
    }
	
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Header Widget Area',
    		'id'   => 'header-widget-area',
    		'description'   => 'These are widgets for the header.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
			'before_title'  => '', // use h3's here?
    		'after_title'   => ''
    	));
    }
	
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Footer Widget Area',
    		'id'   => 'footer-widget-area',
    		'description'   => 'These are widgets for the footer.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
			'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }

?>