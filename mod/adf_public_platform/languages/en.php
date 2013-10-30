<?php
/**
 * English strings
 */

$footer_default = '<div class="mts clearfloat right"><a href="http://elgg.org"><img src="' . elgg_get_site_url() . '_graphics/powered_by_elgg_badge_drk_bckgnd.gif" alt="Powered by Elgg" width="106" height="15" /></a></div>';

$en = array(
	
	//Theme settings
	'admin:appearance:adf_theme' => "Theme configuration",
	
	// Overrides plugins translations
	// Note : these additions are made here rather than in the original plugins so that a core update won't break them
  'river:comment:object:announcement' => "%s has commented %s",
  'widgets:profile_completeness:view:tips:link' => "<br />%s&raquo;&nbsp;Complete my profile!%s",
	
	'widget:toggle' => "Show/hide %s module",
	'widget:editmodule' => "Configure %s module",

	// Announcements: missing translation keys - Annonces : manque des clefs de trad
	'announcements:summary' => "Announcement title",
	'announcements:body' => "Announcement text",
	'announcements:post' => "Publish announcement",
	'announcements:edit' => "Edit announcement",
	'announcements:delete:nopermission' => "Cannot delete announcement: you don't have the proper permissions to do that.",
	'announcements:delete:failure' => "Cannot delete announcement.",
	'announcements:delete:sucess' => "Announcement published",
	'object:announcement:save:permissiondenied' => "Cannot save announcement: you don't have the proper permissions to do that.",
	'object:announcement:save:descriptionrequired' => "Cannot save announcement: announcement text cannot be empty.",
	'object:announcement:save:success' => "Announcement saved",
	'item:object:category' => "Used categories",
	'item:object:topicreply' => "Forum reply",
	
	
	
	// Theme translation & other customizations
	// Traductions du thème et autres personnalisations
'adf_platform:groupinvite' => "pending group invite request",
 	'adf_platform:groupinvites' => "pending groups invites requests",
	'adf_platform:friendinvite' => "pending friendship request",
	'adf_platform:friendinvites' => "pending friendship requests",
	'adf_platform:gotohomepage' => "Go to home page",
	'adf_platform:usersettings' => "My Settings",
	'adf_platform:myprofile' => "My Profile",
	'adf_platform:help' => "Help",
	'adf_platform:loginregister' => "Login / register",
	'adf_platform:joinagroup' => "Join a group",
	'adf_platform:categories' => "Categories",
	'adf_platform:directory' => "Directory",
	'adf_platform:event_calendar' => "Calendar",
	'adf_platform:search' => "Search",
	'adf_platform:groupicon' => "group icon",
	'adf_platform:categories:all' => "Categories news",
	'adf_platform:members:online' => "Online members",
	'adf_platform:members:newest' => "Newest members",
	'adf_platform:groups:featured' => "Featured groups",
	
	// Widgets
	'adf_platform:widget:bookmark:title' => 'My Bookmarks',
	'adf_platform:widget:brainstorm:title' => 'My Brainstorm ideas',
	'adf_platform:widget:blog:title' => 'My Blog articles',
	'adf_platform:widget:event_calendar:title' => 'My calendar',
	'adf_platform:widget:file:title' => 'My Files',
	'adf_platform:widget:group:title' => 'My Groups',
	'adf_platform:widget:page:title' => 'My Pages',
	
	'accessibility:sidebar:title' => "Tools",
	//'breadcrumb' => "Fil d'Ariane",
	'breadcrumbs' => "Back to ",
	// Pending requests
	'decline' => "Decline",
	'refuse' => "Refuse",
	/* Pagination */
	'previouspage' => "Previous page",
	'nextpage' => "Next page",
	/* Members search */
	'searchbytag' => "Tag search",
	'searchbyname' => "Name search",
	// Generic actions
	'delete:message' => "Delete selected message(s)",
	'markread:message' => "Mark selected message(s) as read",
	'toggle:messages' => "toggle messages selection",
	'messages:send' => "Send message",
	'save:newgroup' => "Create the group!",
	'save:group' => "Save group changes",
	'upload:avatar' => "Load image",
	'save:settings' => "Save the configuration",
	'save:usersettings' => "Save my settings",
	'save:usernotifications' => "Save my notification settings for members",
	'save:groupnotifications' => "Save my notification settings for groups",
	'save:widgetsettings' => "Save widget settings",
	// Notifications
	'link:userprofile' => "%s's profile page",
	
	// Widgets settings
	'onlineusers:numbertodisplay' => "Max amount of connected members to display",
	'newusers:numbertodisplay' => "Max amount of new members to display",
	'brainstorm:numbertodisplay' => "Max amount of new ideas to display",
	'river:numbertodisplay' => "Max amount of activities to display",
	'group:widget:num_display' => "Max amount of groups to display",
	
	'more:friends' => "More friends", 
	
	// New group
	// @TODO This text should definitely be adapted to your own install - HTML can be used here ; 
	// use $CONFIG->url for site install URL, $CONFIG->email for site email
	'groups:newgroup:disclaimer' => "<blockquote><strong>Group creation rules:</strong> <em>Please refer to General User Conditions.</em></blockquote>",
	
	// 
	'accessibility:allfieldsmandatory' => "<sup class=\"required\">*</sup> All fields are required",
	'accessibility:requestnewpassword' => "Ask for a new password",
	'accessibility:revert' => "Delete",
	
	
	'adf_platform:homepage' => "Homepage",
	'announcements' => "Announcements",
	'event_calendar' => "Calendar",
	
	'adf_platform:access:public' => "Public (accessible to non-loggedin visitors)",
	
	'brainstorm:widget:description' => "Displays your brainstorm ideas.",
	'bookmarks:widget:description' => "Displays your bookmarks list.",
	'pages:widget:description' => "Displays your pages.",
	'event_calendar:widget:description' => "Displays your upcoming events.",
	'event_calendar:num_display' => "Number of events to display",
	'messages:widget:title' => "Unread messages",
	'messages:widget:description' => "Displays your latest unread messages.",
	'messages:num_display' => "Number of messages to display",
	
	
	// Layout settings
	'adf_platform:settings:help' => "The configuration panels let you configure numerous elements of your site: graphical elements, interface, couleurs, stylesheets, etc., and also some behaviours.",
	'adf_platform:settings:layout' => "To reset to initial configuration, replace content by \"RAZ\" (in HTML mode).",
	'adf_platform:faviconurl' => "Favicon URL",
	'adf_platform:faviconurl:help' => "Relative URL of website favicon (PNG or ICO image, usually 64x64 pixels).",
	'adf_platform:headertitle' => "Site title (clickable, in header)",
	'adf_platform:headertitle:help' => "To increase size of caracters, wrap them with span. Use span with 'minuscule' class to lowercase&nbsp;: &lt;span&gt;T&lt;/span&gt;itle.&lt;span class=\"minuscule\"&gt;en&lt;/span&gt;",
	'adf_platform:header:content' => "Custom header code (free HTML). Reset to initial configuration by replacing content by \"RAZ\" (in HTML mode).",
	'adf_platform:header:default' => '<div id="easylogo"><a href="/"><img src="' . $vars['url'] . '/mod/adf_public_platform/img/logo.gif" alt="Site logo"  /></a></div>',
	'adf_platform:header:height' => "Height of header banner (use same value as header background image height - or lower)",
	'adf_platform:header:background' => "Background image URL (display under the top level menu)",
	'adf_platform:footer:color' => "Footer background color",
	'adf_platform:footer:content' => "Footer content",
	'adf_platform:footer:default' => $footer_default,
	'adf_platform:home:displaystats' => "Display stats on home page",
	'adf_platform:css' => "Add here your own CSS styles",
	'adf_platform:css:help' => "The CSS you add here are loaded after the main CSS (without overriding it), and after any plugins CSS.",
	'adf_platform:css:default' => "/* Edit headers style */\nheader {  }\n\n/* Links */\na, a:visited {  }\na:hover, a:active, a:focus {  }\n\n/* Titles */\nh1, h2, h3, h4, h5 {  }\n/* etc. */\n",
	'adf_platform:dashboardheader' => "Custom introduction text before the user dashboard.",
	'adf_platform:index_wire' => "Add The Wire on homepage.",
	'adf_platform:index_groups' => "Display featured groups",
	'adf_platform:index_members' => "Display online and newly registered members",
	'adf_platform:homegroup_guid' => "Choose main group / help group",
	'adf_platform:homegroup_index' => "Display latest group activity ?",
	'adf_platform:homesite_index' => "DIsplay latest site activity ?",
	'adf_platform:homegroup_autojoin' => "Auto-register new members in this group ? (if forced, will also register anyone who left the group)",
	
	'adf_platform:homeintro' => "Introduction block on public homepage (above register/login forms).",
	'adf_platform:settings:colors' => "Theme colors",
	'adf_platform:title:color' => "Title color",
	'adf_platform:text:color' => "Text color",
	'adf_platform:link:color' => "Link color",
	'adf_platform:link:hovercolor' => "Link color on hover (and color inversions)",
	'adf_platform:color1:color' => "Top shading color for header",
	'adf_platform:color2:color' => "Top shading color for widgets/modules",
	'adf_platform:color3:color' => "Bottom shading color for widgets/modules",
	'adf_platform:color4:color' => "Bottom shading color for header",
	'adf_platform:color5:color' => "Top shading color for buttons",
	'adf_platform:color6:color' => "Bottom shading color for buttons",
	'adf_platform:color7:color' => "Top shading color for buttons (hover)",
	'adf_platform:color8:color' => "Bottom shading color for buttons (hover)",
	'adf_platform:color9:color' => "Custom color 9",
	'adf_platform:color10:color' => "Custom color 10",
	'adf_platform:color11:color' => "Custom color 11",
	'adf_platform:color12:color' => "Custom color 12",
	'adf_platform:color13:color' => "Main submenu background color",
	'widgets:dashboard:add' => "Edit my homepage",
	'widgets:profile:add' => "Add widgets to my homepage",
	'adf_platform:settings:publicpages' => "Public pages (viewable by non-loggedin visitors)",
	'adf_platform:settings:publicpages:help' => "\"Public pages\" are viewable by anyone, without logging to the site. They are usually legal notices, and other important public pages of your website.<br />Add the relative URL of the pages, one per line, without the domaine name (or subdirectory), and without any initial slash ('/'), e.g.: pages/view/1234/legal-notice",
	'adf_platform:home:public_profiles' => "Public profile",
	'adf_platform:home:public_profiles:help' => "This settings lets site members decide whether they want to make their profil visible from the internet, without logging into the site. By default, their profile will be restricted to site mùembers, until they explicitely set their profile as public. If this setting is disabled, profiles will be public.<br />Note : in \"intranet\" mode, no page is visible from the internet, including profile pages, so this setting has no effect.",
	'adf_platform:usersettings:public_profiles:title' => "Choose my profile visibility",
	'adf_platform:usersettings:public_profile' => "Set my profile as public",
	'adf_platform:usersettings:public_profile:help' => "By default your profile is only visible from site members, so your profile is not publicly exposed without your permission. This setting lets you define wether you want to make your profile visible from the internet.<br />Please note that all your other visiblility settings on fields or widgets will also apply : if you have chosen that your phone number or contact list is restricted to your contacts only, making your profile pûblic won't make these information public, and they still will be restricted to your contacts.<br />It is avised to set your profile as public if you wish to show your skills or share any information on the internet.",
	'adf_platform:action:public_profile:error' => "There was an error while changing your settings.",
	'adf_platform:action:public_profile:saved' => "Your profile visibility has been successfully modified.",
	'adf_platform:usersettings:public_profile:public' => "Your profile is now PUBLIC.",
	'adf_platform:usersettings:public_profile:private' => "Your profile is now RESTRICTED TO MEMBERS.",
		
	
	// Behaviour settings
	'adf_platform:index:url' => "Index page file URL (must be includable)",
	'adf_platform:settings:redirect' => "Relative redirect URL after login",
	'adf_platform:settings:replace_public_home' => "Relative URL to replace public homepage (default: leave empty)",
	'adf_platform:settings:replace_home' => "Replace default homepage by a user dashboard",
	'adf_platform:settings:firststeps' => "Firsts steps page GUID",
	'adf_platform:settings:firststeps:help' => "This page will display the first month for new users. Le GUID de la page est le nombre indiqué dans l'adresse de la page à utiliser : <em>" . elgg_get_site_url() . "/pages/<strong>GUID</strong>/premiers-pas</em>. Note: must be of 'page' subtype.",
	'adf_platform:settings:footer' => "Footer content",
	'adf_platform:settings:headerimg' => "Header image (default: 85px height)",
	'adf_platform:settings:headerimg:help' => "Set relative URL of an image which will be positionned at the center of the header, right under the top level menu, and will be repeated horizontally if needed. Please use a 85px height image, large enough to avoid repetition on large screens (2000px minimum advised). For other dimensions, please add corresponding CSS declarations in the custom CSS below (change height according to your needs) : <em>header { height:115px; }</em>",
	'adf_platform:settings:helplink' => "Help page",
	'adf_platform:settings:helplink:help' => "Relative URL of main help page. This will be used for the \"Help\" link in top level menu. Relative URL only, no external link.",
	'adf_platform:settings:backgroundimg' => "Background image",
	'adf_platform:settings:backgroundimg:help' => "Relative URL of background image, which will be repeated vertically and horizontally.",
	'adf_platform:settings:backgroundcolor' => "Background color",
	'adf_platform:settings:backgroundcolor:help' => "Background color is useful if you don't set any background image, or while background image loads.",
	'adf_platform:settings:groups_disclaimer' => "Set the disclaimer message for future group owners, while they create a new group. Leave empty for an empty message.",
	'adf_platform:settings:blog_user_listall' => "List all blog articles (personal + groups)",
	'adf_platform:settings:bookmarks_user_listall' => "List all bookmarks (personal + groups)",
	'adf_platform:settings:brainstorm_user_listall' => "List all ideas (personal + groups)",
	'adf_platform:settings:file_user_listall' => "List all files (personal + groups)",
	'adf_platform:settings:pages_user_listall' => "List all pages (personal + groups)",
	
	'river:select:all:nofilter' => "All (no activity filter)",
	
	// Widget settings
	'adf_platform:settings:widget:blog' => "Allow widget : Blog",
	'adf_platform:settings:widget:bookmarks' => "Allow widget : Bookmarks",
	'adf_platform:settings:widget:brainstorm' => "Allow widget : Ideas",
	'adf_platform:settings:widget:event_calendar' => "Allow widget : My calendar",
	'adf_platform:settings:widget:file' => "Allow widget : My files",
	'adf_platform:settings:widget:groups' => "Allow widget : My groups",
	'adf_platform:settings:widget:pages' => "Allow widget : Pages (wiki)",
	'adf_platform:settings:widget:friends' => "Allow widget : My friends",
	'adf_platform:settings:widget:group_activity' => "Allow widget : Group activity",
	'adf_platform:settings:widget:messages' => "Allow widget : Unread messages",
	'adf_platform:settings:widget:river_widget' => "Allow widget : Site activity",
	'adf_platform:settings:widget:twitter' => "Allow widget : Twitter",
	'adf_platform:settings:widget:tagcloud' => "Allow widget : Tag cloud",
	'adf_platform:settings:widget:videos' => "Allow widget : Videos",
	'adf_platform:settings:widget:profile_completeness' => "Allow widget : Profile completion",
	'adf_platform:settings:widget:profile_completeness:help' => "This widget can be enabled/disabled in Profile Manager plugin configuration",
	'webprofiles' => "Online profiles",
	'webprofiles:description' => "Profiles on a bunch of big social networks, plus websites URLs and email addresses",
	'webprofiles:widget:title' => "Online profiles",
	'webprofiles:widget:description' => "Displays a block with links to your profiles, identities and online contacts : : video, facebook, linkedin, twitter, doyoubuzz, web sites and email addresses, etc.",
	'webprofiles:widget:help' => "Set your profiles on various services to display the service icon with a link to your profile. You can also add websites email addresses and RSS feeds.",
	
	'adf_platform:settings:filters:friends' => "Remove \"Friends\" tab in listings ? (default : No)",
	'adf_platform:settings:filters:mine' => "Remove \"Mine\" tab in listings ? (default : No)",
	'adf_platform:settings:filters:all' => "Remove \"All\" tab in listings ? (default : No)",
	'adf_platform:settings:groups:inviteanyone' => "Allow to invite any member in groups ? (default : No = contacts only)",
	'adf_platform:groups:allowregister' => "Register in the group",
	'adf_platform:settings:groups:allowregister' => "Allows group admins to register members in the group, instead of only inviting them.",
	'adf_platform:settings:members:onesearch' => "Keep only general member search ? (default : No)",
	'adf_platform:settings:members:online' => "Display online members on sidebar (default : no)",
	
	'adf_platform:settings:contact:contactemail' => "Contact email",
	'adf_platform:settings:contactemail:help' => "",
	'adf_platform:settings:rss' => "RSS feed URL",
	'adf_platform:settings:rss:help' => "",
	'adf_platform:settings:twitter' => "Twitter page URL (account or hashtag search)",
	'adf_platform:settings:twitter:help' => "",
	'adf_platform:settings:facebook' => "Facebook page/account URL",
	'adf_platform:settings:facebook:help' => "",
	'adf_platform:settings:googleplus' => "Google+ page/account URL",
	'adf_platform:settings:googleplus:help' => "",
	'adf_platform:settings:linkedin' => "Linkedin page/account URL",
	'adf_platform:settings:linkedin:help' => "",
	'adf_platform:settings:netvibes' => "Netvibes page/account URL",
	'adf_platform:settings:netvibes:help' => "",
	'adf_platform:settings:flickr' => "FlickR page/account URL",
	'adf_platform:settings:flickr:help' => "",
	'adf_platform:settings:youtube' => "Youtube page/account URL",
	'adf_platform:settings:youtube:help' => "",
	'adf_platform:settings:dailymotion' => "Dailymotion page/account URL",
	'adf_platform:settings:dailymotion:help' => "",
	'adf_platform:settings:pinterest' => "Pinterest page/acount URL",
	'adf_platform:settings:pinterest:help' => "",
	'adf_platform:settings:tumblr' => "Tumblr page/account URL",
	'adf_platform:settings:tumblr:help' => "",
	'adf_platform:settings:slideshare' => "Slideshare page/account URL",
	'adf_platform:settings:slideshare:help' => "",
	

	// DATES
	'date:format' => 'D, F d, Y',
	'date:day:0' => 'Sunday',
	'date:day:1' => 'Monday',
	'date:day:2' => 'Tuesday',
	'date:day:3' => 'Wednesday',
	'date:day:4' => 'Thursday',
	'date:day:5' => 'Friday',
	'date:day:6' => 'Saturday',
	'date:month:1' => 'January',
	'date:month:2' => 'February',
	'date:month:3' => 'March',
	'date:month:4' => 'April',
	'date:month:5' => 'May',
	'date:month:6' => 'June',
	'date:month:7' => 'July',
	'date:month:8' => 'August',
	'date:month:9' => 'September',
	'date:month:10' => 'October',
	'date:month:11' => 'November',
	'date:month:12' => 'December',
	
	'adf_platform:dashboard:title' => "My custom homepage",
	'adf_platform:welcome:msg' => "Welcome on your social platform.<br />Site adminis, please edit this message through the theme configuration !",
	'adf_platform:firststeps:linktitle' => "First steps (click to show/hide)",
	'adf_platform:site:activity' => "Recent activity",
	'adf_platform:thewire:togglelink' => "Publish on &#x25BC;'s wire",
	'adf_platform:homewire:title' => "%s's wire'",
	'adf_platform:thewire:charleft' => "left",
	'adf_platform:thewire:access' => "Access : ",
	'adf_platform:homewire:msg' => "Would you share an idea or info ?",
	'members:search' => "Members search",
	
);

add_translation('en', $en);
