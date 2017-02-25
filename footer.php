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
            <svg id="sidebar-graphic" preserveAspectRatio="xMidYMid meet" >
                <use xlink:href="<?php bloginfo('template_url');?>/images/sidebar-graphic-01.svg#Layer_1" />
            </svg>
        </main>
    </div><!-- #content -->

    <footer class="small-12 columns site-footer text-center" role="contentinfo">


        <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://floeproject.org/') ); ?>"><?php printf( esc_html__( 'Accessible Theme by %s', 'a11y' ), 'The FLOE Project' ); ?></a>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).foundation();
    });
</script>
</body>
</html>
