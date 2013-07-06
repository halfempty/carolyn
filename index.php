<?php get_header(); ?>

	<div class="blog">

		<?php if ( is_category() && !is_paged() )  marty_wrapped_category_description(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="post">
					<h2>
						<?php if ( !is_single() && !is_page() ) { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php } ?>
							<?php the_title(); ?>
						<?php if ( !is_single() && !is_page() ) { ?></a><?php } ?>
						<span><?php the_time('F j, Y'); ?></span>
					</h2>
					<?php the_content(); ?>
				</div>
				<div class="separator"></div>

			<?php endwhile; ?>

		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>