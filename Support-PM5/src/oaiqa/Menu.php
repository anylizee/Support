<?php

namespace oaiqa;

use oaiqa\Loader;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use muqsit\invmenu\type\InvMenuTypeIds;
use pocketmine\console\ConsoleCommandSender;

use pocketmine\item\Item;
use pocketmine\item\LegacyStringToItemParser;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Menu {
  
  public function make(Player $player) : void {
    $config = new Config(Loader::getInstance()->getDataFolder()."config.yml", Config::YAML);
    $partner = $config->getAll()["partner"];
    
    foreach ($partner as $config) {
      $format = $config["format"];
      $item = self::get($config["item"], $config["meta"]);
      if (isset($config["format"])) {
        $item->setCustomName(TextFormat::colorize($format));
      }
      /// inv menu
      $menu = InvMenu::create(InvMenuTypeIds::TYPE_DOUBLE_CHEST);
      
      $menu->getInventory()->setItem($config["slot"], $item);
      $menu->setListener(function(InvMenuTransaction $transaction): InvMenuTransactionResult {
        $player = $transaction->getPlayer();
        $item = $transaction->getItemClicked();
      if ($item->getTypeId() === $config["item"]) {
        if (isset($config["command"])) {
          $player->sendMessage("testing");
          return;
        }
        return;
      }
      
      return $transaction->discard();
        });
      $menu->setName(TextFormat::colorize("&l&dSupport&r"));
      $menu->send($player);
    }
  }
  
  public function get(Item $id, int $meta = 0, int $count = 1) : Item {
    return LegacyStringToItemParser::getInstance()->parse("{$id}:{$meta}")->setCount($count);;
  }
}
?>