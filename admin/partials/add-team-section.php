<?php
/**
 * The admin-specific functionality of the plugin.
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




$team_members = wp_cache_get( 'cached-tm-' . $post->ID, 'team_members_display' );

if ( false === $team_members ) {

	$team_members = get_post_meta( $post->ID, 'rs_team_member_display_data', true );
	wp_cache_set( 'cached-tm-' . $post->ID, $team_members, 'team_members_display' );
}



// Creating nonce.
wp_nonce_field( 'save_team_display_nonce', 'team_display_nonce' );

?>



<h2 class="team-members-heading"><?php esc_html_e( 'Add new members here :', 'team-members-display' ); ?></h2>
<!-- Team members toolbar  -->
<div class="tm-s-toolbar">
	<a class="tm-s-button tm-s-expand-rows" href="#"><span class="dashicons dashicons-editor-expand"></span>
		<?php esc_html_e( 'Expand all', 'team-members-display' ); ?></a>
	<a class="tm-s-button tm-s-collapse-rows" href="#"><span class="dashicons dashicons-editor-contract"></span>
		<?php esc_html_e( 'Collaps all', 'team-members-display' ); ?></a>
</div>
<!-- Show all Team members  -->
<ul id="all-team-members" class="sortable-team-members">
	<!-- Show team members if exists  -->
	<?php
	if ( $team_members ) {
		foreach ( $team_members as $member ) {
			$img         = $member['image'];
			$name        = $member['name'];
			$position    = $member['position'];
			$description = $member['description'];

			$first_social_icon  = $member['social_icon_1'];
			$first_social_link  = $member['social_link_1'];
			$second_social_icon = $member['social_icon_2'];
			$second_social_link = $member['social_link_2'];
			$third_social_icon  = $member['social_icon_3'];
			$third_social_link  = $member['social_link_3'];
			$fourth_social_icon = $member['social_icon_4'];
			$fourth_social_link = $member['social_link_4'];
			?>

			<li class="single-team-member drag-handle">
				<!-- Member image  -->
				<div class="image-area member-input">
					<img src="<?php echo esc_url( $img ); ?>" alt="">
					<input type="hidden" class="hidden-img" name="mb_img[]" value="<?php echo esc_url( $img ); ?>">
					<button class="select-image-button"><?php esc_html_e( 'Upload Image', 'team-members-display' ); ?></button>
					<p> <?php esc_html_e( 'Please upload a square-cropped image', 'team-members-display' ); ?> </p>
				</div>
				<!-- Member description -->
				<div class="description-area member-input">
					<span class="mb_label"><?php esc_html_e( 'Member Name', 'team-members-display' ); ?></span>
					<input type="text" name="mb_name[]" value="<?php echo esc_html( $name ); ?>" placeholder="Enter Member Name Here" class="rs_label_text" required>

					<span class="mb_label"><?php esc_html_e( 'Member Designation', 'team-members-display' ); ?></span>
					<input type="text" name="mb_pos[]" value="<?php echo esc_html( $position ); ?>" placeholder="Enter Member Designation Title Here" class="rs_label_text" required>

					<span class="mb_label"><?php esc_html_e( 'Member Small Description', 'team-members-display' ); ?></span>
					<textarea name="mb_desc[]" placeholder="Enter Member Small Description Here" class="rs_label_text" required><?php echo esc_textarea( $description ); ?></textarea>
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
										$selected = $icon === $first_social_icon ? ' selected="selected"' : '';
										echo '<option value="' . esc_attr( $icon ) . '" ' . esc_attr( $selected ) . ' >' . esc_html( $label ) . '</option>';
									}
									?>
								</select>
								<input type="url" name="first_social_link[]" value="<?php echo esc_url( $first_social_link ); ?>" placeholder="Social Link">
							</div>
							<!-- second social  -->
							<div class="social-row">
								<select name="second_social_icon[]">
									<?php
									foreach ( $social_icons as $icon => $label ) {
										$selected = $icon === $second_social_icon ? ' selected="selected"' : '';
										echo '<option value="' . esc_attr( $icon ) . '" ' . esc_attr( $selected ) . ' >' . esc_html( $label ) . '</option>';
									}
									?>
								</select>
								<input type="url" name="second_social_link[]" value="<?php echo esc_url( $second_social_link ); ?>" placeholder="Social Link">
							</div>
							<!-- third social  -->
							<div class="social-row">
								<select name="third_social_icon[]">
									<?php
									foreach ( $social_icons as $icon => $label ) {
										$selected = $icon === $third_social_icon ? ' selected="selected"' : '';
										echo '<option value="' . esc_attr( $icon ) . '" ' . esc_attr( $selected ) . ' >' . esc_html( $label ) . '</option>';
									}
									?>
								</select>
								<input type="url" name="third_social_link[]" value="<?php echo esc_url( $third_social_link ); ?>" placeholder="Social Link">
							</div>
							<!-- fourth social  -->
							<div class="social-row">
								<select name="fourth_social_icon[]">
									<?php
									foreach ( $social_icons as $icon => $label ) {
										$selected = $icon === $fourth_social_icon ? ' selected="selected"' : '';
										echo '<option value="' . esc_attr( $icon ) . '" ' . esc_attr( $selected ) . ' >' . esc_html( $label ) . '</option>';
									}
									?>
								</select>
								<input type="url" name="fourth_social_link[]" value="<?php echo esc_url( $fourth_social_link ); ?>" placeholder="Social Link">
							</div>
							
							<div class="delete-current-member"><span class="dashicons dashicons-trash delete_single"></span></div>
						</div>
					</div>


				</div>
			</li>
			<?php
		}
	} else {
		?>
		<!-- Show team member empty table if member does not exists  -->
		<li class="single-team-member">
			<!-- Member image  -->
			<div class="image-area member-input">
				<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../../images/Demo_member.jpg' ); ?>" alt="">
				<input type="hidden" class="hidden-img" name="mb_img[]" value="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../../images/Demo_member.jpg' ); ?>">
				<button class="select-image-button"><?php esc_html_e( 'Upload Image', 'team-members-display' ); ?></button>
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
							<input type="url" name="first_social_link[]" value="" placeholder="Social Link">
						</div>
						<!-- second social  -->
						<div class="social-row">
							<select name="second_social_icon[]">
								<?php
								foreach ( $social_icons as $icon => $label ) {

									echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
								}
								?>
							</select>
							<input type="url" name="second_social_link[]" value="" placeholder="Social Link">
						</div>
						<!-- third social  -->
						<div class="social-row">
							<select name="third_social_icon[]">
								<?php
								foreach ( $social_icons as $icon => $label ) {

									echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
								}
								?>
							</select>
							<input type="url" name="third_social_link[]" value="" placeholder="Social Link">
						</div>
						<!-- fourth social  -->
						<div class="social-row">
							<select name="fourth_social_icon[]">
								<?php
								foreach ( $social_icons as $icon => $label ) {

									echo '<option value="' . esc_attr( $icon ) . '" >' . esc_html( $label ) . '</option>';
								}
								?>
							</select>
							<input type="url" name="fourth_social_link[]" value="" placeholder="Social Link">
						</div>
						<div class="delete-current-member"><span class="dashicons dashicons-trash delete_single"></span></div>
						
					</div>
				</div>
			</div>
		</li>

		<?php
	}
	?>
	<!-- new members will be added here dynamically -->
</ul>
<!-- Add new member & Delete all members -->
<div class="controler-container">
	<!-- add new member button  -->
	<div class="add-member controler">
		<a href="#" id="add-new-member"> <?php esc_html_e( 'Add New Member', 'team-members-display' ); ?> </a>
	</div>
	<!-- delete all members button  -->
	<div class="delete-all-members controler">
		<a href="#" class="all-delete-btn">
			<span class="dashicons dashicons-trash Delete-all"></span>
			<?php esc_html_e( 'Delete All', 'team-members-display' ); ?>
		</a>
	</div>
</div>
<!-- Show shortcode  -->
<div class="tm-display-short-code controler">
	<span><?php esc_html_e( 'Use this short code to show this team : ', 'team-members-display' ); ?></span>
	<input type="text" readonly="readonly" value="<?php echo esc_attr( '[TEAM_MEMBERS id=' . get_the_ID() . ']' ); ?>" onclick="this.select()">
</div>
