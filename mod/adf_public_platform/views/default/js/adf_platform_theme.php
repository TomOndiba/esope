<?php
$urlicon = elgg_get_site_url() . 'mod/adf_public_platform/img/theme/';
?>

$(document).ready(function() {
	menu("#transverse nav");
	//menu("header nav"); // Pour le menu supérieur, si utilisé

	//recherche
	/*
	var valueSearch = $("form input#adf-search-input").attr("value");
	$("form input#adf-search-input").focus(function() {
		if (($(this).attr("value") != "") || ($(this).attr("value") == valueSearch)) {
		  $(this).attr("value", "");
		}
	});
	$("form input#adf-search-input").click(function() {
		if (($(this).attr("value") != "") || ($(this).attr("value") == valueSearch)) {
		  $(this).attr("value", "");
		}
	});
	$("form input#adf-search-input").blur(function() {
		if ($(this).attr("value") == "") { $(this).attr("value", valueSearch); }
	});
	*/
	
	//ouverture élément module
	$(".plus").hide();
	$("a.ouvrir").click(function() {
		if ($(this).hasClass("ouvert")) {
			$(this).removeClass("ouvert");
			$(this).find("img").attr("src", "<?php echo $urlicon; ?>ensavoirplus.png");
			$(this).next(".plus").slideUp();
		} else {
			$(this).addClass("ouvert");
			$(this).find("img").attr("src", "<?php echo $urlicon; ?>fermer.png");
			$(this).next(".plus").slideDown();
		}
		return false;
	});
	
	//ouverture éléments supplémentaire module
	$(".elgg-module .suivant").hide();
	$(".elgg-module footer a").click(function() {
		$(this).parents(".elgg-module").children(".suivant").slideDown();
		$(this).remove(); //s'il n'y en a plus à afficher
		return false;
	});
});


// Fonction de gestion des menus
function menu(leMenu) {
	$(leMenu+" ul ul").hide();
	var timeout;
	$(leMenu+" ul li a").hover(function() {
		var myLink = $(this);
		timeout = setTimeout(function(){myLink.next().slideDown(200);}, 50);
	},  function() {
		clearTimeout(timeout);
		$(this).next().hide();
	});
	$(leMenu+">ul>li>a").focus(function() {
		$(this).parent().prev("li").find("ul").hide();
		$(this).parent().next("li").find("ul").hide();
		$(this).next().slideDown(300);
		if($(this).parent().next("li").children("a.lastfocus").length>0) {
			$(".lastfocus").parent().find("ul").hide();
			$(this).parent().children("ul").children("li").each(function() {
				if($(this).next("li").length==0) {
					$(this).children("a").focus();
					$(".lastfocus").removeClass("lastfocus");
				}
			});
		}
	});
	$(leMenu+">ul>li>a").blur(function() {
		//$(this).next().hide();
		$(this).addClass("lastfocus");
	});
	$(leMenu+" ul ul").hover(function() {
		$(this).show();
		$(this).prev().addClass("active");
	}, function() {
		$(this).hide();
		$(this).prev().removeClass("active");
	});

	$(leMenu+" ul li a").focus(function() {
		$(".lastfocus").removeClass("lastfocus");
	});
	
	$(leMenu+" ul li a").click(function() {
		if($(this).next().children("li").size() > 0) {
			if($(this).next().is(":hidden")) {
				$(this).next().slideDown(200);	
			} else {
				$(this).next().hide();
			}
			//return false; // False si on veut que le clic ne déclenche pas le lien
			return true;
		} else {
			return true;
		}
	});
}

$("#transverse nav ul ul").hide(); // Plus rapide pour masquer les sous-menus



/**
 * Topbar menu toggle for small screens.
 */
$(document).ready(function() {
	var nav = $('header nav'), button, menu;
	if (!nav) return;
	button = nav.find('.menu-topbar-toggle');
	if (!button) return;
	// Hide button if menu is missing or empty.
	menu = nav.find('#menu-topbar');
	if (!menu || !menu.children().length) { button.hide(); return; }
	$('.menu-topbar-toggle').on('click', function() { nav.toggleClass('menu-enabled'); });
});

/**
 * Navigation menu toggle for small screens.
 */
$(document).ready(function() {
	var nav = $('#transverse nav'), button, menu;
	if (!nav) return;
	button = nav.find('.menu-navigation-toggle');
	if (!button) return;
	// Hide button if menu is missing or empty.
	menu = nav.find('#menu-navigation');
	if (!menu || !menu.children().length) { button.hide(); return; }
	$('.menu-navigation-toggle').on('click', function() { nav.toggleClass('menu-enabled'); });
});

/**
 * Sidebar menu toggle for small screens.
 */
$(document).ready(function() {
	var button = $('.menu-sidebar-toggle');
	if (!button) return;
	// Hide button if menu is missing or empty.
	var sidebar = $('.elgg-sidebar');
	if (!sidebar) { button.hide(); return; }
	$('.menu-sidebar-toggle').on('click', function() { sidebar.toggleClass('sidebar-enabled'); });
});


