<?php

return array(
	'collection' => "Collection",

	/* Settings */
	'collections:settings:description' => "Configuration des collections",
	
	'collections:option:yes' => "Oui",
	'collections:option:no' => "Non",
	'collections:error:multiple' => "Plusieurs collections correspondent au nom demandé, impossible de déterminer laquelle afficher",
	'collections:error:alreadyexists' => "Une collection portant ce nom existe déjà, veuillez choisir un autre nom.",
	
	
	'collections:showinstructions' => "Afficher le mode d'emploi",
	'collections:instructions' => "Les collections peuvent être définies ici, puis insérées dans les articles via un shortcode <q>[collection id=\"12345\"]</q>",
	'collections:add' => "Créer une nouvelle collection",
	'collections:edit' => "Edition de la collection",
	'collections:edit:title' => "Titre",
	'collections:edit:title:details' => "Permet d'identifier aisément la collection. Le titre n'est pas affiché.",
	'collections:edit:name' => "Identifiant",
	'collections:edit:name:details' => "Identifiant unique de la collection, permet de l'appeler sous une forme homogène (par ex. pour utilisation dans un thème).",
	'collections:edit:description' => "Description",
	'collections:edit:description:details' => "Permet de décrire à quoi sert le diaporama. La description n'est pas affichée.",
	'collections:edit:content' => "Diapositives",
	'collections:edit:content:details' => "Ajoutez de nouvelles diapositives, et réorganisez-les à votre convenance. <br />Note&nbsp;: les nouvelles diapositives ne disposent pas d'éditeur visuel&nbsp;; pour pouvoir l'utiliser, enregistrez votre diaporama.",
	'collections:edit:entity' => "Publication",
	'collections:edit:addentity' => "Ajouter une publication",
	'collections:edit:deleteentity' => "Retirer cette publication",
	'collections:edit:deleteentity:confirm' => "Attention, confirmez-vous vouloir retirer cette publication de la collection ?",
	'collections:edit:access' => "Visibilité",
	'collections:edit:access:details' => "Permet de définir qui peut voir cette collection.",
	'collections:edit:submit' => "Enregistrer les modifications",
	'collections:saved' => "Vos modifications ont bien été enregistrées",
	'collections:edit:preview' => "Prévisualisation",
	'collections:edit:view' => "Afficher le diaporama de la collection",

	'collections:shortcode:collection' => "Collection (déjà configuré)",
	'collections:embed:instructions' => "Comment intégrer cette collection ?",
	'collections:shortcode:instructions' => " - avec un shortcode, dans une publication (blog, page wiki, etc.)&nbsp;: <strong>[collection id=\"%s\"]</strong>",
	'collections:cmspages:instructions' => " - avec un code spécifique, dans un gabarit créé avec CMSPages&nbsp;: <strong>{{:collection/view|guid=%s}}</strong>",
	'collections:cmspages:instructions:shortcode' => " - avec un shortcode spécifique, méthode alternative pour un gabarit créé avec CMSPages&nbsp;: <strong>{{[collection id=\"%s\"]}}</strong>",
	'collections:cmspages:notice' => "IMPORTANT&nbsp;: seules les pages CMS de type \"Gabarit\" permettent d'afficher des collections ! Il vous sera peut-être nécessaire de mettre à jour le type de page.",
	'collections:iframe:instructions' => " - avec ce code d'embarquement, sur d'autres sites&nbsp;: <strong>&lt;iframe src=\"" . elgg_get_site_url() . "collection/view/%s?embed=full\"&gt;&lt;/iframe&gt;</strong>",
	
	
	// NEW STRINGS
	'collections:edit:entities' => "Publication",
	'collections:edit:entities_comment' => "Commentaire",
	'collections:select_entity' => "Choisir une publication",
	//'collections:' => "",
	
);

