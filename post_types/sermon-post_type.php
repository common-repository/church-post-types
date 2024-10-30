<?php
function church_register_post_types() {
	//Register sermons	
	$args = array(
	'labels' => array(
				'name' => __( 'Sermons' ),
				'singular_name' => __( 'Sermon' )
			),
	'public' => true,
	'rewrite' => array('feeds' => true, 'slug' => 'sermons'),
	'menu_position' => 20,
	'supports' => array('title','editor','comments'),
	'menu_icon' => WP_CONTENT_URL . '/plugins/church-post-types/img/Play.png',
	'has_archive' => true
	); 

	register_post_type('sermon',$args);

	// Add preacher taxonomy	

	register_taxonomy('preacher',array('sermon'), array(
		'hierarchical' => true,
		'labels' =>  array(
			'name' => __( 'Preachers' ),
			'singular_name' => __( 'Preacher' ),
			'search_items' =>  __( 'Search Preachers' ),
			'all_items' => __( 'All Preachers' ),
			'parent_item' => __( 'Parent Preacher' ),	
			'parent_item_colon' => __( 'Parent Preacher:' ),
			'edit_item' => __( 'Edit Preacher' ), 
			'update_item' => __( 'Update Preacher' ),
			'add_new_item' => __( 'Add New Preacher' ),
			'new_item_name' => __( 'New Preacher Name' ),
		),
	));

	//Add service taxonomy
  	register_taxonomy('service',array('sermon'), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Services' ),
			'singular_name' => __( 'Service' ),
			'search_items' =>  __( 'Search Services' ),
			'all_items' => __( 'All Services' ),
			'parent_item' => __( 'Parent Service' ),
			'parent_item_colon' => __( 'Parent Service:' ),
			'edit_item' => __( 'Edit Service' ), 
			'update_item' => __( 'Update Service' ),
			'add_new_item' => __( 'Add New Service' ),
			'new_item_name' => __( 'New Service Name' ),
		)
	));

	// Add series taxonomy
  	register_taxonomy('series',array('sermon'), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Series' ),
			'singular_name' => __( 'Series' ),
			'search_items' =>  __( 'Search Series' ),
			'all_items' => __( 'All Series' ),
			'parent_item' => __( 'Parent Series' ),
			'parent_item_colon' => __( 'Parent Series:' ),
			'edit_item' => __( 'Edit Series' ), 
			'update_item' => __( 'Update Series' ),
			'add_new_item' => __( 'Add New Series' ),
			'new_item_name' => __( 'New Series Name' ),
		)
	));
	// Add passage taxonomy
	$labels = 

	register_taxonomy('passage','sermon',array(
		'labels' => array(
			'name' => __( 'Passages' ),
			'singular_name' => __( 'Passage' ),
			'search_items' =>  __( 'Search Passages' ),
			'popular_items' => __( 'Popular Passages' ),
			'all_items' => __( 'All Passages' ),
			'edit_item' => __( 'Edit Passage' ), 
			'update_item' => __( 'Update Passage' ),
			'add_new_item' => __( 'Add New Passage' ),
			'new_item_name' => __( 'New Passage Name' ),
			'separate_items_with_commas' => __( 'Separate passages with commas' ),
			'add_or_remove_items' => __( 'Add or remove passages' ),
			'choose_from_most_used' => __( 'Choose from the most used passages' )
		) 
	));

	// Add label taxonomy
	register_taxonomy('label','sermon',array(
		'labels' => array(
			'name' => __( 'Labels' ),
			'singular_name' => __( 'Label' ),
			'search_items' =>  __( 'Search Labels' ),
			'popular_items' => __( 'Popular Labels' ),
			'all_items' => __( 'All Labels' ),
			'edit_item' => __( 'Edit Label' ), 
			'update_item' => __( 'Update Label' ),
			'add_new_item' => __( 'Add New Label' ),
			'new_item_name' => __( 'New Label Name' ),
			'separate_items_with_commas' => __( 'Separate labels with commas' ),
			'add_or_remove_items' => __( 'Add or remove labels' ),
			'choose_from_most_used' => __( 'Choose from the most used labels' )
		)
	));                                                                                                                                                        
}
add_action( 'init', 'church_register_post_types' );
?>
