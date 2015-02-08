<?php

/**
 * @file
 * template.php
 */

function toulonoff_preprocess_html(&$variables) {
	drupal_add_css('http://fonts.googleapis.com/css?family=Vollkorn:700', array('type' => 'external'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Oswald:300', array('type' => 'external'));
}



/**
 * Overrides theme_field()
 * Remove the hard coded classes so we can add them in preprocess functions.
 */

function toulonoff_field($variables) {
	$output = '';

	// Render the label, if it's not hidden.
	if (!$variables['label_hidden']) {
		$output .= '<div ' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
	}

	// Render the items.
	$output .= '<div ' . $variables['content_attributes'] . '>';
	foreach ($variables['items'] as $delta => $item) {
		$output .= '<div ' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
	}
	$output .= '</div>';

	// Render the top-level DIV.
	$output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

	return $output;
}

/**
 * Implements hook_preprocess_field()
 */
function toulonoff_preprocess_field(&$vars) {
	/* Set shortcut variables. Hooray for less typing! */
	$name = $vars['element']['#field_name'];
	$bundle = $vars['element']['#bundle'];
	$mode = $vars['element']['#view_mode'];
	$classes = &$vars['classes_array'];
	$title_classes = &$vars['title_attributes_array']['class'];
	$content_classes = &$vars['content_attributes_array']['class'];
	$item_classes = array();

	/* Global field classes */
	$classes[] = 'field-wrapper';
	$title_classes[] = 'field-label';
	$content_classes[] = 'field-items';
	$item_classes[] = 'field-item';

	/* Uncomment the lines below to see variables you can use to target a field */
// 	print '<strong>Name:</strong> ' . $name . '<br/>';
// 	print '<strong>Bundle:</strong> ' . $bundle  . '<br/>';
// 	print '<strong>Mode:</strong> ' . $mode .'<br/>';

	/* Add specific classes to targeted fields */
	switch ($mode) {
		/* All teasers */
		case 'teaser':
			switch ($name) {
				/* Teaser read more links */
				case 'node_link':
					$item_classes[] = 'more-link';
					break;
					/* Teaser descriptions */
				case 'body':
				case 'field_description':
					$item_classes[] = 'description';
					break;
			}
			break;
		case 'full': 
			switch ($name) {
				case 'field_image' : 
					$content_classes[] = 'pull-left';
			}
	}

	switch ($name) {
		case 'field_image':
			$content_classes[] = 'cadre-image';
			break;
	}

	// Apply odd or even classes along with our custom classes to each item */
	foreach ($vars['items'] as $delta => $item) {
		$vars['item_attributes_array'][$delta]['class'] = $item_classes;
		$vars['item_attributes_array'][$delta]['class'][] = $delta % 2 ? 'even' : 'odd';
	}
}