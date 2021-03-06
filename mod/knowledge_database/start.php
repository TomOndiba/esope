<?php
/**
 * knowledge_database
 *
 * @package knowledge_database
 *
 */

/* NOTES DE DEV : 
	- l'ajout des meta se fait via un hook lors de l'enregistrement : 
	cela permet d'être générique tout en ne s'appliquant qu'aux contenus dont le container est le groupe approprié
	Même principe pour le form : on extend tjs le form, mais on n'affiche les champs en plus que si c'est dans le bon groupe et que pour les outils qui y sont activés
*/

/* @TODO
 - Allow to enable 2 modes : 
 		* global site setting
 		* per-group setting
 - L'idée est que l'on puisse définir une base de donnée globale, et/ou pour chaque groupe. 
 - En cas de double définition, le réglage du groupe prend le pas.
*/

elgg_register_event_handler('init', 'system', 'knowledge_database_init');

/**
 * Init theme plugin.
 */
function knowledge_database_init() {
	
	elgg_extend_view('css/elgg', 'knowledge_database/css');
	elgg_extend_view('css/admin', 'knowledge_database/css');
	
	// Ajout bloc spécifique dans les groupes (informatif)
	elgg_extend_view('groups/profile/summary', 'knowledge_database/group_extend');
	// Ajout interface de recherche pour le groupe associé à la KDB
	elgg_extend_view('groups/profile/summary', 'knowledge_database/group_profile_extend', 800);
	
	// Add extra fields to objects create/edit form (below tags)
	elgg_extend_view('input/tags', 'knowledge_database/object_form_extend', 800);
	// @TODO add setting to enable/disable extension
	elgg_extend_view('object/elements/full', 'knowledge_database/object_extend', 800);
	
	// Intercept create/edit event to update metadata on objects
	elgg_register_event_handler("create", "object", "knowledge_database_object_handler_event");
	elgg_register_event_handler("update", "object", "knowledge_database_object_handler_event");
	
	// Ajout gestionnaire d'agenda pour le site public
	elgg_register_page_handler('kdb','knowledge_database_page_handler');
	
	// KDB search endpoint
	elgg_register_action("knowledge_database/search", elgg_get_plugins_path() . 'knowledge_database/actions/knowledge_database/search.php', 'public');
	
	// KDB define metadata field edit
	elgg_register_action("knowledge_database/define_field", elgg_get_plugins_path() . 'knowledge_database/actions/knowledge_database/define_field.php');
	
}



// Page handler for Knowledge Database
function knowledge_database_page_handler($page) {
	$base = elgg_get_plugins_path() . 'knowledge_database/pages/knowledge_database/';
	if (!isset($page[0])) { $page[0] = 'index'; }
	switch ($page[0]) {
		case 'define_field':
			set_input('name', $page[1]);
			if (include($base . 'define_field.php')) { return true; }
			break;
		case 'download':
			set_input('guid', $page[1]);
			set_input('field_name', $page[2]);
			if (include($base . 'download.php')) { return true; }
			break;
		case 'add':
			if (include($base . 'add.php')) { return true; }
			break;
		case 'user':
		case 'group':
			if (!empty($page[1])) { set_input('container_guid', $page[1]); } else { forward('kdb'); }
		case 'public':
		case 'search':
		case 'index':
		default:
			if (include($base . 'index.php')) { return true; }
	}
	return false;
}


// Determine user role
/* Determine role for knowledge_database
 * Returns public (default), user, owner, admin
 * Note : this function should trigger a hook to enable role definition
 * Also plugin settings could help define roles by using direct selection
 */
function knowledge_database_get_user_role($params = array('entity' => false, 'user' => false, 'group' => false)) {
	
	// Default to loggedin user only if there is no param (wrong param don't need to default)
	if (!$params['user'] && elgg_is_logged_in()) { $params['user'] = elgg_get_logged_in_user_entity(); }
	
	if (elgg_instanceof($params['user'], 'user')) {
		
		// Real admin => admin
		if (elgg_is_admin_logged_in()) { return 'admin'; }
		
		// If user is a group admin => admin
		if (elgg_instanceof($params['group'], 'group')) {
			if ($params['group']->canEdit($params['user']->guid)) { return 'admin'; }
		}
		
		// Content owner has some rights
		if ($params['entity']->owner_guid == $params['user']->guid) {
			return 'owner';
		}
		
		// Otherwise it's a regular user
		return 'user';
	}
	
	// Default : public (no specific role)
	return 'public';
}



