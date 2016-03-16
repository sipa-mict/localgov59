<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}

	return true;
}

add_filter( 'cmb2_meta_boxes', 'divertheme_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 *
 * @return array
 */
function divertheme_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'divertheme_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['page_metabox'] = array(
		'id'           => 'page_metabox',
		'title'        => __( 'Page Settings', 'divertheme' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		'fields'       => array(
			array(
				'name'    => __( 'Bread Crumb', 'divertheme' ),
				'desc'    => __( 'Custom settings for breadcrumb', 'divertheme' ),
				'id'      => $prefix . 'bread_crumb_enable',
				'type'    => 'select',
				'options' => array(
					'enable'  => __( 'Enable', 'divertheme' ),
					'disable' => __( 'Disable', 'divertheme' ),
				),
			),
			array(
				'name'    => __( 'Uncover Footer', 'divertheme' ),
				'desc'    => __( 'Custom settings for uncover footer option', 'divertheme' ),
				'id'      => $prefix . 'uncover_enable',
				'type'    => 'select',
				'options' => array(
					'default' => __( 'Default', 'divertheme' ),
					'enable'  => __( 'Enable', 'divertheme' ),
					'disable' => __( 'Disable', 'divertheme' ),
				),
			),
			array(
				'name'    => __( 'Top Area', 'divertheme' ),
				'desc'    => __( 'Custom settings for header top area', 'divertheme' ),
				'id'      => $prefix . 'header_top',
				'type'    => 'select',
				'options' => array(
					'default' => __( 'Default', 'divertheme' ),
					'enable'  => __( 'Enable', 'divertheme' ),
					'disable' => __( 'Disable', 'divertheme' ),
				),
			),
			array(
				'name'    => __( 'Sticky Header', 'divertheme' ),
				'desc'    => __( 'Custom settings for sticky header', 'divertheme' ),
				'id'      => $prefix . 'sticky_header',
				'type'    => 'select',
				'options' => array(
					'default' => __( 'Default', 'divertheme' ),
					'enable'  => __( 'Enable', 'divertheme' ),
					'disable' => __( 'Disable', 'divertheme' ),
				),
			),
			array(
				'name' => __( 'Custom Logo', 'divertheme' ),
				'desc' => __( 'Upload an image or enter a URL for logo', 'divertheme' ),
				'id'   => $prefix . 'custom_logo',
				'type' => 'file',
			),
			array(
				'name'    => __( 'Header Presets', 'divertheme' ),
				'desc'    => __( 'Custom settings for header presets', 'divertheme' ),
				'id'      => $prefix . 'header_preset',
				'type'    => 'select',
				'options' => array(
					'default'          => __( 'Default', 'divertheme' ),
					'header-preset-01' => __( 'Preset 01', 'divertheme' ),
					'header-preset-02' => __( 'Preset 02', 'divertheme' ),
					'header-preset-03' => __( 'Preset 03', 'divertheme' ),
					'header-preset-04' => __( 'Preset 04', 'divertheme' ),
					'header-preset-05' => __( 'Preset 05', 'divertheme' ),
					'header-preset-06' => __( 'Preset 06', 'divertheme' ),
					'header-preset-07' => __( 'Preset 07', 'divertheme' ),
					'header-preset-08' => __( 'Preset 08', 'divertheme' ),
				),
			),
			array(
				'name'    => __( 'Color Scheme', 'divertheme' ),
				'desc'    => __( 'Custom settings for color scheme', 'divertheme' ),
				'id'      => $prefix . 'color_scheme',
				'type'    => 'select',
				'options' => array(
					'default'  => __( 'Default', 'divertheme' ),
					'scheme1'  => __( 'Color Scheme for Header Preset 01', 'divertheme' ),
					'scheme2'  => __( 'Color Scheme for Header Preset 02', 'divertheme' ),
					'scheme3'  => __( 'Color Scheme for Header Preset 03', 'divertheme' ),
					'scheme4'  => __( 'Color Scheme for Header Preset 04', 'divertheme' ),
					'scheme5'  => __( 'Color Scheme for Header Preset 05', 'divertheme' ),
					'scheme6'  => __( 'Color Scheme for Header Preset 06', 'divertheme' ),
					'scheme7'  => __( 'Color Scheme for Header Preset 07', 'divertheme' ),
					'scheme8'  => __( 'Color Scheme for Home V2 Default', 'divertheme' ),
					'scheme9'  => __( 'Color Scheme for Home V2 Black', 'divertheme' ),
					'scheme10' => __( 'Color Scheme for Home V2 White', 'divertheme' ),
				),
			),
			array(
				'name'    => __( 'Page Layout', 'divertheme' ),
				'desc'    => __( 'Choose a layout you want', 'divertheme' ),
				'id'      => $prefix . 'page_layout_private',
				'type'    => 'select',
				'options' => array(
					'default'         => __( 'Default', 'divertheme' ),
					'full-width'      => __( 'Full width', 'divertheme' ),
					'content-sidebar' => __( 'Content-Sidebar', 'divertheme' ),
					'sidebar-content' => __( 'Sidebar-Content', 'divertheme' ),
				),
			),
			array(
				'name' => 'Disable Title',
				'desc' => 'Check this box to disable the title of the page',
				'id'   => $prefix . 'disable_title',
				'type' => 'checkbox'
			),
			array(
				'name' => __( 'Title Background', 'divertheme' ),
				'desc' => __( 'Upload an image or enter a URL for heading title', 'divertheme' ),
				'id'   => $prefix . 'heading_image',
				'type' => 'file',
			),
			array(
				'name' => 'Alternative Title',
				'desc' => 'Enter your alternative title here',
				'id'   => $prefix . 'alt_title',
				'type' => 'textarea_small'
			),
			array(
				'name' => 'Disable Parallax',
				'desc' => 'Check this box to disable parallax effect for heading title',
				'id'   => $prefix . 'disable_parallax',
				'type' => 'checkbox'
			),
			array(
				'name' => 'Contact Adress',
				'desc' => 'Enter your address here and it will display on map in contact page',
				'id'   => $prefix . 'contact_address',
				'type' => 'text'
			),
			array(
				'name' => 'Custom Class',
				'desc' => 'Enter custom class for this page',
				'id'   => $prefix . 'custom_class',
				'type' => 'text'
			),
		),
	);

	return $meta_boxes;
}
