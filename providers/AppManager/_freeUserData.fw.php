<?php
use \Whoops\{Run as HandlerThrower};
use \Controller\Handler\IphpExceptions;

$baseDir = dirname(
  dirname(__DIR__)
  ) . DIRECTORY_SEPARATOR;

include_once 'tasksExecutortemplateFuncs.fw.php';
include_once $baseDir . 'config/app.php';

function currTemplate(){
  $currentTemplate = TEMPLATE;
  if (is_template($currentTemplate)) {
    return 'output' . IPHP_DS . 'themes' . IPHP_DS .  $currentTemplate . IPHP_DS;
  }else {
    $errors = new HandlerThrower;
    $errors->pushHandler(new \Whoops\Handler\PrettyPageHandler)->register();
    $handler = new \Controller\Handler\IphpExceptions();
    $handler->_errMsg = "Le Template " . mb_strtoupper($currentTemplate) . " n'est pas valide dans [/output/themes/] ";
    $handler->IphpHandlerThrower();
  }
}

function currState(){
  $currentState = CORE;
  if (!empty($currentState)) {
    switch ($currentState) {
      case 'themes':
        return currTemplate();
        break;

      default:
        return '';
        break;
    }
  }else {
    $errors = new HandlerThrower;
    $errors->pushHandler(new \Whoops\Handler\PrettyPageHandler)->register();
    $handler = new \Controller\Handler\IphpExceptions();
    $handler->_errMsg = "L'option CORE ne peut être vide dans [/config/app.php] ";
    $handler->IphpHandlerThrower();
  }
}

function currStateAlt(){
  $currentState = CORE;
  if (!empty($currentState)) {
    switch ($currentState) {
      case 'themes':
        return currTemplate();
        break;

      default:
        return 'output' . IPHP_DS . 'single' . IPHP_DS;
        break;
    }
  }else {
    $errors = new HandlerThrower;
    $errors->pushHandler(new \Whoops\Handler\PrettyPageHandler)->register();
    $handler = new \Controller\Handler\IphpExceptions();
    $handler->_errMsg = "L'option CORE ne peut être vide dans [/config/app.php] ";
    $handler->IphpHandlerThrower();
  }
}
