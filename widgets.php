<?php
/**
 * a11y widgets for front page.
 */

$front_panels = array(
	'a11y-front-panel1' => array(
		'name' => __( 'Front Panel 1', 'a11y-front-panel' ),
        'id' => 'a11y-front-panel1',
        'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
	),
	'a11y-front-panel2' => array(
		'name' => __( 'Front Panel 2', 'a11y-front-panel' ),
        'id' => 'a11y-front-panel2',
        'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
	),
	'a11y-front-panel3' => array(
		'name' => __( 'Front Panel 3', 'a11y-front-panel' ),
        'id' => 'a11y-front-panel3',
        'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
	)
);

foreach ($front_panels as $value) {
    register_sidebar($value);
}

/* Add widget to page
   @param array $sections Nested array that holds the name of the section, its classes and the widgets it contains
   @param string $el_name Name of the element
*/
function add_widgets($sections, $el_name) {
    foreach($sections as $section) {

        echo '<' . $el_name . ' class="' . $section['section_class'] . '">';
        if (!empty($section['widgets'])) {
	        foreach($section['widgets'] as $widget) {
	            if (is_active_sidebar($widget)) {
	                dynamic_sidebar($widget);
	            }
        	}
        }
        echo '</'. $el_name . '>';
    };
}

?>
