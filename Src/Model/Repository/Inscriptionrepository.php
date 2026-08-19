<?php
require_once dirname(__DIR__) . '/Entity/Classe.php';
require_once dirname(__DIR__) . '/Entity/Tuteur.php';
require_once dirname(__DIR__) . '/Entity/Eleve.php';
require_once dirname(__DIR__) . '/Entity/AnneScolaire.php';
require_once dirname(__DIR__) . '/Entity/StatutInscri.php';
require_once dirname(__DIR__) . '/Entity/Etablissement.php';
require_once dirname(__DIR__) . '/Entity/Inscription.php';
require_once dirname(__DIR__) . '/Dto/Filtre.php';
require_once dirname(__DIR__) . '/Dto/Pagination.php';
require_once dirname(__DIR__) . '/Dto/ColorInscri.php';
class Inscriptionrepository{


public static function getAllStatut():array{
$sql = "SELECT * FROM statutinscription;";
$results = Database::query($sql,false);
return array_map(fn($result) => StatutInscri::toEntity($result),$results);
}


public static function getInscriptions(int $id_annee, Filtre $filtre, Pagination $pagination): array
{
    $sql = "SELECT e.prenom_eleve,e.nom_eleve,e.id AS eleve_id ,e.matricule,e.date_naissance,c.id AS classe_id,c.nom_class,
 et.id AS etablis_id,et.nom,t.prenom_tuteur,t.nom_tuteur,t.tel_tuteur,t.id AS tuteur_id,s.nom_statut,s.id AS statut_id
  FROM eleves e  
 INNER JOIN inscriptions i ON e.id = i.id_eleve
 INNER JOIN statutinscription s ON s.id = i.id_statut
 INNER JOIN classes c ON c.id = i.id_classe 
 INNER JOIN tuteurs t ON t.id = e.id_tuteur 
 INNER JOIN etablissements et ON et.id = i.id_etablis 
 WHERE i.id_annee = :id_annee
 AND (:id_classe = 0 OR i.id_classe = :id_classe)
 AND (:id_statut = 0 OR i.id_statut = :id_statut)
 AND (:recherche = '' OR e.nom_eleve ILIKE :recherche_like OR e.prenom_eleve ILIKE :recherche_like OR e.matricule ILIKE :recherche_like)
 ORDER BY e.nom_eleve, e.prenom_eleve
 LIMIT :limit OFFSET :offset";

    $results = Database::executeQuery($sql, [
        'id_annee' => $id_annee,
        'id_classe' => $filtre->getIdClasse(),
        'id_statut' => $filtre->getIdStatut(),
        'recherche' => $filtre->getRecherche(),
        'recherche_like' => '%' . $filtre->getRecherche() . '%',
        'limit' => $pagination->getLimit(),
        'offset' => $pagination->getOffset(),
    ], false);

    return array_map(fn($result) => Inscription::toEntity($result), $results);
}



public static function getTotalInscriptions(int $id_annee, Filtre $filtre): int
{
    $sql = "SELECT COUNT(*) AS total
 FROM inscriptions i
 INNER JOIN eleves e ON e.id = i.id_eleve
 WHERE i.id_annee = :id_annee
 AND (:id_classe = 0 OR i.id_classe = :id_classe)
 AND (:id_statut = 0 OR i.id_statut = :id_statut)
 AND (:recherche = '' OR e.nom_eleve ILIKE :recherche_like OR e.prenom_eleve ILIKE :recherche_like OR e.matricule ILIKE :recherche_like)";

    $result = Database::executeQuery($sql, [
        'id_annee' => $id_annee,
        'id_classe' => $filtre->getIdClasse(),
        'id_statut' => $filtre->getIdStatut(),
        'recherche' => $filtre->getRecherche(),
        'recherche_like' => '%' . $filtre->getRecherche() . '%',
    ], true);
    return (int)($result->total ?? 0);
}

}