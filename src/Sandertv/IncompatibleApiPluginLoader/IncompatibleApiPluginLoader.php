<?php

namespace Sandertv\IncompatibleApiPluginLoader;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoadOrder;

class IncompatibleApiPluginLoader extends PluginBase {

	public function onEnable() {
		$opt = "load-incompatible-plugin-api";
		$val = "true";
		$opts = getopt("", ["$opt::"]);
		if(!isset($opts[$opt]) || $opts[$opt] !== $val){
			$this->getLogger()->critical("Loading incompatible-API plugins will lead to many negative impacts, and this crash is the least negative example of such impacts.");
			$this->getLogger()->critical("Loading of these plugins could lead to all kinds of consequences, including crashes, data loss and other bugs. By continuing you promise not to complain about any of these issues.");
			$this->getLogger()->critical("If you are ready to accept such a fate, please run the server with --$opt=$val");
			\pocketmine\kill(getmypid());
			die(127);
		}
		$incompatibleApiManager = new IncompatibleApiPluginManager($this->getServer(), $this->getServer()->getCommandMap());
		$incompatibleApiManager->loadPlugins($this->getServer()->getPluginPath());

		$this->getServer()->enablePlugins(PluginLoadOrder::STARTUP);
		$this->getServer()->enablePlugins(PluginLoadOrder::POSTWORLD);
	}
}
