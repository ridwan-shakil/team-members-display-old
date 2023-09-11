<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Showcase
 * @subpackage Team_Members_Showcase/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Team_Members_Showcase
 * @subpackage Team_Members_Showcase/admin
 * @author     MD.Ridwan <ridwansweb@gmail.com>
 */
class Team_Members_Showcase_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($screen) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Team_Members_Showcase_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Team_Members_Showcase_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//CSS for team members  CPT only
		global $post;
		if ('post-new.php' == $screen || 'post.php' == $screen) {
			if ('team_member_showcase' === $post->post_type)
				wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/team-members-showcase-admin.css', array(), $this->version, 'all');
		}

		// CSS only for our settings page 
		if ('team_member_showcase_page_team-member-showcase-settings' == $screen) {
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style('tm-settings-admin', plugin_dir_url(__FILE__) . 'css/settings-admin.css', array(), $this->version, 'all');
			wp_enqueue_style('fontawesome4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
			wp_enqueue_style('tm-public-style', plugin_dir_url(__FILE__) . '../public/css/team-members-showcase-public.css');
			$custom_css = get_option('custom_css'); // Users custom css from settings page 
			if (!empty($custom_css)) {
				wp_add_inline_style('tm-public-style', $custom_css);
			}
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($screen) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Team_Members_Showcase_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Team_Members_Showcase_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ('post-new.php' == $screen && 'team_member_showcase' == get_current_screen()->post_type) {

			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/team-members-showcase-admin.js', array('jquery'), $this->version, false);
			wp_localize_script(
				$this->plugin_name,  // this name must be same as enqued script name
				'add_new_member_obj', // this has to be unique for every request
				array(
					'ajax_url' => admin_url('admin-ajax.php'),
				)
			);
			wp_enqueue_media();
		}
		// for sttings page only
		if ('team_member_showcase_page_team-member-showcase-settings' == $screen) {
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script('tm-settings-admin-js', plugin_dir_url(__FILE__) . 'js/settings-admin.js', array('jquery'), $this->version, false);  // Change the version
		}
	}

	/**
	 * Register CPT.
	 *
	 * @since    1.0.0
	 */
	public function register_team_members_cpt() {
		$labels = array(
			'name'                  => _x('All Teams', 'Post Type General Name', 'text_domain'),
			'singular_name'         => _x('Team', 'Post Type Singular Name', 'text_domain'),
			'menu_name'             => __('Team member showcase', 'text_domain'),
			'name_admin_bar'        => __('All Teams', 'text_domain'),
			'archives'              => __('Team Archives', 'text_domain'),
			'attributes'            => __('Item Attributes', 'text_domain'),
			'parent_item_colon'     => __('Parent Team:', 'text_domain'),
			'all_items'             => __('All Teams', 'text_domain'),
			'add_new_item'          => __('Add New Team', 'text_domain'),
			'add_new'               => __('Add New Team', 'text_domain'),
			'new_item'              => __('New Team', 'text_domain'),
			'edit_item'             => __('Edit Team', 'text_domain'),
			'update_item'           => __('Update Team', 'text_domain'),
			'view_item'             => __('View Team', 'text_domain'),
			'view_items'            => __('View Team', 'text_domain'),
			'search_items'          => __('Search Team', 'text_domain'),
			'not_found'             => __('Not found', 'text_domain'),
			'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
			'insert_into_item'      => __('Insert into Team', 'text_domain'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
			'items_list'            => __('Teams list', 'text_domain'),
			'items_list_navigation' => __('Teams list navigation', 'text_domain'),
			'filter_items_list'     => __('Filter Teams list', 'text_domain'),
		);
		$args = array(
			'label'                 => __('Team member', 'text_domain'),
			'description'           => __('Post Type Description', 'text_domain'),
			'labels'                => $labels,
			'supports'              => array('title'),
			// 'taxonomies'            => array('category', 'post_tag'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'menu_icon'             => 'dashicons-groups',
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type('team_member_showcase', $args);
	}

	function team_showcase_columns($columns) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __('Teams'),
			'count' => __('Total Members'),
			'shortcode' => __('Teams Shortcode'),
			'date' => __('Date')
		);
		return $columns;
	}

	function team_showcase_manage_columns($column, $post_id) {
		global $post;
		$TotalCount =  get_post_meta($post_id, 'rs_total_members', true);
		if (!$TotalCount || $TotalCount == -1) {
			$TotalCount = 0;
		}
		switch ($column) {
			case 'count':
				echo esc_html($TotalCount);
				break;
			case 'shortcode':
				echo '<input type="text"  style="width:200px" value="[TEAM_MEMBERS id=' . esc_html($post_id) . ']" readonly="readonly" onclick="this.select()" />';
				break;
			default:
				break;
		}
	}


	// add meta boxes 
	function team_member_addmetaboxes() {
		add_meta_box('add_team_section', __('Team Section', 'tmshowcase'), array($this, 'add_team_section'), 'team_member_showcase');
	}

	function add_team_section($post) {
		require_once(TEAM_PLUGIN_DIR_PATH . 'admin/partials/add_team_section.php');
	}


	// add new member ajax call risponse
	function team_member_add_new_member() {
		require(TEAM_PLUGIN_DIR_PATH . 'admin/partials/ajax_add_new_member.php');
	}


	// save team members data 
	function save_team_showcase_meta_fields($post_id) {
		require_once(TEAM_PLUGIN_DIR_PATH . 'admin/data-save/save_new_members.php');
	}

	// ==============================
	// Add settings Submenu page 
	// ==============================
	function team_m_showcase_submenu_page() {
		add_submenu_page(
			'edit.php?post_type=team_member_showcase',
			__('Team Member Showcase Settings', 'team-members-showcase'),
			__('Settings', 'team-members-showcase'),
			'manage_options',
			'team-member-showcase-settings',
			array($this, 'team_member_showcase_settings_page')
		);
	}
	function team_member_showcase_settings_page() {
		require(TEAM_PLUGIN_DIR_PATH . 'admin/partials/style-settings.php');
	}

	// add settings fields 
	function team_member_showcase_settings_fields() {
		require(TEAM_PLUGIN_DIR_PATH . 'admin/partials/admin-settings-fields.php');
	}
}
