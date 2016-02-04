<!DOCTYPE html>
<!--[if lte IE 7]><html class="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 7)|!(IE)]><! --><html <?php language_attributes(); ?>><!-- <![endif]-->
<head>
	<meta charset="utf-8" />
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>

	<!-- http://google.com/webmasters -->
    <meta name="google-site-verification" content="" />

    <!-- don't allow IE9 to render the site in compatibility mode. Dude. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--[if lt IE 9]>
		<link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/ie.css"/>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>: Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/materialize.min.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800|Clicker+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/component.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" media="screen" />

	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" />
	<?php } ?>
	<?php //if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

</head>

<body <?php body_class(); ?>>
	<header class="body">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('header-widget-area') ) : else : ?>
        <?php endif; ?>
        <?php //todo - add an if_is_home or equivalent statement - wrap the logo/site name in h1 for
              //home page, but use h3 or h4 for sub-pages (content title is h1)
        ?>
	</header>

	<div class="navbar-fixed">
	    <nav class="orange">
	        <div class="nav-wrapper container">
	            <a href="/<?php get_home_url(); ?>" class="brand-logo"><?php echo get_bloginfo('name'); ?></a>
	            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
	            <ul class="right hide-on-med-and-down">
	                <li><a href="#modalLogin" class="modal-trigger"><i class="mdi-action-perm-identity"></i></a></li>
	                <li><a href="#"><i class="mdi-navigation-refresh"></i></a></li>
	                <li><a href="#"><i class="mdi-navigation-more-vert"></i></a></li>
	            </ul>
	            <ul class="side-nav" id="mobile-demo">
	                <li>
	                    <a href="#">
	                        <input id="search" type="search" placeholder="search">
	                    </a>
	                </li>
	                <li><a href="#">Link</a></li>
	                <li><a href="#">Link</a></li>
	                <li><a href="#">Link</a></li>
	                <li><a href="#">Link</a></li>
	            </ul>
	        </div>
	    </nav>
	</div>
	<nav class="orange lighten-2 flat hide-on-med-and-down">
	    <div class="nav-wrapper container">
	      <div id="morphsearch" class="morphsearch">
	     <form class="morphsearch-form">
	       <input class="morphsearch-input" value="<?php echo get_search_query() ?>" name="s" type="search"  placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"/>
				 <input type="submit"  class="morphsearch-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	     </form>
	     <div class="morphsearch-content">
	       <div class="dummy-column">
	         <h2>Dryck</h2>
					 <?php query_posts( array ( 'category_name' => 'dryck', 'posts_per_page' => 5 ) ); ?>
					 <?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
						 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						 <a class="dummy-media-object" href="<?php the_permalink() ?>">
							<img style="height:30px; width:30px;" class="round" src="<?php echo  $image[0] ?>" alt="Sara Soueidan"/>
							<h3><?php the_title() ?></h3>
						</a>
					 <?php endwhile; ?>
					 <?php wp_reset_query(); ?>
	       </div>
	       <div class="dummy-column">
					 <h2>Mat</h2>
					 <?php query_posts( array ( 'category_name' => 'mat', 'posts_per_page' => 5 ) ); ?>
					 <?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->

						 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

						 <a class="dummy-media-object" href="<?php the_permalink() ?>">
							<img style="height:30px; width:30px;" class="round" src="<?php echo  $image[0] ?>" alt="Sara Soueidan"/>
							<h3><?php the_title() ?></h3>
						</a>
					 <?php endwhile; ?>
					 <?php wp_reset_query(); ?>

	       </div>
	       <div class="dummy-column">
					 <h2>Mest lästa</h2>
					 <?php $posts_per_page = get_query_var('posts_per_page'); ?>
							<?php $paged = intval(get_query_var('paged')); ?>
							<?php $paged = ($paged) ? $paged : 1; ?>
							<?php $args = array(
							   'posts_per_page' => $posts_per_page,
							   'paged' => $paged,
							   'more' => $more = 0,
							   'meta_key' => 'views',
							   'orderby' => 'meta_value_num',
							   'order' => 'ASC',
							); ?>
							<?php query_posts($args); ?>
					 <?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->

						 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

						 <a class="dummy-media-object" href="<?php the_permalink() ?>">
							<img style="height:30px; width:30px;" class="round" src="<?php echo  $image[0] ?>" alt="Sara Soueidan"/>
							<h3><?php the_title() ?></h3>
						</a>
					 <?php endwhile; ?>
					 <?php wp_reset_query(); ?>

	       </div>
	     </div>
	     <span class="morphsearch-close"></span>
	   </div>
	    </div>
	</nav>
