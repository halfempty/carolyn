<?php /* 
Template Name: Text Page 
*/ ?>

<?php get_header(); ?>

	<div class="info">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>
	</div>

	<?php carolyn_get_menu($post->ID,'subnav'); ?>

<?php get_footer(); ?>