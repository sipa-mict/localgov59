<?php
add_filter( 'divertheme_import_theme', 'divertheme_import_theme' );

function divertheme_import_theme() {
	return 'Structure';
}

add_filter( 'divertheme_import_demos', 'divertheme_import_demos' );

function divertheme_import_demos() {
	return array(
		'divertheme01' => 'Structure',
	);
}

add_filter( 'divertheme_import_types', 'divertheme_import_types' );

function divertheme_import_types() {
	return array(
		'all'                => 'All',
		'content'            => 'Content',
		'widgets'            => 'Widgets',
		'page_options'       => 'Page Options',
		'menus'              => 'Menus',
		'customizer_options' => 'Customizer Options',
		'essential_grid'     => 'Essential Grid',
		'rev_slider'         => 'Revolution Slider',
		'vc_templates'       => 'VC Templates'
	);
}