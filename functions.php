<?php
add_action('init', 'register_custom_menu');

function carolyn_theme_scripts_method() {

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	//JS
	// Screenfull
	$screenfull = get_template_directory_uri() . '/js/screenfull.min.js';
	wp_register_script('screenfull',$screenfull);
	wp_enqueue_script( 'screenfull',array('jquery'));

	// Theme
	$themejs = get_template_directory_uri() . '/js/theme.js';
	wp_register_script('themejs',$themejs);
	wp_enqueue_script( 'themejs',array('screenfull','jquery'));
	

	// Styles
    $defaultstyle = get_bloginfo('stylesheet_url'); 
    wp_register_style('defaultstyle',$defaultstyle);
    wp_enqueue_style( 'defaultstyle');

	$options = get_option('carolyn_theme_options');

 	if ( isset( $options['skincss'] ) && $options['skincss'] !== '' ) :
	    $skinstyle = get_template_directory_uri() . '/skins/'. $options['skincss'] . '.css'; 
	else :
	    $skinstyle = get_template_directory_uri() . '/skins/carolyndrake.css'; 
	endif;

    wp_register_style('skinstyle',$skinstyle);
    wp_enqueue_style( 'skinstyle');


}

add_action('wp_enqueue_scripts', 'carolyn_theme_scripts_method');





function register_custom_menu() {
	register_nav_menu('navigation', __('Portfolio Menu'));
	register_nav_menu('info', __('Info Menu'));
}



// Featured Images / Post Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
	    //set_post_thumbnail_size( 180, 180); // Normal post thumbnails
	  //  add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
} 
// end



// Sidebars
// http://justintadlock.com/archives/2010/11/08/sidebars-in-wordpress

add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

	register_sidebar(
		array(
			'id' => 'woosidebars',
			'name' => __( 'WooSidebars' ),
			'before_widget' => '<div id="%1$s" class="woosidebars %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		)
	);

}




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
					'slug'           => 'carolyndrake',
					'nicename'     => 'Carolyn Drake',
				);
				$skins[] = array(
					'slug'           => 'lagos',
					'nicename'     => 'Lagos',
				);
				$skins[] = array(
					'slug'           => 'montreal',
					'nicename'     => 'Montreal',
				);
				$skins[] = array(
					'slug'           => 'payneandgrover',
					'nicename'     => 'Payne and Grover',
				);
				$skins[] = array(
					'slug'           => 'lanaslezic',
					'nicename'     => 'Lana Slezic',
				);
				$skins[] = array(
					'slug'           => 'uganda',
					'nicename'     => 'Uganda',
				);
				$skins[] = array(
					'slug'           => 'twryan',
					'nicename'     => 'T.W. Ryan',
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



	class Carolyn_Menu_Type_Control extends WP_Customize_Control {
		public $type = 'select';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?>>
				<?php $menutypes = array(); ?>
				<?php $menutypes[] = array(
					'slug'           => 'marty',
					'nicename'     => 'Marty Menu',
				); ?>
				<?php $menutypes[] = array(
					'slug'           => 'woo',
					'nicename'     => 'Woo Menu',
				); ?>

				<?php foreach ($menutypes as $menutype ) : ?>
				<option value="<?php echo $menutype['slug'] ?>"
					<?php if ( $menutype['slug'] == esc_textarea( $this->value() ) ) echo ' selected="selected"'; ?>
				><?php echo $menutype['nicename'] ?></option>
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


	$wp_customize->add_setting( 'carolyn_theme_options[infonav]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );
	
	$wp_customize->add_control( 'infonav', array(
	    'settings' => 'carolyn_theme_options[infonav]',
	    'label'    => __( 'Use second nav bar' ),
	    'section'  => 'carolyn_skin',
	    'type'     => 'checkbox',
	) );



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


	$wp_customize->add_setting( 'carolyn_theme_options[viewport]', array(
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'transport'      => 'postMessage',
	) );
	
	$wp_customize->add_control( new Carolyn_Textarea_Control( $wp_customize, 'viewport', array(
		'settings' => 'carolyn_theme_options[viewport]',
		'label'    => __( 'Viewport' ),
		'section'  => 'carolyn_skin',
	) ) );


}



// Category description
function marty_wrapped_category_description( $before = '<div class="categorydescription">', $after = '</div>'){
	if ( category_description() !== '' ) {
		echo $before . category_description() . $after;
	}
}



?>
