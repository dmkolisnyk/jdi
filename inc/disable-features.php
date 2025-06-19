<?php

/**
 * Disable post features
 */
function disable_post_features() {

    remove_menu_page('edit.php');

}

add_action('admin_menu', 'disable_post_features');

function disable_post_rest_api($endpoints) {

    if (isset($endpoints['/wp/v2/posts'])) {

        unset($endpoints['/wp/v2/posts']);

    }

    return $endpoints;
}

add_filter('rest_endpoints', 'disable_post_rest_api');

function disable_post_type_support() {
    remove_post_type_support('post', 'editor');
    remove_post_type_support('post', 'trackbacks');
    remove_post_type_support('post', 'custom-fields');
    remove_post_type_support('post', 'comments');
    remove_post_type_support('post', 'revisions');
    remove_post_type_support('post', 'author');
    remove_post_type_support('post', 'page-attributes');
}

add_action('init', 'disable_post_type_support', 100);

/**
 * Disable comments features
 */
function disable_comments_features() {

    add_action('admin_menu', function() {

        remove_menu_page('edit-comments.php');

    });

    add_action('admin_init', function() {

        remove_meta_box('commentsdiv', 'post', 'normal');
        remove_meta_box('commentsdiv', 'page', 'normal');
        remove_meta_box('commentstatusdiv', 'post', 'normal');
        remove_meta_box('commentstatusdiv', 'page', 'normal');

    });

    add_action('init', function() {
        foreach (get_post_types() as $post_type) {

            if (post_type_supports($post_type, 'comments')) {

                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');

            }
        }
    });

    add_action('wp_dashboard_setup', function() {

        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    });

    add_filter('feed_links_show_comments_feed', '__return_false');

    add_filter('rest_endpoints', function($endpoints) {

        if (isset($endpoints['/wp/v2/comments'])) {

            unset($endpoints['/wp/v2/comments']);

        }

        return $endpoints;

    });

    add_action('admin_bar_menu', function($wp_admin_bar) {

        $wp_admin_bar->remove_node('comments');

    }, 999);

    add_action('template_redirect', function() {

        if (is_comment_feed()) {

            wp_redirect(home_url(), 301);

            exit;
        }

    });
}

add_action('init', 'disable_comments_features');

