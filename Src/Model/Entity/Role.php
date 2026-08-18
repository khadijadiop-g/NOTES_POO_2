<?php 

class Role
{
    private ?int $id;
    private string $nomRole;

    public function __construct(string $nomRole,?int $id){
        $this ->id = $id;
        $this ->nomRole = $nomRole;

    }

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): void { $this->id = $id; }
    public function setNom(string $nomRole): void { $this->nomRole = $nomRole; }
    public function getNom(): string { return $this->nomRole; }
}
