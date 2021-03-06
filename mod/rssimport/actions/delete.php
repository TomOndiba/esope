<?php

// get our feed object
$rssimport_id = get_input('id');
$rssimport = get_entity($rssimport_id);

// make sure we're the owner if selecting a feed
if ($rssimport instanceof ElggObject && get_loggedin_userid() != $rssimport->owner_guid) {
	register_error(elgg_echo('rssimport:not:owner'));
	forward(REFERRER);
}

// now we know we're logged in, and are the owner of the import
// go ahead and delete

if ($rssimport instanceof ElggObject) {
  $context = $rssimport->import_into;
  $container_guid = $rssimport->container_guid;
  $url = $rssimport->getURL();
  
	$rssimport->delete();
	system_message(elgg_echo('rssimport:delete:success'));
  
  // don't send them back to an entity page where the entity has been deleted
  $forward = ($url == $_SERVER['HTTP_REFERER']) ? elgg_get_site_url() . "rssimport/{$container_guid}/{$context}" : REFERRER;
  forward($forward);
}
else{
	register_error(elgg_echo('rssimport:delete:fail'));
  forward(REFERRER);
}

forward(REFERRER);