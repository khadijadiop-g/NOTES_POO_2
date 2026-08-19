<?php
require_once dirname(__DIR__).'/Entity/AnneScolaire.php';

class AnneScolaireRepository{

public static function getAnnee():?AnneScolaire{
    $sql = " SELECT * FROM annee_scolaire  WHERE est_active =1";
    $result = Database::query($sql);
    return AnneScolaire::toEntity($result) ?? null;
}



}