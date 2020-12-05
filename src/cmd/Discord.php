<?php

namespace cmd;
use cmd\main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
class Discord extends PluginCommand implements Listener
{
	public function __construct(string $name, Main $plugin)
	{
		parent::__construct($name, $plugin);
		$this->setDescription("Obtient le serveur Discord");
		$this->setUsage("/discord");
		$this->setAliases(["ds"]);
		$this->plugin = $plugin;
	}
	public function execute(CommandSender $player, string $commandLabel, array $args)
	{
		$config = new Config($this->plugin->getDataFolder()."Config".".yml", Config::YAML);
		if (!$this->testPermission($player)){
			return true;
		}
		if (!$player instanceof Player){
			$player->sendMessage(TextFormat::GOLD . "tu ne peux pas utiliser le /Discord de la console ");
			return true;
		}else{
			$player->sendMessage($config->get("Discord"));;
		}

		return true;
	}
}