/* Build options array from settings
 * Allowed separators are *only* one option per line, or | separator (we want to accept commas and other into fields)
 * Accepts key::value and list of keys
 * e.g. val1 | val2, or val1::Name 1 | val2::Name 2
 */
function knowledge_database_build_options($source, $addempty = true, $prefix = 'knowledge_database:key') {
	$values = elgg_get_plugin_setting($source, 'knowledge_database');
	return esope_build_options($values, $addempty = true, $prefix);
}


/* KDB object create/update event handler
 * Saves the custom fields to the edited entities
 * @TODO make it actually work...
 */
function knowledge_database_object_handler_event($event, $type, $object) {
	// KDB fields apply only for objects (at least for now)
	if (!empty($object) && elgg_instanceof($object, "object")) {
		
		// Get all KDB fields - and use only those defined and allowed
		$meta = knowledge_database_get_all_kdb_fields();
		if ($meta) {
			// We'll need user role to determine field access
			$role = knowledge_database_get_user_role($user, $container, $entity);
			
			foreach ($meta as $name) {
				// Check that we are allowed to edit this field
				$config = knowledge_database_get_field_config($name);
				if (!knowledge_database_edit_field($config, $role, $object)) { continue; }
				
				// Finally get the data and edit !
				$value = get_input($name, false);
				// Add only metadata if we have something, even empty, but not undefined
				if ($value !== false) {
					// Reset metadata (handle multiple values case)
					$object->{$name} = null;
					// Add metadata
					$object->{$name} = $value;
				}
			}
		}
	}
}


// Replace default icon by Font Awesome icons
function knowledge_database_get_icon($entity, $size = 'small') {
	$icon = $entity->getIconURL($size);
	if (empty($icon) || ($icon == elgg_normalize_url("_graphics/icons/default/$size.png"))) {
		switch($entity->getSubtype()) {
			case 'blog':
				$icon = '<i class="fa fa-file-text-o"></i>';
				break;
			case 'bookmarks':
				$icon = '<i class="fa fa-link"></i>';
				break;
			case 'file':
				$icon = '<i class="fa fa-file"></i>';
				break;
			default:
				$icon = '<i class="fa fa-file-text-o"></i>';
		}
	} else {
		$icon = '<img src="' . $icon . '" />';
	}
	//return '<div class="image-block image-block-' . $size . '">' . $icon . '</div>';
	return '<span class="image-size-' . $size . '">' . $icon . '</span>';
}



// @TODO
/* Returns the allowed field in a given context
 * Uses plugin settings to determine available fields in site and/or group, merging and access rules
 */
function knowledge_database_get_field_config($name = false) {
	if (!empty($name)) {
		$config = elgg_get_plugin_setting('field_' . $name, 'knowledge_database');
		return unserialize($config);
	}
	return false;
}


// @TODO : add more details on fields
function knowledge_database_define_field_config($key) {
	
	$config = knowledge_database_get_field_config($key);
	
	$edit_link = '<strong>' . $key . '</strong>';
	$name = $config['title'];
	if (empty($name)) { $name = elgg_echo("knowledge_database:field:$key"); }
	if ($name && ($name != "knowledge_database:field:$key")) { $edit_link .= ' (' . $name . ')'; }
	
	$params = array(
			'text' => '<i class="fa fa-cog"></i> ' . elgg_echo('edit') . ' ' . $key, 
			'title' => elgg_echo('knowledge_database:settings:field:metadata', array($key)),
			'rel' => 'nofollow', 
			'class' => 'elgg-lightbox', 
			'href' => elgg_get_site_url()  . 'kdb/define_field/' . $key,
		);
	$edit_link .= ' &nbsp; [' . $config['type'] . ']';
	$edit_link .= ' &nbsp; ' . elgg_view('output/url', $params);
	
	return '<p class="knowledge_database-field">' . $edit_link . '</p>';
}

