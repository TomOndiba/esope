<?php
$french = array(
	
	'slider' => "Slider",

	/* Settings */
	'slider:settings:description' => "Configuration du diaporama",
	'slider:settings:defaultslider' => "Contenu par défaut du diaporama",
	'slider:settings:defaultslider:help' => "Ce plugin vise avant tout à fournir une vue directement utilisable par les développeurs/intégrateurs. Toutefois, pour plus de commodité et dans le cadre de l'intégration avec d'autres plugins (notamment les thèmes), un contenu par défaut peut être configuré ici, et appelé directement via la vue 'slider/slider', sans configuration supplémentaire.<br />",
	
	'slider:settings:content' => "Contenu du diaporama par défaut",
	'slider:settings:content:help' => "Le contenu du diaporama affiché est défini par une série de slides qui sont autant d'éléments d'une liste, qui peuvent être une simple image, du texte, une vidéo, ou tout contenu média riche combinant ces éléments.<br />Laisser vide pour récupérer les valeurs par défaut.",
	'slider:settings:css_main' => "Propriétés CSS globales du diaporama (&lt;ul&gt; principal)",
	'slider:settings:css_main:help' => "n'indiquer que les propriétés, par exemple : width:600px; height:280px;<br />Laisser vide pour récupérer les valeurs par défaut.",
	'slider:settings:jsparams' => "Paramètres (JS) du diaporama",
	'slider:settings:jsparams:help' => "Ajouter ici les paramètres JS du diaporama, sous la forme d'une liste de : <strong>parametre : valeur,<br />parametre2 : valeur2,</strong><br />Laisser vide pour récupérer les valeurs par défaut.",
	'slider:settings:css_textslide' => "Propriétés CSS pour les slides contenant du texte",
	'slider:settings:css_textslide:help' => "Propriétés CSS spécifiques aux slides utilisant la classe .textSlide : n'indiquer que les propriétés, par exemple : color:#333;<br />Laisser vide pour récupérer les valeurs par défaut.",
	'slider:settings:css' => "Feuille de style en surcharge pour le diaporama",
	'slider:settings:css:help' => "Feuille de style en surcharge pour le diaporama : il s'agit cette fois des CSS complètes à ajouter en surcharge après les styles par défaut.<br />Laisser vide pour récupérer les valeurs par défaut.",
	'slider:settings:slider_access' => "Permettre aux membres d'éditer des diaporamas",
	'slider:settings:slider_access:details' => "Par défaut, l'accès à l'édition des diaporamas est réservée aux administrateurs. Vous pouvez autoriser les membres du site à y accéder en choisissant \"Oui\"",
	'slider:editor:yes' => "Oui (filtre HTML)",
	'slider:editor:no' => "Non (activable sur demande)",
	
	
	'slider:showinstructions' => "Afficher le mode d'emploi",
	'slider:instructions' => "Les diaporamas peuvent être définis ici, puis insérés dans les articles via un shortcode <q>[slider id=\"12345\"]</q>",
	'slider:add' => "Créer un nouveau diaporama",
	'slider:edit' => "Edition du diaporama",
	'slider:edit:title' => "Titre",
	'slider:edit:title:details' => "Permet d'identifier aisément le diaporama. Le titre n'est pas affiché.",
	'slider:edit:description' => "Description",
	'slider:edit:description:details' => "Permet de décrire à quoi sert le diaporama. La description n'est pas affichée.",
	'slider:edit:content' => "Diapositives",
	'slider:edit:content:details' => "Ajoutez de nouvelles diapositives, et réorganisez-les à votre convenance. <br />Note&nbsp;: les nouvelles diapositives ne disposent pas d'éditeur visuel&nbsp;; pour pouvoir l'utiliser, enregistrez votre diaporama.",
	'slider:edit:slide' => "Diapositive",
	'slider:edit:addslide' => "Ajouter une diapositive",
	'slider:edit:deleteslide' => "Supprimer cette diapositive",
	'slider:edit:deleteslide:confirm' => "ATTENTION, il n'est pas possible de récupérer le contenu d'une diapositive supprimée. La supprimer tout de même ?",
	'slider:edit:config' => "Configuration JS",
	'slider:edit:config:details' => "Paramètres de configuration JavaScript du diaporama (AnythingSlider).",
	'slider:edit:config:toggledocumentation' => "<i class=\"fa fa-toggle-down\"></i>Afficher tous les paramètres de configuration disponibles",
	'slider:edit:css' => "CSS",
	'slider:edit:css:details' => "Feuille de style CSS à ajouter lors de l'affichage de ce diaporama.<br /> Note&nbsp;: pour cibler précisément ce diaporama, utilisez le sélecteur suivant (une fois le diaporama créé)&nbsp;: <strong>#slider-%s</strong>",
	'slider:edit:height' => "Hauteur",
	'slider:edit:height:details' => "Les dimensions du diaporama sont déterminées par le bloc parent. Pour forcer les dimensions de ce bloc parent, précisez ici ses dimensions.<br /> Note&nbsp;: toutes les valeurs de la propriété CSS \"height\" sont acceptées, en px, en %, et autres unités, y compris \"auto\".",
	'slider:edit:width' => "Largeur",
	'slider:edit:width:details' => "Les dimensions du diaporama sont déterminées par le bloc parent. Pour forcer les dimensions de ce bloc parent, précisez ici ses dimensions.<br /> Note&nbsp;: toutes les valeurs de la propriété CSS \"width\" sont acceptées, en px, en %, et autres unités, y compris \"auto\".",
	'slider:edit:access' => "Visibilité",
	'slider:edit:access:details' => "Permet de définir qui pourra afficher ce diaporama",
	'slider:edit:submit' => "Enregistrer les modifications",
	'slider:saved' => "Vos modifications ont bien été enregistrées",
	'slider:edit:preview' => "Prévisualisation",
	'slider:edit:view' => "Afficher le diaporama",
	'slider:edit:editor' => "Toujours activer l'éditeur visuel pour l'édition",
	'slider:edit:editor:details' => "L'éditeur visuel facilite l'édition, mais il filtre également le code HTML utilisé. Cette option permet de choisir si l'éditeur doit être activé par défaut lorsque vous éditez ce diaporama. Il est conseillé de le désactiver si vous utilisez directement du code HTML (vous pourrez toujours l'activer manuellement sur une diapositive en cas de besoin).",
	
	'slider:shortcode:slider' => "Diaporama (déjà configuré)",
	'slider:embed:instructions' => "Comment intégrer ce diaporama ?",
	'slider:shortcode:instructions' => " - avec un shortcode, dans une publication (blog, page wiki, etc.)&nbsp;: <strong>[slider id=\"%s\"]</strong>",
	'slider:cmspages:instructions' => " - avec un code spécifique, dans un gabarit créé avec CMSPages&nbsp;: <strong>{{:slider/view|guid=%s}}</strong>",
	'slider:cmspages:instructions:shortcode' => " - avec un shortcode spécifique, méthode alternative pour un gabarit créé avec CMSPages&nbsp;: <strong>{{[slider id=\"%s\"]}}</strong>",
	'slider:cmspages:notice' => "IMPORTANT&nbsp;: seules les pages CMS de type \"Gabarit\" permettent d'afficher des diaporamas ! Il vous sera peut-être nécessaire de mettre à jour le type de page.",
	'slider:iframe:instructions' => " - avec ce code d'embarquement, sur d'autres sites&nbsp;: <strong>&lt;iframe src=\"" . elgg_get_site_url() . "slider/view/%s?embed=full\"&gt;&lt;/iframe&gt;</strong>",
	
);

add_translation("fr",$french);

