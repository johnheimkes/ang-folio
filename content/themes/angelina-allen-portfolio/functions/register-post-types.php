<?php
/**
 * Nerdery Theme
 *
 * @category Nerdery_Skeleton_Theme
 * @package Nerdery_Skeleton_Theme
 * @subpackage Modules_Register_PostTypes
 * @author John Heimkes IV <john@markupisart.com>
 * @version $Id$
 */

add_action('init', 'portfolio_register_post_types');
function portfolio_register_post_types()
{
    // register your post-types here
    /*
     * @see register_post_type() http://codex.wordpress.org/Function_Reference/register_post_type
     *
     */
    register_post_type(
        'portfolio_carousel', // prefix your post-type
        array(
            'labels' => array(
                'name'          => 'Carousels', // plural name
                'singular_name' => 'Carousel'
            ),
            'public' => true,
            'supports' => array(
                'title',
                'thumbnail',
            )
        )
    );
}