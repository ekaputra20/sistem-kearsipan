<?php
define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('db_arsip', 'db_arsip');

class Connect {
	public function __construct() {
		mysql_connect(host, user, pass) or die(mysql_error());
		mysql_select_db(db_arsip) or die(mysql_error());
	}

	public function setSQL($sql) {
		mysql_query($sql);
	}

	public function getSQL($sql) {
		return mysql_query($sql);
	}
}
?>