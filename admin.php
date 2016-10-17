<?php
include_once("essentials/autoinclude.php");

class main extends htmldoc{
	static $page = "";

	function __construct(){
		parent:: __construct();
		self::$title = "Infoskærm - Administration";
		self::addheader('<link rel="stylesheet" type="text/css" href="admin.css" />');
		
		$content = $this->getcontent();
		$menu = $this->getmenu();

		$this->body = '.'.$menu.$content;
		$this->export();
	}
	
	function getmenu(){
		$m = "\n\t\t<div id=\"menu\">";
		if(isset($_SESSION['login'])){
			$mods = mod::getallwithProperty("menu");
			uasort($mods, function($a, $b){return $a->menu - $b->menu;});
			foreach($mods as $k => $v) $m .= "\n\t\t\t".'<a href="?page='.$k.'">'.$v->name.'</a>';
			$m .= "\n\t\t\t".'<a style="margin-top:20px" href="?page=login&amp;logout">Logout</a>';
		}
		$m .= "\n\t\t</div>";
		return $m;
	}
	
	function getcontent(){
		ob_start();
		print "\n\t\t<div id=\"content\">";
		if(!isset($_SESSION['login'])) self::$page = 'login';
		else self::$page = (isset($_GET['page']) && mod::exists($_GET['page'])) ? $_GET['page'] : "slidemanager";
		$page = "";
		while($page != self::$page){
			$page = self::$page;
			mod::get($page)->getpage();
		}
		print "\n\t\t</div>";
		return ob_get_clean();
	}
}
new main();
?>