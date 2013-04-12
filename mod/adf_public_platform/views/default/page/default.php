<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *************Changed for Theme****************
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title'] The page title
 * @uses $vars['body'] The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */

// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
  elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
  elgg_admin_add_plugin_settings_menu();
  elgg_unregister_css('elgg');
  echo elgg_view('page/admin', $vars);
  return true;
}


// Set the content type
header("Content-type: text/html; charset=UTF-8");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body>
<div class="elgg-page elgg-page-default">
  <div class="elgg-page-messages">
    <?php echo elgg_view('page/elements/messages', array('object' => $vars['sysmessages'])); ?>
  </div>
  
  <!-- Theme Content -->
<?php /*
  <div id="page_container"> 
    <div id="wrapper_header">
*/ ?>

      <?php echo elgg_view('adf_platform/adf_header'); ?>
      
      <section>
        <div class="interne interne-content">
          <?php echo elgg_view('page/elements/body', $vars); ?>
          <div class="clearfloat"></div>
        </div>
      </section>
      
      <?php echo elgg_view('page/elements/footer', $vars); ?>
      
<?php /*
    </div><!-- wrapper_header //-->
  </div><!-- page_container //-->
*/ ?>
  <!-- Theme Content -->
  
</div>

<!-- END -->

<!-- JS deferred scripts -->
<?php echo elgg_view('page/elements/foot'); ?>

</body>
</html>
