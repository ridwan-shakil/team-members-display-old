<?php
if (!defined('ABSPATH')) exit;

$social_icons = array(
    'fa fa-facebook' => 'Facebook',
    'fa fa-twitter' => 'Twitter',
    'fa fa-instagram' => 'Instagram',
    'fa fa-linkedin' => 'LinkedIn',
    'fa fa-pinterest' => 'Pinterest',
    'fa fa-youtube' => 'YouTube',
    'fa fa-vimeo' => 'Vimeo',
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

// $Team_members = unserialize(get_post_meta($post->ID, 'rs_team_member_showcase_data', true));
$Team_members = get_post_meta($post->ID, 'rs_team_member_showcase_data', true);


// Creating nonce 
wp_nonce_field('save_team_showcase_nonce', 'team_showcase_nonce');

?>



<h2 class="team-members-heading"><?php _e("Add new members here :", 'test-domain') ?></h2>
<!-- Team members toolbar  -->
<div class="tm-s-toolbar">
    <a class="tm-s-button tm-s-expand-rows" href="#"><span class="dashicons dashicons-editor-expand"></span>
        <?php _e('Expand all', 'tmshowcase') ?></a>
    <a class="tm-s-button tm-s-collapse-rows" href="#"><span class="dashicons dashicons-editor-contract"></span>
        <?php _e('Collaps all', 'tmshowcase') ?></a>
</div>
<!-- Show all Team members  -->
<ul id="all-team-members" class="sortable-team-members">
    <!-- Show team members if exists  -->
    <?php
    if ($Team_members) {
        foreach ($Team_members as $member) {
            $img = $member['image'];
            $name = $member['name'];
            $position = $member['position'];
            $description = $member['description'];

            $first_social_icon = $member['social_icon_1'];
            $first_social_link = $member['social_link_1'];
            $second_social_icon = $member['social_icon_2'];
            $second_social_link = $member['social_link_2'];
            $third_social_icon = $member['social_icon_3'];
            $third_social_link = $member['social_link_3'];
            $fourth_social_icon = $member['social_icon_4'];
            $fourth_social_link = $member['social_link_4'];
    ?>

            <li class="single-team-member drag-handle">
                <!-- Member image  -->
                <div class="image-area member-input">
                    <img src="<?php echo $img; ?>" alt="">
                    <input type="hidden" class="hidden-img" name="mb_img[]" value="<?php echo $img; ?>">
                    <button class="select-image-button"><?php _e("Upload Image", 'tmshowcase') ?></button>
                    <p> <?php _e("Upload an image by clicking the button", 'tmshowcase') ?> </p>
                </div>
                <!-- Member description -->
                <div class="description-area member-input">
                    <span class="mb_label"><?php _e('Member Name', "tmshowcase"); ?></span>
                    <input type="text" name="mb_name[]" value="<?php echo $name; ?>" placeholder="Enter Member Name Here" class="rs_label_text" required>

                    <span class="mb_label"><?php _e('Member Designation', "tmshowcase"); ?></span>
                    <input type="text" name="mb_pos[]" value="<?php echo $position; ?>" placeholder="Enter Member Designation Title Here" class="rs_label_text" required>

                    <span class="mb_label"><?php _e('Member Small Description', "tmshowcase"); ?></span>
                    <textarea name="mb_desc[]" placeholder="Enter Member Small Description Here" class="rs_label_text" required><?php echo $description; ?></textarea>
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
                                        $selected = $icon == $first_social_icon ? ' selected="selected"' : '';
                                        echo '<option value="' . esc_attr($icon) . '" ' . $selected . ' >' . esc_html($label) . '</option>';
                                    }
                                    ?>
                                </select>
                                <input type="text" name="first_social_link[]" value="<?php echo $first_social_link; ?>" placeholder="Social Link">
                            </div>
                            <!-- second social  -->
                            <div class="social-row">
                                <select name="second_social_icon[]">
                                    <?php
                                    foreach ($social_icons as $icon => $label) {
                                        $selected = $icon == $second_social_icon ? ' selected="selected"' : '';
                                        echo '<option value="' . esc_attr($icon) . '" ' . $selected . ' >' . esc_html($label) . '</option>';
                                    }
                                    ?>
                                </select>
                                <input type="text" name="second_social_link[]" value="<?php echo $second_social_link; ?>" placeholder="Social Link">
                            </div>
                            <!-- third social  -->
                            <div class="social-row">
                                <select name="third_social_icon[]">
                                    <?php
                                    foreach ($social_icons as $icon => $label) {
                                        $selected = $icon == $third_social_icon ? ' selected="selected"' : '';
                                        echo '<option value="' . esc_attr($icon) . '" ' . $selected . ' >' . esc_html($label) . '</option>';
                                    }
                                    ?>
                                </select>
                                <input type="text" name="third_social_link[]" value="<?php echo $third_social_link; ?>" placeholder="Social Link">
                            </div>
                            <!-- fourth social  -->
                            <div class="social-row">
                                <select name="fourth_social_icon[]">
                                    <?php
                                    foreach ($social_icons as $icon => $label) {
                                        $selected = $icon == $fourth_social_icon ? ' selected="selected"' : '';
                                        echo '<option value="' . esc_attr($icon) . '" ' . $selected . ' >' . esc_html($label) . '</option>';
                                    }
                                    ?>
                                </select>
                                <input type="text" name="fourth_social_link[]" value="<?php echo $fourth_social_link; ?>" placeholder="Social Link">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="delete-current-member"><span class="dashicons dashicons-trash delete_single"></span></div>
            </li>
        <?php }
    } else {
        ?>
        <!-- Show team member empty table if member does not exists  -->
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
                <input type="text" name="mb_name[]" value="" class="rs_label_text" required>

                <span class="mb_label"><?php _e('Member Designation', "tmshowcase"); ?></span>
                <input type="text" name="mb_pos[]" value="" class="rs_label_text" required>

                <span class="mb_label"><?php _e('Member Small Description', "tmshowcase"); ?></span>
                <textarea name="mb_desc[]" class="rs_label_text" required></textarea>
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
    }
    ?>
    <!-- new members will be added here dynamically -->
</ul>
<!-- Add new member & Delete all members -->
<div class="controler-container">
    <!-- add new member button  -->
    <div class="add-member controler">
        <a href="#" id="add-new-member"> <?php _e('Add New Member', 'tmshowcase'); ?> </a>
    </div>
    <!-- delete all members button  -->
    <div class="delete-all-members controler">
        <a href="#" class="all-delete-btn">
            <span class="dashicons dashicons-trash Delete-all"></span>
            <?php _e('Delete All', 'tmshowcase'); ?>
        </a>
    </div>
</div>
<hr>
<!-- Show shortcode  -->
<div class="tm-showcase-short-code controler">
    <span><?php _e('Use this short code to show this team : ', 'tmshowcase') ?></span>
    <input type="text" readonly="readonly" value="<?php echo '[TEAM_MEMBERS id=' . get_the_ID() . ']' ?>" onclick="this.select()">
</div>