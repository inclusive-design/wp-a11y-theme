<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a11y
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <header class="a11y-entry-header">
        <?php
        if ( is_single() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
        endif;
        ?>
    </header>

    <div class="a11y-entry-content">
        <?php
            the_content( sprintf(
                /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'a11y' ), array( 'span' => array( 'class' => array() ) ) ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'a11y' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>

    <?php
        // Uncomment to show additional entry metadata
        //<footer class="a11y-entry-footer">
        //a11y_entry_footer(); .
        //</footer>
    ?>
</article><!-- #post-## -->
