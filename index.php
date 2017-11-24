<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a11y
 */

get_header(); ?>

    <main id="content" class="a11y-site-main small-12 columns">
    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) : ?>
            <h1><?php single_post_title(); ?></h1>
        <?php
        elseif (is_home() && is_front_page() ) : {
            // insert the blog description on the front page.
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="a11y-site-tagline"><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php
            endif;
        }
        endif;
        ?>
        <section class="row">
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;
        ?>
        </section>
        <?php
        the_posts_navigation();

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif; ?>
<?php
get_footer();
