<?php
/**
 * @package a11y
 */

$settings = (array) get_option ('a11y-theme-settings');
get_header(); ?>

    <main id="content" class="a11y-site-main small-12 columns">
        <div class="a11y-site-tagline">
            <p>
                <?php
                echo ($settings['site_text_tagline']);
            ?>
            </p>
        </div>
        <section class="row a11y-panel-container">
            
            <?php

                $sections = array(
                    'panels' => array(
                        'section_class' => 'row a11y-panel-container',
                        'widgets' => array(
                            'panel1' => 'a11y-front-panel1',
                            'panel2' => 'a11y-front-panel2',
                            'panel3' => 'a11y-front-panel3m'
                        )
                    )
                );

                add_widgets($sections, 'section');
            ?>

       </section>

    </main>

<?php
get_footer();
