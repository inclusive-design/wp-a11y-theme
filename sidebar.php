<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a11y
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

global $category_landing_id;
?>

<aside class="small-12 medium-3 columns" role="complementary">
    <?php
    $category_current = get_the_category();
    $category_link =  get_term_link ($category_current[0]->slug, "category");
    $current_displayed_id = get_the_ID (); // the ID of the post currently displayed in the main content panel.

    if ( ! empty( $category_current ) ) {
        $args = array(
            // get posts belonging to the current category.
            'post_type' => 'post',
            'category_name' => $category_current[0]->slug,
        );
        $sidebar_query = new WP_Query($args);

        if ($sidebar_query->have_posts()) :

            /*
            If there are more than 1 post in the current category,
            then the first item should be a link to the category.

            Otherwise if there's just 1 post, then it can be ignore as it
            will be the landing page already being shown.
            */
            if ($sidebar_query->found_posts > 1) :?>
                <ul>
                    <li><a href="<?php echo $category_link; ?>" class="a11y-sidebar-category-link
                <?php
                if (! empty ($category_landing_id)) : ?>a11y-sidebar-current<?php endif;?>">
                    <?php
                    /*
                    if category_landing_id is not empty, then we are showing a
                    landing page. Therefore give it active styling.
                    */
                    echo $category_current[0]->name; ?></a></li>

                    <li>
                        <ul>
                        <?php
                        while ( $sidebar_query->have_posts() ) : $sidebar_query->the_post();
                            /*
                            Display all pages in the category as a list of links.
                            But if one of the pages is the landing page, we skip it
                            since it's already the first item in the list.
                            */

                            $is_landing_page = get_post_meta (get_the_ID(), 'is_landing_page', true);
                            if ( empty($is_landing_page) && (get_the_ID() != $category_landing_id)) :
                            // If the post isn't the landing page, show a link. Otherwise ignore it.
                                ?>
                            <li>
                                <a href="<?php the_permalink() ?>"
                                <?php if ($current_displayed_id == get_the_ID() && empty ($category_landing_id)) :
                                /*
                                Check the category_landing_id if it is set, then we're displaying the
                                landing page. So don't show the active styling for this item.
                                */
                                ?>
                                    class="a11y-sidebar-current"
                                    aria-current="page"
                                <?php endif;?>>
                                <?php the_title(); ?>
                                </a>
                            </li>
                            <?php

                            endif;
                        endwhile;?>
                        </ul>
                    </li>
                </ul>
                <?php
            endif;
        endif;
    }
    ?>
</aside>
