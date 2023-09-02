<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Showcase
 * @subpackage Team_Members_Showcase/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
if (!defined('ABSPATH')) exit;

add_shortcode('TEAM_MEMBERS', function ($atts) {
    $atts = shortcode_atts(array(
        'id' => null, // Default value, allows specifying a specific post ID
    ), $atts, 'TEAM_MEMBERS');

    // If a specific post ID is not provided, use the current post ID
    $post_id = $atts['id'] ? $atts['id'] : get_the_ID();

    // Retrieve the saved member data from post meta
    $member_data = get_post_meta($post_id, 'rs_team_member_showcase_data', true);

    // Check if there is any member data
    if ($member_data && is_array($member_data)) {
        ob_start(); // Start output buffering


        require('design-1.php');


        $output = ob_get_clean(); // Get the buffered output and clear buffer
        return $output; // Return the generated HTML
    }

    return ''; // Return empty string if no member data found
});