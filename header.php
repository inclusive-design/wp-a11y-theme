<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a11y
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation-flex.min.css" />
    <?php wp_head(); ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>

</head>

<body <?php body_class(); ?>>
    <div class="row a11y-theme">
        <nav id="skip" class="small-12 columns">
            <a  href="#content"><?php esc_html_e( 'Skip to content', 'a11y' ); ?></a>
        </nav>

        <header class="small-12 a11y-site-header" role="banner">
            <?php
                $nav_menu = wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'container' => '','echo' => false, 'items_wrap' => '%3$s' ) );
            ?>

            <div class="small-12 columns">
                <h1 class="a11y-site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>

                <svg id="corner-flourish" role="presentation">
                    <use xlink:href="<?php bloginfo('template_url');?>/images/corner-flourish.svg#Layer_1" />
                </svg>

                <nav class="a11y-main-nav">
                    <div class="title-bar float-right" data-responsive-toggle="site-menu" data-hide-for="medium">
                        <button class="menu-icon" type="button" data-toggle="site-menu"></button>
                    </div>

                    <div id="site-menu">
                        <div class="top-bar-left a11y-main-nav-items">
                            <ul class="dropdown menu" data-dropdown-menu>
                                <li class="show-for-small-only"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a></li>
                                <?php echo $nav_menu; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

        </header>

        <div class="a11y-site-main-container row small-12 columns">
