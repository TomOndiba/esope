<?php
// Lists all existing functions
$values = elgg_get_plugin_setting("fonctions", 'theme_cocon');
$vars['options_values'] = esope_build_options($values, true);

if (empty($vars["name"])) $vars["name"] = 'cocon_fonction';

if (is_array($vars['options_values']) && sizeof($vars['options_values']) > 0) {
	echo elgg_view('input/dropdown', $vars);
}

