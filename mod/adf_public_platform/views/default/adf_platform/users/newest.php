<?php $newest_members = elgg_get_entities(array('types' => 'user', 'limit' => 24));
?>

<div class="sidebarBox">
  <h3><a href="<?php echo $vars['url']; ?>members/newest"><?php echo elgg_echo('adf_platform:members:newest') ?></a></h3>
      <?php echo elgg_view('adf_platform/users/members', array('members' => $newest_members)); ?>
</div>


