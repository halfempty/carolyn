<?php /* 
Template Name: Video
*/ ?>

<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<div class="video"><?php the_content(); ?></div>
			<?php endwhile; ?>

		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

	<?php carolyn_get_menu($post->ID,'subnav'); ?>

<?php get_footer(); ?>