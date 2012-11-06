<?php /* 
Template Name: Slideshow, No Nav
*/ ?>

<?php get_header('blank'); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

 				<?php gs_get_images("$post->ID"); ?>

				<div class="gallerycontent"><?php the_content(); ?></div>

			<?php endwhile; ?>
		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

		<?php carolyn_get_menu($post->ID,'subnav'); ?>

<?php get_footer(); ?>