/* Define the fields, and any options

Roles config :
 - true/false for all (not set means false)
 - array('role1', 'role2') for limited role list
 - array('role1' = array('step1', 'step2')) for limited role list for workflow steps
Roles can be passed as a parameter to the rendering function, and can be derived from 
  any data on the platform (profile type, context, custom list, etc.)

	$name => array(
		'type' => 'text',              // input/output field types (both views should exist, or at least input)
		'category' => 'main',          // fieldset
		'read' => true,               // roles who can read this field : see Roles config above
		'edit' => array(),            // roles which can edit this field : same as read options
		// Other options for input
		'params' => array(
			'required' => false, // is the field required
			'options_values' => array(), // Use '' for empty field
			'default' => '', // Default value if none set
		),
	);
*/

/* @TODO : Renders a series of fields into fieldsets
 * $fields : fields config array 'name' => array()
 * $params : other parameters and passed vars :
     - role : the user role
     - mode : edit or view, determines the rendering views (input/output)
     - entity : the entity these fields apply to, if any (values and workflows states)
 */
/* @TODO : rendre certains outputs cliquables, pour renvoyer sur la recherche : http://localhost/esope_1.12/kdb?meta=value&...
 */
function knowledge_database_render_fields($fields = array(), $params = array()) {
	$url = elgg_get_site_url();
	$entity = elgg_extract('entity', $params, false);
	$role = elgg_extract('role', $params, 'public');
	$mode = elgg_extract('mode', $params, 'edit');
	if (!elgg_instanceof($entity)) { $entity = false; }
	
	// Build rendering fields
	$fieldset_fields = array();
	foreach($fields as $name => $field) {
		if ($mode == "edit") {
			// Check if we are allowed to edit this
			if (!knowledge_database_edit_field($field, $role, $entity)) { continue; }
			$view = 'input';
		} else {
			// Check if we are allowed to read this
			if (!knowledge_database_read_field($field, $role, $entity)) { continue; }
			$view = 'output';
		}
		$field_content = '';
		
		// Skip field display in view mode if there is no value
		// Note : "PHP Fatal error:  Can't use function return value in write context" with old PHP version
		$test_name = implode('', $entity->{$name});
		if (($mode == 'view') && $entity && (empty($entity->{$name}) || (is_array($entity->{$name}) && empty($test_name)))) { continue; }
		//if (($mode == 'view') && $entity && (empty($entity->{$name}) || (is_array($entity->{$name}) && empty(implode('', $entity->{$name}))))) { continue; }

		// Build field params
		$fieldset = $field['category'];
		if (empty($fieldset)) { $fieldset = 'default'; }
		$output_params = $field['params'];
		$output_params['name'] = $name;
		// Set default if not set
		if ($entity && isset($entity->{$name})) {
			$output_params['value'] = $entity->{$name};
		} else {
			$output_params['value'] = $field['default'];
		}
		// Use correct select input
		if (in_array($field['type'], array('dropdown', 'pulldown', 'select'))) { $field['type'] = 'dropdown'; }
		if ($view == 'input') {
			// Add autocomplete script
			if (($field['type'] == 'text') && $field['params']['autocomplete']) {
				$field_content .= elgg_view('input/add_autocomplete', array('name' => $name, 'autocomplete-data' => esope_get_meta_values($name)));
			}
			// Switch dropdown input to multiselect if multiple enabled
			if (($field['type'] == 'dropdown') && $field['params']['multiple'] && elgg_view_exists('input/multiselect')) {
				$field['type'] = 'multiselect';
			}
		
			/*
			if (($field['type'] == 'select') && $entity && (sizeof($entity->{$name}) > 1)) {
				$field['type'] = 'multiselect';
			}
			*/
			if ($field['type'] == 'tags') {
				register_error("Tags view will break ! Please ask an admin to correct the Knowledge Database configuration !");
				continue;
			}
		} else {
			// View mode
			if (in_array($field['type'], array('select', 'multiselect'))) {
				if (!is_array($output_params['value'])) { $output_params['value'] = array($output_params['value']); }
				$field['type'] = 'text';
				if ($field['params']['options_values']) {
					$translated_values = array();
					if (is_array($entity->{$name})) {
						foreach($entity->{$name} as $k) {
							if (isset($field['params']['options_values'][$k])) {
								$translated_values[] = $field['params']['options_values'][$k];
							} else {
								$translated_values[] = $k;
							}
						}
					} else {
						$translated_values[] = $field['params']['options_values'][$entity->{$name}];
					}
					$output_params['value'] = $translated_values;
				} else {
					$output_params['value'] = $entity->{$name};
				}
			}
			if (is_array($output_params['value']) && in_array($field['type'], array('text', 'date'))) {
				$output_params['value'] = implode(', ', $output_params['value']);
			}
		}
		
		// Render input/output field
		if (!elgg_view_exists("$view/{$field['type']}")) {
			register_error("View $view/{$field['type']} does not exist. Please ask an admin to correct the Knowledge Database configuration !");
			continue;
		}
		$title = $field['title'];
		if (empty($title)) { $title = elgg_echo("knowledge_database:field:$name"); }
		if ($title == "knowledge_database:field:$name") { $title = $name; }
		$field_content .= '<p>';
		$field_content .= '<strong>' . $title . '&nbsp;:</strong> ';
		// Render the view
		$field_content .= elgg_view("$view/{$field['type']}", $output_params);
		// Add input hints
		if ($view == 'input') {
		$field_help = elgg_echo("knowledge_database:field:$name:details");
			if ($field_help != "knowledge_database:field:$name:details") { $field_content .= '<br /><em>' . $field_help . '</em>'; }
		}
		$field_content .= '</p>';
		// Content special renderer depends on field type
		switch($field['type']) {
			case 'file':
				if ($entity && !empty($entity->{$name})) {
					$filename = explode('/', $entity->{$name});
					$filename = end($filename);
					if ($name == 'icon') {
						$field_content .= '<p>' . elgg_echo("knowledge_database:attachment") . '&nbsp;: <a href="' . $url . 'knowledge_database/download/' . $entity->guid . '/' . $name . '" target="_blank"><img src="' . $url . 'knowledge_database/download/' . $entity->guid . '/' . $name . '?inline=true" class="kdb-field-file" /></a></p>';
					} else {
						$field_content .= '<p>' . elgg_echo("knowledge_database:attachment") . '&nbsp;: <a href="' . $url . 'knowledge_database/download/' . $entity->guid . '/' . $name . '" target="_blank">Télécharger le fichier &laquo;&nbsp;' . $filename . '&nbsp;&raquo;</a></p>';
					}
				}
				break;
			default:
		}
		// Add field to appropriate fieldset
		$fieldset_fields[$fieldset] .= $field_content;
	}
	
	// Render fields into fieldsets
	foreach ($fieldset_fields as $fieldset => $fields_content) {
		if ($fieldset == 'default') {
			$content .= '<div class="clearfloat"></div><br />';
			$content .= $fields_content;
		} else {
			$content .= '<fieldset class="knowledge_database-fieldset">';
			$content .= '<legend>' . elgg_echo("knowledge_database:fieldset:$fieldset") . '</legend>';
			$content .= $fields_content;
			$content .= '</fieldset>';
		}
	}
	
	// Return complete form
	return $content;
}



