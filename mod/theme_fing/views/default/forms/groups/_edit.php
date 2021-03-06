<?php
/**
* Profile Manager
* 
* Overrules group edit form to support options (radio, pulldown, multiselect)
* 
* @package profile_manager
* @author ColdTrick IT Solutions
* @copyright Coldtrick IT Solutions 2009
* @link http://www.coldtrick.com/
*/

// new groups default to open membership
if (isset($vars['entity'])) {
	$membership = $vars['entity']->membership;
	$access = $vars['entity']->access_id;
	if ($access != ACCESS_PUBLIC && $access != ACCESS_LOGGED_IN) {
		// group only - this is done to handle access not created when group is created
		$access = ACCESS_PRIVATE;
	}
} else {
	$membership = ACCESS_PUBLIC;
	$access = get_default_access();
}

if (!isset($vars['entity'])) {
	$disclaimer = elgg_get_plugin_setting('groups_disclaimer', 'adf_public_platform');
	if (empty($displaimer)) $dislaimer = '<p>' . elgg_echo('groups:newgroup:disclaimer') . '</p>';
	echo $disclaimer;
}
?>

<div>
	<label for="icon"><?php echo elgg_echo("groups:icon"); ?></label><br />
	<?php echo elgg_view("input/file", array('name' => 'icon')); ?>
</div>
<div>
	<label for="name"><?php echo elgg_echo("groups:name"); ?></label><br />
	<?php echo elgg_view("input/text", array(
		'name' => 'name',
		'value' => $vars['entity']->name,
	));
	?>
</div>
		
<?php

// retrieve group fields
$group_fields = profile_manager_get_categorized_group_fields();

if(count($group_fields["fields"]) > 0){
	$group_fields = $group_fields["fields"];
	
	foreach($group_fields as $field) {
		$metadata_name = $field->metadata_name;
		
		// get options
		$options = $field->getOptions();
		
		// get type of field
		$valtype = $field->metadata_type;
		
		// get title
		$title = $field->getTitle();
		
		// get value
		$value = '';
		if($metadata = $vars['entity']->$metadata_name) {
			if (is_array($metadata)) {
				foreach($metadata as $md) {
					if (!empty($value)) $value .= ', ';
					$value .= $md;
				}
			} else {
				$value = $metadata;
			}
		}		
		
		$line_break = '<br />';
		if ($valtype == 'longtext') {
			$line_break = '';
		}
		echo '<div><label for="'.$metadata_name.'">';
		echo $title;
		echo "</label>";
		
		if($hint = $field->getHint()){ 
			?>
			<span class='custom_fields_more_info' id='more_info_<?php echo $metadata_name; ?>'></span>		
			<span class="custom_fields_more_info_text" id="text_more_info_<?php echo $metadata_name; ?>"><?php echo $hint;?></span>
			<?php 
		}
		
		echo $line_break;
		echo elgg_view("input/{$valtype}", array(
			'name' => $metadata_name,
			'value' => $value,
			'options' => $options
		));
		echo '</div>';
	}
}

?>
<div>
	<label for="membership">
		<?php echo elgg_echo('groups:membership'); ?><br />
		<?php echo elgg_view('input/access', array(
			'name' => 'membership',
			'value' => $membership,
			'options_values' => array(
				ACCESS_PRIVATE => elgg_echo('groups:access:private'),
				ACCESS_PUBLIC => elgg_echo('groups:access:public')
			)
		));
		?>
	</label>
</div>

<?php
if (elgg_get_plugin_setting('hidden_groups', 'groups') == 'yes') {
	$this_owner = $vars['entity']->owner_guid;
	
	if (!$this_owner) {
		$this_owner = elgg_get_logged_in_user_guid();
	}
	$access_options = array(
		ACCESS_PRIVATE => elgg_echo('groups:access:group'),
		ACCESS_LOGGED_IN => elgg_echo("LOGGED_IN"),
		ACCESS_PUBLIC => elgg_echo("PUBLIC")
	);
	
	?>
	
	<div>
		<label for="vis">
				<?php echo elgg_echo('groups:visibility'); ?><br />
				<?php echo elgg_view('input/access', array(
					'name' => 'vis',
					'value' =>  $access,
					'options_values' => $access_options,
				));
				?>
		</label>
	</div>
	
	<?php 	
}

