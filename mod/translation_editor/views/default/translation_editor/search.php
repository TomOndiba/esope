<?php
/**
 * Show the search form
 */

$current_language = elgg_extract("current_language", $vars);
$q = elgg_extract("query", $vars);
$in_search = elgg_extract("in_search", $vars);

if (empty($q)) {
	$q = elgg_echo("translation_editor:forms:search:default");
}

// build form
$form_data = "<table><tr><td>";

$form_data .= elgg_view("input/text", array("name" => "translation_editor_search", "value" => $q));

$form_data .= "</td><td>&nbsp;";

$form_data .= elgg_view("input/hidden", array("name" => "language", "value" => $current_language));
$form_data .= elgg_view("input/submit", array("value" => elgg_echo("search")));

$form_data .= "</td></tr></table>";
$form = elgg_view("input/form", array(
	"body" => $form_data,
	"id" => "translation_editor_search_form",
	"action" => $vars["url"] . "translation_editor/search",
	"disable_security" => true,
	"class" => "mbl"
));

echo $form;
