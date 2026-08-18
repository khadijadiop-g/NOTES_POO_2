<?php

class Tuteur{

    private ?int $id;
    private string $nom_tuteur;
    private string $prenom_tuteur;
    private string $tel_tuteur;
    private Eleve $eleveId;

    public function __construct(string $nom_tuteur,string $prenom_tuteur,string $tel_tuteur,?int $id,Eleve $eleveId){
        $this ->id = $id;
        $this ->nom_tuteur = $nom_tuteur;
        $this ->prenom_tuteur = $prenom_tuteur;
        $this ->tel_tuteur = $tel_tuteur;
        $this ->eleveId = $eleveId;

    }

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): void { $this->id = $id; }
    public function setNomTuteur(string $nom_tuteur): void { $this->nom_tuteur = $nom_tuteur; }
    public function getNomTuteur(): string { return $this->nom_tuteur; }
    public function setPrenomTuteur(string $prenom_tuteur): void { $this->prenom_tuteur = $prenom_tuteur; }
    public function getPrenomTuteur(): string { return $this->prenom_tuteur; }
    public function setTelTuteur(string $tel_tuteur): void { $this->tel_tuteur = $tel_tuteur; }
    public function getTelTuteur(): string { return $this->tel_tuteur; }
    public function setEleveId(Eleve $eleveId): void { $this->eleveId = $eleveId; }
    public function getEleveId(): Eleve { return $this->eleveId; }

}