<?php
  class Database {
    private static $db_user = 'root';
    private static $db_name = 'becode_oop';
    private static $db_psw = 'root';

    public static function connect(){
      try
      {
        //permet d'ouvrir la db et d'afficher les erreurs
        return new PDO('mysql:host=localhost;dbname='.self::$db_name.';charset=utf8', self::$db_user, self::$db_psw, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } 
      catch(Exception $e)
      {
        die('Erreur : '.$e->getMessage());
      }


    }
  
    public function __destruct() {
      self::$db_con = null;
    }
  }


?>