<?php

add_action('init', 'project_create_post_types');

function project_create_post_types() {
    add_filter('post_updated_messages', 'project_update_messages');
    function project_update_messages($messages) {
        $messages['project'] = array(
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf(__('project updated. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
            2 => __('Custom field updated.'),
            3 => __('Custom field deleted.'),
            4 => __('project updated.'),
            /* translators: %s: date and time of the revision */
            5 => isset($_GET['revision']) ? sprintf(__('project restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
            6 => sprintf(__('project published. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
            7 => __('Contact saved.'),
            8 => sprintf(__('project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
            9 => sprintf(__('project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
                    // translators: Publish box date format, see http://php.net/date
                    date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
            10 => sprintf(__('project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        );

        return $messages;
    }

	
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Project'),
            'singular_name' => __('Project'),
            'add_new' => _x('Add New Project', 'Project'),
            'add_new_item' => __('Add New Project'),
            'edit_item' => __('Edit Project'),
            'view_item' => __('View Project'),
            'add_new_item' => __('Add Project')
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'project', 'with_front' => false),
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'custom-fields',
			)
   ));
}

function project_list() {
	ob_start();
    include( plugin_dir_path(__FILE__) . '/display/project_list.php');
	$output = ob_get_clean();
    return $output;
}






add_shortcode('project', 'project_list');

?>