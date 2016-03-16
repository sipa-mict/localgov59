<?php
if ( ! function_exists( 'divertheme_register_theme_plugins' ) ) :
	function divertheme_register_theme_plugins() {

		$plugins = array(
			array(
				'name'               => 'Visual Composer',
				'slug'               => 'js_composer',
				'source'             => 'https://bitbucket.org/digitalcreative/divertheme-plugins/raw/685837362ff416edf64398e4fdee9d58a65d82a4/js_composer.zip',
				'version'            => '4.7.4',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => 'Revolution Slider',
				'slug'               => 'revslider',
				'source'             => 'https://bitbucket.org/digitalcreative/divertheme-plugins/raw/667abc7a96f1ac6817c94d41fb1c84134e684533/revslider.zip',
				'version'            => '5.0.9',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => 'Google Doc Embedder',
				'slug'     => 'google-document-embedder',
				'required' => false,
			),
			array(
				'name'     => 'Image & Text Widget',
				'slug'     => 'image-text-widget',
				'required' => false,
			),
			array(
				'name'     => 'Lightweight Social Icons',
				'slug'     => 'lightweight-social-icons',
				'required' => false,
			),
			array(
				'name'     => 'List category posts',
				'slug'     => 'list-category-posts',
				'required' => false,
			),
			array(
				'name'     => 'PHP Code Widget',
				'slug'     => 'php-code-widget',
				'required' => false,
			),
			array(
				'name'     => 'Shortcode Menu',
				'slug'     => 'shortcode-menu',
				'required' => false,
			),
			array(
				'name'     => 'WP Category Tag Cloud',
				'slug'     => 'wp-category-tag-could',
				'required' => false,
			),
			array(
				'name'     => 'WP Statistics',
				'slug'     => 'wp-statistics ',
				'required' => false,
			),
		);

		$config = array(
			'id'           => 'tgmpa',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',
			// Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins',
			// Menu slug.
			'parent_slug'  => 'themes.php',
			// Parent menu slug.
			'capability'   => 'edit_theme_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'themmove' ),
				'menu_title'                      => __( 'Install Plugins', 'themmove' ),
				'installing'                      => __( 'Installing Plugin: %s', 'themmove' ),
				// %s = plugin name.
				'oops'                            => __( 'Something went wrong with the plugin API.', 'themmove' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_ask_to_update_maybe'      => _n_noop( 'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'themmove' ),
				// %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'themmove' ),
				// %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'themmove' ),
				'update_link'                     => _n_noop( 'Begin updating plugin', 'Begin updating plugins', 'themmove' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'themmove' ),
				'return'                          => __( 'Return to Required Plugins Installer', 'themmove' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'themmove' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'themmove' ),
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'themmove' ),
				// %1$s = plugin name(s).
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'themmove' ),
				// %1$s = plugin name(s).
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'themmove' ),
				// %s = dashboard link.
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'themmove' ),
				'nag_type'                        => 'updated',
				// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);

		tgmpa( $plugins, $config );

	}

	add_action( 'tgmpa_register', 'divertheme_register_theme_plugins' );
endif;