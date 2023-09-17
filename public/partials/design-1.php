<?php
/**
 * This file has the html of team members that will be loaded inside shortcode
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/public/partials
 */

// require css those has been added from plugin settings page.
require TEAM_PLUGIN_DIR_PATH . 'public/partials/settings-css.php';

echo '<div class="rs-all-team-members " >';
// Loop through each member and display their information.
foreach ( $member_data as $member ) {

	// Output HTML to display member details.
	echo '<div class="rs-single-team-member">';
	echo '<div class="member-img"> <img src="' . esc_url( $member['image'] ) . '" class="tm-s-image" alt="' . esc_attr( $member['name'] ) . '"> </div>';
	echo '<div class="member-info">';
	echo '<h3 class="tm-s-name">' . esc_html( $member['name'] ) . '</h3>';
	echo '<p class="tm-s-position">' . esc_html( $member['position'] ) . '</p>';
	echo '<p class="tm-s-description">' . esc_html( $member['description'] ) . '</p>';
	echo '</div>'; // end of member info.

	// Output social links.
	echo '<div class="social-links">';
	for ( $i = 1; $i <= 4; $i++ ) {
		$social_icon_key = 'social_icon_' . $i;
		$social_link_key = 'social_link_' . $i;

		if ( ! empty( $member[ $social_icon_key ] ) && ! empty( $member[ $social_link_key ] ) ) {
			echo '<a href="' . esc_url( $member[ $social_link_key ] ) . '" class="tm-s-social">';
			echo '<i class="' . esc_attr( $member[ $social_icon_key ] ) . '"></i>';
			echo '</a>';
		}
	}
	echo '</div>'; // end of social.
	echo '</div>'; // end of single member.
}
echo '</div>';
