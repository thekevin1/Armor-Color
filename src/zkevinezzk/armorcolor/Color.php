<?php

namespace zkevinezzk\armorcolor;

use zkevinezzk\armorcolor\command\ColorCommand;

use pocketmine\plugin\PluginBase;

class Color extends PluginBase {

    public function onEnable(): void {

        $this->getServer()->getCommandMap()->register("color", new ColorCommand($this));

        $this->getLogger()->info("
░█████╗░██████╗░███╗░░░███╗░█████╗░██████╗░  ░█████╗░░█████╗░██╗░░░░░░█████╗░██████╗░
██╔══██╗██╔══██╗████╗░████║██╔══██╗██╔══██╗  ██╔══██╗██╔══██╗██║░░░░░██╔══██╗██╔══██╗
███████║██████╔╝██╔████╔██║██║░░██║██████╔╝  ██║░░╚═╝██║░░██║██║░░░░░██║░░██║██████╔╝
██╔══██║██╔══██╗██║╚██╔╝██║██║░░██║██╔══██╗  ██║░░██╗██║░░██║██║░░░░░██║░░██║██╔══██╗
██║░░██║██║░░██║██║░╚═╝░██║╚█████╔╝██║░░██║  ╚█████╔╝╚█████╔╝███████╗╚█████╔╝██║░░██║
╚═╝░░╚═╝╚═╝░░╚═╝╚═╝░░░░░╚═╝░╚════╝░╚═╝░░╚═╝  ░╚════╝░░╚════╝░╚══════╝░╚════╝░╚═╝░░╚═╝ Plugin by zkevinezzk.");
    }

    public function onDisable(): void {
        $this->getLogger()->info("Armor Color disabled ");
    }
}
