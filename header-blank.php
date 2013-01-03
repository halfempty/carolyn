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
	
		<?php wp_head(); ?>

		<?php $options = get_option('carolyn_theme_options'); ?>

		<?php if ( isset( $options['typekit_js'] ) && $options['typekit_js'] !== '' ) echo $options['typekit_js'] ?>

		<?php if ( isset( $options['typekit_css'] ) && $options['typekit_css'] !== '' ) : ?>
			<style>			
				<?php echo $options['typekit_css'] ?>
			</style>
		<?php endif ?>

</head>
<body>
<div class="page">	

<div id="content" class="blank">