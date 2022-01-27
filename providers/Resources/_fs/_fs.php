<?php

/**
 ** #TITRE: des fonctions raccourcies pour votre script **
 ** #DESCRIPTION:
 * Ces fonctions retournent les méthodes de nos classes à
 * partir des noms plus courts qui vont vous permettre
 * d'écrire moins en les appelants dans votre Script !
 **
 *
 * @package Mondje
 * @author Stéphane N'cho <contact@syedevpro.com>
 * {@link https://www.syedevpro.com}
*/


/**
 * @return func_num_args	nombre d'arguments passés en fonction
 */
function hm_args():int
{
	return func_num_args();
}


/**
 * @return func_get_args	liste d'arguments passés en fonction
 */
function all_args():array
{
	return func_get_args();
}


/**
 ** Fonction raccourcie de notre système de navigation **
 * @param string $root		nom de la Route dont l'on veut afficher la page
 * @param array $uri_data		liste de paramètres à attacher à votre route
 */

function route(string $root = NULL, ?array $uri_data = []):string
{
	$default_route = \Controller\Controller\AppController::iphpConfig(
		"routes.default_route"
	);
	
 	$rootName = is_null($root) ? $default_route : $root;
	$gotElemt = @php_find_element('route', in(explode('.', $rootName)));
	$rootName = ($gotElemt) ? $rootName : $rootName . null;

	return \Controller\Controller\AppController::Iphp_navigation($rootName,$uri_data);
}


/**
 ** Fonction raccourcie de notre système de chargement de fichiers de Script "ClientSide" **
 * @param string $mark 	marque de trie.
 * @param string $dirname 	Nom du dossier à partir duquel nous souhaitons charger ces fichiers.
 * @param string $to_load_ext	Marque permettant d’indiquer type de fichiers à charger.
 * @var string/null $mark, $is_not_empty, $dirname, $ext
 * @since output\public		chemin du dossier parent par defaut
 * @return \Controller\Controller\AppController::GetClientSideScriptSheets ();
 */

function GCSSS(?string $mark = null, ?string $dirname = 'css', ?string $ext = "css"):?string
{
	$is_not_empty = (!is_null($mark));
	$mark = ($is_not_empty) ? $mark : null;

	return \Controller\Controller\AppController::GetClientSideScriptSheets($mark, $dirname, $ext);
}

/**
 * Utilisez la fonction getCssFiles() pour charger des
 * fichier CSS classée dans ...public_alt/css.php
 */
function getCssFiles(?string $group, ?string $from = "css"):?string
{
	/**
	 * @param $from 	Nom du dossier (utilisé comme éférence) depuis lequel
	 * 					nous chargeons nos fichiers css.
	 * 
	 * @param $group 	liste des fichiers à charger du groupé dans le sous-tableau
	 */

	return \Controller\Controller\AppController::loadCssFiles($group, $from);
}


/**
 * Utilisez la fonction getJsFiles() pour charger des
 * fichier JS classée dans ...public_alt/css.php
 */
function getJsFiles(?string $group, ?string $from = "js"):?string
{
	/**
	 * @param $from 	Nom du dossier duquel nous souhaitons charger nos fichiers css.
	 * @param $group 	liste de fichiers que vous souhaitez charger du @param $from.
	 *                par ordre d'appels...
	 */

	return \Controller\Controller\AppController::loadJsFiles($group, $from);
}

/**
 ** Fonction raccourcie pour création de titre de façon dynamique  **
 * @return \Controller\Controller\AppController::dynamicPageTitle();
 */
function dynamicPageTitle(bool $from_route = true):?string
{
	return \Controller\Controller\AppController::dynamicPageTitle($from_route);
}


/**
 ** Fonction raccourcie de notre middleware (connexion BDD) **
 * @param void/null	Cette fonction n'attend aucun paramètre
 * @return \Model\Modelstatement\ModelClass::DB_connection ();
 */

function DB_conn():PDO
{
	return \Model\Modelstatement\ModelClass::DB_connection();
}


/**
 * @param	string $filename	 Le nom du fichier à charger
 * @return /@param $filename
 * @example: "/output/contents/partials/filename"
 */

function partials($filename)
{
	$filename = preg_replace('#[^./0-9a-zA-Z\_-]+#i', '', $filename);
	include_once PARTIAL_DIR . $filename;
}


/**
 * @param	string $dest	 Le dossier de destination pour cette appelle
 * @return /@param $dest
 * @example: "/home/site/www/admin/iphp/file"
 */

function absolute_dir($dest)
{
	$dest = preg_replace('#[^./0-9a-zA-Z\_-]+#i', '', $dest);
	return \Controller\Controller\AppController::base_URI($dest);
}

/**
 * @param	string $dest	 Le dossier de destination pour cette appelle
 * @return /output/public/@param string $dest;
 */

function public_dir($dest)
{
	$dest = preg_replace('#[^./0-9a-zA-Z\_-]+#i', '', $dest);
	return \Controller\Controller\AppController::pbc_dynamicaly($dest);
}

/**
 * @param	string $dest	 Le dossier de destination pour cette appelle
 * @return /output/media/@param string $dest;
 */

function media_dir($dest)
{
 	$dest = preg_replace('#[^./0-9a-zA-Z\_-]+#i', '', $dest);
 	return \Controller\Controller\AppController::mdynamic_URI($dest);
}

/**
 * @param	string $dest	 Le dossier de destination pour cette appelle
 * @return domain/basedir + /@param $dest
 *
 * commentaire: la valeur que renvoit cette fonction  varie en fonction du nombre de
 * paramètre passé à l'url: s'il vaut 4, elle renvoit un chemin précédé de votre
 * nom de domaine (http(s)//:votre_site.com sinon le chemin de base est renvoyé (/)
 *
 * // NOTE: si vous voulez une url accompagnée de votre nom de domaine, veuillez
 *			utiliser la fonction myDomaine(@param string $dest) ci-après;
 */

function dynamic_url($dest)
{
	$dest = preg_replace('#[^./0-9a-zA-Z\_-]+#i', '', $dest);
 	return \Controller\Controller\AppController::dynamic_url($dest);
}


/**
 * @param	string $dest	 Le dossier de destination pour cette appelle
 * @return NOM_DE_DOMAINE - EX: https/nom_de_domaine.com/@param string $dest
 */

function withDomaine($dest)
{
	$dest = preg_replace('#[^./0-9a-zA-Z\_-]+#i', '', $dest);
	return \Controller\Controller\AppController::domaine_name($dest);
}

/**
 * Utiliser la fonction raccourcies trans(@param $ref) pour traduire vos textes...
*/
function trans($data)
{
	return \Controller\Localizations\Translation::get($data);
}

/**
 * Utiliser la fonction raccourcies __(@param $ref) pour traduire vos textes...
*/
function __($data)
{
	return trans($data);
}

/**
 * Utiliser isLocal() pour verifier si la langue que tente utiliser
 * l’applicationest bien une langue définie.
*/
function isLocal($data)
{
	return \Controller\Localizations\Translation::isLocale($localName);
}

/**
 * utilisez la fonction set_locale() pour appliquer un changement de langue
 */
function set_locale($data)
{
    return \Controller\Localizations\Translation::setLocale($data);
}

/**
 * getLocal retourne la langue en cours d’utilisation par l’application
 */
function getLocal($data)
{
	return \Controller\Localizations\Translation::get($data);
}

/**
 * getClientLocal retourne la langue en cours d’utilisation par le client
 */
function getClientLocal()
{
	return @substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
}
