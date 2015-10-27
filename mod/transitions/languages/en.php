<?php
$url = elgg_get_site_url();

return array(
	'transitions' => 'Contributions',
	'transitions:transitions' => 'Contributions',
	'transitions:revisions' => 'Revisions',
	'transitions:archives' => 'Archives',
	'item:object:transitions' => 'Contributions',

	'transitions:title:user_transitions' => '%s\'s contributions',
	'transitions:title:all_transitions' => 'All site contributions',
	'transitions:title:friends' => 'Friends\' contributions',

	'transitions:group' => 'Group contributions',
	'transitions:enabletransitions' => 'Enable group contributions',
	'transitions:write' => 'Write a contribution',

	// Editing
	'transitions:add' => 'Add a contribution',
	'transitions:edit' => 'Edit contribution',
	'catalogue:add' => "Add a contribution",
	'catalogue:edit' => "Complete your contribution",
	'transitions:edit:details' => "To make this resource more readable in the Catalog, please complete its description:",
	'transitions:excerpt' => 'Excerpt',
	'transitions:body' => 'Body',
	'transitions:save_status' => 'Last saved: ',
	
	'transitions:revision' => 'Version',
	'transitions:auto_saved_revision' => 'Auto Saved version',

	// messages
	'transitions:message:saved' => 'Contribution saved.',
	'transitions:error:cannot_save' => 'Cannot save contribution.',
	'transitions:error:cannot_auto_save' => 'Cannot automatically save contribution.',
	'transitions:error:cannot_write_to_container' => 'Insufficient access to save contribution to group.',
	'transitions:messages:warning:draft' => 'There is an unsaved draft of this contribution!',
	'transitions:edit_revision_notice' => '(Old version)',
	'transitions:message:deleted_post' => 'Contribution deleted.',
	'transitions:error:cannot_delete_post' => 'Cannot delete contribution.',
	'transitions:none' => 'No contribution',
	'transitions:error:missing:title' => 'Please enter a contribution title!',
	'transitions:error:missing:description' => 'Please enter the body of your contributions!',
	'transitions:error:cannot_edit_post' => 'This contribution may not exist or you may not have permissions to edit it.',
	'transitions:error:post_not_found' => 'Cannot find specified contribution.',
	'transitions:error:revision_not_found' => 'Cannot find this revision.',
	'transitions:error:actor_not_found' => "Unable to fing this actor.",
	'transitions:error:not_an_actor' => "This contribution is not an actor.",

	// river
	'river:create:object:transitions' => '%s published a contribution %s',
	'river:comment:object:transitions' => '%s commented on the contribution %s',

	// notifications
	'transitions:notify:summary' => 'New contribution called %s',
	'transitions:notify:subject' => 'New contribution: %s',
	'transitions:notify:body' => '
%s published a new contribution: %s

%s

View and comment on the contribution:
%s
',

	// widget
	'transitions:widget:description' => 'Display your latest contributions',
	'transitions:moretransitions' => 'More contributions',
	'transitions:numbertodisplay' => 'Number of contributions to display',
	'transitions:notransitions' => 'No contribution',
	
	
	// NEW STRINGS
	'transitions:title:actor' => "Name",
	'transitions:title:project' => "Project name",
	'transitions:title:event' => "Event name", // Used in JS
	'transitions:icon' => "Contribution illustration",
	'transitions:icon:details' => "Select an image to illustrate your contribution.",
	'transitions:icon:new' => "Add an illustration",
	'transitions:icon:change' => "Change the illustration",
	'transitions:icon:remove' => "Remove current image",
	'transitions:attachment' => "Attached file",
	'transitions:attachment:details' => "You can attach file to your contribution. If you wish to attach several files, please make a ZIP file and upload it.",
	'transitions:attachment:new' => "Attach a file",
	'transitions:attachment:remove' => "Remove attached file",
	'transitions:category' => "Category",
	'transitions:category:choose' => "Select a category",
	'transitions:title' => "Title of your contribution",
	'transitions:tags' => "Tags",
	'transitions:tags:placeholder' => "Tags",
	'transitions:tags:details' => "Add several tags to improve the sorting of your contribution.<br />Eg.: theory, experimentation, ecology",
	'transitions:excerpt' => "Your contribution in 140 caracters",
	'transitions:resources' => "Linked resources",
	'transitions:url' => "Link to an online resource",
	'transitions:url:details' => "If your contribution refers to an online resource, please specify its address here.",
	'transitions:lang' => "Language of your contribution",
	'transitions:lang:details' => "In which language have you written this contribution?",
	'transitions:resourcelang' => "Attached resources language",
	'transitions:resourcelang:details' => "Specify the language used in the attached resource(s) (URL or file), if it is available in another language.",
	'transitions:territory' => "Territory",
	'transitions:territory:details' => "If the resource refers to a specific territory, please specify which one. Please use an precise location that can be placed on a map, eg.: \"8 passage Brûlon, Paris, France\" or \"Drôme, France\" or \"Madagascar\".",
	'transitions:actortype' => "Actor type",
	'transitions:startdate' => "Start date & time",
	'transitions:enddate' => "End date & time",
	'transitions:start' => "Start date",
	'transitions:start:format' => "Eg. DD/MM/YYYY, MM/YYYY or YYYY",
	'transitions:end' => "End date",
	'transitions:end:format' => "Eg. DD/MM/YYYY, MM/YYYY or YYYY",
	'transitions:dateformat' => "M Y",
	'transitions:dateformat:time' => "d M Y at H:i",
	'transitions:date:since' => "Since",
	'transitions:date:until' => "Until",
	'transitions:rss_feed' => "RSS feed",
	'transitions:rss_feed:details' => "RSS feed URL that is assoiated with this challenge",
	'transitions:challenge:collection' => "Collection associated with the challenge",
	'transitions:challenge:collection:details' => "Choose a resources collection to associate with this challenge.",
	'transitions:savedraft' => "Publish my contribution",
	'transitions:saveandedit' => "Keep editing",
	'transitions:quickform:title' => "Quick contribution",
	'transitions:quickform:details' => "By clicking on the  \"Keep editing\" button, your contribution will be saved in \"draft\" mode, and you will be able to complete it before publishing it.",
	'transitions:preview' => "Save",
	'transitions:save' => "Publish",
	'transitions:owner_username' => "Contribution owner",
	'transitions:owner_username:details' => "To transfer the contribution to another contributor, indicate its username above (write a few letters to get a choice list).",
	'transitions:featured:title' => "Featured contributions",
	'transitions:background:title' => "Background contributions",
	'transitions:featured' => "Feature / put in background",
	'transitions:featured:details' => "You can feature or put a publication in the background. This has an impact on the contribution visibility, by displaying it on the homepage, or removing it from default search results.",
	'transitions:featured:no' => "No (default)",
	'transitions:featured:yes' => "Yes (in background)",
	'transitions:featured:default' => "Standard (default)",
	'transitions:featured:featured' => "Feature (more visible)",
	'transitions:featured:background' => "Background (less visible)",
	'transitions:search:rss' => "RSS feed for this search",
	'transitions:search:ical' => "iCal feed",
	'transitions:filter' => "Filter the contributions",
	'transitions:filter:featured' => "Featured",
	'transitions:filter:background' => "In background",
	'transitions:filter:recent' => "Recent",
	'transitions:filter:read' => "Most read",
	'transitions:filter:commented' => "Most commentend",
	'transitions:filter:enriched' => "Most contributed",
	
	// Other forms
	'transitions:accountrequired' => "Please login to contribute.<br />If you do not have an account yet, this is very quick! <a href=\"" . $url . "register\" target=\"_blank\" class=\"elgg-button elgg-button-action\">Create my Transitions² contributor account</a>",
	'transitions:tags_contributed' => "Contributors tags",
	'transitions:addtag' => "Tag",
	'transitions:addtag:submit' => "Add a tag",
	'transitions:addtag:details' => "You can add one or several tags to help better categorisation of this resource.",
	'transitions:addtag:success' => "Tag added",
	'transitions:addtag:emptytag' => "No tag to add",
	'transitions:addtag:alreadyexists' => "This tag has already been added",
	'transitions:addlink' => "Link",
	'transitions:addlink:details' => "You can link this resource to another online resource, by adding a link and a short explanation. <br />To link several resources, please use this form several times.",
	'transitions:addlink:submit' => "Add the link",
	'transitions:addlink:success' => "Resource added",
	'transitions:addlink:emptylink' => "No resource to add",
	'transitions:addlink:invalidlink' => "Not a valid URL",
	'transitions:addlink:alreadyexists' => "This resource has already been added",
	'transitions:addlink:url' => "URL",
	'transitions:addlink:url:placeholder' => "Resource URL",
	'transitions:addlink:comment' => "Explanation",
	'transitions:addlink:comment:placeholder' => "Why do you link to this resource?",
	'transitions:addlink:add' => "+ Add a link",
	'transitions:addlink:remove' => "Remove this link",
	'transitions:addlink:remove:confirm' => "Do you confirm you wish to remove this link? This cannot be undone.",
	'transitions:links_supports' => "Support resources",
	'transitions:relation:supports' => "support",
	'transitions:links_invalidates' => "Opposition resources",
	'transitions:relation:invalidates' => "opposition",
	'transitions:links' => "Contributors links",
	'transitions:links_comment' => "Contributors links comment",
	'transitions:links:placeholder' => "Resource URL",
	'transitions:links_comment:placeholder' => "Explanation in one line",
	'transitions:related_actors' => "Actors that are partners of this project",
	'transitions:addactor' => "Add an Actor",
	'transitions:addactor:details' => "You can associate an Actor to this project. <br />To associate several actors, please use this form several times.",
	'transitions:addactor:submit' => "Add the Actor",
	'transitions:addactor:select' => "Select an actor",
	'transitions:addactor:noneselected' => "No actor selected",
	'transitions:addactor:success' => "Actor added",
	'transitions:addactor:error' => "This actor could not be added",
	'transitions:addactor:emptyactor' => "No acteur selected",
	'transitions:addactor:alreadyexists' => "T his actor has already been added",
	'transitions:related_content' => "Content linked to this challenge",
	'transitions:form:addrelation' => "Add a relation",
	'transitions:addrelation' => "Add a relation",
	'transitions:addrelation:noneselected' => "No resource selected",
	'transitions:addrelation:success' => "Linked resource added",
	'transitions:addrelation:error' => "This resource could not be added",
	'transitions:addrelation:emptyactor' => "No resource selected",
	'transitions:addrelation:alreadyexists' => "This resource has already been adde",
	'transitions:index' => "Contributions catalog",
	'transitions:search' => "Search",
	'transitions:search:go' => "Go",
	'transitions:search:placeholder' => "Search a contribution",
	'transitions:search:results' => "%s results",
	'transitions:search:result' => "Only 1 result! &nbsp; If you were thinking to a specific resource, do not hesitate to add your own contribution.",
	'transitions:search:noresult' => "No result! &nbsp; We are waiting for your contributions ;-)",
	'transitions:socialshare' => "Mail and social networks",
	'transitions:socialshare:details' => "Use the following social links to publish this contribution on social networks.",
	//'transitions:permalink' => "Permalink",
	'transitions:permalink' => "Link",
	'transitions:permalink:details' => "Use the following permalink to refer to this contribution.",
	//'transitions:shortlink' => "Short link",
	'transitions:shortlink' => "Link",
	'transitions:shortlink:details' => "Use the following short link for your sharings.",
	//'transitions:embed' => "Embed code",
	'transitions:embed' => "Embed",
	'transitions:embed:details' => "Copy-paste the following HTML code to embed this contribution on another web site. You can tweak the block dimensions by changing the values after \"width\" and \"height\".",
	'transitions:embed:search' => "Select a resource",
	'transitions:embed:search:actor' => "Select an actor",
	'transitions:share' => "Share",
	'transitions:share:details' => "You can share this resource on other sites with the following sharing links.",
	'transitions:charleft' => "remaining characters",
	'transitions:charleft:warning' => "The excess characters will not be displayed",
	'transitions:ical' => "ICAL feed for this page",
	
	// Bookmarklet
	'transitions:bookmarklet' => "Bookmarklet",
	'transitions:bookmarklet:link' => "+Transitions²",
	'transitions:bookmarklet:title' => "Add this link to your shortcuts to publish directly on Transitions²",
	'transitions:bookmarklet:description' => "The bookmarklet \"+Transitions²\" facilitates the sharing of online resources on Transitions². To use it, drag the above button to the link bar of your browser. If you use Internet Explorer, right-clikc on the link and add it to faites un clic droit sur le bouton et ajoutez-leyour favorites, then in your links bar.",
	'transitions:bookmarklet:descriptionie' => "If you use Internet Explorer, right-clikc on the link and add it to faites un clic droit sur le bouton et ajoutez-leyour favorites, then in your links bar.",
	'transitions:bookmarklet:description:conclusion' => "You can create a new contribution from any web page by clicking on the bookmarklet.",
	
	
	// Select values
	'transitions:lang:other' => "Other language",
	
	'transitions:category:nofilter' => "All",
	'transitions:category:knowledge' => "<i class=\"fa fa-lightbulb-o\"></i> Knowledge",
	'transitions:category:knowledge:details' => "Studies, references, statistics, indicators...",
	'transitions:category:experience' => "<i class=\"fa fa-book\"></i> Story, experience",
	'transitions:category:experience:details' => "Testimonies",
	'transitions:category:imaginary' => "<i class=\"fa fa-magic\"></i> Imaginary",
	'transitions:category:imaginary:details' => "Prospective scenarii, utopies and dystopies, models, fictions...",
	'transitions:category:tools' => "<i class=\"fa fa-wrench\"></i> Tool or method",
	'transitions:category:tools:details' => "Guides, methodologies, technical tools...",
	'transitions:category:actor' => "<i class=\"fa fa-user\"></i> Actor",
	'transitions:category:actor:details' => "Individuals, groups, organisations, institutions...",
	'transitions:category:project' => "<i class=\"fa fa-cube\"></i> Project",
	'transitions:category:project:details' => "Realisations, projects and initiatives ; passed, present or future; successful or failed...",
	'transitions:category:event' => "<i class=\"fa fa-calendar\"></i> Event",
	'transitions:category:event:details' => "A highlight, a date to remember, a workshop, a meeting, brief any type of event that can be added to a calendar!",
	'transitions:category:editorial' => "<i class=\"fa fa-newspaper-o\"></i> Editorial product",
	'transitions:category:editorial:details' => "Referencing of articles, files, publications, etc. about the link between both transitions, based or not on Transitions²",
	'transitions:category:challenge' => "<i class=\"fa fa-trophy\"></i> Challenge",
	'transitions:category:challenge:details' => "A challenge adressed to the readers and contributors of Transitions².",
	
	'transitions:actortype:individual' => "Individual",
	'transitions:actortype:collective' => "Collective",
	'transitions:actortype:association' => "Association",
	'transitions:actortype:enterprise' => "Enterprise",
	'transitions:actortype:education' => "Education or research institution",
	'transitions:actortype:collectivity' => "Local authority",
	'transitions:actortype:administration' => "Public administration",
	'transitions:actortype:plurinational' => "Multinational entity",
	'transitions:actortype:other' => "Other",
	'transitions:actortype:choose' => "Select an actor type",
	
	
	'transitions:error:missing:category' => "You have to specify a category for your contribution !",
	
	'transitions:news:comments' => "React / Display responses (%s)",
	
);
