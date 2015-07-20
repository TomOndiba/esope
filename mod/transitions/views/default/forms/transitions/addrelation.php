<?php
/**
 * Edit transitions add relation to a challenge
 *
 * @package Transitions
 */


//echo '<h3>' . elgg_echo('transitions:form:addrelation') . '</h3>';
echo '<label>' . elgg_echo('transitions:form:addrelation') . '<br />' . elgg_view('transitions/input/addrelation', array('name' => 'entity_guid', 'relation' => 'related_content', 'guid' => $vars['guid'])) . '</label>';

echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['guid']));
echo elgg_view('input/submit', array('value' => elgg_echo('transitions:addrelation')));

