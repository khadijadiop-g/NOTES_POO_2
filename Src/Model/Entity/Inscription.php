<?php

    class Inscription{
    private ?int $id;
    private Classe $classeId;
    private AnneScolaire $anneeId;
    private Etablissement $etablisId;
    private Eleve $eleveId;
    private StatutInscri $statutId;
     private DateTime $date_inscription;
    public function __construct(?int $id=null,Classe $classeId,AnneScolaire $anneeId,Etablissement $etablisId,
                                Eleve $eleveId,StatutInscri $statutId, DateTime $date_inscription){
    $this->id=$id;
    $this->classeId=$classeId;
    $this->anneeId=$anneeId;
    $this->etablisId=$etablisId;
    $this->eleveId=$eleveId;
    $this->statutId=$statutId;
    $this->date_inscription=$date_inscription;
    }
    public function getId():?int{return $this->id;}
    public function getClasseId():Classe{return $this->classeId;}
    public function getAnneeId():AnneScolaire{return $this->anneeId;}
    public function getEtablisId():Etablissement{return $this->etablisId;}
    public function getEleveId():Eleve{return $this->eleveId;}
    public function getStatutId():StatutInscri{return $this->statutId;}
    public function setId(?int $id):void{$this->id=$id;}
    public function setClasseId(Classe $classeId):void{$this->classeId=$classeId;}
    public function setAnneeId(AnneScolaire $anneeId):void{$this->anneeId=$anneeId;}
    public function setEtablisId(Etablissement $etablisId):void{$this->etablisId=$etablisId;}
    public function setEleveId(Eleve $eleveId):void{$this->eleveId=$eleveId;}
    public function setStatutId(StatutInscri $statutId):void{$this->statutId=$statutId;}
    public function getDateInscription():DateTime{return $this->date_inscription;}
    public function setDateInscription(DateTime $date_inscription):void{$this->date_inscription=$date_inscription;}

        public static function toEntity(stdClass $obj): Inscription
    {
        return new Inscription(classeId:Classe::toEntity($obj),
                               anneeId:AnneScolaire::toEntity($obj),
                               etablisId: Etablissement::toEntity($obj),
                               eleveId: Eleve::toEntity($obj),
                               statutId: StatutInscri::toEntity($obj),
                               date_inscription: $obj->date_inscription
                               );
    }
    


    }