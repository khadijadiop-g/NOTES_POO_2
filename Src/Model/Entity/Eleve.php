
<?php

class Eleve{
private ?int $id;
private string $nom_eleve;
private string $prenom_eleve;
private string $matricule;
private DateTime $date_naissance;
private Tuteur $tuteur;

public function __construct(string $nom_eleve,string $prenom_eleve,string $matricule,DateTime $date_naissance,Tuteur $tuteur,?int $id=null){
    $this->id=$id;
    $this->nom_eleve=$nom_eleve;
    $this->prenom_eleve=$prenom_eleve;
    $this->matricule=$matricule;
    $this->date_naissance=$date_naissance;
    $this->tuteur=$tuteur;
}
public function getId():?int{return $this->id;}
public function getNomEleve():string{return $this->nom_eleve;}
public function getPrenomEleve():string{return $this->prenom_eleve;}
public function getMatricule():string{return $this->matricule;}
public function getDateNaissance():DateTime{return $this->date_naissance;}
public function setId(?int $id):void{$this->id=$id;}
public function setNomEleve(string $nom_eleve):void{$this->nom_eleve=$nom_eleve;}
public function setPrenomEleve(string $prenom_eleve):void{$this->prenom_eleve=$prenom_eleve;}
public function setMatricule(string $matricule):void{$this->matricule=$matricule;}
public function setDateNaissance(DateTime $date_naissance):void{$this->date_naissance=$date_naissance;}
public function getTuteur():Tuteur{return $this->tuteur;}
public function getNomComplet():string{return $this->prenom_eleve.' '.$this->nom_eleve;}
public function setTuteur(Tuteur $tuteur):void{$this->tuteur=$tuteur;}


  public static function toEntity(stdClass $obj): Eleve
    {
        return new Eleve(nom_eleve: $obj->nom_eleve,
                         prenom_eleve: $obj->prenom_eleve,
                         matricule: $obj->matricule,
                         date_naissance:new DateTime( $obj->date_naissance),
                         tuteur:Tuteur::toEntity($obj)
                         );
    }
}