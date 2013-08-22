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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title><?php bloginfo('name'); ?><?php wp_title(' - '); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
    
    <script type="text/javascript">
        if(navigator.userAgent.match(/iPad/i)) {
            viewport = document.querySelector("meta[name=viewport]");
            viewport.setAttribute('content', 'width=980');
        }
    </script>

    <!-- ICONS -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo PORTFOLIO_THEME_PATH_URL; ?>assets/images/favicon.ico" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="wrapper-header">
        <header class="page-header">
            <div class="site-name fleft">
                <h1 class="hdg hdg-1 mix-hdg-salmon">Angelina Allen</h1>
                <h2 class="hdg hdg-2 mix-hdg-salmon">User Experience Designer</h2>
            </div>
            
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo PORTFOLIO_THEME_PATH_URL; ?>/assets/images/logo.png" alt="Angelina Allen's Logo" />
                </a>
            </div>
            
            <div class="main-nav fright">
                <?php wp_nav_menu(array(
                        'menu'          => 'primary',
                        'container'     => 'nav',
                        'menu_class'    => 'h-list primary-nav'
                    )); 
                ?>
            </div>
        </header>
    </div>
    
    <div class="wrapper-content">
        <div class="page-content">