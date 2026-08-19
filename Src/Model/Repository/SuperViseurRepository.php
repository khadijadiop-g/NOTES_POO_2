<?php
require_once dirname(__DIR__).'/Entity/Role.php';
require_once dirname(__DIR__).'/Entity/Superviseur.php';

class SuperViseurRepository{
 private function __construct(){}

 public  static function getUser(string $email):?Superviseur{
$sql = " SELECT s.*,r.* FROM superviseurs s 
 INNER JOIN roles r ON s.id_role = r.id 
 WHERE email = :email";

 $result = Database::executeQuery($sql,['email'=>$email]);
 return Superviseur::toEntity($result)??null;

 }


}