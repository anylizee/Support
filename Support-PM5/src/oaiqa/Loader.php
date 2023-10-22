<?php

namespace oaiqa;

use muqsit\invmenu\InvMenuHandler;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase {
  
 /** @var $instance **/
 public static Loader $instance;
  
  protected function onLoad() : void {
    self::$instance = $this;
  }
  
  protected function onEnable() : void {
    if (!InvMenuHandler::isRegistered()) InvMenuHandler::register($this);
    $this->getServer()->getCommandMap()->register('support', new SupportCmd($this));
  }
  
  public static function getInstance() : self {
		return self::$instance;
	}
}
?>