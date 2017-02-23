<?php
/**
 * HURRICANE
 * DraiWiki default theme
 *
 * @author		Robert Monden
 * @copyright	DraiWiki development team, 2017
 * @version		1.0 Alpha 1
 */

namespace DraiWiki\views\templates;

if (!defined('DraiWiki')) {
	header('Location: ../index.php');
	die('You\'re really not supposed to be here.');
}

use DraiWiki\src\main\controllers\Main;
use DraiWiki\views\Template;

class Index extends Template {

	private $_imageUrl, $_skinUrl, $_menuItems = [];

	public function __construct($imageUrl, $skinUrl) {
		$this->_imageUrl = $imageUrl;
		$this->_skinUrl = $skinUrl;
		$this->loadLocale();
	}

	public function showHeader() {
		echo '<!DOCTYPE HTML>
<html>
	<head>
		<title>';

	if (empty($this->data['title']))
		echo Main::$config->read('wiki', 'WIKI_NAME'), ' | ', Main::$config->read('wiki', 'WIKI_SLOGAN');

	else 
		echo $this->data['title'], ' | ', Main::$config->read('wiki', 'WIKI_NAME');

	echo '</title>
		<link rel="stylesheet" type="text/css" href="', $this->_skinUrl, '" />';

	foreach ($this->stylesheets as $stylesheet) {
		echo '
		<link rel="stylesheet" type="text/css" href="', $this->getStylesheet($stylesheet),'" />';
	}

	echo '
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="topbar">';

		$this->showMenu();

		echo '
				<div id="userinfo">
					', sprintf($this->locale->read('index', 'hello'), $this->user['first_name']), '
				</div>
				<br class="clear" />
			</div>
			<div id="header">
				', Main::$config->read('wiki', 'WIKI_NAME'), '
			</div>';

		if (!empty($this->data['title']))
			echo '
			<div id="contentHeader">
				', $this->data['title'], '
			</div>';

		echo '
			<div id="content">';	
	}

	public function showFooter() {
echo '
			</div>
		</div>
		<div id="copyright">
			', $this->getCopyright(), '
		</div>
	</body>
</html>';
	}

	private function showMenu() {
		echo '
				<div id="menu">';

		foreach ($this->_menuItems as $item) {
			if ($item['visible'])
				echo '
					<a href="', $item['href'], '">', $this->locale->read('index', $item['label']), '</a>';
		}

		echo '
				</div>';
	}

	public function pushMenu($menuItems) {
		$this->_menuItems = $menuItems;
	}
}