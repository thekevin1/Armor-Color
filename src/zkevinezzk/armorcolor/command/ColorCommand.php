<?php

namespace zkevinezzk\armorcolor\command;

use pocketmine\color\Color;
use pocketmine\item\VanillaItems;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class ColorCommand extends Command {

    public function __construct() {
        parent::__construct("color", "§7Usage /color help to see all commands.", null, ["col"]);
        $this->setPermission("color.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if (!$sender instanceof Player) {
            $sender->sendMessage("§cThis command can only be used in-game.");
            return; 
        }

        switch ($args[0] ?? "") {
            case "help":
                $sender->sendMessage("§7/color setcolor <string:color> (Set the color for Leather Armor.)");
                $sender->sendMessage("§7/color list (Shows you the colors list.)");
                break;

            case "list":
                $sender->sendMessage("§r§b§LAVAIBLE COLORS");
                $sender->sendMessage("§r§c  ");
                $sender->sendMessage("§r§7BLACK");
                $sender->sendMessage("§r§7BLUE");
                $sender->sendMessage("§r§7BROWN");
                $sender->sendMessage("§r§7CYAN");
                $sender->sendMessage("§r§7GRAY");
                $sender->sendMessage("§r§7GREEN");
                $sender->sendMessage("§r§7LIGHT_BLUE");
                $sender->sendMessage("§r§7LIGHT_GRAY");
                $sender->sendMessage("§r§7LIME");
                $sender->sendMessage("§r§7MAGENTA");
                $sender->sendMessage("§r§7ORANGE");
                $sender->sendMessage("§r§7PINK");
                $sender->sendMessage("§r§7PURPLE");
                $sender->sendMessage("§r§7RED");
                $sender->sendMessage("§r§7WHITE");
                $sender->sendMessage("§r§7YELLOW");
                $sender->sendMessage("§r§c  ");
                break;

            case "setcolor":
                $item = $sender->getInventory()->getItemInHand();
                if (
                    $item->equals(VanillaItems::LEATHER_CAP()) ||
                    $item->equals(VanillaItems::LEATHER_TUNIC()) ||
                    $item->equals(VanillaItems::LEATHER_PANTS()) ||
                    $item->equals(VanillaItems::LEATHER_BOOTS()) ||
                    $item->getCustomColor() !== null
                ) {
                    if (isset($args[1])) {
                        $colorName = strtoupper($args[1]);
                        $color = $this->getColorByName($colorName);

                        if ($color !== null) {
                            $item->setCustomColor($color);
                            $sender->getInventory()->setItemInHand($item);
                            $sender->sendMessage("§aArmor color set to " . $colorName);
                        } else {
                            $sender->sendMessage("§cInvalid color specified. Use /color list to see available colors.");
                        }
                    } else {
                        $sender->sendMessage("§cUsage: /color setcolor <color>");
                    }
                    } else {
                        $sender->sendMessage("§cHold a piece of leather armor in your hand to set its color.");
                }
                break;

            default:
                $sender->sendMessage("§cUnknown sub-command. Use /color help for assistance.");
                break;
        }
    }

    private function getColorByName(string $colorName): ?Color {
        $colorMap = [
            "BLACK" => new Color(0, 0, 0),
            "BLUE" => new Color(0, 0, 255),
            "BROWN" => new Color(165, 42, 42),
            "CYAN" => new Color(0, 255, 255),
            "GRAY" => new Color(128, 128, 128),
            "GREEN" => new Color(0, 128, 0),
            "LIGHT_BLUE" => new Color(173, 216, 230),
            "LIGHT_GRAY" => new Color(211, 211, 211),
            "LIME" => new Color(50, 205, 50),
            "MAGENTA" => new Color(255, 0, 255),
            "ORANGE" => new Color(255, 165, 0),
            "PINK" => new Color(255, 182, 193),
            "PURPLE" => new Color(128, 0, 128),
            "RED" => new Color(255, 0, 0),
            "WHITE" => new Color(255, 255, 255),
            "YELLOW" => new Color(255, 255, 0),

            "black" => new Color(0, 0, 0),
            "blue" => new Color(0, 0, 255),
            "brown" => new Color(165, 42, 42),
            "cyan" => new Color(0, 255, 255),
            "gray" => new Color(128, 128, 128),
            "green" => new Color(0, 128, 0),
            "light_blue" => new Color(173, 216, 230),
            "light_gray" => new Color(211, 211, 211),
            "lime" => new Color(50, 205, 50),
            "magenta" => new Color(255, 0, 255),
            "orange" => new Color(255, 165, 0),
            "pink" => new Color(255, 182, 193),
            "purple" => new Color(128, 0, 128),
            "red" => new Color(255, 0, 0),
            "white" => new Color(255, 255, 255),
            "yellow" => new Color(255, 255, 0),
        ];

        $upperCaseColorName = strtoupper($colorName);
        return $colorMap[$upperCaseColorName] ?? null;
    }
}
