<?php /* 
Template Name: Slideshow, No Nav
*/ ?>

<?php get_header('blank'); ?>

		<?php the_carolyn_menu('above'); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

				<div class="gallerycontent"><?php the_content(); ?></div>

 				<?php gs_get_images("$post->ID"); ?>

			<?php endwhile; ?>
		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

		<?php the_carolyn_menu('below'); ?>

<?php get_footer(); ?>