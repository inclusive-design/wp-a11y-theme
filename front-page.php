<?php
/**
 * The front page template file
 *
 * This is the template for displaying a static front page. The front page to
 * display is defined by the value set in the theme.
 *
 * @link https://codex.wordpress.org/Creating_a_Static_Front_Page
 *
 * @package a11y
 */

get_header(); ?>

    <main class="small-12 columns">
        <p class="a11y-site-description">
            BIG IDeA brings together businesses, customers with lived experience of disability and the next generation of business leaders to collaboratively advance accessibility innovation in Ontario and create a culture of accessibility and inclusion.
        </p>
        <section class="row a11y-panel-container">

            <?php
                // an array containing the post IDs of the 3 posts to display on the front page.
                $front_page_posts = array("business"=>58, "bigIdeaInAction"=>56, "customers"=>60);
                foreach($front_page_posts as $key => $post_id){
            ?>
                <article class="small-12 medium-4 columns a11y-front-panel">
                    <?php
                        $post_content = get_post($post_id);
                        $thumbnail = get_the_post_thumbnail($post_id);
                        $title = $post_content->post_title;
                        $content = $post_content->post_content;
                    ?>
                    <header class="a11y-entry-header">
                        <?php echo $thumbnail ?>
                        <h1><?php echo $title ?></h1>
                    </header>
                    <section>
                        <?php
                            echo apply_filters('the_content',$content);
                        ?>
                    </section>
                </article>
            <?php
        }//foreach
            ?>
        </section>

    </main>

<?php
get_footer();