$tools = elgg_get_config('group_tool_options');
if ($tools) {
	usort($tools, create_function('$a,$b', 'return strcmp($a->label,$b->label);'));
	foreach ($tools as $group_option) {
		$group_option_toggle_name = $group_option->name . "_enable";
		// Set all tools to some default value
		$group_default_tools = elgg_get_plugin_setting('group_tools_default', 'adf_public_platform');
		if (empty($group_default_tools) || ($group_default_tools == 'no')) {
			$group_option_default_value = 'no';
		} else if ($group_default_tools == 'yes') {
			$group_option_default_value = 'yes';
		} else {
			// Let the plugins decide by themselves
			if ($group_option->default_on) { $group_option_default_value = 'yes'; } 
			else { $group_option_default_value = 'no'; }
		}
		$value = $vars['entity']->$group_option_toggle_name ? $vars['entity']->$group_option_toggle_name : $group_option_default_value;
		?>	
		<div>
			<?php
			// @TODO : Add a hint, but only if it exists
			$hint = '';
			if (elgg_echo('hint:' . $group_option->name) != 'hint'.$group_option->name) {
				//echo '<span class="group-tool-hint">' . elgg_echo('hint:' . $group_option->name) . '</span>';
				$hint = strip_tags(elgg_echo('hint:' . $group_option->name));
			}
			?>
			<label for="<?php echo $group_option_toggle_name; ?>" title="<?php echo $hint; ?>">
				<?php echo $group_option->label; ?><br />
			</label>
			<?php 
			echo elgg_view("input/radio", array(
				"name" => $group_option_toggle_name,
				'title' => $group_option->label,
				"value" => $value,
				'options' => array(
					elgg_echo('groups:yes') => 'yes',
					elgg_echo('groups:no') => 'no',
				)
			));
			/* Ce serait mieux de le faire comme ça à l'occasion, mais ça implique de revoir la manière 
			// dont on gère l'activation des outils pour les groupes 
			// = long, complexe, et maintenabilité du code compromise
			if ($value == "yes") $value = true; else $value = false;
			echo elgg_view("input/checkbox", array(
				"name" => $group_option_toggle_name,
				"title" => $group_option_toggle_name,
				"value" => $group_option->label,
				'checked' => $value,
			));
			*/
			?>
		</div>
		<?php 
	}
	
	// // @TODO : Placement des outils dans diverses zones
	/*
	if (false && elgg_is_admin_logged_in()) {
		// 1. Choix du layout : agencement des blocs
		echo "Layout switch : ";
		// 2. Placement des blocs dans le layout (blocs types infos + outils)
		// En cours de dév, ne dérangeons pas les autres...
		echo 'Fonctionnalité en cours de développement. NON FONCTIONNEL A CE JOUR<br />';
		echo '<script>
			$(function() {
				$("#group-layout ol").sortable({
					connectWith: "#group-layout ol",
					placeholder: "placeholder",
					containment: "#group-layout",
					stop: function () {
						$("#layout-group-order1").val("");
						$("#layout-group-order2").val("");
						$("#layout-group-order3").val("");
						$("#layout-group-order4").val("");
						$(\'#group-layout li\').each(function(idx, val) {
							var tool = $(this).attr(\'id\');
							var block = $(this).parent().attr(\'id\');
							// Save new value
							var oldval = $("#layout-"+block).val();
							if (oldval == "") {
								var newval = tool;
							} else {
								var newval = oldval + "," + tool;
							}
							$("#layout-"+block).val(newval);
						});
					}
				});
				$("#group-layout ol").disableSelection();
			});
	
		</script>';
		echo '<style>
			#group-layout { background:white; width:100%; }
			.group-layout-block { margin:1%; border:1px solid #000; background:white; }
			#group-layout ol { list-style-type: none; margin: 0; padding: 0; width: 100%; min-height:100px; text-align:center; }
			.group-layout-module { background:#ccc; display:block; height:20px; width:250px; margin:2px; padding:0.5em 1em; }
			</style>';
		echo '<input id="layout-group-order1" name="group-order1" type="text" value="" />';
		echo '<input id="layout-group-order2" name="group-order2" type="text" value="" />';
		echo '<input id="layout-group-order3" name="group-order3" type="text" value="" />';
		echo '<input id="layout-group-order4" name="group-order4" type="text" value="" />';
		echo '<div id="group-layout">';
		
			echo '<div class="group-layout-block" style="width:100%; ">Block 1 full width';
				echo '<ol id="group-order1">';
					$i = 0;
					foreach ($tools as $group_option) {
						if ($vars['entity']->{$group_option->name . "_enable"} == 'yes') {
							echo '<li class="tool-order" id="tool-' . $group_option->name . '"><span class="group-layout-module">' . $group_option->name . '</span></li>';
						}
					}
				echo '</ul>';
			echo '</div>';
		
			echo '<div class="group-layout-block" style="float:left; width:47%;">Block 2 column 1';
				echo '<ol id="group-order2"></ul>';
			echo '</div>';
			echo '<div class="group-layout-block" style="float:left; width:47%;">Block 3 column 2';
				echo '<ol id="group-order3"></ul>';
			echo '</div>';
			echo '<div class="clearfloat"></div>';
		
			echo '<div class="group-layout-block" style="width:100%;">Block 4 full width';
				echo '<ol id="group-order4"></ul>';
			echo '</div>';
		
			echo '<div class="clearfloat"></div>';
		
		echo '</div>';
		echo '<div class="clearfloat"></div>';
	}
	*/
	
}
?>
<div class="elgg-foot">
	<?php
	if (isset($vars['entity'])) {
		echo elgg_view('input/hidden', array(
			'name' => 'group_guid',
			'value' => $vars['entity']->getGUID(),
		));
	}
	
	if (isset($vars['entity'])) {
		echo elgg_view('input/submit', array('value' => elgg_echo('save:group')));
	} else {
		echo elgg_view('input/submit', array('value' => elgg_echo('save:newgroup')));
	}

	if (isset($vars['entity'])) {
		$delete_url = 'action/groups/delete?guid=' . $vars['entity']->getGUID();
		echo elgg_view('output/confirmlink', array(
			'text' => elgg_echo('groups:delete'),
			'title' => elgg_echo('groups:delete'),
			'href' => $delete_url,
			'confirm' => elgg_echo('groups:deletewarning'),
			'class' => 'elgg-button elgg-button-delete float-alt',
		));
	}
	?>
</div>

