<?php

namespace Sandertv\IncompatibleApiPluginLoader;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoadOrder;

class IncompatibleApiPluginLoader extends PluginBase {

	public function onEnable() {
		$opt = "i-understand-that-loading-plugins-in-incompatible-api-will-lead-to-all-kinds-of-consequences-including-server-crashes-and-losing-data-and-infecting-wannacry-and-i-promise-i-wont-complain-about-any-bugs-that-happen-on-my-server";
		$val = "i-will-gratefully-accept-the-doom-of-my-server-and-my-machine-and-my-life";
		$opts = getopt("", ["::$opt"]);
		if(!isset($opts[$opt]) || $opts[$opt] !== $val){
			$this->getLogger()->critical("Loading incompatible-API plugins will lead to many negative impacts, and this crash is the least negative example of such impacts.");
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
