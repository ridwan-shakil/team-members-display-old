<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/public
 * @author     MD.Ridwan <ridwansweb@gmail.com>
 */
class Team_Members_Display_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Team_Members_Display_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Team_Members_Display_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Check if the post content contains your shortcode.
		global $post;
		if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'TEAM_MEMBERS' ) ) {

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/team-members-display-public.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'fontawesome4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), 4.7 );

			// Users custom css from settings page.
			$custom_css = get_option( 'custom_css' );
			if ( ! empty( $custom_css ) ) {
				wp_add_inline_style( $this->plugin_name, $custom_css );
			}
		}
	}

	/**
	 * Register shortcodes for the public-facing side of the website.
	 *
	 * @since 1.0.0
	 */
	public function register_shortcodes() {
		require_once TEAM_PLUGIN_DIR_PATH . 'public/partials/team-shortcode.php';
	}
}
