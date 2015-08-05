<?php
return array(
	'transitions' => "Contributions",
	'transitions:transitions' => "Contributions",
	'transitions:revisions' => "Révisions",
	'transitions:archives' => "Archives",
	'item:object:transitions' => "Contributions",

	'transitions:title:user_transitions' => "Contributions de %s",
	'transitions:title:all_transitions' => "Tous les contributions du site",
	'transitions:title:friends' => "Contributions des contacts",

	'transitions:group' => "Contributions du groupe",
	'transitions:enabletransitions' => "Activer les contributions du groupe",
	'transitions:write' => "Écrire une contribution",

	// Editing
	'transitions:add' => "Ajouter une contribution",
	'transitions:edit' => "Valorisez votre contribution",
	'transitions:edit:details' => "Vous y êtes presque !<br />Pour rendre plus lisible cette ressource dans le catalogue, n’hésitez pas à la préciser",
	'transitions:excerpt' => "En 140 caractères...",
	'transitions:body' => "Contenu de votre contribution",
	'transitions:save_status' => "Dernier enregistrement:",
	
	'transitions:revision' => "Révision",
	'transitions:auto_saved_revision' => "Révision automatiquement enregistrée",

	// messages
	'transitions:message:saved' => "Contribution enregistrée.",
	'transitions:error:cannot_save' => "Impossible d\'enregistrer la contribution.",
	'transitions:error:cannot_auto_save' => "Impossible de sauvegarder automatiquement la contribution. ",
	'transitions:error:cannot_write_to_container' => "Droits d\'accès insuffisants pour enregistrer la contribution pour ce groupe.",
	'transitions:messages:warning:draft' => "Il y a un brouillon non enregistré de cette contribution !",
	'transitions:edit_revision_notice' => "(Ancienne version)",
	'transitions:message:deleted_post' => "Contribution supprimée.",
	'transitions:error:cannot_delete_post' => "Impossible de supprimer la contribution.",
	'transitions:none' => "Aucune contribution",
	'transitions:error:missing:title' => "Vous devez donner un titre à votre contribution !",
	'transitions:error:missing:description' => "Le corps de votre contribution est vide !",
	'transitions:error:cannot_edit_post' => "Cette contribution peut ne pas exister ou vous n\'avez pas les autorisations pour la modifier.",
	'transitions:error:post_not_found' => "Impossible de trouver la contribution spécifiée.",
	'transitions:error:revision_not_found' => "Impossible de trouver cette révision.",
	'transitions:error:actor_not_found' => "Impossible de trouver cet acteur.",
	'transitions:error:not_an_actor' => "Cette contribution n'est pas un acteur.",

	// river
	'river:create:object:transitions' => "%s a publié une contribution %s",
	'river:comment:object:transitions' => "%s a commenté la contribution %s",

	// notifications
	'transitions:notify:summary' => "Nouvelle contribution : %s",
	'transitions:notify:subject' => "Nouvelle contribution : %s",
	'transitions:notify:body' => "
%s a publié une nouvelle contribution : %s

%s

Voir et commenter cette contribution :
%s
",

	// widget
	'transitions:widget:description' => "Ce widget affiche vos dernières contributions",
	'transitions:moretransitions' => "Plus de contributions",
	'transitions:numbertodisplay' => "Nombre de contributions à afficher",
	'transitions:notransitions' => "Aucune contribution",
	
	
	// NEW STRINGS
	'transitions:icon' => "Image",
	'transitions:icon:details' => "Choisissez une image pour illustrer votre contribution.",
	'transitions:icon:new' => "Ajouter une image",
	'transitions:icon:remove' => "Supprimer l'image",
	'transitions:attachment' => "Fichier joint",
	'transitions:attachment:details' => "Vous pouvez joindre un fichier à votre contribution. Si vous souhaitez joindre plusieurs fichiers, veuillez en faire un ZIP.",
	'transitions:attachment:new' => "Joindre un fichier",
	'transitions:attachment:remove' => "Supprimer le fichier joint",
	'transitions:category' => "Catégorie",
	'transitions:category:choose' => "Sélectionnez une catégorie",
	'transitions:title' => "Titre de votre contribution",
	'transitions:tags' => "Ajoutez plusieurs tags séparés par des virgules",
	'transitions:excerpt' => "Votre contribution en 140 caractères",
	'transitions:url' => "Lien web",
	'transitions:url:details' => "Si votre contribution fait référence à une ressource en ligne, veuillez indiquer son adresse.",
	'transitions:lang' => "Langue",
	'transitions:resourcelang' => "Langue de la ressource",
	'transitions:resourcelang:details' => "Si la ressource est disponible dans une autre langue, veuillez indiquer laquelle.",
	'transitions:territory' => "Territoire",
	'transitions:territory:details' => "Si la ressource concerne un territoire, veuillez indiquer lequel. Veuillez indiquer une adresse précise afin de pouvoir afficher la ressource sur une carte, par ex. \"8 passage Brûlon, Paris, France\" ou \"Drôme, France\" ou \"Madagascar\".",
	'transitions:actortype' => "Type d'acteur",
	'transitions:startdate' => "Date de début",
	'transitions:enddate' => "Date de fin",
	'transitions:dateformat' => "M Y",
	'transitions:dateformat:time' => "d M Y à H:i:s",
	'transitions:date:since' => "Depuis le",
	'transitions:date:until' => "Jusqu'au",
	'transitions:rss_feed' => "Flux RSS",
	'transitions:rss_feed:details' => "URL du fil d'actualité RSS associé à ce défi",
	'transitions:savedraft' => "Publier ma contribution",
	'transitions:saveandedit' => "Poursuivre l'édition",
	'transitions:preview' => "Sauvegarder",
	'transitions:save' => "Publier",
	'transitions:incremental' => "Contenu incrémental",
	'transitions:incremental:no' => "Non (par défaut)",
	'transitions:incremental:yes' => "Oui (mis au second plan)",
	
	// Other forms
	'transitions:tags_contributed' => "Tags des contributeurs",
	'transitions:addtag' => "Tagguer",
	'transitions:addtag:submit' => "Ajouter un tag",
	'transitions:addtag:details' => "Vous pouvez ajouter un ou plusieurs tags pour mieux classer cette ressource.",
	'transitions:addtag:success' => "Tag ajouté",
	'transitions:addtag:emptytag' => "Pas de tag à ajouter",
	'transitions:addtag:alreadyexists' => "Ce tag a déjà été ajouté",
	'transitions:addlink' => "Relier",
	'transitions:addlink:details' => "Vous pouvez relier cette ressource à une autre ressource en ligne, qui s’accorde ou s’oppose. <br />Pour relier plusieurs ressources, merci d'utiliser le formulaire plusieurs fois.",
	'transitions:addlink:submit' => "Ajouter le lien",
	'transitions:addlink:success' => "Ressource ajoutée",
	'transitions:addlink:emptylink' => "Pas de ressource à ajouter",
	'transitions:addlink:alreadyexists' => "Cette resource a déjà été ajoutée",
	'transitions:links_supports' => "Ressources en accord",
	'transitions:relation:supports' => "en soutien",
	'transitions:links_invalidates' => "Ressources en opposition",
	'transitions:relation:invalidates' => "en opposition",
	'transitions:related_actors' => "Acteurs partenaires du projet",
	'transitions:addactor' => "Ajouter un Acteur",
	'transitions:addactor:details' => "Vous pouvez associer un Acteur à ce projet. <br />Pour ajouter plusieurs acteurs, merci d'utiliser le formulaire plusieurs fois.",
	'transitions:addactor:submit' => "Ajouter l'Acteur",
	'transitions:addactor:select' => "Sélectionner l'acteur",
	'transitions:addactor:noneselected' => "Aucun acteur sélectionné",
	'transitions:addactor:success' => "Acteur ajouté",
	'transitions:addactor:error' => "Cet acteur n'a pas pu être ajouté",
	'transitions:addactor:emptyactor' => "Aucun acteur sélectionné",
	'transitions:addactor:alreadyexists' => "Cet acteur a déjà été ajouté",
	'transitions:related_content' => "Contenus liés à ce défi",
	'transitions:form:addrelation' => "Ajouter une relation",
	'transitions:addrelation' => "Ajouter une relation",
	'transitions:addrelation:noneselected' => "Aucune ressource sélectionnée",
	'transitions:addrelation:success' => "Ressource liée ajoutée",
	'transitions:addrelation:error' => "Cette ressource n'a pas pu être ajoutée",
	'transitions:addrelation:emptyactor' => "Aucune ressource sélectionnée",
	'transitions:addrelation:alreadyexists' => "Cette ressource a déjà été ajoutée",
	'transitions:index' => "Catalogue des contributions",
	'transitions:search:results' => "%s résultats",
	'transitions:search:result' => "1 seul résultat ! &nbsp; Si vous pensiez à autre chose, n'hésitez pas à en faire part ci-dessous.",
	'transitions:search:noresult' => "Aucun résultat ! &nbsp; Nous attendons votre contribution avec impatience ;-)",
	'transitions:share' => "Partager",
	'transitions:socialshare:details' => "Utilisez les liens de partage suivant pour publier cette contribution sur les médias sociaux.",
	'transitions:permalink' => "Lien permanent",
	'transitions:permalink:details' => "Utilisez le lien suivant pour faire référence à cette contribution.",
	'transitions:shortlink' => "Lien court",
	'transitions:shortlink:details' => "Utilisez le lien court suivant pour vos partages.",
	//'transitions:embed' => "Code d'embarquement",
	'transitions:embed' => "Intégrer",
	'transitions:embed:details' => "Copiez-collez le code HTML suivant pour intégrer cette publication sur un autre site. Vous pouvez modifier les dimensions du bloc en changeant les valeurs après \'width\' (largeur) et \'height\' (hauteur).",
	'transitions:embed:search' => "Sélectionnez une ressource",
	'transitions:embed:search:actor' => "Sélectionnez un acteur",
	'transitions:share' => "Partager",
	'transitions:share:details' => "Vous pouvez partager cette ressource sur d'autres sites via les liens de partage suivants.",
	
	// Bookmarklet
	'transitions:bookmarklet' => "Bookmarklet",
	'transitions:bookmarklet:description' => "Le bookmarklet vous permet de partager ce que vous trouvez sur le web. Pour l'utiliser, glissez simplement le bouton ci-dessous dans votre barre de liens de votre navigateur.",
	'transitions:bookmarklet:descriptionie' => "Si vous utilisez Internet Explorer, faites un clic droit sur le bouton et ajoutez-le dans vos favoris, puis dans votre barre de liens.",
	'transitions:bookmarklet:description:conclusion' => "Vous pouvez mettre en signet n'importe quelle page en cliquant sur le bookmarklet.",
	
	
	// Select values
	'transitions:lang:other' => "Autre langue",
	
	'transitions:category:nofilter' => "Toutes",
	'transitions:category:knowledge' => "<i class=\"fa fa-lightbulb-o\"></i> Connaissance",
	'transitions:category:experience' => "<i class=\"fa fa-book\"></i> Récit, expérience",
	'transitions:category:imaginary' => "<i class=\"fa fa-magic\"></i> Imaginaire",
	'transitions:category:tools' => "<i class=\"fa fa-wrench\"></i> Outil ou méthode",
	'transitions:category:actor' => "<i class=\"fa fa-user\"></i> Acteur",
	'transitions:category:project' => "<i class=\"fa fa-cube\"></i> Projet",
	'transitions:category:event' => "<i class=\"fa fa-calendar\"></i> Evénement",
	'transitions:category:editorial' => "<i class=\"fa fa-newspaper-o\"></i> Produit éditorial",
	'transitions:category:challenge' => "<i class=\"fa fa-trophy\"></i> Défi",
	
	'transitions:actortype:individual' => "Individu",
	'transitions:actortype:collective' => "Collectif",
	'transitions:actortype:association' => "Association",
	'transitions:actortype:enterprise' => "Entreprise",
	'transitions:actortype:education' => "Etablissement d'enseignement ou de recherche",
	'transitions:actortype:collectivity' => "Collectivité locale",
	'transitions:actortype:administration' => "Administration publique",
	'transitions:actortype:plurinational' => "Entité plurinationale",
	'transitions:actortype:other' => "Autre",
	'transitions:actortype:choose' => "Sélectionnez un type d'acteur",
	
	
);
