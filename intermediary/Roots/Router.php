<?php
namespace Controller\Roots;
/**
 *
 */

use Controller\Controller\AppController as GetController;
class Router extends MainRoot
{
  /**
  * @var private static $_currentPage  la requette du client
  * @var private static $_header  l'entête
  * @var private static $_footer  le pied de page
  */

  use \Controller\Extended\Router;

  private static $_currentPage;
  private static $_header, $_footer;

  public function __construct()
  {
    $currentPage = parent::curr_pg(GetController::iphpConfig(
      "routes.default_route"
      ));
    self::$_currentPage = trim($currentPage, IPHP_DS);
  }

  /*
  [---------------------------------------------------------------------------
  [ PAGINATION
  [---------------------------------------------------------------------------
  [
  [ Préparons aussi un système pour notre navigation sur les différentes pages
  [ de notre belle application !
  [
  */

  public static function Iphp_navigation()
  {
    /**
    * Description de method
    *
    * @param <const> NAVIGATOR output/contents/switchers
    *
    * @return array list of files got from @param directory
    */
    $navdata = (
      !mdj_is_empty(GetController::iphpConfig( "routes.default_route" ))
    );

    if ($navdata)
    return GetController::iphpConfig( "routes.default_route" );

    $dir = opendir(
      NAVIGATOR
    );

    $page = [];

    while ($pages = readdir($dir))    {

      $test = (
        !php_find_key($pages, in(array('.', '..')))
        ) ?
      $test = true :
      $test = false ;

      if ($test)
          $page[] = $pages;
    }

    return $page;
  }


    /*
    [----------------------------------------------------------------------------
    [ CRÉATION DE VUE
    [----------------------------------------------------------------------------
    [
    [ comme son nom nous l'indique cette methode crée probablement notre vue sans
    [ faire trop de bruit...
    [
    */

  public static function CreateView($sections)
  {
    foreach ($sections as $key => $values)
    {
      if( php_is_this_a_file($values) ){

        require_once $values;
      }else{
        $dirname = php_create_array('/', $values);
        IphpThrowError(
          "errcd21233", php_array_last_element($dirname),
                        php_name_of_dirrectory($values)
        );
      }
    }
    
  }
}
