<?php
/**
 * This file does all the security checks and saves the post meta
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/admin/data-save
 */

if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	return false;
}
if ( ! current_user_can( 'edit_post', $post_id ) ) {
	return false;
}
if ( wp_is_post_revision( $post_id ) ) {
	return false;
}

/*
* The code is checking the validity of a nonce (number used once) value that is passed through the POST request.
*/
if ( ! isset( $_POST['team_display_nonce'] ) ) {
	return false;
} else {
	$nonce = sanitize_text_field( wp_unslash( $_POST['team_display_nonce'] ) );
	if ( ! wp_verify_nonce( $nonce, 'save_team_display_nonce' ) ) {
		return false;
	}
}
/**
 * If condition is true then saves the data into post meta else deletes it.
 */
if ( isset( $_POST['mb_name'] ) && isset( $_POST['mb_pos'] ) && isset( $_POST['mb_desc'] ) ) {
	// Unslash the incoming data then sanitze the data.
	$mb_img          = array_map( 'sanitize_text_field', wp_unslash( $_POST['mb_img'] ) );
	$mb_names        = array_map( 'sanitize_text_field', wp_unslash( $_POST['mb_name'] ) );
	$mb_positions    = array_map( 'sanitize_text_field', wp_unslash( $_POST['mb_pos'] ) );
	$mb_descriptions = array_map( 'sanitize_text_field', wp_unslash( $_POST['mb_desc'] ) );

	// Define an array to store the sanitized social icons and links.
	$social_icons = array();
	$social_links = array();

	// Define an array of field names.
	$field_names = array(
		'first_social_icon',
		'first_social_link',
		'second_social_icon',
		'second_social_link',
		'third_social_icon',
		'third_social_link',
		'fourth_social_icon',
		'fourth_social_link',
	);

	// Loop through the field names and sanitize the values if they exist in $_POST.
	foreach ( $field_names as $field_name ) {
		if ( isset( $_POST[ $field_name ] ) ) {
			${$field_name} = array_map( 'sanitize_text_field', wp_unslash( $_POST[ $field_name ] ) );
		} else {
			${$field_name} = array();
		}
	}
	// Now we have all social_icons & social_links  in sanitized format.

	$member_data = array();

	foreach ( $mb_names as $index => $name ) {
		$member_data[] = array(
			'image'         => $mb_img[ $index ],
			'name'          => $name,
			'position'      => $mb_positions[ $index ],
			'description'   => $mb_descriptions[ $index ],

			'social_icon_1' => $first_social_icon[ $index ],
			'social_link_1' => $first_social_link[ $index ],
			'social_icon_2' => $second_social_icon[ $index ],
			'social_link_2' => $second_social_link[ $index ],
			'social_icon_3' => $third_social_icon[ $index ],
			'social_link_3' => $third_social_link[ $index ],
			'social_icon_4' => $fourth_social_icon[ $index ],
			'social_link_4' => $fourth_social_link[ $index ],

		);
	}

	// Save sanitized member data to post meta.
	update_post_meta( $post_id, 'rs_team_member_display_data', $member_data );
	wp_cache_delete( 'cached-tm-' . $post_id, 'team_members_display' );
	// Save the number of members in the team.
	$tostal_members = count( $mb_names );
	update_post_meta( $post_id, 'rs_total_members', $tostal_members );
	wp_cache_delete( 'cached-total-members-' . $post_id, 'team_members_display' );
} else {
	delete_post_meta( $post_id, 'rs_team_member_display_data' );
}
