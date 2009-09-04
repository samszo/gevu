<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2006                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('exec/grouper_mots');

// http://doc.spip.org/@exec_mots_tous_dist
function exec_mots_tous_dist()
{
  global $acces_comite, $acces_forum, $acces_minirezo, $new, $articles, $breves, $change_type, $conf_mot, $connect_statut, $connect_toutes_rubriques, $descriptif, $id_groupe, $modifier_groupe, $obligatoire, $rubriques, $spip_lang, $spip_lang_right, $supp_group, $son_groupe, $syndic, $texte, $unseul;
  
  //deb ajout Lucky Semiosis
  global $id_parent; 
  $id_parent = intval($id_parent);
  //fin ajout Lucky Semiosis

  $id_groupe = intval($id_groupe);
  $conf_mot = intval($conf_mot);

  if (acces_mots()) {
	if ($modifier_groupe == "oui") {
		$change_type = (corriger_caracteres($change_type));
		$texte = (corriger_caracteres($texte));
		$descriptif = (corriger_caracteres($descriptif));

		if (!$new) {	// modif groupe
			spip_query("UPDATE spip_mots SET type=" . spip_abstract_quote($change_type) . " WHERE id_groupe=$id_groupe");

		  //deb ajout Lucky Semiosis
		  /*
			spip_query("UPDATE spip_groupes_mots SET titre=" . spip_abstract_quote($change_type) . ", texte=" . spip_abstract_quote($texte) . ", descriptif=" . spip_abstract_quote($descriptif) . ", unseul=" . spip_abstract_quote($unseul) . ", obligatoire=" . spip_abstract_quote($obligatoire) . ", articles=" . spip_abstract_quote($articles) . ", breves=" . spip_abstract_quote($breves) . ", rubriques=" . spip_abstract_quote($rubriques) . ", syndic=" . spip_abstract_quote($syndic) . ",	minirezo=" . spip_abstract_quote($acces_minirezo) . ", comite=" . spip_abstract_quote($acces_comite) . ", forum=" . spip_abstract_quote($acces_forum) . " WHERE id_groupe=$id_groupe");
		*/
			spip_query("UPDATE spip_groupes_mots SET titre=" . spip_abstract_quote($change_type) . ", texte=" . spip_abstract_quote($texte) . ", descriptif=" . spip_abstract_quote($descriptif) . ", unseul=" . spip_abstract_quote($unseul) . ", obligatoire=" . spip_abstract_quote($obligatoire) . ", articles=" . spip_abstract_quote($articles) . ", breves=" . spip_abstract_quote($breves) . ", rubriques=" . spip_abstract_quote($rubriques) . ", syndic=" . spip_abstract_quote($syndic) . ",	minirezo=" . spip_abstract_quote($acces_minirezo) . ", comite=" . spip_abstract_quote($acces_comite) . ", forum=" . spip_abstract_quote($acces_forum) . ", id_parent=" . $id_parent . " WHERE id_groupe=$id_groupe");
		  //fin ajout Lucky Semiosis

		} else {	// creation groupe
		  //deb ajout Lucky Semiosis
		  /*
		  spip_abstract_insert('spip_groupes_mots', "(titre, texte, descriptif, unseul,  obligatoire, articles, breves, rubriques, syndic, minirezo, comite, forum)", "(" . spip_abstract_quote($change_type) . ", " . spip_abstract_quote($texte) . " , " . spip_abstract_quote($descriptif) . " , " . spip_abstract_quote($unseul) . " , " . spip_abstract_quote($obligatoire) . " , " . spip_abstract_quote($articles) . " ," . spip_abstract_quote($breves) . " , " . spip_abstract_quote($rubriques) . " , " . spip_abstract_quote($syndic) . " , " . spip_abstract_quote($acces_minirezo) . " ,  " . spip_abstract_quote($acces_comite) . " , " . spip_abstract_quote($acces_forum) . " )");
		*/
		  spip_abstract_insert('spip_groupes_mots', "(titre, texte, descriptif, unseul,  obligatoire, articles, breves, rubriques, syndic, minirezo, comite, forum, id_parent)", "(" . spip_abstract_quote($change_type) . ", " . spip_abstract_quote($texte) . " , " . spip_abstract_quote($descriptif) . " , " . spip_abstract_quote($unseul) . " , " . spip_abstract_quote($obligatoire) . " , " . spip_abstract_quote($articles) . " ," . spip_abstract_quote($breves) . " , " . spip_abstract_quote($rubriques) . " , " . spip_abstract_quote($syndic) . " , " . spip_abstract_quote($acces_minirezo) . " ,  " . spip_abstract_quote($acces_comite) . " , " . spip_abstract_quote($acces_forum). ", " . $id_parent . " )");
		  //fin ajout Lucky Semiosis
		}
	}
	if ($supp_group){
		spip_query("DELETE FROM spip_groupes_mots WHERE id_groupe=" . intval($supp_group));
	}
 }


pipeline('exec_init',array('args'=>array('exec'=>'mots_tous'),'data'=>''));
debut_page(_T('titre_page_mots_tous'), "naviguer", "mots");
debut_gauche();

echo pipeline('affiche_gauche',array('args'=>array('exec'=>'mots_tous'),'data'=>''));
creer_colonne_droite();
echo pipeline('affiche_droite',array('args'=>array('exec'=>'mots_tous'),'data'=>''));
debut_droite();

gros_titre(_T('titre_mots_tous'));
 if (acces_mots()) {
  echo typo(_T('info_creation_mots_cles')) . aide ("mots") ;
  }
 echo "<br><br>";


//
// On boucle d'abord sur les groupes de mots
//
//deb ajout Lucky Semiosis
// $result_groupes = spip_query("SELECT *, ".creer_objet_multi ("titre", "$spip_lang")." FROM spip_groupes_mots ORDER BY multi");
 $result_groupes = spip_query("SELECT *, ".creer_objet_multi ("titre", "$spip_lang")." FROM spip_groupes_mots WHERE id_parent = 0 ORDER BY multi");
//fin ajout Lucky Semiosis


while ($row_groupes = spip_fetch_array($result_groupes)) {
	$id_groupe = $row_groupes['id_groupe'];
	$titre_groupe = typo($row_groupes['titre']);
	$descriptif = $row_groupes['descriptif'];
	$texte = $row_groupes['texte'];
	$unseul = $row_groupes['unseul'];
	$obligatoire = $row_groupes['obligatoire'];
	$articles = $row_groupes['articles'];
	$breves = $row_groupes['breves'];
	$rubriques = $row_groupes['rubriques'];
	$syndic = $row_groupes['syndic'];
	$acces_minirezo = $row_groupes['minirezo'];
	$acces_comite = $row_groupes['comite'];
	$acces_forum = $row_groupes['forum'];

	// Afficher le titre du groupe
	debut_cadre_enfonce("groupe-mot-24.gif", false, '', $titre_groupe);
	// Affichage des options du groupe (types d'elements, permissions...)
	echo "<font face='Verdana,Arial,Sans,sans-serif' size=1>";
	if ($articles == "oui") echo "> "._T('info_articles_2')." &nbsp;&nbsp;";
	if ($breves == "oui") echo "> "._T('info_breves_02')." &nbsp;&nbsp;";
	if ($rubriques == "oui") echo "> "._T('info_rubriques')." &nbsp;&nbsp;";
	if ($syndic == "oui") echo "> "._T('icone_sites_references')." &nbsp;&nbsp;";

	if ($unseul == "oui" OR $obligatoire == "oui") echo "<br>";
	if ($unseul == "oui") echo "> "._T('info_un_mot')." &nbsp;&nbsp;";
	if ($obligatoire == "oui") echo "> "._T('info_groupe_important')." &nbsp;&nbsp;";

	echo "<br />";
	if ($acces_minirezo == "oui") echo "> "._T('info_administrateurs')." &nbsp;&nbsp;";
	if ($acces_comite == "oui") echo "> "._T('info_redacteurs')." &nbsp;&nbsp;";
	if ($acces_forum == "oui") echo "> "._T('info_visiteurs_02')." &nbsp;&nbsp;";

	echo "</font>";
	if ($descriptif) {
		echo "<div style='border: 1px dashed #aaaaaa;'>";
		echo "<font size='2' face='Verdana,Arial,Sans,sans-serif'>";
		echo "<b>",_T('info_descriptif'),"</b> ";
		echo propre($descriptif);
		echo "&nbsp; ";
		echo "</font>";
		echo "</div>";
	}

	if (strlen($texte)>0){
		echo "<FONT FACE='Verdana,Arial,Sans,sans-serif'>";
		echo propre($texte);
		echo "</FONT>";
	}

	//
	// Afficher les mots-cles du groupe
	//
	$supprimer_groupe = afficher_groupe_mots($id_groupe);


	echo "<div id='editer_mot-$id_groupe' style='position: relative;'>";

	// Preliminaire: confirmation de suppression d'un mot lie � qqch
	// (cf fin de afficher_groupe_mots_boucle executee a l'appel precedent)
	if ($conf_mot  AND $son_groupe==$id_groupe)
		echo confirmer_mot($conf_mot, $id_groupe);

	echo $supprimer_groupe;

	echo "</div>";

	if (acces_mots() AND !$conf_mot){
		echo "\n<table cellpadding='0' cellspacing='0' border='0' width='100%'>";
		echo "<tr>";
		echo "<td>";
		icone(_T('icone_modif_groupe_mots'), generer_url_ecrire("mots_type","id_groupe=$id_groupe"), "groupe-mot-24.gif", "edit.gif");
		echo "</td>";
		if (!$supprimer_groupe) {
			echo "<td>";
			icone(_T('icone_supprimer_groupe_mots'), generer_url_ecrire("mots_tous","supp_group=$id_groupe"), "groupe-mot-24.gif", "supprimer.gif");
			echo "</td>";
			echo "<td> &nbsp; </td>"; // Histoire de forcer "supprimer" un peu plus vers la gauche
		}
		echo "<td>";
		echo "<div align='$spip_lang_right'>";
		icone(_T('icone_creation_mots_cles'), generer_url_ecrire("mots_edit","new=oui&id_groupe=$id_groupe&redirect=" . generer_url_retour('mots_tous')), "mot-cle-24.gif", "creer.gif");
		echo "</div>";
		
		//deb ajout Lucky Semiosis
		echo "<td>";
		echo "<div align='$spip_lang_right'>";
		icone(_T('icone_creation_groupe_mots'), generer_url_ecrire("mots_type","new=oui"), "groupe-mot-24.gif", "creer.gif");
		echo "</div>";
		//fin ajout Lucky Semiosis

		echo "</td></tr></table>";
	}	

	//deb ajout Lucky Semiosis
	echo pipeline('affiche_groupe_mot',array('args'=>array('exec'=>'mots_tous','id_groupe'=>$id_groupe),'data'=>''));
	//fin ajout Lucky Semiosis

	fin_cadre_enfonce();
}

if (acces_mots()  AND !$conf_mot){
	echo "<p>&nbsp;</p><div align='right'>";
	icone(_T('icone_creation_groupe_mots'), generer_url_ecrire("mots_type","new=oui"), "groupe-mot-24.gif", "creer.gif");
	echo "</div>";
}

fin_page();
}

