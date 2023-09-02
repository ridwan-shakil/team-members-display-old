<?php
if (!defined('ABSPATH')) exit;
// Handlin Ajax callback 
$social_icons = array(
    'fa fa-facebook' => 'Facebook',
    'fa fa-twitter' => 'Twitter',
    'fa fa-instagram' => 'Instagram',
    'fa fa-linkedin' => 'LinkedIn',
    'fa fa-pinterest' => 'Pinterest',
    'fa fa-youtube' => 'YouTube',
    // 'fa fa-vimeo' => 'Vimeo',
    'fa fa-tumblr' => 'Tumblr',
    'fa fa-flickr' => 'Flickr',
    'fa fa-github' => 'GitHub',
    'fa fa-bitbucket' => 'Bitbucket',
    'fa fa-gitlab' => 'GitLab',
    'fa fa-behance' => 'Behance',
    'fa fa-dribbble' => 'Dribbble',
    'fa fa-skype' => 'Skype',
    'fa fa-whatsapp' => 'WhatsApp',
    'fa fa-telegram' => 'Telegram',
    'fa fa-slack' => 'Slack',
    'fa fa-tiktok' => 'TikTok'
);
?>
<li class="single-team-member">
    <!-- Member image  -->
    <div class="image-area member-input">
        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../../images/Demo_member.jpg'); ?>" alt="">
        <input type="hidden" class="hidden-img" name="mb_img[]" value="<?php echo esc_url(plugin_dir_url(__FILE__) . '../../images/Demo_member.jpg'); ?>">
        <button class="select-image-button"><?php _e("Upload Image", 'tmshowcase') ?></button>
        <p> <?php _e("Upload an image by clicking the button", 'tmshowcase') ?> </p>
    </div>
    <!-- Member description -->
    <div class="description-area member-input">
        <span class="mb_label"><?php _e('Member Name', "tmshowcase"); ?></span>
        <input type="text" name="mb_name[]" value="" placeholder="Enter Member Name Here" class="rs_label_text" required>

        <span class="mb_label"><?php _e('Member Designation', "tmshowcase"); ?></span>
        <input type="text" name="mb_pos[]" value="" placeholder="Enter Member Designation Here" class="rs_label_text" required>

        <span class="mb_label"><?php _e('Member Small Description', "tmshowcase"); ?></span>
        <textarea name="mb_desc[]" placeholder="Enter Member Small Description Here" class="rs_label_text" required></textarea>
    </div>
    <!-- Social accounts -->
    <div class="socials-area member-input">
        <span class="mb_label"><?php _e('Add Member Socials', "tmshowcase"); ?></span>
        <div class="meta_fields">
            <div class="social-repeater">
                <!-- first social  -->
                <div class="social-row">
                    <select name="first_social_icon[]">
                        <?php
                        foreach ($social_icons as $icon => $label) {

                            echo '<option value="' . esc_attr($icon) . '" >' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="first_social_link[]" value="" placeholder="Social Link">
                </div>
                <!-- second social  -->
                <div class="social-row">
                    <select name="second_social_icon[]">
                        <?php
                        foreach ($social_icons as $icon => $label) {

                            echo '<option value="' . esc_attr($icon) . '" >' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="second_social_link[]" value="" placeholder="Social Link">
                </div>
                <!-- third social  -->
                <div class="social-row">
                    <select name="third_social_icon[]">
                        <?php
                        foreach ($social_icons as $icon => $label) {

                            echo '<option value="' . esc_attr($icon) . '" >' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="third_social_link[]" value="" placeholder="Social Link">
                </div>
                <!-- fourth social  -->
                <div class="social-row">
                    <select name="fourth_social_icon[]">
                        <?php
                        foreach ($social_icons as $icon => $label) {

                            echo '<option value="' . esc_attr($icon) . '" >' . esc_html($label) . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="fourth_social_link[]" value="" placeholder="Social Link">
                </div>

            </div>
        </div>
    </div>
    <div class="delete-current-member"><span class="dashicons dashicons-trash delete_single"></span></div>
</li>

<?php

die();