<?php /* 
Template Name: Open HTML
*/ ?>

<?php get_header(); ?>

		<?php the_carolyn_menu('above'); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

		<?php the_carolyn_menu('below'); ?>

<?php get_footer(); ?>