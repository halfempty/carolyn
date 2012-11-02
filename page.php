<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

 				<?php gs_get_images("$post->ID",true); ?>

				<div class="gallerycontent"><?php the_content(); ?></div>

			<?php endwhile; ?>
		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

		<?php marty_get_menu($post->ID,'subnav'); ?>

<?php get_footer(); ?>