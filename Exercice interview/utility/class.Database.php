<?php

class Database {
	protected static $host;
	protected static $dbName;
	protected static $userName;
	protected static $password;

	public static function connect(){
		$pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf-8", self::$userName, self::$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = []) {
		$statement = self::connect()->prepare($query);
		$statement->execute($params);
		if(explode(' ', $query)[0] == 'SELECT'){
			$data = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
				
	}
}

?>