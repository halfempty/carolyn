<?php 
/* Template Name: Category */ 
?>

<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="gallerycontent"><?php the_content(); ?></div>
			<?php endwhile; ?>

					<div class="masonrythumbs">

			<?php $sequence = 1; $counter = 1;

				$args = array(
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_parent' => $post->ID,
				'post_type' => 'page',
				'numberposts'     => 100,
				'post_status' => 'publish'
				); $postslist = get_posts($args);
				foreach ($postslist as $post) : setup_postdata($post); ?>

				<div class="thumbnail <?php if ($sequence == 1) { echo 'first'; } elseif ($sequence == 3) { echo 'third'; }; ?>">
					<a href="<?php the_permalink(''); ?>"><?php the_post_thumbnail('medium'); ?></a>
					<h3><a href="<?php the_permalink(''); ?>"><?php the_title(''); ?></a></h3>
				</div>
				<?php if ($sequence == 3) { $sequence = 1; } else { $sequence++; } $counter++; ?>

				<?php endforeach; ?>

				</div>

		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

	<?php carolyn_get_menu($post->ID,'subnav'); ?>

<?php get_footer(); ?>