// Wrapper function to determine read access on a field
function knowledge_database_read_field($field_config, $role = 'public', $entity = false) {
	return knowledge_database_field_access($field_config, 'read', $role, $entity);
}

// Wrapper function to determine edit access on a field
function knowledge_database_edit_field($field_config, $role = 'public', $entity = false) {
	return knowledge_database_field_access($field_config, 'edit', $role, $entity);
}

// Determine read/write access to a specific field based on fields config, role and current workflow state
function knowledge_database_field_access($field_config, $action = 'read', $role = 'public', $entity = false) {
	// Not readable/editable field (not set means false)
	if (!$field_config[$action]) { return false; }
	// Action config set
	if (is_array($field_config[$action])) {
		// Undefined role not defined, or role set to false means no access
		if (!$field_config[$action][$role]) { return false; }
		//if (!($field_config[$action][$role] || in_array($role, $field_config[$action]))) { return false; }
		// Checking workflow states if they're set
		if (is_array($field_config[$action][$role])) {
			// Check workflow rights only if it is a workflow object
			if (!elgg_instanceof($entity, 'object')) {
				// @TODO check if this is wanted behaviour ?
				// If entity is not set yet, $role can be considered as public, 
				// Any restriction should be applied before that, on $role level, so let's allow read/write
			} else {
				// Check workflow only if it has been set for this entity
				// Not in allowed workflow states for this role
				if (!empty($entity->workflow) && !isset($field_config[$action][$role][$entity->workflow])) { return false; }
			}
		}
	}
	return true;
}


