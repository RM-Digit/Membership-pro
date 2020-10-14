<?php

/**
 * Initialize Custom Post Type - SaaSpot Theme
 */
function saaspot_custom_post_type() {
	$noneed_apps_post = (saaspot_framework_active()) ? cs_get_option('noneed_apps_post') : '';
	$noneed_webinars_post = (saaspot_framework_active()) ? cs_get_option('noneed_webinars_post') : '';
	$noneed_job_post = (saaspot_framework_active()) ? cs_get_option('noneed_job_post') : '';
	$noneed_testimonial_post = (saaspot_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_team_post = (saaspot_framework_active()) ? cs_get_option('noneed_team_post') : '';

	if (!$noneed_apps_post) {
		// Apps
		$apps_cpt = (saaspot_framework_active()) ? cs_get_option('theme_apps_name') : '';
		$apps_slug = (saaspot_framework_active()) ? cs_get_option('theme_apps_slug') : '';
		$apps_cpt_slug = (saaspot_framework_active()) ? cs_get_option('theme_apps_cat_slug') : '';

		$base = (isset($apps_cpt_slug) && $apps_cpt_slug !== '') ? sanitize_title_with_dashes($apps_cpt_slug) : ((isset($apps_cpt) && $apps_cpt !== '') ? strtolower($apps_cpt) : 'apps');
		$base_slug = (isset($apps_slug) && $apps_slug !== '') ? sanitize_title_with_dashes($apps_slug) : ((isset($apps_cpt) && $apps_cpt !== '') ? strtolower($apps_cpt) : 'apps');
		$label = ucfirst((isset($apps_cpt) && $apps_cpt !== '') ? strtolower($apps_cpt) : 'apps');

		// Register custom post type - Apps
		register_post_type('apps',
			array(
				'labels' => array(
					'name' => $label,
					'singular_name' => sprintf(esc_html__('%s Post', 'saaspot-core' ), $label),
					'all_items' => sprintf(esc_html__('All %s', 'saaspot-core' ), $label),
					'add_new' => esc_html__('Add New', 'saaspot-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'saaspot-core' ), $label),
					'edit' => esc_html__('Edit', 'saaspot-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'saaspot-core' ), $label),
					'new_item' => sprintf(esc_html__('New %s', 'saaspot-core' ), $label),
					'view_item' => sprintf(esc_html__('View %s', 'saaspot-core' ), $label),
					'search_items' => sprintf(esc_html__('Search %s', 'saaspot-core' ), $label),
					'not_found' => esc_html__('Nothing found in the Database.', 'saaspot-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'saaspot-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-admin-appearance',
				'rewrite' => array(
					'slug' => $base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'comments',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);
		// Registered

		// Add Category Taxonomy for our Custom Post Type - Apps
		register_taxonomy(
			'apps_category',
			'apps',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'saaspot-core' ), $label),
					'singular_name' => sprintf(esc_html__('%s Category', 'saaspot-core'), $label),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'saaspot-core'), $label),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'saaspot-core'), $label),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'saaspot-core'), $label),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'saaspot-core'), $label),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'saaspot-core'), $label),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'saaspot-core'), $label),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'saaspot-core'), $label),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'saaspot-core'), $label)
				),
				'rewrite' => array( 'slug' => $base . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
	}
	if (!$noneed_webinars_post) {
		// Webinars
		$webinars_cpt = (saaspot_framework_active()) ? cs_get_option('theme_webinars_name') : '';
		$webinars_slug = (saaspot_framework_active()) ? cs_get_option('theme_webinars_slug') : '';
		$webinars_cpt_slug = (saaspot_framework_active()) ? cs_get_option('theme_webinars_cat_slug') : '';

		$base = (isset($webinars_cpt_slug) && $webinars_cpt_slug !== '') ? sanitize_title_with_dashes($webinars_cpt_slug) : ((isset($webinars_cpt) && $webinars_cpt !== '') ? strtolower($webinars_cpt) : 'webinars');
		$base_slug = (isset($webinars_slug) && $webinars_slug !== '') ? sanitize_title_with_dashes($webinars_slug) : ((isset($webinars_cpt) && $webinars_cpt !== '') ? strtolower($webinars_cpt) : 'webinars');
		$label = ucfirst((isset($webinars_cpt) && $webinars_cpt !== '') ? strtolower($webinars_cpt) : 'webinars');

		// Register custom post type - Webinars
		register_post_type('webinars',
			array(
				'labels' => array(
					'name' => $label,
					'singular_name' => sprintf(esc_html__('%s Post', 'saaspot-core' ), $label),
					'all_items' => sprintf(esc_html__('All %s', 'saaspot-core' ), $label),
					'add_new' => esc_html__('Add New', 'saaspot-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'saaspot-core' ), $label),
					'edit' => esc_html__('Edit', 'saaspot-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'saaspot-core' ), $label),
					'new_item' => sprintf(esc_html__('New %s', 'saaspot-core' ), $label),
					'view_item' => sprintf(esc_html__('View %s', 'saaspot-core' ), $label),
					'search_items' => sprintf(esc_html__('Search %s', 'saaspot-core' ), $label),
					'not_found' => esc_html__('Nothing found in the Database.', 'saaspot-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'saaspot-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 21,
				'menu_icon' => 'dashicons-playlist-video',
				'rewrite' => array(
					'slug' => $base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'comments',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);
		// Registered

		// Add Category Taxonomy for our Custom Post Type - Webinars
		register_taxonomy(
			'webinars_category',
			'webinars',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'saaspot-core' ), $label),
					'singular_name' => sprintf(esc_html__('%s Category', 'saaspot-core'), $label),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'saaspot-core'), $label),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'saaspot-core'), $label),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'saaspot-core'), $label),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'saaspot-core'), $label),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'saaspot-core'), $label),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'saaspot-core'), $label),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'saaspot-core'), $label),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'saaspot-core'), $label)
				),
				'rewrite' => array( 'slug' => $base . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
	}
	if (!$noneed_job_post) {
		// Job
		$job_cpt = (saaspot_framework_active()) ? cs_get_option('theme_job_name') : '';
		$job_slug = (saaspot_framework_active()) ? cs_get_option('theme_job_slug') : '';
		$job_cpt_slug = (saaspot_framework_active()) ? cs_get_option('theme_job_cat_slug') : '';

		$base = (isset($job_cpt_slug) && $job_cpt_slug !== '') ? sanitize_title_with_dashes($job_cpt_slug) : ((isset($job_cpt) && $job_cpt !== '') ? strtolower($job_cpt) : 'job');
		$base_slug = (isset($job_slug) && $job_slug !== '') ? sanitize_title_with_dashes($job_slug) : ((isset($job_cpt) && $job_cpt !== '') ? strtolower($job_cpt) : 'job');
		$label = ucfirst((isset($job_cpt) && $job_cpt !== '') ? strtolower($job_cpt) : 'job');

		// Register custom post type - Job
		register_post_type('job',
			array(
				'labels' => array(
					'name' => $label,
					'singular_name' => sprintf(esc_html__('%s Post', 'saaspot-core' ), $label),
					'all_items' => sprintf(esc_html__('All %s', 'saaspot-core' ), $label),
					'add_new' => esc_html__('Add New', 'saaspot-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'saaspot-core' ), $label),
					'edit' => esc_html__('Edit', 'saaspot-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'saaspot-core' ), $label),
					'new_item' => sprintf(esc_html__('New %s', 'saaspot-core' ), $label),
					'view_item' => sprintf(esc_html__('View %s', 'saaspot-core' ), $label),
					'search_items' => sprintf(esc_html__('Search %s', 'saaspot-core' ), $label),
					'not_found' => esc_html__('Nothing found in the Database.', 'saaspot-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'saaspot-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 22,
				'menu_icon' => 'dashicons-welcome-learn-more',
				'rewrite' => array(
					'slug' => $base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'comments',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);
		// Registered

		// Add Role Taxonomy for our Custom Post Type - Job
		register_taxonomy(
			'job_role',
			'job',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Roles', 'saaspot-core' ), $label),
					'singular_name' => sprintf(esc_html__('%s Role', 'saaspot-core'), $label),
					'search_items' =>  sprintf(esc_html__( 'Search %s Roles', 'saaspot-core'), $label),
					'all_items' => sprintf(esc_html__( 'All %s Roles', 'saaspot-core'), $label),
					'parent_item' => sprintf(esc_html__( 'Parent %s Role', 'saaspot-core'), $label),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Role:', 'saaspot-core'), $label),
					'edit_item' => sprintf(esc_html__( 'Edit %s Role', 'saaspot-core'), $label),
					'update_item' => sprintf(esc_html__( 'Update %s Role', 'saaspot-core'), $label),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Role', 'saaspot-core'), $label),
					'new_item_name' => sprintf(esc_html__( 'New %s Role Name', 'saaspot-core'), $label)
				),
				'rewrite' => array( 'slug' => $base . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
		);
	}
	if (!$noneed_testimonial_post) {
		// Testimonials - Start
		$testimonial_cpt = (saaspot_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		$testimonial_slug = (saaspot_framework_active()) ? cs_get_option('theme_testimonial_slug') : '';
		$testimonial_cpt_slug = (saaspot_framework_active()) ? cs_get_option('theme_testimonial_cat_slug') : '';

		$testi_base = (isset($testimonial_cpt_slug) && $testimonial_cpt_slug !== '') ? sanitize_title_with_dashes($testimonial_cpt_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
		$testi_base_slug = (isset($testimonial_slug) && $testimonial_slug !== '') ? sanitize_title_with_dashes($testimonial_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
		$testi_label = ucfirst((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');

		// Register custom post type - Testimonials
		register_post_type('testimonial',
			array(
				'labels' => array(
					'name' => $testi_label,
					'singular_name' => sprintf(esc_html__('%s Post', 'saaspot-core' ), $testi_label),
					'all_items' => sprintf(esc_html__('%s', 'saaspot-core' ), $testi_label),
					'add_new' => esc_html__('Add New', 'saaspot-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'saaspot-core' ), $testi_label),
					'edit' => esc_html__('Edit', 'saaspot-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'saaspot-core' ), $testi_label),
					'new_item' => sprintf(esc_html__('New %s', 'saaspot-core' ), $testi_label),
					'view_item' => sprintf(esc_html__('View %s', 'saaspot-core' ), $testi_label),
					'search_items' => sprintf(esc_html__('Search %s', 'saaspot-core' ), $testi_label),
					'not_found' => esc_html__('Nothing found in the Database.', 'saaspot-core'),
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'saaspot-core'),
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 23,
				'menu_icon' => 'dashicons-groups',
				'rewrite' => array(
					'slug' => $testi_base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);

		// Add Category Taxonomy for our Custom Post Type - Webinars
		register_taxonomy(
			'testimonial_category',
			'testimonial',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'saaspot-core' ), $testi_label),
					'singular_name' => sprintf(esc_html__('%s Category', 'saaspot-core'), $testi_label),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'saaspot-core'), $testi_label),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'saaspot-core'), $testi_label),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'saaspot-core'), $testi_label),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'saaspot-core'), $testi_label),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'saaspot-core'), $testi_label),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'saaspot-core'), $testi_label),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'saaspot-core'), $testi_label),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'saaspot-core'), $testi_label)
				),
				'rewrite' => array( 'slug' => $testi_base_slug . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
		// Testimonials - End
	}
	if (!$noneed_team_post) {
		// Team Start
		$team_cpt = (saaspot_framework_active()) ? cs_get_option('theme_team_name') : '';
		$team_slug = (saaspot_framework_active()) ? cs_get_option('theme_team_slug') : '';
		$team_cpt_slug = (saaspot_framework_active()) ? cs_get_option('theme_team_cat_slug') : '';

		$team_base = (isset($team_cpt_slug) && $team_cpt_slug !== '') ? sanitize_title_with_dashes($team_cpt_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
		$team_base_slug = (isset($team_slug) && $team_slug !== '') ? sanitize_title_with_dashes($team_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
		$teams = ucfirst((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');

		// Register custom post type - Team
		register_post_type('team',
			array(
				'labels' => array(
					'name' => $teams,
					'singular_name' => sprintf(esc_html__('%s Post', 'saaspot-core' ), $teams),
					'all_items' => sprintf(esc_html__('%s', 'saaspot-core' ), $teams),
					'add_new' => esc_html__('Add New', 'saaspot-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'saaspot-core' ), $teams),
					'edit' => esc_html__('Edit', 'saaspot-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'saaspot-core' ), $teams),
					'new_item' => sprintf(esc_html__('New %s', 'saaspot-core' ), $teams),
					'view_item' => sprintf(esc_html__('View %s', 'saaspot-core' ), $teams),
					'search_items' => sprintf(esc_html__('Search %s', 'saaspot-core' ), $teams),
					'not_found' => esc_html__('Nothing found in the Database.', 'saaspot-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'saaspot-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 24,
				'menu_icon' => 'dashicons-businessman',
				'rewrite' => array(
					'slug' => $team_base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);

		register_taxonomy(
			'team_category',
			'team',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'saaspot-core' ), $teams),
					'singular_name' => sprintf(esc_html__('%s Category', 'saaspot-core'), $teams),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'saaspot-core'), $teams),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'saaspot-core'), $teams),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'saaspot-core'), $teams),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'saaspot-core'), $teams),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'saaspot-core'), $teams),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'saaspot-core'), $teams),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'saaspot-core'), $teams),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'saaspot-core'), $teams)
				),
				'rewrite' => array( 'slug' => $team_base_slug . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
		// Team - End
	}

}

