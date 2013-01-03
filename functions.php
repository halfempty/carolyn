<?php
add_action('init', 'register_custom_menu');

function carolyn_theme_scripts_method() {

    $defaultstyle = get_bloginfo('stylesheet_url'); 
    wp_register_style('defaultstyle',$defaultstyle);
    wp_enqueue_style( 'defaultstyle');

	$options = get_option('carolyn_theme_options');

 	if ( isset( $options['skincss'] ) && $options['skincss'] !== '' ) :
	    $skinstyle = get_template_directory_uri() . '/skins/'. $options['skincss'] . '.css'; 
	else :
	    $skinstyle = get_template_directory_uri() . '/skins/istanbul.css'; 
	endif;

    wp_register_style('skinstyle',$skinstyle);
    wp_enqueue_style( 'skinstyle');


}

add_action('wp_enqueue_scripts', 'carolyn_theme_scripts_method');





function register_custom_menu() {
	register_nav_menu('navigation', __('Navigation Menu'));
}



// Featured Images / Post Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
	    //set_post_thumbnail_size( 180, 180); // Normal post thumbnails
	  //  add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
} 
// end






// http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
// http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/


add_action( 'customize_register', 'carolyn_customize_register' );
function carolyn_customize_register($wp_customize) {


	class Carolyn_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}


	class Carolyn_Select_Control extends WP_Customize_Control {
		public $type = 'select';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?>>
				<?php $skins = array(); ?>
				<?php $skins[] = array(
					'slug'           => 'istanbul',
					'nicename'     => 'Istanbul',
				); ?>
				<?php $skins[] = array(
					'slug'           => 'lagos',
					'nicename'     => 'Lagos',
				); ?>
				<?php $skins[] = array(
					'slug'           => 'montreal',
					'nicename'     => 'Montreal',
				); ?>
				<?php $skins[] = array(
					'slug'           => 'payneandgrover',
					'nicename'     => 'Payne and Grover',
				); ?>

				<?php foreach ($skins as $skin ) : ?>
				<option value="<?php echo $skin['slug'] ?>"
					<?php if ( $skin['slug'] == esc_textarea( $this->value() ) ) echo ' selected="selected"'; ?>
				><?php echo $skin['nicename'] ?></option>
				<?php endforeach; ?>
			</select>
			</label>
			<?php
		}
	}

	/* Layout and Design */

	$wp_customize->add_section( 'carolyn_skin', array(
		'title'          => __( 'Layout &amp; Design', 'carolyn' ),
		'priority'       => 35,
	) );

	$wp_customize->add_setting( 'carolyn_theme_options[skincss]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( new Carolyn_Select_Control( $wp_customize, 'skin', array(
		'settings' => 'carolyn_theme_options[skincss]',
		'label'    => __( 'Layout' ),
		'section'  => 'carolyn_skin',
		'type'     => 'text',
	) ) );

	$wp_customize->add_setting( 'carolyn_theme_options[typekit_js]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( new Carolyn_Textarea_Control( $wp_customize, 'typekit_js', array(
		'settings' => 'carolyn_theme_options[typekit_js]',
		'label'    => __( 'Fonts JavaScript' ),
		'section'  => 'carolyn_skin',
	) ) );


	$wp_customize->add_setting( 'carolyn_theme_options[typekit_css]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );
	
	$wp_customize->add_control( new Carolyn_Textarea_Control( $wp_customize, 'typekit_css', array(
		'settings' => 'carolyn_theme_options[typekit_css]',
		'label'    => __( 'Fonts CSS' ),
		'section'  => 'carolyn_skin',
	) ) );


}


?>
