<?php
/**
 * a11y widgets for front page.
 */

if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Front Panel 1',
		'id'   => 'a11y-front-panel1',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="a11y-panel-header">',
		'after_title'   => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Front Panel 2',
		'id'   => 'a11y-front-panel2',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="a11y-panel-header">',
		'after_title'   => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Front Panel 3',
		'id'   => 'a11y-front-panel3',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="a11y-panel-header">',
		'after_title'   => '</h1>'
	));
}

?>
