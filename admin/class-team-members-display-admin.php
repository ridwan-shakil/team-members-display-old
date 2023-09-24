<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/admin
 */

/**
 * Team_Members_Display_Admin class for admin functionality
 *
 * An instance of this class should be passed to the run() function
 * defined in Team_Members_Display_Loader as all of the hooks are defined
 * in that particular class.
 *
 * The Team_Members_Display_Loader will then create the relationship
 * between the defined hooks and the functions defined in this
 * class.
 *
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/admin
 * @author     MD.Ridwan <ridwansweb@gmail.com>
 */
class Team_Members_Display_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * The function `enqueue_styles` is used to enqueue different stylesheets based on the current screen
	 * in WordPress, including styles for the team members custom post type and the settings page.
	 *
	 * @param string $screen The "screen" parameter is a string that represents the current screen or page being
	 * displayed in the WordPress admin area. It is used to conditionally enqueue stylesheets based on the
	 * current screen.
	 */
	public function enqueue_styles( $screen ) {
		// CSS for team members  CPT only.
		global $post;
		if ( 'post-new.php' === $screen || 'post.php' === $screen ) {
			if ( 'team_member_display' === $post->post_type ) {
				wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/team-members-display-admin.css', array(), $this->version, 'all' );
				// Remove all admin notices for this CPT.
				remove_all_actions( 'admin_notices' );
			}
		}

		// CSS only for our settings page.
		if ( 'team_member_display_page_team-member-display-settings' === $screen ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'tm-settings-admin', plugin_dir_url( __FILE__ ) . 'css/settings-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'fontawesome4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version );
			wp_enqueue_style( 'tm-public-style', plugin_dir_url( __FILE__ ) . '../public/css/team-members-display-public.css', array(), $this->version );
			$custom_css = get_option( 'custom_css' ); // Users custom css from settings page.
			if ( ! empty( $custom_css ) ) {
				wp_add_inline_style( 'tm-public-style', $custom_css );
			}
			// Remove all admin notices for this CPT.
			remove_all_actions( 'admin_notices' );
		}
	}

	/**
	 * The function `enqueue_scripts` is used to enqueue JavaScript files for the team members custom post
	 * type and the settings page.
	 *
	 * @param string $screen The "screen" parameter is used to determine which screen or page the function is
	 * being called on. It is typically used in WordPress to enqueue scripts and styles only on specific
	 * screens or pages.
	 */
	public function enqueue_scripts( $screen ) {
		// JS for team members  CPT only.
		global $post;
		if ( 'post-new.php' === $screen || 'post.php' === $screen ) {
			if ( 'team_member_display' === $post->post_type ) {

				wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/team-members-display-admin.js', array( 'jquery' ), $this->version, false );
				wp_localize_script(
					$this->plugin_name,  // This name must be same as enqued script name.
					'add_new_member_obj', // This has to be unique for every request.
					array(
						'ajax_url' => admin_url( 'admin-ajax.php' ),
					)
				);
				wp_enqueue_media();
			}
		}

		// For sttings page only.
		if ( 'team_member_display_page_team-member-display-settings' === $screen ) {
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'tm-settings-admin-js', plugin_dir_url( __FILE__ ) . 'js/settings-admin.js', array( 'jquery' ), $this->version, false );
		}
	}

	/**
	 * The function "register_team_members_cpt" registers a custom post type called "Team member display"
	 * with various labels and settings.
	 */
	public function register_team_members_cpt() {
		$labels = array(
			'name'                  => _x( 'All Teams', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Team member display', 'text_domain' ),
			'name_admin_bar'        => __( 'All Teams', 'text_domain' ),
			'archives'              => __( 'Team Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Team:', 'text_domain' ),
			'all_items'             => __( 'All Teams', 'text_domain' ),
			'add_new_item'          => __( 'Add New Team', 'text_domain' ),
			'add_new'               => __( 'Add New Team', 'text_domain' ),
			'new_item'              => __( 'New Team', 'text_domain' ),
			'edit_item'             => __( 'Edit Team', 'text_domain' ),
			'update_item'           => __( 'Update Team', 'text_domain' ),
			'view_item'             => __( 'View Team', 'text_domain' ),
			'view_items'            => __( 'View Team', 'text_domain' ),
			'search_items'          => __( 'Search Team', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Team', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Teams list', 'text_domain' ),
			'items_list_navigation' => __( 'Teams list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Teams list', 'text_domain' ),
		);
		$args   = array(
			'label'               => __( 'Team member', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-groups',
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'team_member_display', $args );
	}

	/**
	 * The function changes the title text to "Team Name" for posts of the "team_member_display" post
	 * type.
	 *
	 * @param string $title The title of the post or page being displayed.
	 * @param object $post The  parameter is an object that represents the current post being displayed. It
	 * contains information about the post, such as its ID, title, content, author, and more. In this
	 * function, we are checking if the post type is 'team_member_display' and if it is,
	 * we are cnanging the title.
	 *
	 * @return string the modified title.
	 */
	public function team_change_title_text( $title, $post ) {
		if ( 'team_member_display' === $post->post_type ) {
			$title = 'Team Name';
		}
		return $title;
	}

	/**
	 * The function "team_display_columns" returns an array of column names for a team display.
	 *
	 * @param array $columns The "columns" parameter is an array that defines the columns to be displayed in a
	 * table or list. Each key-value pair in the array represents a column, where the key is the column
	 * identifier and the value is the column label or title.
	 *
	 * @return an array of columns.
	 */
	public function team_display_columns( $columns ) {
		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'title'     => __( 'Teams' ),
			'count'     => __( 'Total Members' ),
			'shortcode' => __( 'Teams Shortcode' ),
			'date'      => __( 'Date' ),
		);
		return $columns;
	}

	/**
	 * The function "team_display_manage_columns" is used to display custom columns in the WordPress admin
	 * panel for a custom post type called "team_member_display", including the total count of team members and a
	 * shortcode for displaying the team members.
	 *
	 * @param string $column The "column" parameter is the name of the column being displayed in the manage
	 * columns view of the team display. It can have values like "count" or "shortcode".
	 * @param int    $post_id The post ID is the unique identifier for a specific post in WordPress. It is used to
	 *    retrieve and manipulate data associated with that post, such as custom fields, post meta, and
	 *    taxonomies. In this case, the post ID is used to retrieve the total count of team members and
	 *    display it.
	 */
	public function team_display_manage_columns( $column, $post_id ) {
		global $post;
		/**
		 * If $total_count dowsn't exist in cache then run the query and add it to the cache.
		 */
		$total_count = wp_cache_get( 'cached-total-members-' . $post_id, 'team_members_display' );
		if ( false === $total_count ) {
			$total_count = get_post_meta( $post_id, 'rs_total_members', true );
			wp_cache_add( 'cached-total-members-' . $post_id, $total_count, 'team_members_display' );
		}

		if ( ! $total_count || -1 === $total_count ) {
			$total_count = 0;
		}
		switch ( $column ) {
			case 'count':
				echo esc_html( $total_count );
				break;
			case 'shortcode':
				echo '<input type="text"  style="width:200px" value="[TEAM_MEMBERS id=' . esc_html( $post_id ) . ']" readonly="readonly" onclick="this.select()" />';
				break;
			default:
				break;
		}
	}

	/**
	 * The function "team_member_addmetaboxes" adds a meta box to the "team_member_display" post type with
	 * the title "Team Section".
	 */
	public function team_member_addmetaboxes() {
		add_meta_box( 'add_team_section', __( 'Team Section', 'team-members-display' ), array( $this, 'add_team_section' ), 'team_member_display' );
	}

	/**
	 * The function "add_team_section" includes the file "add-team-section.php" from the admin/partials
	 * directory.
	 *
	 * @param WP_Post $post The $post parameter is a variable that represents the current post object. It is
	 * typically used in WordPress functions and hooks to access information about the current post being
	 * displayed or edited.
	 */
	public function add_team_section( $post ) {
		require_once TEAM_PLUGIN_DIR_PATH . 'admin/partials/add-team-section.php';
	}

	/**
	 * The function "team_member_add_new_member" includes the file "ajax-add-new-member.php" in the
	 * admin/partials directory.
	 */
	public function team_member_add_new_member() {
		require TEAM_PLUGIN_DIR_PATH . 'admin/partials/ajax-add-new-member.php';
	}

	/**
	 * Save team member display-related meta fields.
	 *
	 * This function is called when a team member display custom post type is saved or updated.
	 * It includes the logic to save or update the meta fields associated with the team member display.
	 *
	 * @param int $post_id The ID of the team member display post being saved.
	 *
	 * @since 1.0.0
	 */
	public function save_team_display_meta_fields( $post_id ) {
		require_once TEAM_PLUGIN_DIR_PATH . 'admin/data-save/save-new-members.php';
	}

	/**
	 * Register and display a submenu page for Team Member Display settings.
	 *
	 * This function adds a submenu page under the "Team Member Display" custom post type
	 * to provide settings related to the display of team members.
	 *
	 * @since 1.0.0
	 */
	public function team_m_display_submenu_page() {
		add_submenu_page(
			'edit.php?post_type=team_member_display',
			__( 'Team Member Display Settings', 'team-members-display' ),
			__( 'Settings', 'team-members-display' ),
			'manage_options',
			'team-member-display-settings',
			array( $this, 'team_member_display_settings_page' )
		);
	}

	/**
	 * Callback function to display the Team Member Display settings page.
	 *
	 * This function is responsible for rendering the content of the submenu page created
	 * by 'team_m_display_submenu_page'. It includes the settings related to the display
	 * of team members.
	 *
	 * @since 1.0.0
	 */
	public function team_member_display_settings_page() {
		require TEAM_PLUGIN_DIR_PATH . 'admin/partials/style-settings.php';
	}

	/**
	 * The function "team_member_display_settings_fields" includes the file "admin-settings-fields.php" for
	 * displaying the settings fields in the admin panel.
	 */
	public function team_member_display_settings_fields() {
		require TEAM_PLUGIN_DIR_PATH . 'admin/partials/admin-settings-fields.php';
	}


	/**
	 * The function adds a "Settings" link to an array of links.
	 *
	 * @param array $links is an array of existing links.
	 *
	 * @return array of links with an additional "Settings" link.
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="' . admin_url( 'admin.php?page=team-member-display-settings' ) . '">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}
