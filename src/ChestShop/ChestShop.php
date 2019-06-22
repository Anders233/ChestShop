<?php
declare(strict_types=1);
namespace ChestShop;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemIds;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class ChestShop extends PluginBase
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this, new DatabaseManager($this->getDataFolder() . 'ChestShop.sqlite3')), $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "id":
                if ($sender instanceof Player){
                    $sender->sendMessage("§a[§eChest§bShop§a]§6:你手中物品的ID为：§a" . $sender->getInventory()->getItemInHand()->getId() . ":" . $sender->getInventory()->getItemInHand()->getDamage());
                } else {
                    $sender->sendMessage("§a[§eChest§bShop§a]§6:控制台可以GUN犊子(ノ｀Д)ノ");
                }
                return true;
            default:
                return false;
        }
    }
}