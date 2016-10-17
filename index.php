<?php
include_once("essentials/autoinclude.php");

class main extends htmldoc{
	static $page = "";
	
	function __construct(){
		parent:: __construct();
		self::$title = "Ordbogen infoskærm";
		self::addheader('
		<script>
		function navigate(url){
			location.replace(url);
		}
		</script>');
		self::addheader('
		<style>
		html, body{
			width: 100%;
			height: 100%;
			overflow: hidden;
		}
		html, body, main, figure, figcaption, img, iframe, div{
			margin: 0;
			padding: 0;
		}
		body{
			color: #657c83;
			font: 4vw arial;
			background-color: #eff4f9;
			text-align: center;
		}
		#landingpage{
			position: absolute;
			bottom: 15vw;
			left: 15vw;
			right: 15vw;
		}
		#landingpage figure{
			position: absolute;
			bottom: 0;
			text-align: center;
			padding: 2vw;
			background-color: #ffffff;
			width: 25vw;
			height: 16vw;
		}
		#landingpage figure:hover{
			bottom: -0.25vw;
		}
		#landingpage figure:first-child{
			left: 0;
		}
		#landingpage figure:last-child{
			right: 0;
		}
		#landingpage figure:first-child:hover{
			left: 0.25vw;
		}
		#landingpage figure:last-child:hover{
			right: -0.25vw;
		}
		#landingpage figure iframe, #landingpage figure img{
			width: 20vw;
			height: 11vw;
			border: none;
			overflow: hidden;
		}
		#landingpage .overlay{
			cursor: pointer;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
		}
		#landingpage .shadow{
			box-shadow: 0 0.5vw 1vw rgba(105, 129, 136, 0.22);
			-webkit-box-shadow: 0 0.5vw 1vw rgba(105, 129, 136, 0.22);
			-moz-box-shadow: 0 0.5vw 1vw rgba(105, 129, 136, 0.22);
		}
		#landingpage .shadow:hover{
			box-shadow: 0 0 1vw rgba(105, 129, 136, 0.22);
			-webkit-box-shadow: 0 0 1vw rgba(105, 129, 136, 0.22);
			-moz-box-shadow: 0 0 1vw rgba(105, 129, 136, 0.22);
		}
		</style>');
		
		$this->body = '
		<main id="landingpage">
			<figure onclick="navigate(\'infoscreen.php\')" class="shadow">
				<div class="overlay"></div>
				<iframe src="infoscreen.php" class="shadow"></iframe>
				<figcaption>Infoskærm</figcaption>
			</figure>
			<figure onclick="navigate(\'admin.php\')" class="shadow">
				<div class="overlay"></div>
				'./*<iframe src="admin.php" class="shadow"></iframe>*/'
				<img src="misc/screenshot_admin.png" alt="Administration screenshot" class="shadow" />
				<figcaption>Administration</figcaption>
			</figure>
		</main>';
		
		$this->export();
	}
}
new main();
?>