function saaspot_custom_posttype_slug() {
	$noneed_apps_post = (saaspot_framework_active()) ? cs_get_option('noneed_apps_post') : '';
	$noneed_webinars_post = (saaspot_framework_active()) ? cs_get_option('noneed_webinars_post') : '';
	$noneed_job_post = (saaspot_framework_active()) ? cs_get_option('noneed_job_post') : '';
	$noneed_testimonial_post = (saaspot_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_team_post = (saaspot_framework_active()) ? cs_get_option('noneed_team_post') : '';
	if (!$noneed_apps_post) {
		// Apps Post
		$apps_cpt = (saaspot_framework_active()) ? cs_get_option('theme_apps_name') : '';
		if ($apps_cpt === '') $apps_cp = 'apps';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$apps_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
	if (!$noneed_webinars_post) {
	  // Webinars Post
	  $webinars_cpt = (saaspot_framework_active()) ? cs_get_option('theme_webinars_name') : '';
		if ($webinars_cpt === '') $webinars_cp = 'webinars';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$webinars_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
	if (!$noneed_job_post) {
	  // Job Post
	  $job_cpt = (saaspot_framework_active()) ? cs_get_option('theme_job_name') : '';
		if ($job_cpt === '') $job_cp = 'job';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$job_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
	if (!$noneed_testimonial_post) {
	  // Testimonial Post
	  $testimonial_cpt = (saaspot_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$testimonial_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
	if (!$noneed_team_post) {
	  // Team Post
	  $team_cpt = (saaspot_framework_active()) ? cs_get_option('theme_team_name') : '';
		if ($team_cpt === '') $team_cp = 'team';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$team_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
}
add_action( 'cs_validate_save_after','saaspot_custom_posttype_slug' );

// After Theme Setup
function saaspot_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	saaspot_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'saaspot_custom_flush_rules');
add_action('init', 'saaspot_custom_post_type');

// Avoid apps post type as 404 page while it change
function vt_cpt_avoid_error_posttype() {
	$noneed_apps_post = (saaspot_framework_active()) ? cs_get_option('noneed_apps_post') : '';
	$noneed_webinars_post = (saaspot_framework_active()) ? cs_get_option('noneed_webinars_post') : '';
	$noneed_job_post = (saaspot_framework_active()) ? cs_get_option('noneed_job_post') : '';
	$noneed_testimonial_post = (saaspot_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_team_post = (saaspot_framework_active()) ? cs_get_option('noneed_team_post') : '';
	if (!$noneed_apps_post) {
		// Apps Post
		$apps_cpt = (saaspot_framework_active()) ? cs_get_option('theme_apps_name') : '';
		if ($apps_cpt === '') $apps_cp = 'apps';
		$set = get_option('post_type_rules_flased_' . $apps_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $apps_cpt,true);
		}
	}
	if (!$noneed_webinars_post) {
	  // Webinars
		$webinars_cpt = (saaspot_framework_active()) ? cs_get_option('theme_webinars_name') : '';
		if ($webinars_cpt === '') $webinars_cp = 'webinars';
		$set = get_option('post_type_rules_flased_' . $webinars_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $webinars_cpt,true);
		}
	}
	if (!$noneed_job_post) {
		// Job Post
		$job_cpt = (saaspot_framework_active()) ? cs_get_option('theme_job_name') : '';
		if ($job_cpt === '') $job_cp = 'job';
		$set = get_option('post_type_rules_flased_' . $job_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $job_cpt,true);
		}
	}
	if (!$noneed_testimonial_post) {
		// Testimonial Post
		$testimonial_cpt = (saaspot_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
		$set = get_option('post_type_rules_flased_' . $testimonial_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $testimonial_cpt,true);
		}
	}
	if (!$noneed_team_post) {
		// Team Post
		$team_cpt = (saaspot_framework_active()) ? cs_get_option('theme_team_name') : '';
		if ($team_cpt === '') $team_cp = 'team';
		$set = get_option('post_type_rules_flased_' . $team_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $team_cpt,true);
		}
	}
}
add_action('init', 'vt_cpt_avoid_error_posttype');

$noneed_apps_post = (saaspot_framework_active()) ? cs_get_option('noneed_apps_post') : '';
$noneed_webinars_post = (saaspot_framework_active()) ? cs_get_option('noneed_webinars_post') : '';
$noneed_job_post = (saaspot_framework_active()) ? cs_get_option('noneed_job_post') : '';
$noneed_testimonial_post = (saaspot_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
$noneed_team_post = (saaspot_framework_active()) ? cs_get_option('noneed_team_post') : '';
if (!$noneed_apps_post) {
	// Add Filter by Category in Apps Type
	add_action('restrict_manage_posts', 'saaspot_filter_apps_categories');
	function saaspot_filter_apps_categories() {
		global $typenow;
		$post_type = 'apps'; // Apps post type
		$taxonomy  = 'apps_category'; // Apps category taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => sprintf(esc_html__("Show All %s", 'saaspot-core'), $info_taxonomy->label),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}

	// Apps Search => ID to Term
	add_filter('parse_query', 'saaspot_apps_id_term_search');
	function saaspot_apps_id_term_search($query) {
		global $pagenow;
		$post_type = 'apps'; // Apps post type
		$taxonomy  = 'apps_category'; // Apps category taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}

	/* ---------------------------------------------------------------------------
	 * Custom columns - Apps
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-apps_columns", "saaspot_apps_edit_columns");
	function saaspot_apps_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'saaspot-core' );
	  $new_columns['thumbnail'] = __('Image', 'saaspot-core' );
	  $new_columns['apps_category'] = __('Categories', 'saaspot-core' );
	  $new_columns['apps_order'] = __('Order', 'saaspot-core' );
	  $new_columns['date'] = __('Date', 'saaspot-core' );

	  return $new_columns;
	}
	add_action('manage_apps_posts_custom_column', 'saaspot_manage_apps_columns', 10, 2);
	function saaspot_manage_apps_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'Categories' column. */
	    case 'apps_category' :

	      $terms = get_the_terms( $post->ID, 'apps_category' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'apps_category' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'apps_category', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }

	    break;

	    case "apps_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}
if (!$noneed_webinars_post) {

	// Add Filter by Category in Webinars Type
	add_action('restrict_manage_posts', 'saaspot_filter_webinars_categories');
	function saaspot_filter_webinars_categories() {
		global $typenow;
		$post_type = 'webinars'; // Webinars post type
		$taxonomy  = 'webinars_category'; // Webinars category taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => sprintf(esc_html__("Show All %s", 'saaspot-core'), $info_taxonomy->label),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}

	// Webinars Search => ID to Term
	add_filter('parse_query', 'saaspot_webinars_id_term_search');
	function saaspot_webinars_id_term_search($query) {
		global $pagenow;
		$post_type = 'webinars'; // Webinars post type
		$taxonomy  = 'webinars_category'; // Webinars category taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}

	/* ---------------------------------------------------------------------------
	 * Custom columns - Webinars
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-webinars_columns", "saaspot_webinars_edit_columns");
	function saaspot_webinars_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'saaspot-core' );
	  $new_columns['thumbnail'] = __('Image', 'saaspot-core' );
	  $new_columns['webinars_category'] = __('Categories', 'saaspot-core' );
	  $new_columns['webinars_order'] = __('Order', 'saaspot-core' );
	  $new_columns['date'] = __('Date', 'saaspot-core' );

	  return $new_columns;
	}
	add_action('manage_webinars_posts_custom_column', 'saaspot_manage_webinars_columns', 10, 2);
	function saaspot_manage_webinars_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'Categories' column. */
	    case 'webinars_category' :

	      $terms = get_the_terms( $post->ID, 'webinars_category' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'webinars_category' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'webinars_category', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }

	    break;

	    case "webinars_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}
if (!$noneed_job_post) {

	/* ---------------------------------------------------------------------------
	 * Custom columns - Job
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-job_columns", "saaspot_job_edit_columns");
	function saaspot_job_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'saaspot-core' );
	  $new_columns['job_role'] = __('Roles', 'saaspot-core' );
	  $new_columns['job_order'] = __('Order', 'saaspot-core' );
	  $new_columns['date'] = __('Date', 'saaspot-core' );

	  return $new_columns;
	}
	add_action('manage_job_posts_custom_column', 'saaspot_manage_job_columns', 10, 2);
	function saaspot_manage_job_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Roles' column. */
	    case 'job_role' :

	      $terms = get_the_terms( $post->ID, 'job_role' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'job_role' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'job_role', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }

	    break;

	    case "job_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}
if (!$noneed_testimonial_post) {

	/* ---------------------------------------------------------------------------
	 * Custom columns - Testimonial
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-testimonial_columns", "saaspot_testimonial_edit_columns");
	function saaspot_testimonial_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'saaspot-core' );
	  $new_columns['thumbnail'] = __('Image', 'saaspot-core' );
	  $new_columns['id'] = __('Testimonial ID', 'saaspot-core' );
	  $new_columns['testimonial_category'] = __('Category', 'saaspot-core' );
	  $new_columns['testimonial_order'] = __('Order', 'saaspot-core' );
	  $new_columns['date'] = __('Date', 'saaspot-core' );

	  return $new_columns;
	}

	add_action('manage_testimonial_posts_custom_column', 'saaspot_manage_testimonial_columns', 10, 2);
	function saaspot_manage_testimonial_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'ID' column. */
	    case 'id':
	      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
	    break;

	    case "testimonial_category":
	    	$terms = get_the_terms( $post->ID, 'testimonial_category' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'testimonial_category' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'testimonial_category', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }
	    break;

	    case "testimonial_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}
if (!$noneed_team_post) {

	/* ---------------------------------------------------------------------------
	 * Custom columns - Team
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-team_columns", "saaspot_team_edit_columns");
	function saaspot_team_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'saaspot-core' );
	  $new_columns['thumbnail'] = __('Image', 'saaspot-core' );
	  $new_columns['id'] = __('Member ID', 'saaspot-core' );
	  $new_columns['name'] = __('Job Position', 'saaspot-core' );
	  $new_columns['team_order'] = __('Order', 'saaspot-core' );
	  $new_columns['date'] = __('Date', 'saaspot-core' );

	  return $new_columns;
	}

	add_action('manage_team_posts_custom_column', 'saaspot_manage_team_columns', 10, 2);
	function saaspot_manage_team_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'ID' column. */
	    case 'id':
	      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
	    break;

	    case "name":
	    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
	      echo $team_options['team_job_position'];
	    break;

	    case "team_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}
}
