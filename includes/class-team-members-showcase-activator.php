<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/ridwan-shakil
 * @since      1.0.0
 *
 * @package    Team_Members_Showcase
 * @subpackage Team_Members_Showcase/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Team_Members_Showcase
 * @subpackage Team_Members_Showcase/includes
 * @author     MD.Ridwan <ridwansweb@gmail.com>
 */
class Team_Members_Showcase_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	public function __construct() {
		// add_action('init', array($this, 'register_cpt'));
		// add_action('init', array($this, 'team_register_cpt'));
	}

	// public function activate() {
	// }

	// Register "team_member_showcase" CPT
	// function team_register_cpt() {
	// 	echo 'hello';

	// 	$labels = array(
	// 		'name'                  => _x('All Teams', 'Post Type General Name', 'text_domain'),
	// 		'singular_name'         => _x('Team', 'Post Type Singular Name', 'text_domain'),
	// 		'menu_name'             => __('Team member showcase', 'text_domain'),
	// 		'name_admin_bar'        => __('All Teams', 'text_domain'),
	// 		'archives'              => __('Team Archives', 'text_domain'),
	// 		'attributes'            => __('Item Attributes', 'text_domain'),
	// 		'parent_item_colon'     => __('Parent Team:', 'text_domain'),
	// 		'all_items'             => __('All Teams', 'text_domain'),
	// 		'add_new_item'          => __('Add New Team', 'text_domain'),
	// 		'add_new'               => __('Add New Team', 'text_domain'),
	// 		'new_item'              => __('New Team', 'text_domain'),
	// 		'edit_item'             => __('Edit Team', 'text_domain'),
	// 		'update_item'           => __('Update Team', 'text_domain'),
	// 		'view_item'             => __('View Team', 'text_domain'),
	// 		'view_items'            => __('View Team', 'text_domain'),
	// 		'search_items'          => __('Search Team', 'text_domain'),
	// 		'not_found'             => __('Not found', 'text_domain'),
	// 		'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
	// 		'insert_into_item'      => __('Insert into Team', 'text_domain'),
	// 		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
	// 		'items_list'            => __('Teams list', 'text_domain'),
	// 		'items_list_navigation' => __('Teams list navigation', 'text_domain'),
	// 		'filter_items_list'     => __('Filter Teams list', 'text_domain'),
	// 	);
	// 	$args = array(
	// 		'label'                 => __('Team member', 'text_domain'),
	// 		'description'           => __('Post Type Description', 'text_domain'),
	// 		'labels'                => $labels,
	// 		'supports'              => array('title'),
	// 		// 'taxonomies'            => array('category', 'post_tag'),
	// 		'hierarchical'          => false,
	// 		'public'                => true,
	// 		'show_ui'               => true,
	// 		'show_in_menu'          => true,
	// 		'menu_position'         => 5,
	// 		'show_in_admin_bar'     => true,
	// 		'menu_icon'             => 'dashicons-groups',
	// 		'show_in_nav_menus'     => true,
	// 		'can_export'            => true,
	// 		'has_archive'           => true,
	// 		'exclude_from_search'   => false,
	// 		'publicly_queryable'    => true,
	// 		'capability_type'       => 'page',
	// 	);
	// 	register_post_type('team_member_showcase', $args);
	// }
}
