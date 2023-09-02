<?php
if (!defined('ABSPATH')) exit;
// Settings style that has been added from settings page 
require_once(TEAM_PLUGIN_DIR_PATH . 'public/partials/settings-css.php');
?>

<div class="wrap">
    <!-- dynamic widgets from all plugins will be displayed here  -->
</div>

<div class=" style-settings-wrapper">
    <div class="settings-column">
        <h1 class="nav-tab-wrapper">
            <a href=" #" id="content-tab" class="nav-tab">Content</a>
            <a href=" #" id="style-tab" class="nav-tab">Style</a>
            <a href=" #" id="advanced-tab" class="nav-tab">Custom CSS</a>
        </h1>
        <div class=" tab-content" id="all-tabs">
            <!-- tab content goes here -->
            <form method="post" action="options.php" id="settings-form">
                <?php
                settings_fields('team-member-showcase-settings');
                do_settings_sections('team-member-showcase-settings');
                submit_button();
                ?>
            </form>
        </div>
    </div>

    <!-- see preview  -->
    <div class="settings-display-column">
        <div class="rs-all-team-members ">
            <?php for ($i = 0; $i < 4; $i++) {
            ?>
                <div class="rs-single-team-member">
                    <div class="member-img">
                        <img decoding="async" src="<?php echo plugin_dir_url(__FILE__) . '../../images/Demo_member.jpg' ?>" class="tm-s-image" alt="Nadim">
                    </div>
                    <div class="member-info">
                        <h3 class="tm-s-name"><?php _e('Ridwan', 'tmshowcase') ?></h3>
                        <p class="tm-s-position"><?php _e('Wordpress developer', 'tmshowcase') ?></p>
                        <p class="tm-s-description"><?php _e('I am a WordPress developer with a primary focus on WordPress plugin development. If you want to build any WordPress plugins feel free to contact me.') ?></p>
                    </div>
                    <div class="social-links">
                        <a href="#" class="tm-s-social"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="tm-s-social"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="tm-s-social"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>
<!-- Notice  -->
<div class="tms_notice">
    <p><?php _e('Here are some demo team members . Change the styling and see a visual representation how your team members are going to look  like in the frontend . ', 'tmshowcase'); ?></p>
</div>