<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php $options = get_option('carolyn_theme_options'); ?>

	<?php if ( isset( $options['typekit_js'] ) && $options['typekit_js'] !== '' ) echo $options['typekit_js'] ?>


	<style>

	<?php if ( isset( $options['typekit_css'] ) && $options['typekit_css'] !== '' ) echo $options['typekit_css'] ?>
	    
	<?php if ( isset( $options['nav_width'] ) && $options['nav_width'] !== '' ) echo "#header { width: " . $options['nav_width'] . "px }" ?>
		
	<?php if ( $options['nav_align'] == 'right' ) : ?>
		#header ul { margin: 0; text-align: right; }
		#header ul li {padding: 0 0 0 1.6em; }
		.subnav ul li a { padding: .5em; }

	<?php else : ?>
		#header ul { margin: 0 200px; text-align: center; }
		#header ul li {padding: 0 .8em; }
		.subnav ul li a { padding: .5em 0 .5em 1em; }
	<?php endif; ?>
	
		.current-menu-item a, .current_page_ancestor a, .current-post-ancestor a { 
			color: <?php echo $options['menu_highlight_color']; ?>; 
			 <?php if ( $options['menu_highlight_uppercase'] == 1 )  echo 'text-transform: uppercase;' ?>
			 <?php if ( $options['menu_highlight_weight'] == 1 )  echo 'font-weight: bold;' ?>
		}

		#gallerywrapper, .gallery-fade {
		overflow: hidden;
		margin: auto;
		position: relative;
		}



	</style>

	<?php wp_head(); ?>
</head>
<body>
<div class="page">	
	
	<div id="header">

	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

	<?php wp_nav_menu( array('theme_location' => 'navigation' )); ?>

	</div>

<div id="content">