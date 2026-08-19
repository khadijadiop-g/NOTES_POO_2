<?php

class Filtre
{
    private int $idClasse;
    private int $idStatut;
    private string $recherche;

    public function __construct(int $idClasse = 0, int $idStatut = 0, string $recherche = '')
    {
        $this->idClasse = $idClasse;
        $this->idStatut = $idStatut;
        $this->recherche = trim($recherche);
    }

    public function getIdClasse(): int
    {
        return $this->idClasse;
    }

    public function getIdStatut(): int
    {
        return $this->idStatut;
    }

    public function getRecherche(): string
    {
        return $this->recherche;
    }

    public function hasClasse(): bool
    {
        return $this->idClasse !== 0;
    }

    public function hasStatut(): bool
    {
        return $this->idStatut !== 0;
    }

    public function hasRecherche(): bool
    {
        return $this->recherche !== '';
    }

    public static function toEntity(array $params): Filtre
    {
        return new Filtre(
           idClasse: (int)($params['classe'] ?? 0),
           idStatut: (int)($params['statut'] ?? 0),
           recherche:(string)($params['recherche'] ?? '')
        );
    }

}
