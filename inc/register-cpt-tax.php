<?php 
// ** create custom function
// ******** custom post type
function pjt_register_custom_post_types()
{
	//** Register Student CPT
	$labels = array(
		'name'               => _x('Students', 'post type general name'),
		'singular_name'      => _x('Student', 'post type singular name'),
		'menu_name'          => _x('Students', 'admin menu'),
		'name_admin_bar'     => _x('Student', 'add new on admin bar'),
		'add_new'            => _x('Add New', 'student'),
		'add_new_item'       => __('Add New Student'),
		'new_item'           => __('New Student'),
		'edit_item'          => __('Edit Student'),
		'view_item'          => __('View Student'),
		'all_items'          => __('All Students'),
		'search_items'       => __('Search Students'),
		'parent_item_colon'  => __('Parent Students:'),
		'not_found'          => __('No students found.'),
		'not_found_in_trash' => __('No students found in Trash.'),
		'archives'           => __('Student Archives'),
		'insert_into_item'   => __('Insert into student'),
		'uploaded_to_this_item' => __('Uploaded to this student'),
		'filter_item_list'   => __('Filter students list'),
		'items_list_navigation' => __('Students list navigation'),
		'items_list'         => __('Students list'),
		'featured_image'     => __('Student feature image'),
		'set_featured_image' => __('Set student feature image'),
		'remove_featured_image' => __('Remove student feature image'),
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
		'rewrite'            => array('slug' => 'students'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-universal-access-alt',
		'supports'           => array('title', 'thumbnail', 'editor'),
		'template'           => array(
            array('core/image'),
            array('core/paragraph',array('placeholder' => 'Write Short Biography...')),
        ),
        'template_lock' => 'all'    
    );
    register_post_type('pjt-student', $args);
    

	//**  Register Staff CPT
	$labels = array(
		'name'               => _x('Staffs', 'post type general name'),
		'singular_name'      => _x('Staff', 'post type singular name'),
		'menu_name'          => _x('Staffs', 'admin menu'),
		'name_admin_bar'     => _x('Staff', 'add new on admin bar'),
		'add_new'            => _x('Add New', 'staff'),
		'add_new_item'       => __('Add New Staff'),
		'new_item'           => __('New Staff'),
		'edit_item'          => __('Edit Staff'),
		'view_item'          => __('View Staff'),
		'all_items'          => __('All Staffs'),
		'search_items'       => __('Search Staffs'),
		'parent_item_colon'  => __('Parent Staffs:'),
		'not_found'          => __('No staffs found.'),
		'not_found_in_trash' => __('No staffs found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'staffs'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
        'supports'           => array('title', 'thumbnail', 'editor'),
        'template'           => array(
            array('core/paragraph',array('placeholder' => 'Write a description / bio of the staff member...')),
            array('core/image')
        ),
        'template_lock' => 'all'    
	);

	register_post_type('pjt-staff', $args);
}

add_action('init', 'pjt_register_custom_post_types');


// ** create custom function
// ******* custom taxonomy(taxonomies) 
function pjt_register_taxonomies() {

     // ** Add Student Category taxonomy Under pjt-student post
     $labels = array(
        'name'              => _x( 'Student Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Categories' ),
        'all_items'         => __( 'All Student Category' ),
        'parent_item'       => __( 'Parent Student Category' ),
        'parent_item_colon' => __( 'Parent Student Category:' ),
        'edit_item'         => __( 'Edit Student Category' ),
        'view_item'         => __( 'View Student Category' ),
        'update_item'       => __( 'Update Student Category' ),
        'add_new_item'      => __( 'Add New Student Category' ),
        'new_item_name'     => __( 'New Student Category Name' ),
        'menu_name'         => __( 'Student Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'pjt-student-category', array( 'pjt-student' ), $args );
    
    // ** Add Staff Category taxonomy Under pjt-staff post
	 $labels = array(
		'name'              => _x( 'Staff Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Staff Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Staff Types' ),
		'all_items'         => __( 'All Staff Types' ),
		'parent_item'       => __( 'Parent Staff Type' ),
		'parent_item_colon' => __( 'Parent Staff Type:' ),
		'edit_item'         => __( 'Edit Staff Type' ),
		'update_item'       => __( 'Update Staff Type' ),
		'add_new_item'      => __( 'Add New Staff Type' ),
		'new_item_name'     => __( 'New Staff Type Name' ),
		'menu_name'         => __( 'Staff Type' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'staff-types' ),
	);
	
	register_taxonomy( 'pjt-staff-type', array( 'pjt-staff' ), $args );
}
add_action( 'init', 'pjt_register_taxonomies');



// ** Rewrite flush 
// ** when you change theme, it will automatically rewrite my custome functions without saving the permalink
function pjt_rewrite_flush()
{
	pjt_register_custom_post_types();
	pjt_register_taxonomies();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'pjt_rewrite_flush');

