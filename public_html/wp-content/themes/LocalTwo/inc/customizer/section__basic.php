<?php
/**
 * ============================================================================
 * Create sections: Basic
 * ============================================================================
 */
function register_sections_site_basic( $wp_customize ) {
	$wp_customize->add_section( 'site_basic_settings_section', array(
		'title'       => __( 'Basic', 'divertheme' ),
		'description' => __( 'In this section you can control all basic settings of your site', 'divertheme' ),
		'priority'    => 1,
	) );
}

add_action( 'customize_register', 'register_sections_site_basic' );
add_action( 'customize_save_after', 'divertheme_rewrite_site_title' );

function divertheme_rewrite_site_title() {
	update_option('blogname', get_theme_mod('site_title', site_title));
}

/**
 * ============================================================================
 * Create controls for section: site basic settings
 * ============================================================================
 */
function register_controls_for_site_basic_settings_section( $controls ) {

	$section  = 'site_basic_settings_section';
	$priority = 4;

	//Normal Logo Settings
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_basic_settings',
		'label'     => __( 'พื้นฐาน', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_title',
		'label'    => __( 'ชื่อเว็บไซต์', 'divertheme' ),
		'section'  => $section,
		'default'  => get_option('blogname'),
		'priority' => $priority ++
	);

	//Normal Logo Settings
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_normal_logo_settings',
		'label'     => __( 'โลโก้', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);

	//Normal Logo Image
	$controls[] = array(
		'type'        => 'image',
		'setting'     => 'normal_logo_image',
		'label'       => __( 'Logo Image - Normal', 'divertheme' ),
		'description' => __( 'Choose a default logo image to display', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => normal_logo_image,
		'priority'    => $priority ++
	);

	//Contact Information
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_contact_settings',
		'label'     => __( 'ข้อมูลการติดต่อ', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'textarea',
		'setting'  => 'site_contact_address',
		'label'    => __( 'ที่อยู่', 'divertheme' ),
		'section'  => $section,
		'default'  => '123 ถนนอยู่เย็น ตำบลตัวอย่าง อำเภอหนึ่ง จ.เชียงใหม่ 50300',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_contact_phone',
		'label'    => __( 'หมายเลขโทรศัพท์', 'divertheme' ),
		'section'  => $section,
		'default'  => '012-345-678',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_contact_fax',
		'label'    => __( 'หมายเลขโทรสาร', 'divertheme' ),
		'section'  => $section,
		'default'  => '012-345-678',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_contact_hours',
		'label'    => __( 'เวลาทำการ', 'divertheme' ),
		'section'  => $section,
		'default'  => '8.30 - 16.30 น.',
		'priority' => $priority ++
	);
	/*
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_contact_facebook',
		'label'    => __( 'Facebook', 'divertheme' ),
		'section'  => $section,
		'default'  => 'http://www.facebook.com/',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_contact_twitter',
		'label'    => __( 'Twitter', 'divertheme' ),
		'section'  => $section,
		'default'  => 'http://www.twitter.com/',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_contact_youtube',
		'label'    => __( 'Youtube', 'divertheme' ),
		'section'  => $section,
		'default'  => 'http://www.youtube.com/',
		'priority' => $priority ++
	); */

	//Other Text
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'site_group_title_other_text_settings',
		'label'     => __( 'ข้อความแสดงผล', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);
	
	$controls[] = array(
		'type'      => 'text',
		'setting'   => 'post_heading_text',
		'label'     => __( 'ข้อความต้อนรับ แสดงด้านบนของบทความทุกหน้า', 'divertheme' ),
		'subtitle'  => __( 'Choose the text for single post heading', 'divertheme' ),
		'section'   => $section,
		'separator' => true,
		'default'   => post_heading_text,
		'priority'  => $priority ++
	);
	
	// Others Information
	$controls[] = array(
		'type'      => 'group_title',
		'setting'   => 'group_title_site_other_settings',
		'label'     => __( 'ตั้งค่าอื่นๆ', 'divertheme' ),
		'section'   => $section,
		'separator' => false,
		'priority'  => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_info_president',
		'label'    => __( 'ชื่อนายก', 'divertheme' ),
		'section'  => $section,
		'default'  => 'นายพินิจ ภาณุพงศ์',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_info_president_position',
		'label'    => __( 'ชื่อตำแหน่งของนายก', 'divertheme' ),
		'section'  => $section,
		'default'  => 'นายกองค์การบริหารส่วนตำบลตัวอย่าง',
		'priority' => $priority ++
	);
	
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'site_info_welcome_text',
		'label'    => __( 'ข้อความต้อนรับในหน้าแรก', 'divertheme' ),
		'section'  => $section,
		'default'  => 'ยินดีต้อนรับสู่องค์การบริหารส่วนตำบลตัวอย่าง',
		'priority' => $priority ++
	);

	//President Image
	$controls[] = array(
		'type'        => 'image',
		'setting'     => 'normal_president_image',
		'label'       => __( 'รูปนายก', 'divertheme' ),
		'description' => __( 'เลือกรูปสำหรับแสดงในข้อมูลนายกของหน้าแรก', 'divertheme' ),
		'section'     => $section,
		'separator'   => true,
		'default'     => normal_president_image,
		'priority'    => $priority ++
	);

	
	/*

- รูปนายก
	*/

	return $controls;
}

add_filter( 'kirki/controls', 'register_controls_for_site_basic_settings_section' );