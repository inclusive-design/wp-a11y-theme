<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package a11y
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="a11y-entry-header">
        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    </header><!-- .a11y-entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="a11y-entry-footer">
        <?php // a11y_entry_footer(); // Uncomment to show additional entry metadata. ?>
    </footer><!-- .a11y-entry-footer -->
</article><!-- #post-## -->
