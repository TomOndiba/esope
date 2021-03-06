<?php
/**
 * Elgg WebDAV user private repository
 *
 * @package ElggWebDAV
 */



global $CONFIG;

elgg_push_breadcrumb(elgg_echo('elgg_webdav'), 'webdav');


// Ensure we're using proper URL
// Note that access control itself is performed later, so we don't need to be sure that the user actually exists'
$guid = get_input($guid, false);
if (empty($guid)) {
	// Give a chance to redirect properly if already logged in
	if (elgg_is_logged_in()) {
		forward('webdav/user/' . elgg_get_logged_in_user_guid());
	}
	register_error("Adresse invalide, veuillez utiliser l'adresse indiquée sur la page d'accueil WebDAV.");
	forward('webdav');
}



/**********************************************/
/* Define paths (and optionnally create them) */
/**********************************************/

$base_path = elgg_get_data_path() . 'webdav';
$public_path = $base_path . '/user';
$data_path = $base_path . '/data';
$locks_path = $data_path . '/locks';
if (!file_exists($base_path)) { mkdir($base_path, 0770); }
if (!file_exists($public_path)) { mkdir($public_path, 0770); }
if (!file_exists($data_path)) { mkdir($data_path, 0770); }
if (!file_exists($locks_path)) { mkdir($locks_path, 0770); }
// Relative endpoint URL, without domain
$base_uri = parse_url($CONFIG->url . 'webdav/user');
$base_uri = $base_uri['path'];

// Reset base path accordingly to logged in user settings
// Note that server will be reloaded after login, so we will have this info as soon as we're authenticated
if (elgg_is_logged_in()) {
	$own = elgg_get_logged_in_user_entity();
	elgg_push_breadcrumb(elgg_echo('elgg_webdav:user', array($own->name)), 'webdav/user');
	// Force access to own folder only
	$public_path .= '/' . $own->guid;
	$base_uri .= '/' . $own->guid;
	/* Alternative config to allow access to other users' folder
	// @TODO using this should also require checking that user actually exists before creating folders.
	$public_path .= '/' . $guid;
	$base_uri .= '/' . $guid;
	*/
	// Create custom user folder if it doesn't exist
	if (!file_exists($public_path)) { mkdir($public_path, 0770); }
}



/*************************************/
/* Load (and define) lib and classes */
/*************************************/

use Sabre\DAV;
// The autoloader
elgg_load_library('elgg:webdav:sabreDAV');

// Define plugin : authentication through Elgg
use Sabre\DAV\Auth;
$authBackend = new Sabre\DAV\Auth\Backend\BasicCallBack(function($username, $password) {
	$debug = false;
	// Return result quickly if already logged in
	if (elgg_is_logged_in()) {
		if ($debug) error_log("WebDAV : $username authenticated");
		return true;
	}
	// check the username and password here, and then just return true or false.
	if ($debug) error_log("WebDAV : authenticating $username");
	// check if logging in with email address
	if (strpos($username, '@') !== false && ($users = get_user_by_email($username))) {
		$username = $users[0]->username;
	}
	// Check authentication : much used so be as quick as possible
	$authenticated = elgg_authenticate($username, $password);
	if ($authenticated === true) {
		if ($debug) error_log("WebDAV : $username authentication verified => loging in");
		$user = get_user_by_username($username);
		$guid = get_input($guid, false);
		// Ensure we are accessing own folder only (see also main folder alternative config)
		if ($guid && ($guid == $user->guid)) {
			login($user, true); // Keep authenticated to avoid checking every time
			return true;
		}
	}
	return false;
});
$authPlugin = new Sabre\DAV\Auth\Plugin($authBackend, '');



/**************************************/
/* Configure and launch WebDAV server */
/**************************************/

$rootDirectory = new DAV\FS\Directory($public_path);
// Set up a new server at chosen root
// The server object is responsible for making sense out of the WebDAV protocol
$server = new DAV\Server($rootDirectory);

// If your server is not on your webroot, make sure the following line has the correct information
$server->setBaseUri($base_uri);


// ADD PLUGINS
// Add authentication
$server->addPlugin($authPlugin);
// The lock manager is reponsible for making sure users don't overwrite each others changes.
$lockBackend = new DAV\Locks\Backend\File($locks_path);
$lockPlugin = new DAV\Locks\Plugin($lockBackend);
$server->addPlugin($lockPlugin);
// This ensures that we get a pretty index in the browser, but it is optional.
//$server->addPlugin(new DAV\Browser\Plugin());
require_once('EsopeBrowserPlugin.php');
$server->addPlugin(new DAV\Browser\EsopePlugin());


// Fire up the server
$server->exec();


