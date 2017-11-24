<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a11y
 */

?>

    </div>

    <footer class="small-12 columns a11y-site-footer text-center" role="contentinfo">
        <p>
            <?php
            $settings = (array) get_option ('a11y-theme-settings');
            //$footer_string = esc_html($settings['site_text_footer']);
            $footer_string = $settings['site_text_footer'];
            echo $footer_string;
            ?>
        </p>

        <svg id="ontario-logo" role="presentation">
            <use xlink:href="<?php bloginfo('template_url');?>/images/ontario-logo.svg#Layer_1" />
        </svg>
    </footer>
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).foundation();
    });
</script>
</body>
</html>
