<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Display
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
// ==================
// Clear database
// ==================
// Deleteing CPT ( posts, post_meta , tags , comments )
$teams = get_posts(
	array(
		'post_type'   => 'team_member_display',
		'numberposts' => -1,
		'post_status' => array( 'publish', 'draft', 'auto-draft', 'trash' ),
	)
);

foreach ( $teams as $team ) {
	wp_delete_post( $team->ID, true );
}

// Deleting settings options.
delete_option( 'tms_columns' );
delete_option( 'tms_member_box_shadow' );
delete_option( 'tms_member_image_height' );
delete_option( 'tms_name_font_size' );
delete_option( 'tms_designation_font_size' );
delete_option( 'tms_description_font_size' );
delete_option( 'tms_social_profile_icon_size' );
delete_option( 'tms_member_box_background_color' );
delete_option( 'tms_member_name_color' );
delete_option( 'tms_member_designation_color' );
delete_option( 'tms_member_description_color' );
delete_option( 'tms_social_icon_color' );
delete_option( 'tms_social_background_color' );
delete_option( 'custom_css' );
