<?php
/*
 * Squelette : ../dist/modeles/paginationitem.html
 * Date :      Mon, 03 Dec 2007 21:39:43 GMT
 * Compile :   Thu, 02 Jul 2009 19:07:22 GMT (0.01s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../dist/modeles/paginationitem.html
//
function html_0787596df0ba038189856d1d2447ebff($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = (((strval($t1 = interdire_scripts(((entites_html($Pile[0]['num']) == interdire_scripts(entites_html($Pile[0]['page_courante']))) ? ' ':'')))!='') ?
		($t1 . ('
		' .
	((strval($t2 = interdire_scripts($Pile[0]['texte']))!='') ?
			('<span class="on">' . $t2 . '</span>') :
			('')) .
	'
	')) :
		('')) .
((strval($t1 = interdire_scripts(((entites_html($Pile[0]['num']) == interdire_scripts(entites_html($Pile[0]['page_courante']))) ? '':' ')))!='') ?
		($t1 . ('
		' .
	((strval($t2 = interdire_scripts($Pile[0]['texte']))!='') ?
			(('<a href=\'' .
		interdire_scripts(entites_html($Pile[0]['url'])) .
		'\' class=\'lien_pagination\'>') . $t2 . '</a>') :
			('')) .
	'
	')) :
		('')) .
interdire_scripts(((entites_html($Pile[0]['num']) < interdire_scripts(entites_html($Pile[0]['derniere']))) ? interdire_scripts(entites_html($Pile[0]['separateur'])):'')));

	return analyse_resultat_skel('html_0787596df0ba038189856d1d2447ebff', $Cache, $page);
}

?>