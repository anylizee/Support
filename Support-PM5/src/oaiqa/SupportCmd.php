<?php

declare(strict_types=1);

namespace oaiqa;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\nbt\tag\ByteArrayTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

/**
 * Class SupportCmd
 * @package oaiqa
 */
class SupportCmd extends Command
{
    
    /**
     * SupportCommand construct.
     */
    public function __construct()
    {
        parent::__construct('support', 'support your favorite partner');
        $this->setPermission('player.pss');
    }
    
    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if (!isset($args[0])) {
          Menu::make($sender);
         return;
        }
    }
}