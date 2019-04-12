<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'medsfami_medsfamilydb');

class DB_con {
	public $connection;
	function __construct(){
		$this->connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		
		if ($this->connection->connect_error) die('Database error -> ' . $this->connection->connect_error);
		
	}
	function ret_obj(){
		return $this->connection;
	}
}
global $link,$adminlink;

$default_user = "images/default_user_icon.png";
$default_artist = "images/default_user_icon.png";
$default_show = "images/default_user_icon.png";
$cookie_name = 'medsfamily';
$cookie_time = (3600 * 24 * 30); /*  30 days */
$_SESSION['currency_symbol']='$';

  $baselink="http://localhost/ecom/";
set_time_limit(0);
?>