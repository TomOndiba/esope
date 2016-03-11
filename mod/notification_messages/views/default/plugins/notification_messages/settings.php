<?php
global $CONFIG;

$yesno_options = array("yes" => elgg_echo("option:yes"), "no" => elgg_echo("option:no"));
$noyes_options = array_reverse($yesno_options, true);

$notify_subject_opt = array(
	'default' => elgg_echo('notification_messages:subject:default'), 
	'allow' => elgg_echo('notification_messages:subject:allow'), 
	//'deny' => elgg_echo('notification_messages:subject:deny'), 
);

$notify_message_opt = array(
	'default' => elgg_echo('notification_messages:message:default'), 
	'allow' => elgg_echo('notification_messages:message:allow'), 
	//'deny' => elgg_echo('notification_messages:subject:deny'), 
);

echo "<fieldset>";
	echo '<legend>' . elgg_echo('notification_messages:settings:objects') . '</legend>';

	// get registered objects
	$objects = get_registered_entity_types('object');

	// Blog is different - add it manually
	//if (elgg_is_active_plugin('blog')) { $objects['object']['blog'] = elgg_echo('blog:newpost'); }

	echo '<p>' . elgg_echo('notification_messages:settings:details') . '</p>';
	echo '<p><strong>' . elgg_echo('notification_messages:object:subtype') . '&nbsp;:</strong> ' . elgg_echo('notification_messages:setting');
	//echo ' - <em>' . elgg_echo('notification_messages:subject:default') . '</em>';
	echo '</p>';
	
	// @TODO on/off setting, or also allow blocking messages ?
	$subtypes = array();
	foreach($objects as $subtype) {
		$param = 'object_' . $subtype;
		if ($vars['entity']->$param == 'allow') { $subtypes[] = $subtype; }
		$options = array(
			'name' => "params[{$param}]",
			'value' => $vars['entity']->$param ? $vars['entity']->$param : 'default',
			'options_values' => $notify_subject_opt,
		);
		$msg_subtype = notification_messages_readable_subtype($subtype);
		echo '<p><label>' . $msg_subtype . '&nbsp;: ' . elgg_view('input/dropdown', $options) . '</label>';
		/* @TODO preview default message ?
		echo ' - ' . elgg_echo('notification_messages:subject:default') . '&nbsp;: ';
		//echo '<em>' . $subject . '</em>';
		//echo elgg_trigger_plugin_hook('prepare', "notification:create:object:$subtype", array(), false);
		//echo elgg_echo("$subtype:notify:subject");
		*/
		echo '</p>';
	}
	
	// Save all enabled subtypes in a single fields (for easier processing)
	$subtypes = implode(',',$subtypes);
	elgg_set_plugin_setting('object_subtypes', $subtypes, 'notification_messages');
echo "</fieldset>";


// Comment notification subject
echo "<fieldset>";
	echo '<legend>' . elgg_echo('notification_messages:settings:comments') . '</legend>';
	echo '<p>' . elgg_echo('notification_messages:settings:comments:details') . '</p>';
	
	/*
	// Generic comments support
	$options = array(
			'name' => "params[generic_comment]",
			'value' => $vars['entity']->generic_comment ? $vars['entity']->generic_comment : 'default',
			'options_values' => $notify_subject_opt,
		);
	echo '<p><label>' . elgg_echo('notification_messages:settings:generic_comment') . '&nbsp;: ' . elgg_view('input/dropdown', $options) . '</label> - ' . elgg_echo('notification_messages:subject:default') . '&nbsp;: <em>' . elgg_echo('generic_comment:email:subject') . '</em></p>';
	*/

	// Notify user if owner of a comment ?
	// Note : this is mostly useful if you want to let owner reply by email
	echo '<p><label>' . elgg_echo("notification_messages:settings:notify_user");
	if (elgg_is_active_plugin('comment_tracker')) {
		// Synchronize setting with comment tracker's and block editing
		$notify_owner = elgg_get_plugin_setting('notify_owner', 'comment_tracker');
		$vars['entity']->notify_owner = $notify_owner;
		echo '&nbsp;: ' . $noyes_options[$vars['entity']->notify_owner] . '</label>';
		echo "<div class='elgg-subtext'>" . elgg_echo("notification_messages:settings:notify_user:details") . "</div>";
		echo "<div class='elgg-subtext'><strong>" . elgg_echo("notification_messages:settings:notify_user:comment_tracker") . "</strong></div>";
	} else {
		echo "&nbsp;" . elgg_view("input/dropdown", array("name" => "params[notify_owner]", "options_values" => $noyes_options, "value" => $vars['entity']->notify_owner)) . '</label>';
		echo "<div class='elgg-subtext'>" . elgg_echo("notification_messages:settings:notify_user:details") . "</div>";
	}
	echo "</p>";
	
echo "</fieldset>";


// Notification message content override - @TODO could be enabled for any content type, if we want
/* This setting has become useless for blog only => enable for any content, or set both subject + body
*/
echo "<fieldset>";
	echo '<legend>' . elgg_echo('notification_messages:settings:objects:message') . '</legend>';
	$param = "object_blog_message";
	$options = array(
		'name' => "params[{$param}]",
		'value' => $vars['entity']->$param ? $vars['entity']->$param : 'default',
		'options_values' => $notify_message_opt,
	);
	echo '<p><label>' . 'blog' . '&nbsp;: ' . elgg_view('input/dropdown', $options) . '</label> - ' . elgg_echo('notification_messages:message:default:blog') . '</p>';
	
echo "</fieldset>";


// Direct messages in HTML
echo "<fieldset>";
	echo '<legend>' . elgg_echo('notification_messages:settings:messages') . '</legend>';

	echo '<p><label>' . elgg_echo("notification_messages:settings:messages_send");
	echo "&nbsp;" . elgg_view("input/dropdown", array("name" => "params[messages_send]", "options_values" => $yesno_options, "value" => $vars['entity']->messages_send)) . '</label>';
	echo "<div class='elgg-subtext'>" . elgg_echo("notification_messages:settings:messages_send:subtext") . "</div>";
	echo "</p>";
echo "</fieldset>";


// Advanced settings - for file attachments
// @TODO : this should be updated to Elgg 1.11 standards...
echo "<fieldset>";
	echo '<legend>' . elgg_echo('notification_messages:settings:expert') . '</legend>';

	echo '<p><label>' . elgg_echo("notification_messages:settings:object_notifications_hook");
	echo "&nbsp;" . elgg_view("input/dropdown", array("name" => "params[object_notifications_hook]", "options_values" => $yesno_options, "value" => $vars['entity']->object_notifications_hook)) . '</label>';
	echo "<div class='elgg-subtext'>" . elgg_echo("notification_messages:settings:object_notifications_hook:subtext") . "</div>";
	echo "</p>";
echo "</fieldset>";


