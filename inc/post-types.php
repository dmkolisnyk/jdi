<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Reviews.
	 */

	$labels = [
		"name" => esc_html__( "Reviews", "jdi" ),
		"singular_name" => esc_html__( "Review", "jdi" ),
		"menu_name" => esc_html__( "Customer reviews", "jdi" ),
		"all_items" => esc_html__( "All Reviews", "jdi" ),
		"add_new_item" => esc_html__( "Add New Review", "jdi" ),
		"edit_item" => esc_html__( "Edit Review", "jdi" ),
		"new_item" => esc_html__( "New Review", "jdi" ),
		"view_item" => esc_html__( "View Review", "jdi" ),
		"view_items" => esc_html__( "View Reviews", "jdi" ),
		"search_items" => esc_html__( "Search Reviews", "jdi" ),
		"not_found" => esc_html__( "No Reviews Found", "jdi" ),
		"not_found_in_trash" => esc_html__( "No Reviews found in Trash", "jdi" ),
		"featured_image" => esc_html__( "Customer Avatar", "jdi" ),
		"set_featured_image" => esc_html__( "Set Customer Avatar", "jdi" ),
		"remove_featured_image" => esc_html__( "Remove Customer Avatar", "jdi" ),
		"use_featured_image" => esc_html__( "Use as customer avatar for this review", "jdi" ),
		"insert_into_item" => esc_html__( "Insert to review", "jdi" ),
		"uploaded_to_this_item" => esc_html__( "Uploaded to this review", "jdi" ),
		"filter_items_list" => esc_html__( "Filter reviews list", "jdi" ),
		"items_list_navigation" => esc_html__( "Reviews list navigation", "jdi" ),
		"items_list" => esc_html__( "Reviews list", "jdi" ),
		"name_admin_bar" => esc_html__( "Review", "jdi" ),
		"item_published" => esc_html__( "Review published", "jdi" ),
		"item_published_privately" => esc_html__( "Review published privately.", "jdi" ),
		"item_reverted_to_draft" => esc_html__( "Review reverted to draft", "jdi" ),
		"item_trashed" => esc_html__( "Review trashed", "jdi" ),
		"item_scheduled" => esc_html__( "Review Scheduled", "jdi" ),
		"item_updated" => esc_html__( "Review updated", "jdi" ),
	];

	$args = [
		"label" => esc_html__( "Reviews", "jdi" ),
		"labels" => $labels,
		"description" => "Customer reviews",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => false,
		"query_var" => true,
		"menu_icon" => "dashicons-admin-comments",
		"supports" => [ "title", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "reviews", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
