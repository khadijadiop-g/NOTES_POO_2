<?php 

class Classe{
    private ?int $id;
    private string $nom_class;
    public function __construct(?int $id,string $nom_class){
        $this->id=$id;
        $this->nom_class=$nom_class;
    }
    public function getId():?int{return $this->id;}
    public function getNomClass():string{return $this->nom_class;}
    public function setId(?int $id):void{$this->id=$id;}
    public function setNomClass(string $nom_class):void{$this->nom_class=$nom_class;}
}