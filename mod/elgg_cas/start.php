<?php
/**
 * Elgg CAS authentication
 * 
 * @package elgg_cas
 * @license http://www.gnu.org/licenses/gpl.html
 * @author Florian DANIEL
 */

elgg_register_event_handler('init', 'system', 'elgg_cas_init'); // Init

/**
 * CAS Authentication init
 * 
 */
function elgg_cas_init() {
	
	// CSS et JS
	elgg_extend_view('css/elgg', 'elgg_cas/css');
	
	// Extend login form
	elgg_extend_view('forms/login', 'elgg_cas/login_extend', 300);
	
	// Add CAS library (default to latest)
	/* Note : when used with openssl 0.9.8k, please choose lib 1.3.2 and apply patch
	 * The patch is laready made in 1.3.2, in CAS/Request/ CurlRequest and CurlMultiRequest
	 * Since SSL3 security issues, you may want to update it to (requires testing) :
	 *    curl_setopt($handle, CURLOPT_SSLVERSION,CURL_SSLVERSION_TLSv1_2);
	 */
	$cas_library = elgg_get_plugin_setting('cas_library', 'elgg_cas');
	if ($cas_library == '1.3.2') {
		elgg_register_library('elgg:elgg_cas', elgg_get_plugins_path() . 'elgg_cas/lib/CAS-1.3.2/CAS.php');
	} else {
		elgg_register_library('elgg:elgg_cas', elgg_get_plugins_path() . 'elgg_cas/lib/CAS-1.3.3/CAS.php');
	}
	
	// CAS page handler
	elgg_register_page_handler('cas_auth', 'elgg_cas_page_handler');
	$enable_ws_auth = elgg_get_plugin_setting('enable_ws_auth', 'elgg_cas');
	if ($enable_ws_auth == 'yes') {
		elgg_register_page_handler('cas_auth_ws', 'elgg_cas_page_handler_ws');
	}
	
	// Redirection pour déconnexion CAS après la fin du logout
	elgg_register_event_handler('logout','user','elgg_cas_logout_handler', 1);
	
	// Autologin attempt
	$autologin = elgg_get_plugin_setting('autologin', 'elgg_cas', false);
	if (($autologin == 'yes') && !elgg_is_logged_in()) {
		elgg_register_event_handler("pagesetup", "system", "elgg_cas_autologin");
	}
	
	// CAS registration
	//$casregister = elgg_get_plugin_setting('casregister', 'elgg_cas', false);
	
}


// CAS auth page handler
function elgg_cas_page_handler($page) {
	$base = elgg_get_plugins_path() . 'elgg_cas/pages/elgg_cas';
	if (!isset($page[0])) { $page[0] = 'login'; }
	
	switch($page[0]) {
		case 'logout': set_input('logout', 'logout');
		case 'login':
		default:
			if (!include_once "$base/cas_login.php") return false;
	}
	return true;
}

// Same, but for webservices auth
function elgg_cas_page_handler_ws($page) {
	$base = elgg_get_plugins_path() . 'elgg_cas/pages/elgg_cas';
	if (!isset($page[0])) { $page[0] = 'login'; }
	
	switch($page[0]) {
		case 'logout': set_input('logout', 'logout');
		case 'login':
		default:
			if (!include_once "$base/cas_login_ws.php") return false;
	}
	return true;
}


function elgg_cas_logout_handler($event, $object_type, $object) {
	$user = elgg_get_logged_in_user_entity();
	if ($user->is_cas_logged) {
		// Unset CAS login marker - we might use another way another time..
		$user->is_cas_logged = false;
		forward(elgg_get_site_url() . 'cas_auth/?logout');
	} else return;
}


function elgg_cas_autologin() {
	// Limit to homepage ?
	//if ((elgg_get_viewtype() == 'default') && (full_url() == elgg_get_site_url())) {
	if (elgg_in_context('cron')) { return; }
	
	if (elgg_get_viewtype() == 'default') {
		global $cas_client_loaded;
		// CAS autologin
		
		// Load libraries and client once
		if (!$cas_client_loaded) {
			elgg_load_library('elgg:elgg_cas');
			//require_once elgg_get_plugins_path() . 'elgg_cas/lib/elgg_cas/config.php';
			$cas_host = elgg_get_plugin_setting('cas_host', 'elgg_cas', '');
			$cas_context = elgg_get_plugin_setting('cas_context', 'elgg_cas', '/cas');
			$cas_port = (int) elgg_get_plugin_setting('cas_port', 'elgg_cas', 443);
			$cas_server_ca_cert_path = elgg_get_plugin_setting('ca_cert_path', 'elgg_cas', '');
			
			if (!empty($cas_host) && !empty($cas_port) && !empty($cas_context)) {
				phpCAS::setDebug();
				phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
				$cas_client_loaded = true;
				if (!empty($cas_server_ca_cert_path)) {
					phpCAS::setCasServerCACert($cas_server_ca_cert_path);
				} else {
					phpCAS::setNoCasServerValidation();
				}
			}
		}
		
		if ($cas_client_loaded) {
			if (phpCAS::checkAuthentication()) {
				system_message(elgg_echo('elgg_cas:casdetected'));
				$cas_login_included = true;
				include_once elgg_get_plugins_path() . 'elgg_cas/pages/elgg_cas/cas_login.php';
			}
		}
		
	}
}


