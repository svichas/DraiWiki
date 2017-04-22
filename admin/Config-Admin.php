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

namespace DraiWiki\admin;

if (!defined('DWA')) {
	header('Location: ../index.php');
	die('You\'re really not supposed to be here.');
}

/**
 * This class, similar to the Config.php file in /public, is used for storing
 * important settings. Unlike its counterpart, however, this file only contains
 * settings that are absolutely vital.
 *
 * @since		1.0 Alpha 1
 */
class Config {

	private static $_instance;

	private function __construct() {
		/**
		 * DraiWiki will use the data below to establish a connection to the database.
		 */
		$this->_settings['database'] = [
			'DB_SERVER' => '127.0.0.1',
			'DB_USERNAME' => 'root',
			'DB_PASSWORD' => '',
			'DB_NAME' => 'draiwiki',
			'DB_PREFIX' => 'drai_',
			'DB_CHARSET' => 'utf8mb4'
		];

        $this->_settings['path'] = [
                'BASE_DIRNAME' => '/DraiWiki'
        ];
	}

	public static function instantiate() {
		if (self::$_instance == null)
			self::$_instance = new self();

		return self::$_instance;
	}

	/**
	 * This method is used for retrieving a specific setting.
	 * @param string $category The category the setting belongs to
	 * @param string $key The identification key of the desired setting
	 * @return string/int/boolean The setting's value
	 */
	public function read($category, $key) {
		if (!empty($this->_settings[$category][$key]))
			return $this->_settings[$category][$key];
		else
			return null;
	}

	/**
	 * This method will be used for adding settings retrieved from the database. Any existing
	 * settings will be overwritten.
	 * @param string $category The category the current element belongs to, e.g. database, layout, etc.
	 * @param string $key The key will be used to identify the setting
	 * @param string $value The value of the setting
	 * @return void
	 */
	public function import($category, $key, $value) {
		if (empty($this->_settings[$category]))
			$this->_settings[$category] = [$key => $value];
		else
			$this->_settings[$category][$key] = $value;
	}
}
