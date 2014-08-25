<?php
/**
 * theme_template plugin
 *
 */

// Init plugin
elgg_register_event_handler('init', 'system', 'theme_template_init');


/**
 * Init theme_template plugin.
 */
function theme_template_init() {
	global $CONFIG; // All site useful vars
	
	// Get a plugin setting
	$setting = elgg_get_plugin_setting('setting_name', 'theme_template');
	
	// Get a user plugin setting (makes sense only if logged in)
	if (elgg_is_logged_in()) {
		$user_guid = elgg_get_logged_in_user_guid();
		$usersetting = elgg_get_plugin_user_setting('user_plugin_setting', $user_guid, 'theme_template');
	}
	
	// Register a page handler on "theme_template/"
	elgg_register_page_handler('theme_template', 'theme_template_page_handler');
	
	// @TODO add index page handlers
	
	
}


// Page handler
// Loads pages located in theme_template/pages/theme_template/
function theme_template_page_handler($page) {
	$base = elgg_get_plugins_path() . 'theme_template/pages/theme_template';
	switch ($page[0]) {
		case 'view':
			set_input('guid', $page[1]);
			include "$base/example_page.php";
			break;
		default:
			include "$base/example_page.php";
	}
	return true;
}


// Other useful functions
// prefixed by plugin_name_
/*
function theme_template_function() {
	
}
*/


