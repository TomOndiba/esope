<?php
/**
 * Elgg GUID Tool
 * 
 * @package ElggGUIDTool
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.com/
 */

global $CONFIG;

admin_gatekeeper();
elgg_set_context('admin');

$formats = guidtool_get_import_actions();

$title = elgg_echo("guidtool:pickformat");
$body = elgg_view('forms/guidtool/format', array('formats' => $formats));

$body = elgg_view_layout('admin', array('title' => $title, 'content' => $body));

echo elgg_view_page($title, $body);
