<?php

/**
 * Elgg Feedback plugin
 * Feedback interface for Elgg sites
 *
 * @package Feedback
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Prashant Juvekar
 * @copyright Prashant Juvekar
 * @link http://www.linkedin.com/in/prashantjuvekar
 *
 * for Elgg 1.8 by iionly
 * iionly@gmx.de
 */

$list = elgg_list_entities(array('types' => 'object', 'subtypes' => 'feedback'));
$list = elgg_list_entities_from_metadata(array('types' => 'object', 'subtypes' => 'feedback', 'metadata_name_value_pairs' => array('name' => 'status', 'value' => 'open', 'operand' => '<>')));
if (!$list) {
	$list = '<p class="mtm">' . elgg_echo('feedback:list:noopenfeedback') . '</p>';
}

echo $list;
