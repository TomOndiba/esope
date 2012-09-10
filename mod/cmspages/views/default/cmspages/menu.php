<?php
/**
* Elgg CMS pages menu
* 
* @package ElggCMSpages
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
* @author Facyla
* @copyright Facyla 2010
* @link http://id.facyla.net/
* 
*/

$limit = get_input('limit', 100);
$offset = get_input('offset', 0);
$pagetype = elgg_get_friendly_title($vars['pagetype']); // CMS Page type - used instead of GUIDs to select cmspage entities
//$pagetype = str_replace('-', '_', $pagetype);
$url = $vars['url'] . "pg/cmspages/index.php?pagetype=$pagetype"; // Set the base url
$new_page = true;

// Empty pagetype or very short pagetypes are not allowed
$tooshort = (strlen($pagetype)<3) ? true : false;

//$cmspages_count = get_entities("object", "cmspage", 0, "time_created asc", $limit, $offset, true, 0); // 1.6
//$cmspages = get_entities("object", "cmspage", 0, "time_created asc", $limit, $offset, false, 0); // 1.6
//$params = array('types' => 'object', 'subtypes' => 'cmspage', 'owner_guids' => 0, 'limit' => $limit, 'offset' => $offset, 'order_by' => 'time_created asc', );
$params = array('types' => 'object', 'subtypes' => 'cmspage', 'limit' => $limit, 'offset' => $offset, 'order_by' => 'time_created asc');
$cmspages = elgg_get_entities($params);
$cmspages_count = sizeof($cmspages);

// Construit le menu, et détermine au passage si la page existe ou non
foreach ($cmspages as $cmspage) {
  //$cmspage->delete(); // DEBUG/TEST : uncomment and run cmspages menu once to clean delete all cmspages (appears on page reload) - don't forget to comment again !
  
  if ($cmspage->pagetype != $pagetype) {
    $page_options .= (strlen($cmspage->pagetitle) > 0) ? '<option value="' . $cmspage->pagetype . '">' . $cmspage->pagetitle . ' (' . $cmspage->pagetype . ')</option>' : '<option value="' . $cmspage->pagetype . '">' . $cmspage->pagetype . '</option>';
  } else {
    // Si la page demandée existe, la sélectionne (+ marqueur pas nouvelle page)
    $new_page = false; // La page existe bien..
    $cmspage_title = (strlen($cmspage->pagetitle) > 0) ? $cmspage->pagetitle.' (' .$pagetype.')' : $pagetype;
    $page_options .= '<option value="' . $pagetype . '" selected="selected">&nbsp;&gt;&gt;&nbsp;' . $cmspage_title . '&nbsp;&lt;&lt;&nbsp;</option>';
  }
}
// Si la page n'existe pas encore, ajoute l'entrée dans le menu
if ($new_page) {
  $cmspage_title = ($tooshort) ? elgg_echo('cmspages:createmenu', array($pagetype)) : elgg_echo('cmspages:newpage', array($pagetype));
  $page_options .= '<option value="' . $pagetype . '" selected="selected">&nbsp;&gt;&gt;&nbsp;' . $cmspage_title . '&nbsp;&lt;&lt;&nbsp;</option>';
}
?>


<form name="cmspage_switcher">
  <select name="pagetype"  onChange="javascript:document.cmspage_switcher.submit();">
    <option value="" disabled="disabled"><?php echo elgg_echo('cmspages:pageselect'); ?></option>
    <?php echo $page_options; ?>
  </select>
  <?php echo elgg_echo('cmspages:pagescreated', array($cmspages_count)); ?>
   &nbsp; &nbsp; <a href="javascript:void(0);" class="inline_toggler" onclick="$('#cmspages_instructions').toggle();"><?php echo elgg_echo('cmspages:showinstructions'); ?></a>
  <div id="cmspages_instructions" style="display:none;"><?php echo elgg_echo('cmspages:instructions'); ?></div>
</form><br />

<div class="elgg-tabs elgg-htabs">
  <ul>
    <?php if ($tooshort) { ?>
      <li class="selected"><form name="new_cmspage">
    <?php } else { ?>
      <li class="selected"><a href="<?php echo $url; ?>"><?php echo $cmspage_title; ?></a></li>
      <li><form name="new_cmspage">
    <?php } ?>
      <?php
      $title_value = ($tooshort) ? $pagetype : " + "; $tab_w = "5ex;";
      if (empty($title_value)) $title_value = elgg_echo('cmspages:settitle');
      $tab_w = strlen($title_value); $tab_nw = ($tab_w < 40) ? 40 : $tab_w;
      ?>
      <input type="text" style="border:0; width:<?php echo $tab_w; ?>ex;" name="pagetype" value="<?php echo $title_value; ?>" onclick="if (this.value=='<?php echo $title_value; ?>') { this.value=''; this.style.width='40ex' }" title="<?php echo elgg_echo('cmspages:newtitle'); ?>" />
      <noscript><input type="submit" style="border:0; margin:0; padding:1px 1px 3px 1px; font-size:10px; background: #0000FF;" value="<?php echo elgg_echo('cmspages:new'); ?>" /> &nbsp; </noscript>
    </form></li>
    
    <?php if (!$new_page) {
      //$this_pages = get_entities_from_metadata('pagetype', $pagetype, "object", "cmspage", 0, 1, 0, "", 0, false); // 1.6
      $options = array( 'metadata_names' => 'pagetype', 'metadata_values' => $pagetype, 'types' => 'object', 'subtypes' => 'cmspage', 'limit' => 1, 'offset' => 0, 'order_by' => '', 'count' => false );
      $this_pages = elgg_get_entities_from_metadata($options);
      
      if ($this_pages) {
        $this_page = $this_pages[0];
        $cmspage_guid = $this_page->guid;
      }
    ?>
      <li style="float:right;" class="delete">
      <?php
      $delete_form_body = '<input type="hidden" name="cmspage_guid" value="' . $cmspage_guid . '" /><input type="submit" name="delete" value="' . elgg_echo('cmspages:delete') . '" onclick="javascript:return confirm(\'' . elgg_echo('cmspages:deletewarning') . '\');" style="height:24px; border-bottom:0;" />';
      //echo '<div style="float:right;" id="delete_group_option">' . elgg_view('input/form', array('action' => $vars['url'] . "action/cmspages/delete", 'body' => $delete_form_body)) . '</div>';
      $delete_form_body .= elgg_view('input/securitytoken');
      echo '<div style="float:right;" id="delete_group_option"><form method="post" action="' . $vars['url'] . 'action/cmspages/delete">' . $delete_form_body . '</form></div>';
      ?>
    <?php } ?>
    </li>
  </ul>
</div>
