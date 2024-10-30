<?php
/**
 * Enable Custom Post Types for Events
 */
// Registers the new post type and taxonomy
 
function church_event_post_type() {
	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'rewrite' => array("slug" => "events"), // Permalinks format
			'menu_icon' => WP_CONTENT_URL . '/plugins/church-post-types/img/cal.gif',  // Icon Path
			'menu_position' => '5'
		)
	);
}
 
add_action( 'init', 'church_event_post_type' );

// Change the "Scheduled for" text on Event post types changing the translation
// http://blog.ftwr.co.uk/archives/2010/01/02/mangling-strings-for-fun-and-profit/

function church_translation_mangler($translation, $text, $domain) {
        global $post;
	if ($post->post_type == 'event') {
 
		$translations = &get_translations_for_domain( $domain);
		if ( $text == 'Scheduled for: <b>%1$s</b>') {
			return $translations->translate( 'Event Date: <b>%1$s</b>' );
		}
		if ( $text == 'Published on: <b>%1$s</b>') {
			return $translations->translate( 'Event Date: <b>%1$s</b>' );
		}
		if ( $text == 'Publish <b>immediately</b>') {
			return $translations->translate( 'Event Date: <b>%1$s</b>' );
		}
	}
 
	return $translation;
}
 
add_filter('gettext', 'church_translation_mangler', 10, 4);

// Show Scheduled Posts
 
function devinsays_show_scheduled_posts($posts) {
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0) {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}

add_filter('the_posts', 'devinsays_show_scheduled_posts');
?>
