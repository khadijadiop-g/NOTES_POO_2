<?php 

class Role
{
    private ?int $id;
    private string $nomRole;

    public function __construct(string $nomRole,?int $id=null){
        $this ->id = $id;
        $this ->nomRole = $nomRole;

    }

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): void { $this->id = $id; }
    public function setNom(string $nomRole): void { $this->nomRole = $nomRole; }
    public function getNom(): string { return $this->nomRole; }

        public static function toEntity(stdClass $obj): Role
    {
        return new Role(nomRole:$obj->nom_role,
                        id:$obj->id);
    }
}
