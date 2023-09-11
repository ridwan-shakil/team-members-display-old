<?php
$input = get_option('tms_social_profile_icon_size');
$input = intval($input);
$icon_size = 16 + $input;
?>
<style>
    .rs-all-team-members {}

    .rs-single-team-member {
        background-color: <?php echo get_option('tms_member_box_background_color'); ?>;
        width: <?php echo get_option('tms_columns'); ?>;
        <?php if (get_option('tms_member_box_shadow')) {
            echo 'box-shadow: 5px 5px 20px 0px #606060; ';
        } ?>
    }

    img.tm-s-image {
        height: <?php echo get_option('tms_member_image_height') . 'px'; ?>;
    }

    h3.tm-s-name {
        color: <?php echo get_option('tms_member_name_color'); ?>;
        font-size: <?php echo get_option('tms_name_font_size') . 'px'; ?>;

    }

    p.tm-s-position {
        color: <?php echo get_option('tms_member_designation_color'); ?>;
        font-size: <?php echo get_option('tms_designation_font_size') . 'px'; ?>;


    }

    p.tm-s-description {
        color: <?php echo get_option('tms_member_description_color'); ?>;
        font-size: <?php echo get_option('tms_description_font_size') . 'px'; ?>;


    }

    a.tm-s-social {
        color: <?php echo get_option('tms_social_icon_color'); ?>;

    }

    .social-links a.tm-s-social i {
        background: <?php echo get_option('tms_social_background_color'); ?>;
        font-size: <?php echo get_option('tms_social_profile_icon_size') . 'px'; ?>;
        width: <?php echo $icon_size . 'px'; ?>;
        height: <?php echo $icon_size . 'px'; ?>;
        line-height: <?php echo $icon_size . 'px'; ?>;
    }
</style>