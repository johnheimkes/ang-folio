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

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    
    <title><?php bloginfo('name'); ?><?php wp_title(' - '); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo PORTFOLIO_THEME_PATH_URL; ?>assets/images/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo PORTFOLIO_THEME_PATH_URL; ?>assets/images/apple-touch-icon.png" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="wrapper-header">
        <header class="page-header">
            <div class="grid-col sgrid-col-3">
                <h1 class="hdg hdg-1">Angelina Allen</h1>
                <h2 class="hdg hdg-2"><?php bloginfo( 'tagline' ); ?></h2>
            </div>
            
            
            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        </header>
    </div>