// @TODO : make this more robust and failsafe
// Add file to an entity (using a specific folder in datastore)
function knowledge_database_add_file_to_entity($entity, $input_name = 'file') {
	return esope_add_file_to_entity($entity, $input_name);
}

// Remove existing file
function knowledge_database_remove_file_from_entity($entity, $input_name = 'file') {
	return esope_remove_file_from_entity($entity, $input_name);
}



/* Checks if fields can be added to the currently edited entity
 * Returns false if not, array of field names if OK
 * Function relies on page owner and context, which can be set manually to force getting fields if needed
 */
function knowledge_database_get_kdb_fields($owner = false, $context = false) {
	if (!$owner) { $owner = elgg_get_page_owner_entity(); }
	if (!$context) { $context = elgg_get_context(); }
	// Note : no fields or any other where KDB doesn't apply returns false
	$fields = false;
	
	// Enabled anywhere content is published in : site, group, user
	if (elgg_instanceof($owner, 'group') || elgg_instanceof($owner, 'user') || elgg_instanceof($owner, 'site')) {
		
		// Check that we are in the right context to apply this only to wanted objects
		// Note : we must not filter for the container here ! (not necessarly a group)
		$kdb_tools = knowledge_database_get_allowed_tools();
		if (in_array($context, $kdb_tools)) {
			
			// Is site KDB enabled globally ?
			$kdb_site = knowledge_database_is_site_kdb_enabled();
			
			// Is a KDB enabled for this particular group (or entity..) ?
			$kdb_group = knowledge_database_is_kdb_group($owner->guid);
			
			// Get used fields names
			if ($kdb_group) {
				// Group fields + optional site fields
				if ($kdb_site && elgg_get_plugin_setting('enable_merge', 'knowledge_database') == 'yes') {
					$fields = knowledge_database_get_group_kdb_fields($owner->guid, true);
				} else {
					// Group fields only
					$fields = knowledge_database_get_group_kdb_fields($owner->guid, false);
				}
			} else if ($kdb_site) {
				// Site fields only
				$fields = knowledge_database_get_site_kdb_fields();
			}
			
		}
	}
	// Return fields that can be used in this context
	return $fields;
}
function knowledge_database_get_kdb_fields_config($owner = false, $context = false) {
	$fields = knowledge_database_get_kdb_fields($owner, $context);
	$fields_config = array();
	// Build full fields config array
	if ($fields) {
		foreach ($fields as $key) {
			$field_config = elgg_get_plugin_setting('field_' . $key, 'knowledge_database');
			$field_config = unserialize($field_config);
			$fields_config[$key] = $field_config;
		}
	}
	return $fields_config;
}

