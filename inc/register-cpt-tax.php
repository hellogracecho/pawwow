<?php 
// ** create custom function
// ******** custom post type
function pawwow_register_custom_post_types()
{
	//** Register Service CPT
	$labels = array(
		'name'               => _x('Services', 'post type general name'),
		'singular_name'      => _x('Service', 'post type singular name'),
		'menu_name'          => _x('Services', 'admin menu'),
		'name_admin_bar'     => _x('Service', 'add new on admin bar'),
		'add_new'            => _x('Add New', 'Service'),
		'add_new_item'       => __('Add New Service'),
		'new_item'           => __('New Service'),
		'edit_item'          => __('Edit Service'),
		'view_item'          => __('View Service'),
		'all_items'          => __('All Services'),
		'search_items'       => __('Search Services'),
		'parent_item_colon'  => __('Parent Services:'),
		'not_found'          => __('No Services found.'),
		'not_found_in_trash' => __('No Services found in Trash.'),
		'archives'           => __('Service Archives'),
		'insert_into_item'   => __('Insert into Service'),
		'uploaded_to_this_item' => __('Uploaded to this Service'),
		'filter_item_list'   => __('Filter Services list'),
		'items_list_navigation' => __('Services list navigation'),
		'items_list'         => __('Services list'),
		'featured_image'     => __('Service feature image'),
		'set_featured_image' => __('Set Service feature image'),
		'remove_featured_image' => __('Remove Service feature image'),
		'use_featured_image' => __('Use as feature image'),
	);

    $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'services'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-buddicons-activity',
		'supports'           => array('title', 'thumbnail', 'editor'),
		'template'           => array(
            array('core/paragraph',array('placeholder' => 'Write sub title of the sercive...')),
		),
        'template_lock' => 'all',    
    );
    register_post_type('pawwow-service', $args);
    

	//**  Register Special CPT
	$labels = array(
		'name'               => _x('Specials', 'post type general name'),
		'singular_name'      => _x('Special', 'post type singular name'),
		'menu_name'          => _x('Specials', 'admin menu'),
		'name_admin_bar'     => _x('Special', 'add new on admin bar'),
		'add_new'            => _x('Add New', 'Special'),
		'add_new_item'       => __('Add New Special'),
		'new_item'           => __('New Special'),
		'edit_item'          => __('Edit Special'),
		'view_item'          => __('View Special'),
		'all_items'          => __('All Specials'),
		'search_items'       => __('Search Specials'),
		'parent_item_colon'  => __('Parent Specials:'),
		'not_found'          => __('No Specials found.'),
		'not_found_in_trash' => __('No Specials found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'specials'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-awards',
        'supports'           => array('title', 'thumbnail', 'editor'),
        'template'           => array(
			array('core/paragraph',array('placeholder' => 'Write a description / Special services/events...'))
		        ),
        'template_lock' => 'all'    
	);

	register_post_type('pawwow-special', $args);
}

add_action('init', 'pawwow_register_custom_post_types');


// ** Rewrite flush 
// ** when you change theme, it will automatically rewrite my custome functions without saving the permalink
function pawwow_rewrite_flush()
{
	pawwow_register_custom_post_types();
	pawwow_register_taxonomies();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'pawwow_rewrite_flush');

