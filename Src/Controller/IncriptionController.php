<?php
require_once dirname(__DIR__) . '/Model/Repository/Inscriptionrepository.php';
require_once dirname(__DIR__) . '/Model/Repository/ClasseRepository.php';
require_once dirname(__DIR__) . '/Model/Repository/AnneScolaireRepository.php';
require_once dirname(__DIR__) . '/Model/Dto/Filtre.php';
require_once dirname(__DIR__) . '/Model/Dto/Pagination.php';

class IncriptionController
{
 private  function __construct(){}
    public static function showInscription(): void
    {
        $idAnnee = 1;

        $filtre = Filtre::toEntity($_GET);
        $pagination = Pagination::toEntity($_GET, 5);

        $classes = ClasseRepository::getAllClass();
        $statuts = Inscriptionrepository::getAllStatut();
        $annee = AnneScolaireRepository::getAnnee();

        $pagination->setTotal(Inscriptionrepository::getTotalInscriptions($idAnnee, $filtre));
        $inscriptions = Inscriptionrepository::getInscriptions($idAnnee, $filtre, $pagination);

        self::renderView('incription',['filtre'=>$filtre,
                                       'pagination'=>$pagination,
                                       'classes'=>$classes,
                                       'statuts'=>$statuts,
                                       'inscriptions'=>$inscriptions,
                                        'annee'=>$annee
                                       ]);
    }


public static function renderView(string $file, array $data = []){
    extract($data, EXTR_SKIP);
    require_once dirname(__DIR__)."/View/$file.html.php";
}




}
