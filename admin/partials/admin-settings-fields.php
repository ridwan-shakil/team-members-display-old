<?php
/**
 * Thes page registers all settings fields for settings page of that plugin.
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

/**
 * Content section
 */
add_settings_section(
	'team_member_display_content_section',
	'Content Settings',
	'',
	'team-member-display-settings'
);

add_settings_field(
	'tms_columns',
	__( 'Columns', 'team-members-display' ),
	'columns_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);
add_settings_field(
	'tms_member_box_shadow',
	__( 'Show Member Box Shadow', 'team-members-display' ),
	'tms_member_box_shadow_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);
add_settings_field(
	'tms_member_image_height',
	__( 'Member Image Height', 'team-members-display' ),
	'member_image_height_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);
add_settings_field(
	'tms_name_font_size',
	__( 'Name Font Size', 'team-members-display' ),
	'name_font_size_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);
add_settings_field(
	'tms_designation_font_size',
	__( 'Designation Font Size', 'team-members-display' ),
	'designation_font_size_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);
add_settings_field(
	'tms_description_font_size',
	__( 'Description Font Size', 'team-members-display' ),
	'description_font_size_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);
add_settings_field(
	'tms_social_profile_icon_size',
	__( 'Social Profile Icon Size', 'team-members-display' ),
	'social_profile_icon_size_field_callback',
	'team-member-display-settings',
	'team_member_display_content_section'
);

register_setting( 'team-member-display-settings', 'tms_columns' );
register_setting( 'team-member-display-settings', 'tms_member_box_shadow' );
register_setting( 'team-member-display-settings', 'tms_member_image_height' );
register_setting( 'team-member-display-settings', 'tms_name_font_size' );
register_setting( 'team-member-display-settings', 'tms_designation_font_size' );
register_setting( 'team-member-display-settings', 'tms_description_font_size' );
register_setting( 'team-member-display-settings', 'tms_social_profile_icon_size' );

/**
 * Style section
 */
add_settings_section(
	'team_member_display_style_section',
	__( 'Style settings', 'team-members-display' ),
	'',
	'team-member-display-settings'
);

add_settings_field(
	'tms_member_box_background_color',
	__( 'Member Box Background Color', 'team-members-display' ),
	'member_box_background_color_field_callback',
	'team-member-display-settings',
	'team_member_display_style_section'
);

add_settings_field(
	'tms_member_name_color',
	__( 'Name Color', 'team-members-display' ),
	'member_name_color_field_callback',
	'team-member-display-settings',
	'team_member_display_style_section'
);

add_settings_field(
	'tms_member_designation_color',
	__( 'Designation Color', 'team-members-display' ),
	'member_designation_color_field_callback',
	'team-member-display-settings',
	'team_member_display_style_section'
);

add_settings_field(
	'tms_member_description_color',
	__( 'Description Color', 'team-members-display' ),
	'member_description_color_field_callback',
	'team-member-display-settings',
	'team_member_display_style_section'
);

add_settings_field(
	'tms_social_icon_color',
	__( 'Social Profile Icon Color', 'team-members-display' ),
	'social_icon_color_field_callback',
	'team-member-display-settings',
	'team_member_display_style_section'
);

add_settings_field(
	'tms_social_background_color',
	__( 'Social Profile Background Color', 'team-members-display' ),
	'social_background_color_field_callback',
	'team-member-display-settings',
	'team_member_display_style_section'
);

register_setting( 'team-member-display-settings', 'tms_member_box_background_color' );
register_setting( 'team-member-display-settings', 'tms_member_name_color' );
register_setting( 'team-member-display-settings', 'tms_member_designation_color' );
register_setting( 'team-member-display-settings', 'tms_member_description_color' );
register_setting( 'team-member-display-settings', 'tms_social_icon_color' );
register_setting( 'team-member-display-settings', 'tms_social_background_color' );

/**
 * Custom CSS section
 */
add_settings_section(
	'team_member_display_custom_css_section',
	__( 'Custom css ettings', 'team-members-display' ),
	'',
	'team-member-display-settings'
);

add_settings_field(
	'custom_css',
	__( 'Custom CSS', 'team-members-display' ),
	'custom_css_field_callback',
	'team-member-display-settings',
	'team_member_display_custom_css_section'
);

register_setting( 'team-member-display-settings', 'custom_css' );

/**
 * ===============================
 * Settings fields callback functions
 * ===============================
 */

/**
 * Content section settings fields callback
 * this section alows the user to change the sizing of the contents
 */
function columns_field_callback() {
	$selected_columns = esc_attr( get_option( 'tms_columns', '30%' ) );
	?>
	<select name="tms_columns" id="tms-columns-select">
		<option value="40%" <?php selected( $selected_columns, '40%' ); ?>><?php esc_html_e( '2 Columns', 'team-members-display' ); ?></option>
		<option value="30%" <?php selected( $selected_columns, '30%' ); ?>><?php esc_html_e( '3 Columns', 'team-members-display' ); ?></option>
		<option value="20%" <?php selected( $selected_columns, '20%' ); ?>><?php esc_html_e( '4 Columns', 'team-members-display' ); ?></option>
		<option value="15%" <?php selected( $selected_columns, '15%' ); ?>><?php esc_html_e( '5 Columns', 'team-members-display' ); ?></option>
	</select>
	<?php
}

function tms_member_box_shadow_field_callback() {
	$tms_member_box_shadow = get_option( 'tms_member_box_shadow', 1 );
	$checked               = checked( 1, $tms_member_box_shadow, false );
	echo "<input type='checkbox' name='tms_member_box_shadow' id='tms_member_box_shadow' value='1' " . esc_attr( $checked ) . ' />';
}

function member_image_height_field_callback() {
	$member_image_height = get_option( 'tms_member_image_height', '200' );
	echo "<input type='number' min='150' name='tms_member_image_height' value='" . esc_attr( $member_image_height ) . "' /> <span > px </span>";
}

function name_font_size_field_callback() {
	$name_font_size = get_option( 'tms_name_font_size', '20' );
	echo "<input type='number' name='tms_name_font_size' value='" . esc_attr( $name_font_size ) . "' /> <span > px </span>";
}

function designation_font_size_field_callback() {
	$designation_font_size = get_option( 'tms_designation_font_size', '16' );
	echo "<input type='number' name='tms_designation_font_size' value='" . esc_attr( $designation_font_size ) . "' />  <span > px </span>";
}

function description_font_size_field_callback() {
	$description_font_size = get_option( 'tms_description_font_size', '15' );
	echo "<input type='number' name='tms_description_font_size' value='" . esc_attr( $description_font_size ) . "' />  <span > px </span>";
}

function social_profile_icon_size_field_callback() {
	$social_profile_icon_size = get_option( 'tms_social_profile_icon_size', '20' );
	echo "<input type='number' name='tms_social_profile_icon_size' value='" . esc_attr( $social_profile_icon_size ) . "' />  <span > px </span>";
}

/**
 * Style section settings fields  callback
 * this section allow the user to change the styling of team members
 */
function member_box_background_color_field_callback() {
	$box_background_color = get_option( 'tms_member_box_background_color', '#ffffff' );
	echo "<input type='text' class='smart-color-picker' name='tms_member_box_background_color' value='" . esc_attr( $box_background_color ) . "' />";
}

function member_name_color_field_callback() {
	$name_color = get_option( 'tms_member_name_color' );
	echo "<input type='text' class='smart-color-picker' name='tms_member_name_color' value='" . esc_attr( $name_color ) . "' />";
}

function member_designation_color_field_callback() {
	$designation_color = get_option( 'tms_member_designation_color' );
	echo "<input type='text' class='smart-color-picker' name='tms_member_designation_color' value='" . esc_attr( $designation_color ) . "' />";
}

function member_description_color_field_callback() {
	$description_color = get_option( 'tms_member_description_color' );
	echo "<input type='text' class='smart-color-picker' name='tms_member_description_color' value='" . esc_attr( $description_color ) . "' />";
}

function social_icon_color_field_callback() {
	$icon_color = get_option( 'tms_social_icon_color' );
	echo "<input type='text' class='smart-color-picker' name='tms_social_icon_color' value='" . esc_attr( $icon_color ) . "' />";
}

function social_background_color_field_callback() {
	$bg_color = get_option( 'tms_social_background_color' );
	echo "<input type='text' class='smart-color-picker' name='tms_social_background_color' value='" . esc_attr( $bg_color ) . "' />";
}

/**
 * Custom css section settings fields  callback function
 * it Shows a textarea section to take users custom css .
 */
function custom_css_field_callback() {
	$custom_css = get_option( 'custom_css' );
	?>
	<textarea name='custom_css' id='custom_css_area' rows='10' cols='50'> <?php echo esc_textarea( $custom_css ); ?></textarea>
	<p><?php esc_html_e( 'Enter your custom css without ', 'team-members-display' ); ?> <strong>&lt;style&gt; &lt;/style&gt; </strong> <?php esc_html_e( 'tag. ', 'team-members-display' ); ?></p>
	<p><?php esc_html_e( 'Click "Save Changes" to see the effect of your custom css.', 'team-members-display' ); ?></p>
	<?php
}
