<?php
/**
 * ============================================================================
 * Create sections: Colors
 * ============================================================================
 */
function register_sections_color( $wp_customize ) {
	$wp_customize->add_section( 'site_colors_section', array(
		'title'    => __( 'Colors', 'divertheme' ),
		//'description' => __('In this section you can change main color of the site', 'divertheme'),
		'priority' => 2,
	) );
}

add_action( 'customize_register', 'register_sections_color' );
/**
 * ============================================================================
 * Create controls for site colors section
 * ============================================================================
 */
function register_controls_for_site_colors_section( $controls ) {
	$color_scheme = divertheme_get_color_scheme();
	$section      = 'site_colors_section';
	$priority     = 1;

	//Site Color Scheme choose
	$controls[] = array(
		'type'      => 'select',
		'setting'   => 'site_color_scheme',
		'label'     => __( 'Color Scheme', 'divertheme' ),
		'subtitle'  => __( 'Choose a color scheme for your site', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'default'   => 'default',
		'choices'   => divertheme_get_color_scheme_choices(),
		'priority'  => $priority ++
	);

	//Site Color Scheme Settings Group Title
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'group_title_site_color_scheme',
		'label'     => __( 'Site Color', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Primary Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'primary_color',
		'label'       => __( 'Primary Color', 'divertheme' ),
		'description' => __( 'Choose the most dominant theme color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[0],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Secondary Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'secondary_color',
		'label'       => __( 'Secondary Color', 'divertheme' ),
		'description' => __( 'Choose the second most dominant theme color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[1],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);
	
	//Third Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'heading_color',
		'label'       => __( 'Heading Color', 'divertheme' ),
		'description' => __( 'Choose color for your heading text', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[2],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Site Link Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'site_link_color',
		'label'       => __( 'Link Color', 'divertheme' ),
		'description' => __( 'Define styles for site link', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[3],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Site Link Hover Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'site_hover_link_color',
		'description' => __( 'Choose the hover text link color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[4],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Body Background Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'body_bg_color',
		'label'       => __( 'Background Color', 'divertheme' ),
		'description' => __( 'Choose the background color for your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[5],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Body Text Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'body_text_color',
		'label'       => __( 'Body Text Color', 'divertheme' ),
		'description' => __( 'Choose the color for content of your site', 'divertheme' ),
		'section'     => $section,
		'default'     => $color_scheme[6],
		'output'      => array(
			'element'  => 'body.scheme',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Header Colors Settings
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'header_group_title_header_color_settings',
		'label'     => __( 'Header Colors', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Header Background Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'header_bg_color',
		'label'       => __( 'Background Color', 'divertheme' ),
		'description' => __( 'Choose the background color for header area', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[7],
		'output'      => array(
			'element'  => '.scheme .header',
			'property' => 'background-color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Header Text Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'header_text_color',
		'label'       => __( 'Text Color', 'divertheme' ),
		'description' => __( 'Choose the color for header text', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[8],
		'output'      => array(
			'element'  => '.scheme .header',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Header Top Area Colors Settings
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'header_group_title_header_top_area_color_settings',
		'label'     => __( 'Header Top Area Colors', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Header Top Area Link Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'header_top_area_bg_color',
		'label'       => __( 'Background Color', 'divertheme' ),
		'description' => __( 'Choose the background color for header top area', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[21],
		'output'      => array(
			'element'  => '.scheme .top-area',
			'property' => 'background-color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Header Top Area Link Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'header_top_area_link_color',
		'label'       => __( 'Link Color', 'divertheme' ),
		'description' => __( 'Choose the header top link color', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[9],
		'output'      => array(
			'element'  => '.scheme .top-area a',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Header Top Area Link Hover Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'header_top_area_hover_link_color',
		'description' => __( 'Choose the header top hover link color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[10],
		'output'      => array(
			'element'  => '.scheme .top-area a:hover',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Header Top Area Text Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'header_top_area_text_color',
		'label'       => __( 'Text Color', 'divertheme' ),
		'description' => __( 'Choose the header top text color', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[11],
		'output'      => array(
			'element'  => '.scheme .top-area',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Search Group Title
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'search_group_title',
		'label'     => __( 'Search Button', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Search button Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'search_color',
		'label'       => __( 'Search Button Color', 'divertheme' ),
		'description' => __( 'Choose the background color for menu of your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[31],
		'output'      => array(
			'element'  => '.search-box i',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Menu Group Title
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'menu_group_title_menu',
		'label'     => __( 'Main Menu', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Menu Background Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_bg_color',
		'label'       => __( 'Background Color', 'divertheme' ),
		'description' => __( 'Choose the background color for menu of your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[12],
		'output'      => array(
			'element'  => '.navigation,.header-preset-05 .nav',
			'property' => 'background-color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Menu link text color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_text_color',
		'label'       => __( 'Link Color', 'divertheme' ),
		'description' => __( 'Menu link text color', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[13],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Menu hover link color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_text_color_hover',
		'description' => __( 'Menu hover link text color', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[14],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_border_right_color',
		'label'       => __( 'Border Right Color', 'divertheme' ),
		'description' => __( 'Border right color for menu item, only work with header preset 02,04', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[25],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_border_top_color',
		'label'       => __( 'Border Top Color', 'divertheme' ),
		'description' => __( 'Border top color for active menu item, only work with header preset 02', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[26],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_border_bottom_color',
		'label'       => __( 'Border Bottom Color', 'divertheme' ),
		'description' => __( 'Border bottom color for active menu item, only work with header preset 02,04', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[27],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'mobile_menu_toggle_color',
		'label'       => __( 'Mobile Menu Toggle Color', 'divertheme' ),
		'description' => __( 'Color for mobile toggle menu', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[28],
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Sub Menu Group Title
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'footer_group_title_footer_color',
		'label'     => __( 'Footer Color', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Footer Background Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'footer_bg_color',
		'label'       => __( 'Background Color', 'divertheme' ),
		'description' => __( 'Choose the background color for footer of your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[16],
		'output'      => array(
			'element'  => '.scheme .footer',
			'property' => 'background-color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Footer Heading Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'footer_heading_color',
		'label'       => __( 'Heading Color', 'divertheme' ),
		'description' => __( 'Choose the heading color for footer of your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[22],
		'output'      => array(
			'element'  => '.scheme .footer .widget-title',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Footer Text Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'footer_text_color',
		'label'       => __( 'Text Color', 'divertheme' ),
		'description' => __( 'Choose the text color for footer of your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[17],
		'output'      => array(
			'element'  => '.scheme .footer',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Footer Link Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'footer_link_color',
		'label'       => __( 'Link Color', 'divertheme' ),
		'description' => __( 'Choose the footer text link color', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[18],
		'output'      => array(
			'element'  => '.scheme .footer a',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Footer Link Hover Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'footer_hover_link_color',
		'description' => __( 'Choose the footer hover text link color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[19],
		'output'      => array(
			'element'  => '.scheme .footer a:hover',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Copyright Group Title
	$controls[] = array(
		'type'     => 'group_title',
		'setting'  => 'copyright_group_title',
		'label'    => __( 'Copyright', 'divertheme' ),
		'section'  => $section,
		'priority' => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'copyright_bg_color',
		'label'       => __( 'Background Color', 'divertheme' ),
		'description' => __( 'Choose the border color for copyright of your site', 'divertheme' ),
		'section'     => $section,
		'separator'   => false,
		'default'     => $color_scheme[23],
		'output'      => array(
			'element'  => '.scheme .copyright',
			'property' => 'background-color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'copyright_text_color',
		'label'       => __( 'Text Color', 'divertheme' ),
		'description' => __( 'Choose the text color for copyright section', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[24],
		'output'      => array(
			'element'  => '.scheme .copyright',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'copyright_link_color',
		'label'       => __( 'Link Color', 'divertheme' ),
		'description' => __( 'Choose the link color for copyright section', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[29],
		'output'      => array(
			'element'  => '.scheme .copyright a',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'copyright_link_color_hover',
		'label'       => __( 'Link Color Hover', 'divertheme' ),
		'description' => __( 'Choose the link color on hover for copyright section', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[30],
		'output'      => array(
			'element'  => '.scheme .copyright a:hover',
			'property' => 'color',
		),
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Other Color Group Title
	$controls[] = array(
		'type'     => 'group_title',
		'setting'  => 'other_color_group_title',
		'label'    => __( 'Others', 'divertheme' ),
		'section'  => $section,
		'priority' => $priority ++
	);

	//Post List Background Color on Hover
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_li_background',
		'label'       => __( 'Post List Background Color on Hover', 'divertheme' ),
		'description' => __( 'Choose another dominant theme color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[99], // #ffba0e
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Media Background Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'media_background',
		'label'       => __( 'Media Background Color', 'divertheme' ),
		'description' => __( 'Choose another dominant theme color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[98], // #220e10
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Attachment Entry Background Color on Hover
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'attachment_hentry',
		'label'       => __( 'Attachment Entry Background Color', 'divertheme' ),
		'description' => __( 'Choose another dominant theme color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[97], // #e8e5ce
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	//Entry Time Background Color
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'hentry_time_background',
		'label'       => __( 'Entry Time Background Color', 'divertheme' ),
		'description' => __( 'Choose another dominant theme color', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => $color_scheme[96], // #ea9629
		'transport'   => 'postMessage',
		'priority'    => $priority ++
	);

	return $controls;
}

add_filter( 'kirki/controls', 'register_controls_for_site_colors_section' );