<?php
/* Note : Custom CSS are dynamically loaded, as they should NOT rely on cache (this would break per-view settings)
 * This view can be cached
*/

$imgroot = elgg_get_site_url() . 'mod/collections/graphics/';

?>


/* Main plugin styles (editor) */
.collection-edit-entity { margin-top: 0.5ex; min-height:2ex; border:1px solid #ccc; padding:0ex 1ex 1ex 1ex; border-radius: 6px; background: rgba(0,0,0,0.05); }
.collection-edit-highlight { margin-bottom: 1ex; border:1px dashed grey; padding:0.5ex 1ex; height:5ex; }

.collection_image.float { margin: 0 1em 0.5em 0; }

/* Rendu des collections */
.collections-listing { list-style-type:none; }
ul.collections-listing > li, .collections-listing > div { box-shadow: 1px 1px 1px 1px black; padding: 1em; display: inline-block; margin: 0.5em; }

.collections-socialshare { font-size:3em; padding-bottom:0.5em; }
.collections-socialshare a { margin-right:0.3em; }
