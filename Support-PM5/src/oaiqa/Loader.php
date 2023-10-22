<?php

namespace oaiqa;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase {
  
 /** @var $instance **/
 public static Loader $instance;
  
  protected function onLoad() : void {
    self::$instance = $this;
  }
  
  protected function onEnable() : void {
    
  }
  
  public static function getInstance() : self {
		return self::$instance;
	}
}
?>