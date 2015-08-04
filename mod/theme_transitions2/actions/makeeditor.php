<?php
/**
 * Grants admin privileges to a user.
 *
 * In >=1.7.1, admin is flagged by setting the admin
 * column in the users_entity table.
 *
 * In <1.7.1, admin is a piece of metadata on the user object.
 *
 * @package Elgg.Core
 * @subpackage Administration.User
 */

$guid = get_input('guid');
$user = get_entity($guid);

if (($user instanceof ElggUser) && ($user->canEdit())) {
	//if ($user->makeAdmin() && ($user->is_editor = 'yes')) {
	if ($user->is_editor = 'yes') {
		system_message(elgg_echo('admin:user:makeeditor:yes'));
	} else {
		register_error(elgg_echo('admin:user:makeeditor:no'));
	}
} else {
	register_error(elgg_echo('admin:user:makeeditor:no'));
}

forward(REFERER);