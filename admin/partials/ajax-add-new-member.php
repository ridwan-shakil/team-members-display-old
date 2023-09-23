<?php
/**
 * Thes page adds a new member on ajax calls .
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Handlin Ajax callback.
$social_icons = array(
	'fa fa-facebook'  => 'Facebook',
	'fa fa-twitter'   => 'Twitter',
	'fa fa-instagram' => 'Instagram',
	'fa fa-linkedin'  => 'LinkedIn',
	'fa fa-pinterest' => 'Pinterest',
	'fa fa-youtube'   => 'YouTube',
	'fa fa-tumblr'    => 'Tumblr',
	'fa fa-flickr'    => 'Flickr',
	'fa fa-github'    => 'GitHub',
	'fa fa-gitlab'    => 'GitLab',
	'fa fa-bitbucket' => 'Bitbucket',
	'fa fa-behance'   => 'Behance',
	'fa fa-dribbble'  => 'Dribbble',
	'fa fa-skype'     => 'Skype',
	'fa fa-whatsapp'  => 'WhatsApp',
	'fa fa-telegram'  => 'Telegram',
	'fa fa-slack'     => 'Slack',
);
?>

<li class="single-team-member">
	<!-- Member image  -->
	<div class="image-area member-input">
		<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../../images/Demo_member.jpg' ); ?>" alt="">
		<input type="hidden" class="hidden-img" name="mb_img[]" value="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../../images/Demo_member.jpg' ); ?>">
		<button class="select-image-button"><?php esc_html_e( 'Upload Image', 'tmdisplay' ); ?></button>
		<p> <?php esc_html_e( 'Please upload a square-cropped image', 'team-members-display' ); ?> </p>
	</div>
	<!-- Member description -->
	<div class="description-area member-input">
		<span class="mb_label"><?php esc_html_e( 'Member Name', 'team-members-display' ); ?></span>
		<input type="text" name="mb_name[]" value="" class="rs_label_text" required>

		<span class="mb_label"><?php esc_html_e( 'Member Designation', 'team-members-display' ); ?></span>
		<input type="text" name="mb_pos[]" value="" class="rs_label_text" required>

		<span class="mb_label"><?php esc_html_e( 'Member Small Description', 'team-members-display' ); ?></span>
		<textarea name="mb_desc[]" class="rs_label_text" required></textarea>
	</div>
	<!-- Social accounts -->
	<div class="socials-area member-input">
		<span class="mb_label"><?php esc_html_e( 'Add Member Socials', 'team-members-display' ); ?></span>
		<div class="meta_fields">
			<div class="social-repeater">
				<!-- first social  -->
				<div class="social-row">
					<select name="first_social_icon[]">
						<?php
						foreach ( $social_icons as $icon => $label ) {
							echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
						}
						?>
					</select>
					<input type="url" name="first_social_link[]" value="" placeholder=" <?php esc_html_e( 'Social Link', 'team-members-display' ); ?>">
				</div>
				<!-- Second social  -->
				<div class="social-row">
					<select name="second_social_icon[]">
						<?php
						foreach ( $social_icons as $icon => $label ) {
							echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
						}
						?>
					</select>
					<input type="url" name="second_social_link[]" value="" placeholder=" <?php esc_html_e( 'Social Link', 'team-members-display' ); ?>">
				</div>
				<!-- Third social  -->
				<div class="social-row">
					<select name="third_social_icon[]">
						<?php
						foreach ( $social_icons as $icon => $label ) {
							echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
						}
						?>
					</select>
					<input type="url" name="third_social_link[]" value="" placeholder=" <?php esc_html_e( 'Social Link', 'team-members-display' ); ?>">
				</div>
				<!-- Fourth social  -->
				<div class="social-row">
					<select name="fourth_social_icon[]">
						<?php
						foreach ( $social_icons as $icon => $label ) {
							echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
						}
						?>
					</select>
					<input type="url" name="fourth_social_link[]" value="" placeholder=" <?php esc_html_e( 'Social Link', 'team-members-display' ); ?>">
				</div>

				<div class="delete-current-member"><span class="dashicons dashicons-trash delete_single"></span></div>
			</div>
		</div>
	</div>
</li>

<?php

die();
