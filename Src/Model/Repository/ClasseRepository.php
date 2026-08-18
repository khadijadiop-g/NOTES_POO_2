<?php

class ClasseRepository{

private static PDO $dtb;

    private function __construct()
    {
        ClasseRepository::$dtb = Database::getConnexion();

    }

    public static function tabToObjet(array $data): Classe
    {

            return new Classe(
            (int) $data['id'],
            $data['nom_class'],
        );
    }

    public static function getAllClasses(): array
    {
        $sql = "SELECT * FROM classes ORDER BY nom_class ASC";
        $lignes =ClasseRepository::$dtb->query($sql, false);
        return array_map(fn($ligne) =>ClasseRepository::tabToObjet($ligne), $lignes);
    }




}