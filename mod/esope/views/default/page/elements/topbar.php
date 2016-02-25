<?php
/* ESOPE topbar (override)
 * In ESOPE, the topbar is part of the header
 * See page/elements/header view for header and main navigation content
 * 
 * The topbar menu is defined and customized here
 */

$url = elgg_get_site_url();
$urlicon = $url . 'mod/esope/img/theme/';

$site = elgg_get_site_entity();
$title = $site->name;
$prev_q = get_input('q', '');


if (elgg_is_logged_in()) {
	$own = elgg_get_logged_in_user_entity();
	$ownguid = $own->guid;
	$ownusername = $own->username;
	
	
	// Demandes de contact en attente : affiché seulement s'il y a des demandes en attente
	$friendrequests_options = array("type" => "user", "count" => true, "relationship" => "friendrequest", "relationship_guid" => $own->guid, "inverse_relationship" => true);
	$friendrequests_count = elgg_get_entities_from_relationship($friendrequests_options);
	if ($friendrequests_count == 1) {
		$friendrequests = '<a class="elgg-menu-counter" href="' . $url . 'friend_request/' . $ownusername . '" title="' . $friendrequests_count . ' ' . elgg_echo('esope:friendinvite') . '">' . $friendrequests_count . '</a>';
	} else if ($friendrequests_count > 1) {
		$friendrequests = '<a class="elgg-menu-counter" href="' . $url . 'friend_request/' . $ownusername . '" title="' . $friendrequests_count . ' ' . elgg_echo('esope:friendinvites') . '">' . $friendrequests_count . '</a>';
	}
	
	// Messages non lus
	if (elgg_is_active_plugin('messages')) {
		$num_messages = (int)messages_count_unread();
		if ($num_messages != 0) {
			$text = "$num_messages";
			$tooltip = elgg_echo("messages:unreadcount", array($num_messages));
			$new_messages_counter = '<a class="elgg-menu-counter" href="' . $url . 'messages/inbox/' . $ownusername . '" title="' . $tooltip . '">' . $text . '</a>';
		}
	}
	
	// Login_as menu link
	if (elgg_is_active_plugin('login_as')) {
		$original_user_guid = isset($_SESSION['login_as_original_user_guid']) ? $_SESSION['login_as_original_user_guid'] : NULL;
		if ($original_user_guid) {
			$original_user = get_entity($original_user_guid);
			$loginas_title = elgg_echo('login_as:return_to_user', array($ownusername, $original_user->username));
			$loginas_html = elgg_view('login_as/topbar_return', array('user_guid' => $original_user_guid));
			$loginas_logout = '<li id="logout">' . elgg_view('output/url', array('href' => $url . "action/logout_as", 'text' => $loginas_html, 'is_action' => true, 'name' => 'login_as_return', 'title' => $loginas_title, 'class' => 'login-as-topbar')) . '</li>';
		}
	}
	
	// @TODO : demandes en attente dans les groupes dont l'user est admin ou co-admin
	// @TODO : comptes à valider en attente
	// @TODO : autres indicateurs d'actions admin ?
	
}

if (elgg_is_active_plugin('language_selector')) {
	$language_selector = elgg_view('language_selector/default');
}

?>

<div class="is-not-floatable">
	<?php
	// TOPBAR MENU : personal tools and administration
	if (elgg_is_logged_in()) {
		?>
		<div class="menu-topbar-toggle"><i class="fa fa-user fa-menu"></i> <?php echo elgg_echo('esope:menu:topbar'); ?></div>
		<ul class="elgg-menu elgg-menu-topbar elgg-menu-topbar-alt" id="menu-topbar">
			<li><a href="<?php echo $url . 'profile/' . $ownusername; ?>" id="esope-profil"><img src="<?php echo $own->getIconURL('topbar'); ?>" alt="<?php echo $own->name; ?>" /> <?php echo $own->name; ?></a></li>
			<li id="msg">
				<a href="<?php echo $url . 'messages/inbox/' . $ownusername; ?>"><i class="fa fa-envelope-o mail outline icon"></i><?php echo elgg_echo('messages'); ?></a>
				<?php if ($new_messages_counter) { echo $new_messages_counter; } ?>
			</li>
			<li id="man">
				<a href="<?php echo $url . 'friends/' . $ownusername; ?>"><?php echo elgg_echo('friends'); ?></a>
				<?php echo $friendrequests; ?>
			</li>
			<li id="usersettings"><a href="<?php echo $url . 'settings/user/' . $ownusername; ?>"><i class="fa fa-cog setting icon"></i><?php echo elgg_echo('esope:usersettings'); ?></a></li>
					<!--
			<li><?php echo elgg_echo('esope:myprofile'); ?></a>
					<li><a href="<?php echo $url . 'profile/' . $ownusername . '/edit'; ?>">Compléter mon profil</a></li>
					<li><a href="<?php echo $url . 'avatar/edit/' . $ownusername . '/edit'; ?>">Changer la photo du profil</a></li>
			</li>
					//-->
			<?php if (elgg_is_admin_logged_in()) { ?>
				<li id="admin"><a href="<?php echo $url . 'admin/dashboard/'; ?>"><i class="fa fa-cogs settings icon"></i><?php echo elgg_echo('admin'); ?></a></li>
			<?php } ?>
			
			<?php
			$helplink = elgg_get_plugin_setting('helplink', 'esope');
			//if (empty($helplink)) $helplink = 'pages/view/182/premiers-pas';
			if (!empty($helplink)) echo '<li id="help"><a href="' . $url . $helplink . '"><i class="fa fa-question help icon"></i>' . elgg_echo('esope:help') . '</a></li>';
			?>
			<?php if ($loginas_logout) { echo $loginas_logout; } ?>
			<li id="logout"><?php echo elgg_view('output/url', array('href' => $url . "action/logout", 'text' => '<i class="fa fa-sign-out sign out icon"></i>' . elgg_echo('logout'), 'is_action' => true)); ?></li>
			<?php
			if ($language_selector) {
				echo '<li class="language-selector">' . $language_selector . '</li>';
			}
			?>
		</ul>
		<?php
	} else {
		// @TODO use drop-down login without the button UI (or re-designed)
		//echo elgg_view('core/account/login_dropdown');
		echo '<ul class="elgg-menu elgg-menu-topbar elgg-menu-topbar-alt">';
			echo '<li><a href="' . $url . '"><i class="fa fa-sign-in sign in icon"></i>' . elgg_echo('esope:loginregister') . '</a></li>';
			if ($language_selector) {
				echo '<li class="language-selector">' . $language_selector . '</li>';
			}
		echo '</ul>';
	}
	?>
	
	<div class="clearfloat"></div>
	<h1>
		<a href="<?php echo $url; ?>" title="<?php echo elgg_echo('esope:gotohomepage'); ?>">
			<?php echo elgg_get_plugin_setting('headertitle', 'esope'); ?>
		</a>
	</h1>
	
</div>

