<?php
namespace Controller\Controller;
/**
 *
 */
 use Controller\Roots\{Router};

trait Manager
{

    /*
    [--------------------------------------------------------------------------
    [ ERREUR 404
    [--------------------------------------------------------------------------
    [
    [ En cas d’erreur 404 (Fichier non trouvé) sur la tentative
    [ de chargement d'un fichier, Nous chargeons un autre
    [ par défaut présent dans le même chemin (relatif)
    [ que le fichier en question. Cela permet d'éviter
    [ les erreurs de superpositions inutiles de contenu.
    [
    */
		public function Is404_Err()
		{
			[$param, $source] = func_get_args(

      );
			return $param === FALSE || is_null($param) ? 'Iphpdefault' : $param;
		}

    /*
    [--------------------------------------------------------------------------
    [ MISE EN PAGE
    [--------------------------------------------------------------------------
    [
    [ La vue, c’est aussi l’ergonomie et l’interactivité. La méthode ci-dessous
    [ nous permet d’importer nos fichiers de css et de js pour la
    [ mise en page dynamique de notre belle application.
    [
    */
		public static function GetClientSideScriptSheets(?string $sort = null, ?string $dir = 'css', ?string $ext = "css")
		{
      /**
       * @param $sort 	marque de trie.
       * @param $dir 	Nom du dossier duquel nous souhaitons charger nos fichiers.
       * @param $ext	Marque permettant d’indiquer les fichiers que nous souhaitons charger
       * @since output\public		chemin du dossier parent par defaut
       */

      $sort = self::isSortation($sort);
			$sheets = glob(
        parent::PUBL_DIR . $dir . IPHP_DS . '*.'. $sort . $ext
      );
			return self::scriptSheetFormat(
        $ext, $sheets
      );
		}

    /*
    [--------------------------------------------------------------------------
    [ MISE EN PAGE
    [--------------------------------------------------------------------------
    [
    [ La vue, c’est aussi l’ergonomie et l’interactivité. La méthode
    [ suivante nous permet d’importer nos fichiers de css pour
    [ la mise en page statique de notre belle application
    [
    */
		public static function loadCssFiles(?string $group, ?string $from = "css")
		{
      /**
       * @param $from 	Nom du dossier duquel nous souhaitons charger nos fichiers css.
       * @param $group 	liste de fichiers que vous souhaitez charger du @param $from.
       *                par ordre d'appels...
       */
      $from = (
        php_null_data($from) || php_bool_data($from)
        ) ?
      $from = "css" :
      $from = $from;
			return getStylesheet(
        parent::PUBL_DIR, $from, 'css', parent::PUBL_ALT_DIR, $group
      );
		}

    /*
    [--------------------------------------------------------------------------
    [ PROGRAMATION AVANT-PLAN
    [--------------------------------------------------------------------------
    [
    [ La vue, c’est aussi l’ergonomie et l’interactivité. La méthode
    [ suivante nous permet d’importer nos fichiers JavaScript pour
    [ la mise en page dynamique de notre belle application.
    [
    */
		public static function loadJsFiles(?string $group, ?string $from = "js")
		{
      /**
       * @param $from 	Nom du dossier duquel nous souhaitons charger nos fichiers js.
       * @param $group 	liste de fichiers que vous souhaitez charger du @param $from.
       *                par ordre d'appels...
       */
       $from = (
         php_null_data($from) || php_bool_data($from)
         ) ?
       $from = "js" :
       $from = $from;
 			return getStylesheet(
         parent::PUBL_DIR, $from, 'js', parent::PUBL_ALT_DIR, $group
       );
		}


    /*
    [---------------------------------------------------------------------------
    [ PAGINATION
    [---------------------------------------------------------------------------
    [
    [ Préparons aussi un système pour notre navigation sur pour
    [ notre belle application !
    [
    */

		/**
		 * @return page URI
		 */
		public static function Iphp_navigation(
      string $param = 'welcome', ?array $uri_data = []
      ):string
		{

			if(!is_string($param) || mdj_is_empty($param))
  		{
  			$param = @array_shift(
          Router::Iphp_navigation()
        );

  			$page = php_create_array( using('.') , with($param) );
         
  			$page = array_shift(
          $page
          ) . IPHP_DS;

  			$uri_data = (!mdj_is_empty($uri_data)) ?
        $uri_data = $uri_data :
        $uri_data = false;

  			if ($uri_data)
        {
  			  foreach ($uri_data as $key => $value)
                   $page .= '&' . $key . '=' . $value;
        }

  		  return AppController::pdynamic_URI($page);
  		}

      
      $pageData = php_create_array(using('.'), with($param), 2);
      $page = $pageData[0] . IPHP_DS;
      $page .= (
        php_find_key(1, in($pageData)) ? $pageData[1] : null
      );

      $uri_data = (!mdj_is_empty($uri_data)) ?
      $uri_data = $uri_data :
      $uri_data = false;

      if ($uri_data)

        foreach (
          $uri_data as $key => $value
          )

          $page .= '&' . $key . '=' . $value;

      return AppController::pdynamic_URI(
        $page
      );

		}


    /*
    [---------------------------------------------------------------------------
    [ CONVERTIR EN TABLEAU
    [---------------------------------------------------------------------------
    [
    [ Cette méthode retourne le contenu de notre
    [ Route sous la forme d'un tableau
    [
    */
    public function rootDatas(array $arg, int $max, int $base): array
    {
      $data = null;

    	for ($i=0; $i < $max; $i = $i+$base)

    			$data .= $arg[
            $i + 1
            ] . ',';

      $data  = php_create_array(
        using(','), with(rtrim(
          $data, ',')
          )
      );

      return $data;
    }


    /*
    [---------------------------------------------------------------------------
    [ CONVERTIR EN TABLEAU FILTRÉ
    [---------------------------------------------------------------------------
    [
    [ Cette méthode retourne le contenu de notre Route sous forme
    [ de tableau en effectuant un filtre sur les
    [ caractère accentués dans celle-ci.
    [
    */
    public static function rootDatasValues(string $rootData): array
    {

      $rootData = trim(
        preg_replace('#[^.0-9a-zA-ZâäàéèùêëîïôöçñÂÄÀÉÈÙÊËÎÏÔÖÇÑ\_-]+#i', ',', $rootData), ","
      );
      $rootData = php_create_array(
        using(','), with($rootData)
      );

      return $rootData;
    }

}
