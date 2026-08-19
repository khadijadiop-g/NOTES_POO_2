<?php
require_once dirname(__DIR__).'/Entity/Classe.php';
class ClasseRepository{
public static function getAllClass():array{
$sql="SELECT * FROM classes";
$results = Database::query($sql,false);
return array_map(fn($result) => Classe::toEntity($result),$results);


}




}