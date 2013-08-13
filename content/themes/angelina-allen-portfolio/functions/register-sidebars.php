<?php
/**
 * WordPress Sandbox
 *
 * @package WordPress_Sandbox
 * @subpackage sidebars
 * @author John Heimkes IV <john@markupisart.com>
 * @version $Id$
 */

register_sidebar(array(
    'name'        =>  __('Example Sidebar', PORTFOLIO_TEXT_DOMAIN),
    'id'          => 'portfolio_example_sidebar',
    'description' =>  __('Example Sidebar. Rename and use as a skeleton for other dynamic sidebars.', PORTFOLIO_TEXT_DOMAIN)
));
