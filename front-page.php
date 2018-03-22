<?php
/**
 * @package a11y
 */

$settings = (array) get_option ('a11y-theme-settings');
get_header(); ?>

    <main id="content" class="a11y-site-main small-12 columns">
        <nav id="toc"></nav>
        <div class="a11y-site-tagline">
            <p>
                <?php
                echo ($settings['site_text_tagline']);
            ?>
            </p>
        </div>
        <section class="row a11y-panel-container">
            
            <?php
                if (is_active_sidebar('panel1')) {
                    dynamic_sidebar('panel1');
                }
            ?>

            <?php
                if (is_active_sidebar('panel2')) {
                    dynamic_sidebar('panel2');
                }
            ?>

            <?php
                if (is_active_sidebar('panel3')) {
                    dynamic_sidebar('panel3');
                }
            ?>
        </section>

    </main>

<?php
get_footer();
?>
