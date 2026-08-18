<?php 

class Etablissement
{
    private ?int $id;
    private string $nomEtablis;

    public function __construct(string $nomEtablis,?int $id=null){
        $this ->id = $id;
        $this ->nomEtablis = $nomEtablis;

    }

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): void { $this->id = $id; }
    public function setNom(string $nomEtablis): void { $this->nomEtablis = $nomEtablis; }
    public function getNom(): string { return $this->nomEtablis; }

    public static function toEntity(stdClass $obj): Etablissement
    {
        return new Etablissement(nomEtablis:$obj->nom);
    }
}