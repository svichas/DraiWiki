<?php
/**
 * DRAIWIKI
 * Open source wiki software
 *
 * @version     1.0 Alpha 1
 * @author      Robert Monden
 * @copyright   DraiWiki, 2017
 * @license     Apache 2.0
 */

namespace DraiWiki\src\main\controllers;

if (!defined('DraiWiki')) {
	header('Location: ../index.php');
	die('You\'re really not supposed to be here.');
}

use DraiWiki\src\core\controllers\Registry;

class App {

    private $_route;

    public function __construct() {
        $this->_route = Registry::get('route');
    }

    private function detect() {

    }

    public function load() {

    }

    public function display() {

    }
}
