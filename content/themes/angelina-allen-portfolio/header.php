<?php
/**
 * Portfolio Theme
 *
 * @category Portfolio_Skeleton_Theme
 * @package Portfolio_Skeleton_Theme
 * @subpackage Header
 * @author
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php bloginfo('name'); ?><?php wp_title(' - '); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo PORTFOLIO_THEME_PATH_URL; ?>assets/images/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo PORTFOLIO_THEME_PATH_URL; ?>assets/images/apple-touch-icon.png" />

    <?php wp_head(); // Always have wp_head() just before the closing </head> ?>
</head>
<body <?php body_class(); ?>>
    <div>
        <?php if (get_header_image()) : ?>
        <img src="<?php header_image() ?>" alt="<?php bloginfo('name'); ?>" />
        <?php else : ?>
            <h1><?php bloginfo('name');?></h1>
        <?php endif; ?>

        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        <div><?php get_search_form(); ?></div>