function confirmer_mot ($conf_mot, $son_groupe)
{
	$row = spip_fetch_array(spip_query("SELECT * FROM spip_mots WHERE id_mot=$conf_mot"));
	$id_mot = $row['id_mot'];
	$titre_mot = typo($row['titre']);
	$type_mot = typo($row['type']);

	if (($na = intval($na)) == 1) {
		$texte_lie = _T('info_un_article')." ";
	} else if ($na > 1) {
		$texte_lie = _T('info_nombre_articles', array('nb_articles' => $na)) ." ";
	}
	if (($nb = intval($nb)) == 1) {
		$texte_lie .= _T('info_une_breve')." ";
	} else if ($nb > 1) {
		$texte_lie .= _T('info_nombre_breves', array('nb_breves' => $nb))." ";
	}
	if (($ns = intval($ns)) == 1) {
		$texte_lie .= _T('info_un_site')." ";
	} else if ($ns > 1) {
		$texte_lie .= _T('info_nombre_sites', array('nb_sites' => $ns))." ";
	}
	if (($nr = intval($nr)) == 1) {
		$texte_lie .= _T('info_une_rubrique')." ";
	} else if ($nr > 1) {
		$texte_lie .= _T('info_nombre_rubriques', array('nb_rubriques' => $nr))." ";
	}

	return debut_boite_info(true)
	. "<div class='serif'>"
	. _T('info_delet_mots_cles', array('titre_mot' => $titre_mot, 'type_mot' => $type_mot, 'texte_lie' => $texte_lie))
	. "<p>"
	  . ajax_action_auteur('editer_mot', "$son_groupe,$id_mot,,,",'grouper_mots', "&id_groupe=$son_groupe", array("<b>" . _T('item_oui') . "</b>", ''))
	. '&nbsp;'
	.  _T('info_oui_suppression_mot_cle')
	  /* troublant. A refaire avec une visibility
	 . "<LI><B><A href='" 
	. generer_url_ecrire("mots_tous")
	. "#editer_mot-$son_groupe"
	. "'>"
	. _T('item_non')
	. "</A>,</B> "
	. _T('info_non_suppression_mot_cle')
	. "</UL>" */
	. "</div>"
	. fin_boite_info(true)
	. "<br />";
}
?>
