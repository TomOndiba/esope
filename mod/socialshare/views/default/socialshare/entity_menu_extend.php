<?php
/* Social share sharing links 
 * All sharing links must be only links, no API, no iframe, no embed, no external cookie
 */
global $CONFIG;

$guid = $vars['entity']->guid;

// Socialshare lightbox
$text = elgg_echo('socialshare:share');
$params = array(
		'text' => '<i class="fa fa-share-alt"></i> ' . $text, 
		'rel' => 'popup', 
		'href' => "#socialshare-$guid"
	);
$body .= elgg_view('output/url', $params);
$body .= '<div class="elgg-module elgg-module-popup elgg-socialshare hidden clearfix" id="socialshare-' . $guid . '">';
	$body .= '<div id="socialshare-links-popup">';
		$body .= elgg_view('socialshare/extend', array('shareurl' => $vars['entity']->getURL()));
		$body .= '<div class="clearfloat"></div>';
	$body .= '</div>';
$body .= '</div>';

echo $body;
