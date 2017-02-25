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

    <?php wp_head(); ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation-flex.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
</head>

<body <?php body_class("a11y-theme"); ?>>
    <div class="row a11y-site">
        <nav id="skip" class="small-12 columns">
            <a  href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
        </nav>

        <header class="small-12 columns a11y-site-header" role="banner">
            <div class="small-12 columns">
                <h1 class="a11y-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <svg id="logo">
                    <use xlink:href="<?php bloginfo('template_url');?>/images/BI logo icon_COLOUR.svg#Layer_1" />
                </svg>

                <svg id="corner-flourish" role="presentation">
                    <use xlink:href="<?php bloginfo('template_url');?>/images/corner-flourish.svg#Layer_1" />
                </svg>
            </div>

            <nav class="small-12 columns" role="navigation">
                <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
                    <button class="menu-icon" type="button" data-toggle="example-menu"></button>
                    <div class="title-bar-title">Menu</div>
                </div>

                <div class="top-bar" id="example-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'container_class' => 'a11y-main-nav' ) ); ?>
                </div>
            </nav>
        </header>

        <div class="row small-12 columns">