// Returns allowed KDB subtypes
function knowledge_database_get_allowed_tools($group_guid = false) {
	// Check group filter
	if ($group_guid) {
		$group = get_entity($group_guid);
		if (!elgg_instanceof($group, 'group')) { $group_guid = false; }
	}
	
	$tools = elgg_get_plugin_setting('kdb_subtypes', 'knowledge_database');
	$tools = esope_get_input_array($tools);
	$filtered_tools = array();
	if ($tools) foreach ($tools as $tool) {
		// Exclude disabled plugin
		if (!elgg_is_active_plugin($tool)) { continue; }
		// Exclude disabled group tool
		if ($group_guid && ($group->{$tool . '_enable'} != 'yes')) { continue; }
		// Add to tools list
		$filtered_tools[] = $tool;
	}
	
	return $filtered_tools;
}
// Returns allowed KDB field types
function knowledge_database_get_field_types() {
	$field_types = elgg_get_plugin_setting('kdb_inputs', 'knowledge_database');
	// @TODO auto-fill (from profile manager, or available views, or some default fields set ?)
	if (empty($field_types)) {
		$field_types = "text, longtext, plaintext, select, multiselect, date, tags, email, file, color";
	}
	$field_types = esope_get_input_array($field_types);
	$inputs = array();
	if ($field_types) {
		foreach ($field_types as $field_type) {
			if (elgg_view_exists('input/' . $field_type)) {
				// Add to available field types list
				$inputs[$field_type] = $field_type;
			}
		}
	}
	return $inputs;
}

/* Returns an array of allowed subtypes, for use in a elgg_get_ function
 * $options_values : if true prepares the array for a select view, if false for get functions
 * $tools : the array of tools, as provided e.g. by knowledge_database_get_allowed_tools
 */
function knowledge_database_get_allowed_subtypes($options_values = false, $tools = false) {
	$subtypes = null;
	if (!$tools) $tools = knowledge_database_get_allowed_tools();
	if ($options_values) {
		// Note : we will always return a no-filter option for dropdowns
		$subtypes[''] = elgg_echo('knowledge_database:subtype:all');
		if ($tools) foreach ($tools as $tool) {
			if ($tool == 'pages') {
				$subtypes['page_top'] = elgg_echo("knowledge_database:subtype:$tool");
				$subtypes['page'] = elgg_echo("knowledge_database:subtype:$tool");
			} else {
				$subtypes[$tool] = elgg_echo("knowledge_database:subtype:$tool");
			}
		}
	} else {
		if ($tools) foreach ($tools as $tool) {
			if ($tool == 'pages') {
				$subtypes[] = 'page_top';
				$subtypes[] = 'page';
			} else {
				$subtypes[] = $tool;
			}
		}
	}
	return $subtypes;
}

// Returns all defined fields (site + all groups)
function knowledge_database_get_all_kdb_fields() {
	$fields = elgg_get_plugin_setting('all_fields', 'knowledge_database');
	return esope_get_input_array($fields);
}

// Returns site fields
function knowledge_database_get_site_kdb_fields() {
	$fields = elgg_get_plugin_setting('site_fields', 'knowledge_database');
	return esope_get_input_array($fields);
}

// Returns fields for a specific group
// Optionally adds site fields
function knowledge_database_get_group_kdb_fields($guid, $include_site = false) {
	$fields = elgg_get_plugin_setting('group_fields_' . $guid, 'knowledge_database');
	if ($include_site) {
		if (elgg_get_plugin_setting('enable_site', 'knowledge_database') == 'yes') {
			if (!empty($fields)) { $fields .= ', '; }
			$fields .= elgg_get_plugin_setting('site_fields', 'knowledge_database');
		}
	}
	return esope_get_input_array($fields);
}


/* Tells if the site KDB is enabled */
function knowledge_database_is_site_kdb_enabled() {
	if (elgg_get_plugin_setting('enable_site', 'knowledge_database') == 'yes') { return true; }
	return false;
}

/* Tells if a group is a KDB group (= explicitely set as KDB group) */
function knowledge_database_is_kdb_group($group_guid) {
	$groups_guids = elgg_get_plugin_setting('enable_groups', 'knowledge_database');
	$groups_guids = esope_get_input_array($groups_guids);
	if (in_array($group_guid, $groups_guids)) { return true; }
	return false;
}



