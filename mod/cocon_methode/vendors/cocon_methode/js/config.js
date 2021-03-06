/**
	Fichier de configuration Javascript
*/

// Constantes
var ROLE_PRINCIPAL = 0;
var ROLE_EQUIPE = 1;
var ROLE_AUTRE = 2;

// Variables pour les liens vers les outils CoCon
var cocon_url = "http://cocon.eduscol.education.fr";
var group_url = cocon_url + "/groups/profile/";
var activite_group_url = cocon_url + "/groups/activity/";
var agenda_group_url = cocon_url + "/groups/event_calendar/";
var annonces_group_url = cocon_url + "/announcements/groups/";
var blog_group_url = cocon_url + "/blog/groups/";
var boite_a_idees_group_url = cocon_url + "/brainstorm/groups/";
var fichiers_group_url = cocon_url + "/file/groups/";
var forum_group_url = cocon_url + "/discussion/owner/";
var liens_web_group_url = cocon_url + "/bookmarks/groups/";
var wiki_group_url = cocon_url + "/pages/groups/";
var annuaire_url = cocon_url + "/members";

// Objet JSON pour pour le visiteur connect�
var config = {
	"error" : false,
	"error_string" : "",
	"cycle_id" : "",
	"group_id" : "",
	"group_name" : "", // Nom du groupe CoCon associ� au visiteur
	"user_id" : "", // ID du visiteur
	"user_name" : "", // Nom et pr�nom du visiteur
	"user_role" : -1, // Role du visiteur
	"cocon_url" : "", // Base URL for Cocon site
	"methode_url" : "" // Base URL for M�thode plugin
};

// M�thodes javascript

/**
	Chargement des infos depuis CoCon
*/
function loadConfig(){
	$.ajax({
		type: "POST",
		url: "php/loadConfig.php",
		dataType: "json",
		success: loadConfig__response
	});
}

/**
	_response est un objet JSON retourn� par le serveur CoCon
	Attributs :
	.error = si true, une erreur s'est produite lors de la r�cup�ration des infos
	.error_string chaine contenant le message d'erreur
	.cycle_id = chaine contenant l'ID du cycle
	.group_id = chaine contenant l'ID du groupe
	.group_name = chaine contenant le nom du groupe
	.user_id = chaine contenant l'ID de l'utilisateur
	.user_name = chaine contenant les nom et pr�nom de l'utilisateur
	.user_role = chaine contenant le type de r�le de l'utilisateur
*/
function loadConfig__response(_response){
	if(_response.error){
		alert(_response.error_string);
		return false;
	}
		
	config = _response;
	//alert(config.user_role); // Check defined user role
	
	
	// Int�gration M�thode : MAJ des variables pour les liens vers les outils Cocon
	cocon_url = config.cocon_url;
	group_url = cocon_url + "/groups/profile/" + config.group_id;
	activite_group_url = cocon_url + "/groups/activity/" + config.group_id;
	agenda_group_url = cocon_url + "/event_calendar/group/" + config.group_id;
	annonces_group_url = cocon_url + "/announcements/group/" + config.group_id + "/all";
	blog_group_url = cocon_url + "/blog/group/" + config.group_id + "/all";
	boite_a_idees_group_url = cocon_url + "/brainstorm/group/" + config.group_id + "/top";
	fichiers_group_url = cocon_url + "/file/group/" + config.group_id + "/all";
	forum_group_url = cocon_url + "/discussion/owner/" + config.group_id;
	liens_web_group_url = cocon_url + "/bookmarks/group/" + config.group_id + "/all";
	wiki_group_url = cocon_url + "/pages/group/" + config.group_id + "/all";
	annuaire_url = cocon_url + "/members";
	
	loadPage("presentation", "temps_0");
}

