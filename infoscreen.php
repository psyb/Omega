<?php
include_once("essentials/autoinclude.php");

class main extends htmldoc{
	static $page = "";

	function __construct(){
		parent:: __construct();
		self::$title = "Infoskærm";
		self::addheader('<link rel="stylesheet" type="text/css" href="infoscreen.css" />');
		self::addheader('<script type="text/javascript" src="keycontrols.js"></script>');
		
		$this->body = '
			<img src="logo_for_background.png" id="infoscreen_logo" />
			'.$this->loadmodule("slideviewer").'
			<aside id="infoscreen_sidebar">
				'.$this->loadmodule("clock").'
				'.$this->loadmodule("searches").'
				'.$this->loadmodule("notification").'
			</aside>
			';
			
			/* Code for 'upcoming events'
			<style>
			#infoscreen_event{
				border-radius: 0 0 0.5vw 0.5vw;
			}
			#infoscreen_event header{
				padding: 0.7vw;
				background-color: #698188;
				color: #ffffff;
				border-radius: 0.5vw 0.5vw 0 0;
			}
			</styel>
			
			<section id="infoscreen_event" class="shadow">
				<header>Kommende begivenheder</header>
				<div class="sidebar_module_section">
					<div>
						<p class="infoscreen_text_description">S.U. 28 Oktober</p>
						<p>Julefrokost</p>
					</div>
					<div>
						<p class="infoscreen_text_description">Deltager</p>
						<p>36</p>
					</div>
				</div>
				<div class="sidebar_module_section">
					<div>
						<p class="infoscreen_text_description">S.U 4 Januar</p>
						<p>LAN Party</p>
					</div>
					<div>
						<p class="infoscreen_text_description">Deltager</p>
						<p>12</p>
					</div>
				</div>
			</section>
			*/
			
		$this->export();
	}
	
	function loadmodule($name){
		ob_start();
		mod::get($name)->getelement();
		return '<div class="'.$name.'">'.ob_get_clean().'</div>';
	}
}
new main();
?>