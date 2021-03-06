<?php
/**
 * Elgg long text input
 * Displays a long text input field that can use WYSIWYG editor
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['value']    The current value, if any - will be html encoded
 * @uses $vars['disabled'] Is the input field disabled?
 * @uses $vars['class']    Additional CSS class
 */

elgg_register_js('elgg.tinymce_simple', elgg_get_simplecache_url('js', 'tinymce_simple'));
elgg_register_simplecache_view('js/tinymce_simple');

elgg_load_js('elgg.tinymce_simple');

if (isset($vars['class'])) {
	$vars['class'] = "elgg-input-simpletext {$vars['class']}";
} else {
	$vars['class'] = "elgg-input-simpletext";
}

$defaults = array(
	'value' => '',
	//'id' => 'elgg-input-' . rand(), //@todo make this more robust
	'id' => 'elgg-input-' . esope_unique_id(''),
);

$vars = array_merge($defaults, $vars);

$value = $vars['value'];
unset($vars['value']);

echo elgg_view_menu('longtext', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
	'id' => $vars['id'],
));

?>
<div class="clearfloat"></div>
<textarea <?php echo elgg_format_attributes($vars); ?>>
<?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false); ?>
</textarea>
