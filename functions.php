<?php
add_action('init', 'register_custom_menu');
 
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
			<span class="carolyn-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}


	$wp_customize->add_section( 'carolyn_menu_style', array(
		'title'          => __( 'Menu Style', 'carolyn' ),
		'priority'       => 35,
	) );

	$wp_customize->add_setting( 'carolyn_theme_options[nav_width]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( 'menu_nav_width', array(
		'settings' => 'carolyn_theme_options[nav_width]',
		'label'    => __( 'Nav width in pixels (leave blank for 100%)' ),
		'section'  => 'carolyn_menu_style',
		'type'     => 'text',
	) );


	$wp_customize->add_setting( 'carolyn_theme_options[nav_align]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( 'menu_nav_align', array(
		'settings' => 'carolyn_theme_options[nav_align]',
		'label'    => __( 'Nav alignment' ),
		'section'  => 'carolyn_menu_style',
		'type'    => 'select',
		'choices'    => array(
			'centered' => 'Centered',
			'right' => 'Right',
			),
	) );


	$wp_customize->add_setting( 'carolyn_theme_options[menu_highlight_color]', array(
		'default'        => '#3C6',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_highlight_color', array(
		'label'   => __( 'Highlight color', 'carolyn' ),
		'section' => 'carolyn_menu_style',
		'settings'   => 'carolyn_theme_options[menu_highlight_color]',
	) ) );


	$wp_customize->add_setting( 'carolyn_theme_options[menu_highlight_uppercase]', array(
		'default'        => 1,
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( 'menu_highlight_uppercase', array(
		'settings' => 'carolyn_theme_options[menu_highlight_uppercase]',
		'label'    => __( 'Uppercase highlight' ),
		'section'  => 'carolyn_menu_style',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'carolyn_theme_options[menu_highlight_weight]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( 'menu_highlight_weight', array(
		'settings' => 'carolyn_theme_options[menu_highlight_weight]',
		'label'    => __( 'Bold highlight' ),
		'section'  => 'carolyn_menu_style',
		'type'     => 'checkbox',
	) );



	$wp_customize->add_setting( 'carolyn_theme_options[menu_highlight_style]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );


	$wp_customize->add_section( 'carolyn_font', array(
		'title'          => __( 'Fonts', 'carolyn' ),
		'priority'       => 35,
	) );


	$wp_customize->add_setting( 'carolyn_theme_options[typekit_js]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );

	$wp_customize->add_control( new Carolyn_Textarea_Control( $wp_customize, 'typekit_js', array(
		'settings' => 'carolyn_theme_options[typekit_js]',
		'label'    => __( 'Typekit JavaScript' ),
		'section'  => 'carolyn_font',
	) ) );


	$wp_customize->add_setting( 'carolyn_theme_options[typekit_css]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );
	
	$wp_customize->add_control( new Carolyn_Textarea_Control( $wp_customize, 'typekit_css', array(
		'settings' => 'carolyn_theme_options[typekit_css]',
		'label'    => __( 'Typekit CSS' ),
		'section'  => 'carolyn_font',
	) ) );




}


?>
