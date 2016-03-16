<?php
/**
 * ============================================================================
 * Create sections: Footer settings
 * ============================================================================
 */
function register_sections_footer_settings( $wp_customize ) {
	$wp_customize->add_section( 'footer_settings_section', array(
		'title'       => __( 'Footer', 'divertheme' ),
		'description' => __( 'Scroll to bottom of page to see the change', 'divertheme' ),
		'priority'    => 140,
	) );
}

add_action( 'customize_register', 'register_sections_footer_settings' );
/**
 * ============================================================================
 * Create controls for section: footer settings
 * ============================================================================
 */
function register_controls_for_footer_settings_section( $controls ) {

	$section  = 'footer_settings_section';
	$priority = 1;

	//Uncovering Footer
	$controls[] = array(
		'type'      => 'checkbox',
		'mode'      => 'toggle',
		'setting'   => 'footer_uncovering_enable',
		'label'     => __( 'Uncovering', 'divertheme' ),
		'subtitle'  => __( 'Enabling this option will make Footer gradually appear on scroll', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'default'   => footer_uncovering_enable,
		'priority'  => $priority ++
	);

	//Copyright Group Title
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_footer_copyright',
		'label'     => __( 'Copyright', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Copyright
	$controls[] = array(
		'type'      => 'checkbox',
		'mode'      => 'toggle',
		'setting'   => 'footer_copyright_enable',
		'subtitle'  => __( 'Enabling this option will display copyright info', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'default'   => footer_copyright_enable,
		'priority'  => $priority ++
	);

	//Copyright Text
	$controls[] = array(
		'type'        => 'textarea',
		'setting'     => 'copyright_text',
		'label'       => __( 'Copyright Text', 'divertheme' ),
		'section'     => $section,
		'placeholder' => __( 'Entry your custom css code here', 'divertheme' ),
		'default'     => __( 'Copyright &copy; 2016 Diversition Co., Ltd. All right reserved.', 'divertheme' ),
		'priority'    => $priority ++
	);

	return $controls;
}

add_filter( 'kirki/controls', 'register_controls_for_footer_settings_section' );