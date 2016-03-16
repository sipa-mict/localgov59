<?php
/**
 * ============================================================================
 * Create sections: Options
 * ============================================================================
 */
function register_sections_site_options( $wp_customize ) {
	$wp_customize->add_section( 'site_settings_section', array(
		'title'       => __( 'Advanced', 'divertheme' ),
		'description' => __( 'ส่วนปรับแต่งเว็บไซต์ขั้นสูง กรุณาทำโดยผู้มีความเชี่ยวชาญเท่านั้น', 'divertheme' ),
		'priority'    => 180,
	) );
}

add_action( 'customize_register', 'register_sections_site_options' );
/**
 * ============================================================================
 * Create controls for section: site settings
 * ============================================================================
 */
function register_controls_for_site_settings_section( $controls ) {

	$section  = 'site_settings_section';
	$priority = 4;


	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'group_title_site_homepage',
		'label'     => __( 'Front Page', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => 170
	);

	$controls[] = array(
		'type'        => 'image',
		'setting'     => 'default_heading_image',
		'label'       => __( 'Default Heading Background', 'divertheme' ),
		'description' => __( 'Default background image for heading title', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => default_heading_image,
		'priority'    => $priority ++
	);
	
	//Box Mode
	$controls[] = array(
		'type'      => 'checkbox',
		'mode'      => 'toggle',
		'setting'   => 'box_mode_enable',
		'label'     => __( 'Box Mode', 'divertheme' ),
		'subtitle'  => __( 'Turn on this option if you want to enable box mode on your site', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => box_mode_enable,
		'priority'  => $priority ++
	);

	//Page Layout
	$controls[] = array(
		'type'      => 'radio',
		'mode'      => 'image',
		'setting'   => 'site_layout',
		'label'     => __( 'Page Layout', 'divertheme' ),
		'subtitle'  => __( 'Choose the page layout you want', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => site_layout,
		'choices'   => array(
			'full-width'      => THEME_ROOT . '/core/customizer/assets/images/1c.png',
			'content-sidebar' => THEME_ROOT . '/core/customizer/assets/images/2cr.png',
			'sidebar-content' => THEME_ROOT . '/core/customizer/assets/images/2cl.png',
		),
		'priority'  => $priority ++
	);

	//Search Layout
	$controls[] = array(
		'type'      => 'radio',
		'mode'      => 'image',
		'setting'   => 'search_layout',
		'label'     => __( 'Search Layout', 'divertheme' ),
		'subtitle'  => __( 'Choose the layout for search page', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => search_layout,
		'choices'   => array(
			'full-width'      => THEME_ROOT . '/core/customizer/assets/images/1c.png',
			'content-sidebar' => THEME_ROOT . '/core/customizer/assets/images/2cr.png',
			'sidebar-content' => THEME_ROOT . '/core/customizer/assets/images/2cl.png',
		),
		'priority'  => $priority ++
	);

	//Archive Layout
	$controls[] = array(
		'type'      => 'radio',
		'mode'      => 'image',
		'setting'   => 'archive_layout',
		'label'     => __( 'Archive Layout', 'divertheme' ),
		'subtitle'  => __( 'Choose the layout for archive page', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => archive_layout,
		'choices'   => array(
			'full-width'      => THEME_ROOT . '/core/customizer/assets/images/1c.png',
			'content-sidebar' => THEME_ROOT . '/core/customizer/assets/images/2cr.png',
			'sidebar-content' => THEME_ROOT . '/core/customizer/assets/images/2cl.png',
		),
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'      => 'select',
		'setting'   => 'page_transition',
		'label'     => __( 'Page Transition', 'divertheme' ),
		'subtitle'  => __( 'Choose a transition effect for your page', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'choices'   => array(
			'none'  => 'None',
			'type1' => 'Type 1',
			'type2' => 'Type 2',
		),
		'default'   => 'none',
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'      => 'checkbox',
		'mode'      => 'toggle',
		'setting'   => 'enable_smooth_scroll',
		'label'     => __( 'Smooth Scroll', 'divertheme' ),
		'subtitle'  => __( 'Enabling this option will perform a smooth scrolling effect on every page', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => enable_smooth_scroll,
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'      => 'checkbox',
		'mode'      => 'toggle',
		'setting'   => 'custom_scrollbar_enable',
		'label'     => __( 'Scroll bar', 'divertheme' ),
		'subtitle'  => __( 'Enabling this option use custom color for scroll bar', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => custom_scrollbar_enable,
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'      => 'checkbox',
		'mode'      => 'toggle',
		'setting'   => 'enable_back_to_top',
		'label'     => __( 'Back To Top', 'divertheme' ),
		'subtitle'  => __( 'Enabling this option will display a Back to Top button on every page', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => enable_back_to_top,
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_breadcrumb_settings',
		'label'     => __( 'Breadcrumb', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'breadcrumb_home_text',
		'label'    => __( '"Home" text', 'divertheme' ),
		'section'  => $section,
		'default'  => 'Home',
		'priority' => $priority ++
	);

	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'breadcrumb_yah_text',
		'label'    => __( '"You are here" text', 'divertheme' ),
		'section'  => $section,
		'default'  => 'You are here:',
		'priority' => $priority ++
	);
	//Favicon Settings Group Title
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_favicon_settings',
		'label'     => __( 'Favicon', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Favicon Image
	$controls[] = array(
		'type'        => 'image',
		'setting'     => 'favicon_image',
		'label'       => __( 'Favicon Image', 'divertheme' ),
		'description' => __( 'File must be .png or .ico format. Optimal dimensions: 32px x 32px.', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => favicon_image,
		'priority'    => $priority ++
	);

	//Apple Touch Icon
	$controls[] = array(
		'type'        => 'image',
		'setting'     => 'apple_touch_icon',
		'label'       => __( 'Apple Touch Icon', 'divertheme' ),
		'description' => __( 'File must be .png format. Optimal dimensions: 152px x 152px.', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => apple_touch_icon,
		'priority'    => $priority ++
	);

	return $controls;
}

add_filter( 'kirki/controls', 'register_controls_for_site_settings_section' );