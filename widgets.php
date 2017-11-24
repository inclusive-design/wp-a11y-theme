<?php
/**
 * a11y widgets for front page.
 */

if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Panel1',
		'id'   => 'panel1',
		'description'   => 'This is the widgetized panel.',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="a11y-entry-header">',
		'after_title'   => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Panel2',
		'id'   => 'panel2',
		'description'   => 'This is the widgetized panel.',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="a11y-entry-header">',
		'after_title'   => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Panel3',
		'id'   => 'panel3',
		'description'   => 'This is the widgetized panel.',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns a11y-front-panel">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="a11y-entry-header">',
		'after_title'   => '</h1>'
	));
}

?>
