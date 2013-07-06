<!doctype html>  
<!--[if lte IE 8]> <html class="legacy"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

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


		<?php if ( isset( $options['viewport'] ) && $options['viewport'] !== '' ) : ?>
			<meta name="viewport" content="width=<?php echo $options['viewport']; ?>"> 
		<?php endif; ?>

		<?php if ( isset( $options['typekit_js'] ) && $options['typekit_js'] !== '' ) echo $options['typekit_js'] ?>

		<?php if ( isset( $options['typekit_css'] ) && $options['typekit_css'] !== '' ) : ?>
			<style>			
				<?php echo $options['typekit_css'] ?>
			</style>
		<?php endif ?>

</head>
<body>
<div class="page">	
	
	<div id="header">

	<h1><a href="<?php bloginfo('url'); ?>"><span><?php bloginfo('name'); ?></span></a></h1>

	<?php wp_nav_menu( array('theme_location' => 'navigation' )); ?>

	</div>

<div id="content">

		<?php if ( isset( $options['infonav'] ) && $options['infonav'] ) wp_nav_menu( array('theme_location' => 'info' )); ?>
	