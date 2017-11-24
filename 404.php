<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package a11y
 */
get_header(); ?>

    <main id="content" class="a11y-site-main small-12 columns">

        <h1><?php esc_html_e( 'That page can&rsquo;t be found.', 'a11y' ); ?></h1>

        <div class="a11y-page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below, or do a search?', 'a11y' ); ?></p>

            <?php
                get_search_form();

                the_widget( 'WP_Widget_Recent_Posts' );

                // Uncomment to add these Widgets to the 404 page.
                // $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'a11y' )) . '</p>';
                // the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                //
                // the_widget( 'WP_Widget_Tag_Cloud' );
            ?>
        </div>

    </main>

<?php
get_footer();
