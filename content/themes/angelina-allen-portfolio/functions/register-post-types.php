<?php
/**
 * Portfolio Theme
 *
 * @category Portfolio_Skeleton_Theme
 * @package Portfolio_Skeleton_Theme
 * @subpackage Modules_Register_PostTypes
 * @author John Heimkes IV <john@markupisart.com>
 * @version 1.0
 */

add_action('init', 'portfolio_register_post_types');
function portfolio_register_post_types()
{
    // Register Post-Types
    register_post_type(
        'portfolio_work',
        array(
            'labels' => array(
                'name'          => 'Work',
                'singular_name' => 'Work',
            ),
            'public' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'author',
                'revisions',
                'post-formats',
            ),
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'work' )
        )
    );
}