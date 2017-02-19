<?php
/*
 * Mysql database ;only one connection is allowed
 */
class Database {
	private $_connection;
	// store the single instance
	private static $_instance;
	
	/*
	 * get aan instance of database
	 * @return Database
	 */
	public static function getInstance() {
		if (! self::$_instance) {
			self::$_instance = new self ();
		}
		return self::$_instance;
	}
	/* Constructor */
	public function __construct() {
		$this->_connection = mysqli_connect ( 'localhost', 'root', '', 'phpoops' );
		
		// error handling
		if (mysqli_connect_error()){
			trigger_error("Failed to connect to Mysql :".mysqli_connect_error(),E_USER_ERROR);
		}
	}
	
	/*  
	 * Empty clone magic method to prevent duplication.
	 * */
	
	private function __clone(){
		
	}
	
	/* get the mysqli connection */
	
	public function getConnection(){
		return $this->_connection;
	}
}
?>