<?php 
/* Template Name: Category (No Nav) */ 
?>

<?php get_header('blank'); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="gallerycontent"><?php the_content(); ?></div>
			<?php endwhile; ?>

					<div class="masonrythumbs">

			<?php $sequence = 1; $counter = 1;

				$meta = get_post_meta($post->ID,'_carolynmenu',TRUE);	
				if( $meta['thumbsize'] == 'thumbnail' ) :
					$thumbsize = 'thumbnail';
				else :
					$thumbsize = 'medium';
				endif;
					
				echo $thumbsize;
					
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
					<a href="<?php the_permalink(''); ?>"><?php 
					
					the_post_thumbnail($thumbsize); ?></a>
					<h3><a href="<?php the_permalink(''); ?>"><?php the_title(''); ?></a></h3>
				</div>
				<?php if ($sequence == 3) { $sequence = 1; } else { $sequence++; } $counter++; ?>

				<?php endforeach; 
				
				wp_reset_query();
				
				?>

				</div>

		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

<?php get_footer(); ?>