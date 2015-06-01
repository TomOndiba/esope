<?php
/**
 * Assembles and outputs the registration page.
 *
 * Since 1.8, registration can be disabled via administration.  If this is
 * the case, calls to this page will forward to the network front page.
 *
 * If the user is logged in, this page will forward to the network
 * front page.
 *
 * @package Elgg.Core
 * @subpackage Registration
 */

// check new registration allowed
if (elgg_get_config('allow_registration') == false) {
	register_error(elgg_echo('registerdisabled'));
	forward();
}

$friend_guid = (int) get_input('friend_guid', 0);
$invitecode = get_input('invitecode');

// only logged out people need to register
if (elgg_is_logged_in()) {
	forward();
}

// Fing : main changes are in title / header block
$title = elgg_echo("theme_fing:register:create");

$content = '<div id="fing-register">';

	$content .= '<h2 class="fing-register-title">' . $title . '</h2>';
	$content .= '<em>' . elgg_echo('theme_fing:register:participate') . '</em>';

	// create the registration url - including switching to https if configured
	$register_url = elgg_get_site_url() . 'action/register';
	if (elgg_get_config('https_login')) {
		$register_url = str_replace("http:", "https:", $register_url);
	}
	$form_params = array(
		'action' => $register_url,
		'class' => 'elgg-form-account',
	);

	$body_params = array(
		'friend_guid' => $friend_guid,
		'invitecode' => $invitecode
	);
	$content .= elgg_view_form('register', $form_params, $body_params);

	$content .= elgg_view('help/register');

$content .= '</div>';


if (elgg_get_config('walled_garden')) {
	elgg_load_css('elgg.walled_garden');
	$body = elgg_view_layout('walled_garden', array('content' => $content));
	echo elgg_view_page($title, $body, 'walled_garden');
} else {
	$body = elgg_view_layout('one_column', array('content' => $content));
	echo elgg_view_page($title, $body);
}
