<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a11y
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="a11y-entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .a11y-entry-header -->

    <div class="a11y-entry-content">
        <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'a11y' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .a11y-entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="a11y-entry-footer">
            <?php
                edit_post_link(
                    sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__( 'Edit %s', 'a11y' ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            ?>
        </footer><!-- .a11y-entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->
