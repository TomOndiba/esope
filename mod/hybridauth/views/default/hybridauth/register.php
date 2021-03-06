<?php
$url = elgg_get_site_url();
$content = '';

// @TODO : list enabled identity providers

$providers = array('twitter' => 'Twitter', 'linkedin' => 'LinkedIn', 'google' => 'Google', 'facebook' => 'Facebook');

if ($providers) {
	if (!elgg_is_logged_in()) {
		//$content .= '<h4>' . elgg_echo('hybridauth:orregisterwith') . '</h4>';
	}
	$content .= '<p>';
	foreach ($providers as $key => $name) {
		// Add provider only if activated
		if (elgg_get_plugin_setting($key.'_enable', 'hybridauth') == 'yes') {
			if (elgg_is_logged_in()) {
				$content .= '<a href="' . $url . 'hybridauth/' . $key . '" class="hybridauth-provider" title="' . elgg_echo('hybridauth:configureassociation', array($name)) . '"><img src="' . $url . 'mod/hybridauth/graphics/' . $key . '.png" alt="' . $name . '" /></a>';
			} else {
				$content .= '<a href="' . $url . 'hybridauth/' . $key . '" class="hybridauth-provider" title="' . elgg_echo('hybridauth:registerwith', array($name)) . '"><img src="' . $url . 'mod/hybridauth/graphics/' . $key . '.png" alt="' . $name . '" /></a>';
			}
		}
	}
	$content .= '</p>';
	$content .= '<div class="clearfloat"></div>';
}

echo $content;


