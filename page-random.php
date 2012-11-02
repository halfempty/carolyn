<?php 
/* Template Name: Random Image */ 
?>

<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="randomimage">
				<?php $args = array( 
				                'post_type' => 'attachment',
				                'numberposts' => 1,
				                'orderby' => 'rand',
				                'post_status' => null,
				                'post_parent' => get_the_ID(),
				                'post_mime_type'  => 'image'
				            ); 
				            have_posts(); //must be in the loop
				            the_post(); //set the ID

				            $images = get_children( $args );            

				            if ($images) {
				            foreach ( $images as $attachment_id => $attachment ) {
				                    echo wp_get_attachment_image( $attachment_id, 'full' );
				                }
				            }
				            wp_reset_query(); ?>


						<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p>Page not found.</p>
		<?php endif; ?>

<?php get_footer(); ?>