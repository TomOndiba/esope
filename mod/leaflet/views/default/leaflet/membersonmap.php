<?php
/* Display & update other users location on map */
/* Required data :
 - user name (or anonymous)
 - user position
 - user radius
 - user position timestamp
 - user position timeout
*/

echo '<script type="text/javascript">
// Create a custom marker for users
var onlineUsersMarker = L.AwesomeMarkers.icon({ prefix: \'fa\', icon: \'user\', markerColor: \'grey\' });
var onlineUsersMarkers = new L.MarkerClusterGroup();

// Process positions
';

// Geocoding batch
$debug_0 = microtime(TRUE);
$users_options = array('types' => 'user', 'limit' => 0);
$batch = new ElggBatch('elgg_get_entities', $users_options, 'leaflet_batch_add_member_marker', 50);
$debug_1 = microtime(TRUE);
error_log("LEAFLET BATCH : Finished at " . date('Ymd H:i:s') . " => ran in " . round($debug_1-$debug_0, 4) . " seconds");


echo 'map.addLayer(onlineUsersMarkers);
map.fitBounds(bounds, {padding: [20,20]});
</script>';

echo '<div id="onlineUsers"></div>';

