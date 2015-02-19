<?php
/*
 * Elgg Survey plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 *
 * add/edit action
 */

elgg_load_library('elgg:survey');
// start a new sticky form session in case of failure
elgg_make_sticky_form('survey');

// Get input data
$question = get_input('question');
$description = get_input('description');
$number_of_choices = (int) get_input('number_of_choices', 0);
$front_page = get_input('front_page');
$close_date = get_input('close_date');
$open_survey = (int)get_input('open_survey');
$tags = get_input('tags');
$access_id = get_input('access_id');
$container_guid = get_input('container_guid');
$guid = get_input('guid');

//get response choices
$count = 0;
$new_choices = array();
if ($number_of_choices) {
	for($i=0; $i<$number_of_choices; $i++) {
		$text = get_input('choice_text_'.$i,'');
		if ($text) {
			$new_choices[] = $text;
			$count ++;
		}
	}
}

// Make sure the question and the response options aren't empty
if (empty($question) || ($count == 0)) {
	register_error(elgg_echo("survey:blank"));
	forward(REFERER);
}

$user = elgg_get_logged_in_user_entity();

// Check whether non-admins are allowed to create site-wide surveys
$survey_site_access = elgg_get_plugin_setting('site_access', 'survey');
if ($survey_site_access == 'admins' && !$user->isAdmin()) {
	$container = get_entity($container_guid);

	// Regular users are allowed to create surveys only inside groups
	if (!$container instanceof ElggGroup) {
		register_error(elgg_echo('survey:can_not_create'));

		elgg_clear_sticky_form('survey');

		forward('survey/all');
	}
}

if ($guid) {
	$new = false;

	// editing an existing survey
	$survey = get_entity($guid);

	if (!$survey instanceof Survey) {
		register_error(elgg_echo('survey:notfound'));
		forward(REFERER);
	}

	if (!$survey->canEdit()) {
		register_error(elgg_echo('survey:permission_error'));
		forward(REFERER);
	}

	// Success message
	$message = elgg_echo("survey:edited");
} else {
	$new = true;

	// Initialise a new Survey
	$survey = new Survey();

	// Set its owner to the current user
	$survey->owner_guid = $user->guid;
	$survey->container_guid = $container_guid;

	// Success message
	$message = elgg_echo("survey:added");
}

$survey->access_id = $access_id;
$survey->question = $question;
$survey->title = $question;
$survey->description = $description;
$survey->open_survey = $open_survey ? 1 : 0;
$survey->close_date = empty($close_date) ? null : $close_date;
$survey->tags = string_to_tag_array($tags);

if (!$survey->save()) {
	register_error(elgg_echo("survey:error"));
	forward(REFERER);
}

$survey->setChoices($new_choices);

survey_manage_front_page($survey, $front_page);

elgg_clear_sticky_form('survey');

if ($new) {
	$survey_create_in_river = elgg_get_plugin_setting('create_in_river', 'survey');

	if ($survey_create_in_river != 'no') {
		elgg_create_river_item(array(
			'view' => 'river/object/survey/create',
			'action_type' => 'create',
			'subject_guid' => $user->guid,
			'object_guid' => $survey->guid,
		));
	}
}

system_message($message);

// Forward to the survey page
forward($survey->getURL());
