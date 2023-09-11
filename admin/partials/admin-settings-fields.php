<?php
if (!defined('ABSPATH')) exit;
// ============================
// content section 
// ============================
add_settings_section(
    'team_member_showcase_content_section',
    'Content Settings',
    '',
    'team-member-showcase-settings'
);

add_settings_field(
    'tms_columns',
    __('Columns', 'team-members-showcase'),
    'columns_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);
add_settings_field(
    'tms_member_box_shadow',
    __('Show Member Box Shadow', 'team-members-showcase'),
    'tms_member_box_shadow_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);
add_settings_field(
    'tms_member_image_height',
    __('Member Image Height', 'team-members-showcase'),
    'member_image_height_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);
add_settings_field(
    'tms_name_font_size',
    __('Name Font Size', 'team-members-showcase'),
    'name_font_size_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);
add_settings_field(
    'tms_designation_font_size',
    __('Designation Font Size', 'team-members-showcase'),
    'designation_font_size_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);
add_settings_field(
    'tms_description_font_size',
    __('Description Font Size', 'team-members-showcase'),
    'description_font_size_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);
add_settings_field(
    'tms_social_profile_icon_size',
    __('Social Profile Icon Size', 'team-members-showcase'),
    'social_profile_icon_size_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_content_section'
);

register_setting('team-member-showcase-settings', 'tms_columns');
register_setting('team-member-showcase-settings', 'tms_member_box_shadow');
register_setting('team-member-showcase-settings', 'tms_member_image_height');
register_setting('team-member-showcase-settings', 'tms_name_font_size');
register_setting('team-member-showcase-settings', 'tms_designation_font_size');
register_setting('team-member-showcase-settings', 'tms_description_font_size');
register_setting('team-member-showcase-settings', 'tms_social_profile_icon_size');

// ============================
// Style section 
// ============================
add_settings_section(
    'team_member_showcase_style_section',
    __('Style settings', 'team-members-showcase'),
    '',
    'team-member-showcase-settings'
);

add_settings_field(
    'tms_member_box_background_color',
    __('Member Box Background Color', 'team-members-showcase'),
    'member_box_background_color_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_style_section'
);

add_settings_field(
    'tms_member_name_color',
    __('Name Color', 'team-members-showcase'),
    'member_name_color_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_style_section'
);

add_settings_field(
    'tms_member_designation_color',
    __('Designation Color', 'team-members-showcase'),
    'member_designation_color_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_style_section'
);

add_settings_field(
    'tms_member_description_color',
    __('Description Color', 'team-members-showcase'),
    'member_description_color_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_style_section'
);

add_settings_field(
    'tms_social_icon_color',
    __('Social Profile Icon Color', 'team-members-showcase'),
    'social_icon_color_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_style_section'
);

add_settings_field(
    'tms_social_background_color',
    __('Social Profile Background Color', 'team-members-showcase'),
    'social_background_color_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_style_section'
);

register_setting('team-member-showcase-settings', 'tms_member_box_background_color');
register_setting('team-member-showcase-settings', 'tms_member_name_color');
register_setting('team-member-showcase-settings', 'tms_member_designation_color');
register_setting('team-member-showcase-settings', 'tms_member_description_color');
register_setting('team-member-showcase-settings', 'tms_social_icon_color');
register_setting('team-member-showcase-settings', 'tms_social_background_color');

// =========================
// Custom css section 
// =========================
add_settings_section(
    'team_member_showcase_custom_css_section',
    __('Custom css ettings', 'team-members-showcase'),
    '',
    'team-member-showcase-settings'
);

add_settings_field(
    'custom_css',
    __('Custom CSS', 'team-members-showcase'),
    'custom_css_field_callback',
    'team-member-showcase-settings',
    'team_member_showcase_custom_css_section'
);


register_setting('team-member-showcase-settings', 'custom_css');


// ===============================  Settings fields callback functions  ===============================

// ====================================
// content section settings fields callback
// ====================================
function columns_field_callback() {
    $selected_columns = get_option('tms_columns', '30%'); // Default value is 3
?>
    <select name="tms_columns" id="tms-columns-select">
        <option value="40%" <?php selected($selected_columns, '40%'); ?>><?php _e('2 Columns', 'team-members-showcase'); ?> </option>
        <option value="30%" <?php selected($selected_columns, '30%'); ?>><?php _e('3 Columns', 'team-members-showcase'); ?></option>
        <option value="20%" <?php selected($selected_columns, '20%'); ?>><?php _e('4 Columns', 'team-members-showcase'); ?></option>
        <option value="15%" <?php selected($selected_columns, '15%'); ?>><?php _e('5 Columns', 'team-members-showcase'); ?></option>
    </select>
<?php
}

function tms_member_box_shadow_field_callback() {
    $tms_member_box_shadow = get_option('tms_member_box_shadow');
    $checked = checked(1, $tms_member_box_shadow, false);
    echo "<input type='checkbox' name='tms_member_box_shadow' id='tms_member_box_shadow' value='1' {$checked} />";
}

function member_image_height_field_callback() {
    $member_image_height = get_option('tms_member_image_height', '200');
    echo "<input type='number' min='150' name='tms_member_image_height' value='$member_image_height' /> <span > px </span>";
}
function name_font_size_field_callback() {
    $name_font_size = get_option('tms_name_font_size', '20');
    echo "<input type='number' name='tms_name_font_size' value='$name_font_size' /> <span > px </span>";
}
function designation_font_size_field_callback() {
    $designation_font_size = get_option('tms_designation_font_size', '16');
    echo "<input type='number' name='tms_designation_font_size' value='$designation_font_size' />  <span > px </span>";
}
function description_font_size_field_callback() {
    $description_font_size = get_option('tms_description_font_size', '15');
    echo "<input type='number' name='tms_description_font_size' value='$description_font_size' />  <span > px </span>";
}
function social_profile_icon_size_field_callback() {
    $social_profile_icon_size = get_option('tms_social_profile_icon_size', '20');
    echo "<input type='number' name='tms_social_profile_icon_size' value='$social_profile_icon_size' />  <span > px </span>";
}

// ====================================
// style section settings fields  callback
// ====================================
function member_box_background_color_field_callback() {
    $box_background_color = get_option('tms_member_box_background_color', '#ffffff');
    echo "<input type='text' class='smart-color-picker' name='tms_member_box_background_color'value='$box_background_color' />";
}

function member_name_color_field_callback() {
    $name_color = get_option('tms_member_name_color');
    echo "<input type='text'  class='smart-color-picker' name='tms_member_name_color' value='$name_color' />";
}

function member_designation_color_field_callback() {
    $designation_color = get_option('tms_member_designation_color');
    echo "<input type='text'  class='smart-color-picker'  name='tms_member_designation_color' value='$designation_color' />";
}

function member_description_color_field_callback() {
    $description_color = get_option('tms_member_description_color');
    echo "<input type='text'  class='smart-color-picker'  name='tms_member_description_color' value='$description_color' />";
}

function social_icon_color_field_callback() {
    $icon_color = get_option('tms_social_icon_color');
    echo "<input type='text'  class='smart-color-picker'  name='tms_social_icon_color' value='$icon_color' />";
}

function social_background_color_field_callback() {
    $bg_color = get_option('tms_social_background_color');
    echo "<input type='text'  class='smart-color-picker'  name='tms_social_background_color' value='$bg_color' />";
}


// ====================================
// custom css section settings fields  callback
// ====================================
function custom_css_field_callback() {
    $custom_css = get_option('custom_css');
    echo "<textarea name='custom_css' id='custom_css_area' rows='10' cols='50'>$custom_css</textarea>";
?>
    <p><?php _e('Enter your custom css without ', 'text-domain'); ?> <strong>&lt;style&gt; &lt;/style&gt; </strong> <?php _e('tag. ', 'text-domain'); ?></p>
    <p><?php _e('Click "Save Changes" to see the effect of your custom css.', 'text-domain'); ?></p>
<?php
}
