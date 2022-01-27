<?php
namespace Controller\Roots;
/**
 *
 */

 use Controller\Controller as Controller, Controller\Members as MemberClass, Model\php\ModelClass as GetOutPut, \Whoops\Run as HandlerThrower;


include  __DIR__ . '/../../providers/Resources/iphp.conf.php';

class MainRoot
{
  use \Controller\Extended\Main;

  private $_lang;

  const PHP_EXT = '.php';
  const HTML_EXT = '.html';
  const INCLUDES_DIR = INCLUDES_DIR . IPHP_DS;
  const CONSTS_DIR = CONSTS_DIR . IPHP_DS;
  const MEDIA_DIR = CURRENTTEMPLATEALT . 'media' . IPHP_DS;
  const CONFIG = 'config' . IPHP_DS;
  const SIGN1 = '=';
  const SIGN2 = '&';
  const SCRIPTMANAGER = 'providers' . IPHP_DS . 'AppManager' . IPHP_DS;
  const LOCAL_FUNCTIONS = CURRENTTEMPLATE . 'application' . IPHP_DS . 'application' . IPHP_DS . 'Functions' . IPHP_DS;
  const PUBL_DIR = CURRENTTEMPLATEALT .  'public' . IPHP_DS;
  const PUBL_ALT_DIR = CURRENTTEMPLATEALT .  'public_alt' . IPHP_DS;
  const PHP_CLASS = CURRENTTEMPLATE . 'application' . IPHP_DS . 'application' . IPHP_DS . 'Class' . IPHP_DS;

  public static function debug($params, $etat)
  {
    echo "<pre class=\"bg-black text-white\">";
    echo print_r($params, true);
    echo "</pre>";
  }

  public static function curr_pg()
  {
    [$definedPg] = func_get_args();

    $currpg = ( mdj_is_empty(
      $_SERVER['QUERY_STRING']) ? $definedPg : php_create_array(
        using(self::SIGN1), with($_SERVER['QUERY_STRING']
      )));

    $currpg = ( php_array($currpg) ? php_create_array(using(self::SIGN2), with($currpg[1])) : $currpg);
    
    return ( php_array($currpg)
      ) ? $currpg[0] : $definedPg;
  }
}
