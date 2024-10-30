<?php
/*
Plugin Name: Church
Plugin URI: http://danstechstop.com/church/
Description: This plugin provides the structure for church websites
Author: Daniel Morrison
Version: 0.5.1
License: GPLv2
Author URI: http://dan.morrison.ph
*/
?>
<?php
include("post_types/event-post_type.php");
include("post_types/sermon-post_type.php");

/* Launch the plugin. */
add_action( 'plugins_loaded', 'query_posts_setup' );


function query_posts_setup() {

	/* Set constant path to the members plugin directory. */
	define( 'QUERY_POSTS_DIR', plugin_dir_path( __FILE__ ) );

	/* Load the plugin's widgets. */
	add_action( 'widgets_init', 'query_posts_load_widgets' );

}

/**
* Loads all the widget files at appropriate time. Calls the register function for each widget.
*
* @since 0.1.0
*/
function query_posts_load_widgets() {
	require_once( QUERY_POSTS_DIR . 'DT-Widget-Recent-Sermons.php' );
	register_widget( 'DT_Widget_Recent_Sermons' );
	require_once( QUERY_POSTS_DIR . 'DT-Widget-Events.php' );
	register_widget( 'DT_Widget_Events' );
}

?>
