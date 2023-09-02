<?php
//This function does all the security checks befor saving post meta 
function is_secured($nonce_field, $nonce_action, $post_id) {
    $nonce = isset($_POST[$nonce_field]) ? $_POST[$nonce_field] : '';
    if ($nonce === '') {
        return false;
    }
    if (!wp_verify_nonce($nonce, $nonce_action)) {
        return false;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return false;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return false;
    }
    if (wp_is_post_revision($post_id)) {
        return false;
    }
    return true;
}

// if not secured, return 
if (!is_secured('team_showcase_nonce', 'save_team_showcase_nonce', $post_id)) {
    return $post_id;
}

// update data 
if (isset($_POST['mb_name']) && isset($_POST['mb_pos']) && isset($_POST['mb_desc'])) {
    // Sanitize and save member data
    $mb_img = array_map('sanitize_text_field', $_POST['mb_img']);
    $mb_names = array_map('sanitize_text_field', $_POST['mb_name']);
    $mb_positions = array_map('sanitize_text_field', $_POST['mb_pos']);
    $mb_descriptions = array_map('sanitize_text_field', $_POST['mb_desc']);

    $first_social_icon = array_map('sanitize_text_field', $_POST['first_social_icon']);
    $first_social_link = array_map('sanitize_text_field', $_POST['first_social_link']);

    $second_social_icon = array_map('sanitize_text_field', $_POST['second_social_icon']);
    $second_social_link = array_map('sanitize_text_field', $_POST['second_social_link']);

    $third_social_icon = array_map('sanitize_text_field', $_POST['third_social_icon']);
    $third_social_link = array_map('sanitize_text_field', $_POST['third_social_link']);

    $fourth_social_icon = array_map('sanitize_text_field', $_POST['fourth_social_icon']);
    $fourth_social_link = array_map('sanitize_text_field', $_POST['fourth_social_link']);

    $member_data = array();

    foreach ($mb_names as $index => $name) {
        $member_data[] = array(
            'image' => $mb_img[$index],
            'name' => $name,
            'position' => $mb_positions[$index],
            'description' => $mb_descriptions[$index],

            'social_icon_1' => $first_social_icon[$index],
            'social_link_1' => $first_social_link[$index],
            'social_icon_2' => $second_social_icon[$index],
            'social_link_2' => $second_social_link[$index],
            'social_icon_3' => $third_social_icon[$index],
            'social_link_3' => $third_social_link[$index],
            'social_icon_4' => $fourth_social_icon[$index],
            'social_link_4' => $fourth_social_link[$index],

        );
    }

    // Save sanitized member data to post meta
    update_post_meta($post_id, 'rs_team_member_showcase_data', $member_data);

    $tostal_members = count($mb_names);
    update_post_meta($post_id, 'rs_total_members', $tostal_members);
} else {
    delete_post_meta($post_id, 'rs_team_member_showcase_data');
}
