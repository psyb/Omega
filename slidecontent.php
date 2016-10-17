<?php
include_once("essentials/autoinclude.php");

class main extends htmldoc{
	static $page = "";

	function __construct(){
		parent:: __construct();
		self::$title = "";
		self::addHeader('<style>
			body, html{
				margin: 0;
				padding: 0;
			}
		</style>');
		ob_start();
		$module = DB::query("SELECT `module` FROM `slides` WHERE `id` = '".$_GET['id']."'")[0]["module"];
		mod::get($module)->getslidecontent($_GET['id']);
		$this->body = ob_get_clean();
		$this->export();
	}
}
new main();
?>