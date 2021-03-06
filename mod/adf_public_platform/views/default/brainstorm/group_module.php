<?php
/**
 * List most rated ideas on group profile page
 *
 * @package Brainstorm
 */

$group_guid = elgg_get_page_owner_entity();

if ($group->brainstorm_enable == "no") {
	return true;
}

elgg_push_context('widgets');
elgg_pop_context();

$content = elgg_list_entities_from_annotation_calculation(array(
	'type' => 'object',
	'subtype' => 'idea',
	'container_guid' => $group->guid,
	'annotation_names' => 'point',
	'order_by' => 'annotation_calculation desc',
	'full_view' => 'no_vote',
	'item_class' => 'elgg-item-idea pts pbs',
	'list_class' => 'group-idea-list',
	'limit' => 6,
	'pagination' => false
));

if (!$content) {
	$content = '<p>' . elgg_echo('brainstorm:none') . '</p>';
}

$all_link = elgg_view('output/url', array(
	'href' => "brainstorm/group/$group->guid/all",
	'text' => elgg_echo('brainstorm:view:all'),
	'title' => elgg_echo('brainstorm:group') . ', ' . elgg_echo('link:view:all'),
));

$new_link = elgg_view('output/url', array(
	'href' => "brainstorm/add/$group->guid",
	'text' => ucfirst(elgg_echo('brainstorm:add')),
	'title' => elgg_echo('brainstorm:group') . ', ' . elgg_echo('brainstorm:add'),
));

echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('brainstorm:group'),
	'class' => 'elgg-module-group-brainstorm',
	'content' => $content,
	'all_link' => $all_link,
	'add_link' => $new_link,
));
